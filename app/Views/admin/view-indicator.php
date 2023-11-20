<?php include('include/header.php'); ?>



<?php include('include/menu.php');?>



  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



    <!-- Content Header (Page header) -->



    <div class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1 class="m-0">Indicator Management</h1>



          </div><!-- /.col -->



          <div class="col-sm-6">



            <ol class="breadcrumb float-sm-right">



              <li class="breadcrumb-item"><a href="#">Home</a></li>



              <li class="breadcrumb-item active">Indicators </li>



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

    <tr><th>#</th><th>Indicator Category </th><th>Indicator Name </th><th>Icon</th><th>Description</th><th>SDGs</th><th>Action</th></tr>

    </thead>

    <?php $s=1;



    foreach($list as $d){?>



      <tr>



        <td><?php echo $s;?></td>



        <td><?php echo $d['indicator_category_name'];?></td>



        <td><?php echo $d['indicator_name'];?></td>

<td><img src="<?php echo base_url();?>/public/uploads/sdg/<?php echo $d['image'];?>" style="width: 70px;"></td>
<td><?php echo $d['description'];?></td>

        <td>



          <table style="width: 100%;"><?php 



          if(!empty($d['sdg'])){



            foreach($d['sdg'] as $g){?>



              <tr><td style="width: 70%;"><?php echo $g['sdg_name'];?></td>



                <td> <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteIndicatorSdg/<?php echo $g['indicator_sdg_id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a></td></tr>



            <?php } } ?>



          </table>



        </td>



           <td>



          <a class="btn btn-primary" href="<?php echo base_url()?>/master/editIndicator/<?php echo $d['indicator_id'];?>" data-name='<?php echo $d['indicator_id'];?>' data-number='<?php echo $d['indicator_id'];?>' ><i class="fa fa-pencil"></i></a>



          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteIndicator/<?php echo $d['indicator_id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>



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











      <div class="modal fade" id="modal-edit">



        <div class="modal-dialog">



          <div class="modal-content">



            <div class="modal-header">



              <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                <span aria-hidden="true">&times;</span>



              </button>



            </div>



              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/master/addsdg" enctype='multipart/form-data'>



            <input type="hidden" name="id" id="cat_id" value="" required="required">



            <div class="modal-body">



               <div class="card card-primary">



              <div class="card-header">



                <h3 class="card-title">Update Industry Category</h3>



              </div>



             



                <div class="card-body">



                  <div class="form-group">



                    <label for="exampleInputEmail1">Industry Category Name</label>



                    <input type="text" class="form-control" id="cat_name" placeholder="Enter Industry Category Name" required="required" name="category_name">



                  </div>



                </div>



              



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



   function editSdg(that) {



        var num = $(that).attr('data-number');



        //alert(num);



        var name = $(that).attr('data-name');



        var img = $(that).attr('data-img');



        $('#cat_id').val(num);



        $('#cat_name').val(name);



        $('#modal-edit').modal('show');



    }



</script>