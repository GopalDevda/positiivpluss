<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Finance Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Finance</li>

            </ol>

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

          <div class="col-md-5">

            <!-- general form elements -->

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Add New Finance Category</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->



              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/master/addfinance" enctype='multipart/form-data'>

<input type="hidden" name="id" id="finance_id1" value="" >

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Finance Name</label>

                    <input type="text" required="required" class="form-control" id="exampleInputEmail1" placeholder="Enter finance Name" name="finance_name" >

                  </div>

                

                  <!--<div class="form-group">-->

                  <!--  <label for="exampleInputFile">Icon</label>-->

                  <!--  <div class="input-group">-->

                  <!--    <div class="custom-file">-->

                  <!--      <input type="file" class="custom-file-input" id="exampleInputFile" name="file" id="file" required="required">-->

                  <!--      <label class="custom-file-label" for="exampleInputFile">Choose file</label>-->

                  <!--    </div>-->

                      

                  <!--  </div>-->

                  <!--</div>-->

                 

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

                <h3 class="card-title">Finance List</h3>

              </div>

              

<div class="card-body">

    <?php 

   // print_r($sdg);

    if(!empty($finance)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead><tr><th>#</th><th>Name</th>
    <!--<th>Icon</th>-->
    <th>Action</th></tr></thead>

    <?php $s=1;

    foreach($finance as $d){?>

      <tr><td><?php $s;?></td><td><?php echo $d['finance_name'];?></td>

        <!--<td><img src="<?php echo base_url();?>/public/uploads/finance/<?php echo $d['image'];?>" style="width: 100px;"></td>-->

        <td>

          <a class="btn btn-primary" href="javascript:void(0);" onclick="editfinance(this);" data-name='<?php echo $d['finance_name'];?>' data-number='<?php echo $d['id'];?>' data-img='<?php echo base_url();?>/public/uploads/sdg/<?php echo $d['image'];?>'><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deletefinance/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

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

              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/master/editfinance" enctype='multipart/form-data'>

<input type="hidden" name="id" id="sdg_id" value="" required="required">

            <div class="modal-body">



            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Update Finance</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">finance Name</label>

                    <input type="text" required="required" class="form-control"  placeholder="Enter SDG Name" name="finance_name" id="sdg_name_id">

                  </div>

                

                 <!-- <div class="form-group">-->

                 <!--   <label for="exampleInputFile">Icon</label>-->

                 <!--   <div class="input-group">-->

                 <!--     <div class="custom-file">-->

                 <!--       <input type="file" class="custom-file-input" id="exampleInputFile" name="file" id="file">-->

                 <!--       <label class="custom-file-label" for="exampleInputFile">Choose file</label>-->

                 <!--     </div>-->

                     

                 <!--   </div>-->

                 <!-- </div>-->

                 <!--<div class="form-group">-->

                 <!--  <img src="" id="imgDiv" style="width: 100px;" />-->

                 <!--</div>-->



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

   function editfinance(that) {

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