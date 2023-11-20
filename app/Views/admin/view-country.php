<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Country Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="#" onclick="addCountry()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Country</a> </li>

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

                <h3 class="card-title">Country List</h3>

              </div>

        

    <?php 



    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead>

    <tr><th>#</th><th>Sort Name </th><th>Name</th><th>Phone Code</th><th>Emission Factor</th><th>Action</th></tr>

    </thead>

    <tbody>

    <?php $s=1;



    foreach($list as $d){?>

      <tr>

        <td><?php echo $s;?></td>

        <td><?php echo $d['sortname'];?></td>
        <td><?php echo $d['name'];?></td>
        <td><?php echo $d['phonecode'];?></td>
        <td><?php echo $d['emission_factor'];?></td>
           <td>

          <a class="btn btn-primary" href="javascript:void(0);" onclick="editCountry(this)" data-name='<?php echo $d['name'];?>' data-sortname='<?php echo $d['sortname'];?>' data-phonecode='<?php echo $d['phonecode'];?>' data-emission_factor='<?php echo $d['emission_factor'];?>' data-number='<?php echo $d['id'];?>' ><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteCountry/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

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



              <form method="post" name="country-form" id="country-form" action="<?php echo base_url();?>/master/editCountry">



              <input type="hidden" name="id" id="country_id" value="" required="required">



            <div class="modal-body">







            <div class="card card-primary">



              <div class="card-header">



                <h3 class="card-title">Update Country</h3>



              </div>



              <!-- /.card-header -->



              <!-- form start -->



                <div class="card-body">



                  <div class="form-group">



                    <label for="exampleInputEmail1">Sort Name</label>



                    <input type="text" required="required" class="form-control"  placeholder="Enter Country Sort Name" name="sortname" id="sortname">



                  </div>

                  <div class="form-group">



                    <label for="exampleInputEmail1">Name</label>



                    <input type="text" required="required" class="form-control"  placeholder="Enter Country Name" name="name" id="name">



                  </div>

                  <div class="form-group">



                    <label for="exampleInputEmail1">Phone Code</label>



                    <input type="text" required="required" class="form-control"  placeholder="Enter Country Phone Code" name="phonecode" id="phonecode">



                  </div>

                  <div class="form-group">



                    <label for="exampleInputEmail1">Emission Factor</label>



                    <input type="text" required="required" class="form-control"  placeholder="Enter Country Emission Factor" name="emission_factor" id="emission_factor">



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



              <form method="post" name="country-form" id="country-form" action="<?php echo base_url();?>/master/addCountry">





            <div class="modal-body">







            <div class="card card-primary">



              <div class="card-header">



                <h3 class="card-title">Add Country</h3>



              </div>



              <!-- /.card-header -->



              <!-- form start -->



                <div class="card-body">



                  <div class="form-group">



                    <label for="exampleInputEmail1">Sort Name</label>



                    <input type="text" required="required" class="form-control"  placeholder="Enter Country Sort Name" name="sortname" id="sortname">



                  </div>

                  <div class="form-group">



                    <label for="exampleInputEmail1">Name</label>



                    <input type="text" required="required" class="form-control"  placeholder="Enter Country Name" name="name" id="name">



                  </div>

                  <div class="form-group">



                    <label for="exampleInputEmail1">Phone Code</label>



                    <input type="text" required="required" class="form-control"  placeholder="Enter Country Phone Code" name="phonecode" id="phonecode">



                  </div>

                  <div class="form-group">



                    <label for="exampleInputEmail1">Emission Factor</label>



                    <input type="text" required="required" class="form-control"  placeholder="Enter Country Emission Factor" name="emission_factor" id="emission_factor">



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



   function editCountry(that) {



        var num = $(that).attr('data-number');



        // alert(num);


        var sortname = $(that).attr('data-sortname');
        var name = $(that).attr('data-name');
        var phonecode = $(that).attr('data-phonecode');
        var emission_factor = $(that).attr('data-emission_factor');

        $('#country_id').val(num);



        $('#sortname').val(sortname);
        $('#name').val(name);

        $('#phonecode').val(phonecode);
        $('#emission_factor').val(emission_factor);


        $('#modal-edit').modal('show');



    }



    function addCountry() {

        $('#modal-add').modal('show');

    }



</script>



<?php include('include/footer.php');?>



