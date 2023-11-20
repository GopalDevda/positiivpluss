<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Supplier Management</h1>

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



    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead><tr><th>#</th><th>Supplier Name </th><th>Mobile </th><th>Email </th><th>Brand Name </th><th>Website</th><th>Description </th><th>view</th><th>Dashboard Access</th><th>Action</th></tr></thead>

    <tbody>

    <?php $s=1;



    foreach($list as $d){?>

      <tr>

        <td><?php echo $s;?></td>

        <td><?php echo $d['supplier_name'];?></td>

        <td><?php echo $d['mobile'];?></td>

        <td><?php echo $d['email'];?></td>

        <td><?php echo $d['brand_name'];?></td>

        <td><?php echo $d['website'];?></td>

        <td><?php echo $d['description'];?></td>

        <td>

          <a class="btn btn-primary" href="<?php echo base_url() ?>/master/viewSupplierAssessmentList/<?php echo $d['id'] ?>"><i class="fa fa-eye"></i></a>          

        </td>       
        <td>
          <select class="btn btn-primary" id="degree_1" onchange="return set_dashboard_access(this,<?php echo $d['id'] ?>)">
            <option value="0" <?= $d['dashboard_access']==0?'selected':'' ?>>Not Allow Dashboard</option>
            <option value="1" <?= $d['dashboard_access']==1?'selected':'' ?>>Allow Dashboard</option>
        </select>
        </td>

           <td>

          <a class="btn btn-primary" href="#" onclick="" data-name='' data-number='' ><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="#" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

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

<?php include('include/footer.php');?>

<script>
  function set_dashboard_access(obj,supplier_id) {
    var dashboard_access=$(obj).val();
      $.ajax({
        url : "<?php echo base_url()?>/master/setDashboardAccess/"+supplier_id+"/"+dashboard_access,
        //type: "POST",
        //dataType: "JSON",
        success: function(data){
          // alert('success');
        },
        error: function(xhr, status, error){
          // alert('error');
        }
      });
  }
</script>

