<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">API Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">APIs </li>

            </ol>
                <a href="<?php echo base_url();?>/apifrontController" class="btn btn-primary btn-sm">View Doc's</a>
          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    

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

                <h3 class="card-title">APIs List</h3>

              </div>

              

<div class="card-body">

    <?php 

   // print_r($api);

    if(!empty($api)){?>

    <table class="table table-bordered table-hover" id="datatables">

   <thead><tr><th>#</th><th>API Name</th><th>Hitting Url</th><th>Api_Request</th><th>Api_Response</th><th>category</th> <!--<th>Action</th>--></tr></thead>

    <?php $s=1;

    foreach($api as $d){?>

      <tr><td><?php echo $s;?></td><td><?php echo $d['api_name'];?></td>

        <td>
            <?php echo $d['hitting_url'];?></td>

       
        <td>
            <?php echo $d['api_request'];?></td>

         <td>
            <?php echo $d['api_response'];?></td>
            <td>
            <?php echo $d['api_category'];?></td>

        <!--<td>-->

        <!--  <a class="btn btn-primary" href="javascript:void(0);" onclick="editApi(this);" data-name='<?php echo $d['api_name'];?>' data-number='<?php echo $d['id'];?>' data-Hitting_Url='<?php echo $d['hitting_url'];?>' ><i class="fa fa-pencil"></i></a>-->

        <!--  <a class="btn btn-danger" href="<?php echo base_url()?>/master/deletesdg/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>-->

        <!--</td>-->

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

      

<script type="text/javascript">

   function editApi(that) {

        var num = $(that).attr('data-number');

        // alert(num);

        var name = $(that).attr('data-name');

        var img = $(that).attr('data-img');

        $('#sdg_id').val(num);

        $('#sdg_name_id').val(name);

        $('#imgDiv').attr('src',img);

        $('#modal-edit').modal('show');

    }

</script>