<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Supplier Assessment Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="#" class='btn btn-primary'><i class="fa fa-plus"></i> Add Supplier</a> </li>

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

                <h3 class="card-title">Supplier List</h3>

              </div>

        

    <?php 
    if(!empty($ghg)){
      foreach($ghg as $g) {
    ?>
    <?php if($g['id']==21) { ?>
    <h3><?php echo $g['ghg_name'] ?></h3>
    <table class="table table-bordered table-hover">
    <thead><tr><th>#</th><th>Factor Name </th><th>Unit </th><th>Quantity </th><th>Estimate </th><th>Degree</th></tr></thead>
    <tbody>
    <?php 
    if($list) {
    $s=1;
    foreach($list as $d){
    if($d['ghg_id']==21) {
    ?>
      <tr>
        <td><?php echo $s;?></td>
        <td><?php echo $d['ghg_factor_name'];?></td>
        <td><?php echo $d['unit'];?></td>
        <td><?php echo $d['quantity'];?></td>
        <td><?php echo $d['estimate'];?></td>
        <td id="deg_<?php echo $d['id']; ?>">
        <?php
        if($d['degree_id']) {
        ?>
        <a class="btn btn-primary">Verified</a>
        <?php
        }
        else {
        ?>
        <a class="btn btn-primary" onclick="show_remark(<?php echo $d['supplier_assessment_id'] ?>,<?php echo $d['id'] ?>,<?php echo $d['ghg_id'] ?>)">Verify</a>
      <?php
        }          
      ?>

        </td>
      </tr>
    <?php 
        $s++;
        }
      }
    }
    ?>
    </tbody>
    </table>
  <?php } ?>

    <?php if($g['id']==22) { ?>
    <h3><?php echo $g['ghg_name'] ?></h3>
    <table class="table table-bordered table-hover">
    <thead><tr><th>#</th><th>Vehicle Mileage </th><th>Vehicle Efficiency</th><th>Raw Material</th><th>Estimate</th><th>Degree</th></tr></thead>
    <tbody>
    <?php 
    if($list) {
    $s=1;
    foreach($list as $d){
    if($d['ghg_id']==22) {
    ?>
      <tr>
        <td><?php echo $s;?></td>
        <td><?php echo $d['vehicle_mileage'];?></td>
        <td><?php echo $d['vehicle_efficience'];?></td>
        <td><?php echo $d['raw_material'];?></td>
        <td><?php echo $d['estimate'];?></td>
        <td id="deg_<?php echo $d['id']; ?>">
        <?php
        if($d['degree_id']) {
        ?>
        <a class="btn btn-primary">Verified</a>
        <?php
        }
        else {
        ?>
        <a class="btn btn-primary" onclick="show_remark(<?php echo $d['supplier_assessment_id'] ?>,<?php echo $d['id'] ?>,<?php echo $d['ghg_id'] ?>)">Verify</a>
      <?php
        }          
      ?>

        </td>
      </tr>
    <?php 
        $s++;
        }
      }
    }
    ?>
    </tbody>
    </table>
  <?php } ?>

    <?php if($g['id']==23) { ?>
    <h3><?php echo $g['ghg_name'] ?></h3>
    <table class="table table-bordered table-hover">
    <thead><tr><th>#</th><th>Process Name </th><th>Electricity Consumption </th><th>Water Consumption</th><th>Raw Material </th><th>Estimate</th><th>Degree</th></tr></thead>
    <tbody>
    <?php 
    if($supplier_manufacturing_process) {
    $s=1;
    foreach($supplier_manufacturing_process as $d){
    if($d['ghg_id']==23) {
    ?>
      <tr>
        <td><?php echo $s;?></td>
        <td><?php echo $d['process_name'];?></td>
        <td><?php echo $d['electricity_consumption'];?></td>
        <td><?php echo $d['water_consumption'];?></td>
        <td><?php echo $d['factor_name'];?></td>
        <td><?php echo $d['estimate']; ?></td>
        <td id="deg_<?php echo $d['id']; ?>">
        <?php
        if($d['degree_id']) {
        ?>
        <a class="btn btn-primary">Verified</a>
        <?php
        }
        else {
        ?>
        <a class="btn btn-primary" onclick="show_remark(<?php echo $d['supplier_assessment_id'] ?>,<?php echo $d['id'] ?>,<?php echo $d['ghg_id'] ?>)">Verify</a>
      <?php
        }          
      ?>

        </td>
      </tr>
    <?php 
        $s++;
        }
      }
    }
    ?>
    </tbody>
    </table>
  <?php } ?>


    <?php if($g['id']==24) { ?>
    <h3><?php echo $g['ghg_name'] ?></h3>
    <table class="table table-bordered table-hover">
    <thead><tr><th>#</th><th>Factor Name </th><th>Unit </th><th>Quantity</th><th>Estimate </th><th>Degree</th></tr></thead>
    <tbody>
    <?php 
    if($list) {
    $s=1;
    foreach($list as $d){
    if($d['ghg_id']==24) {
    ?>
      <tr>
        <td><?php echo $s;?></td>
        <td><?php echo $d['ghg_factor_name'];?></td>
        <td><?php echo $d['unit'];?></td>
        <td><?php echo $d['quantity'];?></td>
        <td><?php echo $d['estimate'];?></td>
        <td id="deg_<?php echo $d['id']; ?>">
        <?php
        if($d['degree_id']) {
        ?>
        <a class="btn btn-primary">Verified</a>
        <?php
        }
        else {
        ?>
        <a class="btn btn-primary" onclick="show_remark(<?php echo $d['supplier_assessment_id'] ?>,<?php echo $d['id'] ?>,<?php echo $d['ghg_id'] ?>)">Verify</a>
      <?php
        }          
      ?>

        </td>
      </tr>
    <?php 
        $s++;
        }
      }
    }
    ?>
    </tbody>
    </table>
  <?php } ?>

    <?php // if($g['id']==25) { ?>
<!--     <h3><?php // echo $g['ghg_name'] ?></h3>
    <table class="table table-bordered table-hover">
    <thead><tr><th>#</th><th>Factor Name </th><th>Unit </th><th>Quantity</th><th>Estimate </th><th>Degree</th></tr></thead>
    <tbody>
    <?php 
    // if($list) {
    // $s=1;
    // foreach($list as $d){
    // if($d['ghg_id']==25) {
    ?>
      <tr>
        <td><?php // echo $s;?></td>
        <td><?php // echo $d['ghg_factor_name'];?></td>
        <td><?php // echo $d['unit'];?></td>
        <td><?php // echo $d['quantity'];?></td>
        <td><?php // echo $d['estimate'];?></td>
        <td id="deg_<?php // echo $d['id']; ?>">
        <?php
        // if($d['degree_id']) {
        ?>
        <a class="btn btn-primary">Verified</a>
        <?php
        // }
        // else {
        ?>
        <a class="btn btn-primary" onclick="show_remark(<?php // echo $d['supplier_assessment_id'] ?>,<?php // echo $d['id'] ?>)">Verify</a>
      <?php
        // }          
      ?>

        </td>
      </tr>
    <?php 
        // $s++;
    //     }
    //   }
    // }
    ?>
    </tbody>
    </table> -->
  <?php // } ?>

  <?php 
    } 
  }
