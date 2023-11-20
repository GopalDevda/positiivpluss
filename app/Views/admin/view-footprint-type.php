<?php include('include/header.php'); ?>



<?php include('include/menu.php');?>



  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



    <!-- Content Header (Page header) -->



    <div class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1 class="m-0">Type Management</h1>



          </div><!-- /.col -->



          <div class="col-sm-6">



            <ol class="breadcrumb float-sm-right">



              



              <li class="breadcrumb-item active"><a href="#" onclick="addType()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Type</a> </li>



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



                <h3 class="card-title">Type List</h3>



              </div>



        



    <?php 







    if(!empty($list)){?>



    <table class="table table-bordered table-hover" id="datatables">



    <thead>



    <tr><th>#</th><th>Industry</th><th>Footprint</th><th>Type Name </th><th>Action</th></tr>



    </thead>



    <tbody>



    <?php $s=1;







    foreach($list as $d){?>



      <tr>

        <td><?php echo $s;?></td>

        <td><?php if(!empty($d['industry_name'])){ echo $d['industry_name']; }else{ echo "All"; } ?></td>

        <td><?php echo $d['footprint_name'];?></td>

        <td><?php echo $d['type_name'] ?></td>

           <td>



          <a class="btn btn-primary" href="javascript:void(0);" onclick="editType(this)" data-type_name='<?php echo $d['type_name'];?>' data-number='<?php echo $d['id'];?>' data-footprint_id='<?php echo $d['footprint_id']; ?>' data-industry_id='<?php echo $d['industry_id']; ?>'><i class="fa fa-pencil"></i></a>



          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteType/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>



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







      <div class="modal fade" id="modal-edit">







        <div class="modal-dialog">







          <div class="modal-content">







            <div class="modal-header">







              <button type="button" class="close" data-dismiss="modal" aria-label="Close">







                <span aria-hidden="true">&times;</span>







              </button>







            </div>







              <form method="post" name="type-form" id="type-form" action="<?php echo base_url();?>/master/editType">







              <input type="hidden" name="id" id="type_id" value="" required="required">







            <div class="modal-body">















            <div class="card card-primary">







              <div class="card-header">







                <h3 class="card-title">Update Type</h3>







              </div>







              <!-- /.card-header -->







              <!-- form start -->







                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Industry</label>
                    <select name="industry_id" id="industry_id" required="required" class="form-control">
                        <option value="">Select Industry</option>
                        <option value="0">All</option>
                        <?php 
                          if($industry) {
                            foreach($industry as $indu) {
                        ?>
                        <option value="<?php echo $indu['id'] ?>"><?php echo $indu['industry_name'] ?></option>
                        <?php

                            }
                          }
                        ?>
                    </select>

                  </div>

                  <div class="form-group">



                    <label for="exampleInputEmail1">Select Footprint</label>



                    <select name="footprint_id" id="footprint_id" required="required" class="form-control">



                        <option value="">Select Footprint </option>



                        <?php 



                          if($footprint) {



                            foreach($footprint as $cat) {



                        ?>



                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['footprint_name'] ?></option>



                        <?php



                            }



                          }



                        ?>



                    </select>



                  </div>





                  <div class="form-group">







                    <label for="exampleInputEmail1">Type Name</label>







                    <input type="text" required="required" class="form-control"  placeholder="Enter Type Name" name="type_name" id="type_name">







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











      <div class="modal fade" id="modal-add">

        <div class="modal-dialog">

          <div class="modal-content">

            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

             <form method="post" name="type-form" id="type-form" action="<?php echo base_url();?>/master/addType">



            <div class="modal-body">

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Add Type</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Industry</label>

                    <select name="industry_id" required="required" class="form-control">

                        <option value="">Select Industry</option>
                        <option value="0">All</option>

                        <?php 

                          if($industry) {

                            foreach($industry as $ind) {

                        ?>

                        <option value="<?php echo $ind['id'] ?>"><?php echo $ind['industry_name'] ?></option>

                        <?php

                            }

                          }

                        ?>

                    </select>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Footprint</label>

                    <select name="footprint_id" required="required" class="form-control">

                        <option value="">Select Footprint </option>

                        <?php 

                          if($footprint) {

                            foreach($footprint as $cat) {

                        ?>

                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['footprint_name'] ?></option>

                        <?php

                            }

                          }

                        ?>

                    </select>

                  </div>

                  <div class="form-group">

                    <label for="ghg_name">Type Name</label>

                    <input type="text" required="required" class="form-control"  placeholder="Enter Type Name" name="type_name">

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



   function editType(that) {

        var num = $(that).attr('data-number');

        var name = $(that).attr('data-type_name');

        var footprint_id = $(that).attr('data-footprint_id');

        var industry_id = $(that).attr('data-industry_id');

        $('#type_id').val(num);

        $('#footprint_id').val(footprint_id);
        $('#industry_id').val(industry_id);

        $('#type_name').val(name);

        $('#modal-edit').modal('show');

    }



    function addType() {

        $('#modal-add').modal('show');

    }



</script>



<?php include('include/footer.php');?>







