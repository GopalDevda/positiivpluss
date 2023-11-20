<?php include('include/header.php'); ?>



<?php include('include/menu.php');?>



  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



    <!-- Content Header (Page header) -->



    <div class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1 class="m-0">Electricity Management</h1>



          </div><!-- /.col -->



          <div class="col-sm-6">



            <ol class="breadcrumb float-sm-right">



              



              <li class="breadcrumb-item active"><a href="#" onclick="addVehicle()" class='btn btn-primary'><i class="fa fa-plus"></i> Add supplier</a> </li>



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







    if(!empty($supplier)){?>



    <table class="table table-bordered table-hover" id="datatables">



    <thead>



    <tr><th>#</th><th>Supplier Name</th><th>Company Name</th><th>Email</th><th>Action</th></tr>



    </thead>



    <tbody>



    <?php $s=1;







    foreach($supplier as $d){?>



      <tr>



        <td><?php echo $s;?></td>

        <td><?php echo $d['supplier_name'];?><?php echo $d['last_name'];?></td>

        <td><?php echo $d['department'] ?></td>

        <td><?php echo $d['email'] ?></td>



        <td>

          

          <a class="btn btn-danger" href="<?php echo base_url()?>/Automotion/electricity/<?php echo $d['id'];?>"><i class="fa fa-eye"></i></a>

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

              <form method="post" name="vehicle-form" id="vehicle-form" action="<?php echo base_url();?>/master/editVehicle">

              <input type="hidden" name="id" id="vehicle_id" value="" required="required">

            <div class="modal-body">

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Update Vehicle</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Footprint</label>

                    <select class="form-control" id="footprint" name="footprint" required="required">

                      <option value="">Select Footprint</option>



                    </select>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Vehicle Name</label>

                    <input type="text" required="required" class="form-control"  placeholder="Enter Vehicle Name" name="vehicle_name" id="vehicle_name">

                  </div>

                  

                  

                <div class="form-group">

                       <label for="exampleInputEmail1"> Select Industry </label>

                       <select name="industry_idd" id="industry_idd" required="required" class="form-control" onchange="getsubindustryDivAjax(this.value);">

                           <option value="">Select Industry   </option>

                          
                        </select>

                  </div>





            <div class="form-group">







                    <label for="exampleInputEmail1"> Select Sub industry </label>







                    <select name="sub_industry_name" id="subindustryy" required="required" class="form-control" >







                        <option value="">Select Sub industry </option>

                        




                    </select>



                  

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

              <form method="post" name="vehicle-add-form" id="vehicle-add-form" action="<?php echo base_url();?>/master/addVehicle">

            <div class="modal-body">

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Add Vehicle</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Footprint</label>

                    <select class="form-control" required="required" name="footprint">

                      <option value="">Select Footprint</option>

                    

                    </select>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Vehicle Name</label>

                    <input type="text" required="required" class="form-control"  placeholder="Enter Vehicle Name" name="vehicle_name" id="vehicle_name">

                  </div>

              

                <div class="form-group">

                       <label for="exampleInputEmail1"> Select Industry </label>

                       <select name="industry_id" id="industry_id" required="required" class="form-control" onchange="getsubindustryDivAjax(this.value);">

                           <option value="">Select Industry   </option>

                          

                        </select>

                  </div>







                  <div class="form-group">







                    <label for="exampleInputEmail1"> Select Sub industry </label>







                    <select name="sub_industry_name" id="subindustryDiv" required="required" class="form-control" >







                        <option value="">Select Sub industry </option>





                    </select>







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



   function editVehicle(that) {

        var num = $(that).attr('data-number');

        var vehicle = $(that).attr('data-vehicle_name');

        var foot_id = $(that).attr('data-foot_id');

        var industry_ids = $(that).attr('data-industry_id');

        var subindustry = $(that).attr('data-subindustry');

        

        $('#vehicle_id').val(num);

        $('#vehicle_name').val(vehicle);

        $("#footprint").val(foot_id);

        $("#industry_idd").val(industry_ids);

        $("#subindustryy").val(subindustry);

        $('#modal-edit').modal('show');

    }



    function addVehicle() {

        $('#modal-add').modal('show');

    }



</script>

<script type="text/javascript">







function getsubindustryDivAjax(id=1){







  $.ajax({







        url : "<?php echo base_url()?>/assessment/getsubindustryByindustry/"+id,







        type: "POST",







        //dataType: "JSON",







        success: function(data){







          $('#subindustryDiv').html(data);







        },







    });







}







</script>









<?php include('include/footer.php');?>