?>

            </div>

          </div>

        </div>



      </div><!-- /.container-fluid -->

    </section>

  </div>

      <div class="modal fade" id="remark-doc">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Remark</h3>
              </div>
              <div class="card-body" id="remark_doc_div">
                <input type="hidden" id="said" name="said" />
                <input type="hidden" id="gaid" name="gaid" />
                <input type="hidden" id="gid" name="gid" />
                <div class="form-group">
                  <label>Degree</label>
                  <select class="btn btn-primary" id="remark_degree" class="form-control">
                  <option value="">Select Degree </option>
                <?php
                if($degree) {
                  foreach($degree as $deg) {
                ?>
                <option value="<?php echo $deg['id']; ?>" ><?php echo $deg['name']; ?></option>
                <?php              
                    }
                  }
                ?>
                </select>
              </div>
              <div class="form-group">
                <label>Remark</label>
              <textarea id="remark" name="remark" class="form-control"></textarea>
            </div>
            <button type="button" class="btn btn-secondary" onclick="submit_remark()">Verify</button>
            </div>
          </div>
        </div>
      </div>
<!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>

<?php include('include/footer.php');?>

<script>
    function show_remark(said,gaid,gid) {
      $("#said").val(said);
      $("#gaid").val(gaid);
      $("#gid").val(gid);
      $('#remark-doc').modal('show');      
    }  
    function submit_remark() {
      var supplier_assessment_id=$("#said").val();
      var ghg_assessment_id=$("#gaid").val();
      var ghg_id=$("#gid").val();
      var remark = $("#remark").val();
      var remark_degree = $("#remark_degree").val();
      $.ajax({
            url : "<?php echo base_url()?>/master/setGhgAssessmentDegree/"+supplier_assessment_id+"/"+ghg_assessment_id+"/"+remark+"/"+remark_degree+"/"+ghg_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data){
              $('#doc_div').html(data);
              $("#remark_degree").val("");
              $("#remark").val("");
              $('#remark-doc').modal('hide');
              $("#deg_"+ghg_assessment_id+" a").html("Verified");
            },
        });
    }    
</script>

