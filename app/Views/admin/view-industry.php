<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Industry Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="<?php echo base_url();?>/master/industry" class='btn btn-primary'><i class="fa fa-plus"></i> Add Industry</a> </li>

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

                <h3 class="card-title">Indutry List</h3>

              </div>

        

    <?php 

    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead>

    <tr><th>#</th><th>Industry Category </th><th>Industry Name </th><th>SDGs</th><th>Action</th></tr>

  </thead>

    <?php $s=1;



    foreach($list as $d){?>

      <tr>

        <td><?php echo $s;?></td>

        <td><?php echo $d['industry_category_name'];?></td>

        <td><?php echo $d['industry_name'];?></td>

        <td>



          <table style="width: 100%;"><?php 

          if(!empty($d['sdg'])){

            foreach($d['sdg'] as $g){?>

              <tr><td style="width: 70%;"><?php echo $g['sdg_name'];?></td>
                <td>
<select class="btn btn-primary" id="remark_degree" onchange="setDegree(this,'<?php echo $d['industry_id'] ?>','<?php echo $g['sdg_id'] ?>')">
  <option value="">Select Degree</option>
<?php 
  if($degree) {
    foreach($degree as $deg) {
?>
  <option value="<?php echo $deg['id']; ?>" <?php echo $deg['id']==$g['degree_id']?'selected=selected':'' ?>><?php echo $deg['name']; ?></option>
<?php
    }
  }
?>                
</select>
                </td>

                <td > <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteIndustrySdg/<?php echo $g['industry_sdg_id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a></td></tr>

            <?php } } ?>

          </table>

        </td>

           <td>

          <a class="btn btn-primary" href="<?php echo base_url() ?>/master/editIndustry/<?php echo $d['industry_id'];?>" onclick="editSdg(this);" data-name='<?php echo $d['industry_id'];?>' data-number='<?php echo $d['industry_id'];?>' ><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteIndustry/<?php echo $d['industry_id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

        </td>

      </tr>

    <?php $s++;}?>

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
  function setDegree(that,industry_id,sdg_id) {
    degree_id = $(that).val() 
        $.ajax({
          url: "<?php echo base_url()?>/master/setDegreeToIndustrySdg",
          type: "POST",
          data: {'industry_id':industry_id,'sdg_id':sdg_id,'degree_id':degree_id},
          // dataType: "JSON",
          success: function(data) {
            alert('success');
          },
          error: function(xhr, status, error) {
            alert('error');
          }
        });
  }
</script>

