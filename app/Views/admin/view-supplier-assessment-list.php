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



    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead><tr><th>#</th><th>Supplier Name </th><th>Assessment Name </th><th>Date From </th><th>Date to </th><th>Submit Status</th><th>Verify Status </th><th>Admin Verify </th><th>view</th></tr></thead>

    <tbody>

    <?php $s=1;



    foreach($list as $d){?>

      <tr>

        <td><?php echo $s;?></td>

        <td><?php echo $d['supplier_name'];?></td>

        <td><?php echo $d['assessment_name'];?></td>

        <td><?php echo $d['date_from'];?></td>

        <td><?php echo $d['date_to'];?></td>

        <td><?php echo $d['is_submit'];?></td>

        <td><?php echo $d['is_verify'];?></td>

        <td>
        <select class="btn btn-primary" onchange="return base_assessment_verify(this,<?php echo $d['id'] ?>)">

        <option value="">Select Action </option>
        <option value="1" <?php echo $d['admin_verify']==1?'selected':'' ?>>Verify </option>
        <option value="0" <?php echo $d['admin_verify']==0?'selected':'' ?>>Not Verify </option>
        </select>          
        </td>

        <td>
        <?php 
          $assess = "";
          if($d['assessment_id']==1) {
            $assess="SupplierAssessment";
          }
          elseif($d['assessment_id']==2) {
            $assess="SupplierAdvanceAssessment";            
          }
          elseif($d['assessment_id']==10) {
            $assess="SupplierCompanyAssessment";            
          }
          elseif($d['assessment_id']==11) {
            $assess="SupplierProductAssessment";            
          }
        ?>
          <a class="btn btn-primary" href="<?php echo base_url() ?>/master/<?php echo $assess?$assess:''?>/<?php echo $d['id'] ?>"><i class="fa fa-eye"></i></a>          

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
    function base_assessment_verify(that,id) {

    admin_verify = $(that).val();

    $.ajax({

          url : "<?php echo base_url()?>/master/baseAssessmentVerify/"+id+"/"+admin_verify,

          type: "POST",

          //dataType: "JSON",

          success: function(data){

            // alert('success');

          },

        });

  }
</script>

