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
             <a href="<?php echo base_url();?>/api/viewApiList" class="btn btn-primary btn-sm">View Api List</a>
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Api Dashboard </li>
             

            </ol>
                <!--<a href="<?php echo base_url();?>/Api/ViewApifrontDoc" class="btn btn-primary btn-sm">View Doc's</a>-->
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

          <div class="col-md-8">

            <!-- general form elements -->

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Add New API</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->



              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/api/addapi" enctype='multipart/form-data'>

<input type="hidden" name="id" id="sdg_id1" value="" >

                <div class="card-body">

                  
                   <div class="form-group">

                    <label for="exampleInputEmail1">Select API Category</label>

                    <select name="API_Category" id="API_Category" required="required" class="form-control" >

                        <option value="">Select API Category</option>

                        <?php 

                          if($Category) {

                            foreach($Category as $cat) {

                        ?>

                          <option value="<?php echo $cat["id"] ?>"><?php echo $cat["category_name"] ?></option>

                        <?php 

                            }

                          }

                        ?>

                    </select>

                  </div>
                  
                  
                  
                  
                  <div class="form-group">

                    <label for="exampleInputEmail1">API Name</label>

                    <input type="text" required="required" class="form-control" id="exampleInputEmail1" placeholder="Enter API Name" name="API_Name" >

                  </div>
                  <div class="form-group">

                    <label for="exampleInputEmail1">Hitting Url</label>

                    <input type="text" required="required" class="form-control" id="exampleInputEmail1" placeholder="Enter Hitting Url" name="Hitting_Url" >

                  </div>  
                  <div class="form-group">

                    <label for="exampleInputEmail1">API's Request</label>

                    <input type="text" required="required" class="form-control" id="exampleInputEmail1" placeholder="Enter APIs Request" name="Api_Request" >

                  </div>  
                  <div class="form-group">

                    <label for="exampleInputEmail1">API's Response</label>

                    <input type="text" required="required" class="form-control" id="exampleInputEmail1" placeholder="Enter APIs Response" name="Api_Response" >

                  </div>

                

                 

                 

                </div>

                <!-- /.card-body -->



                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>

              </form>

            </div>

            <!-- /.card -->



          



           

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

              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/master/editApi" enctype='multipart/form-data'>

<input type="hidden" name="id" id="sdg_id" value="" required="required">

            <div class="modal-body">



            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Update SDG</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">SDG Name</label>

                    <input type="text" required="required" class="form-control"  placeholder="Enter SDG Name" name="sdg_name" id="sdg_name_id">

                  </div>

                

                  <div class="form-group">

                    <label for="exampleInputFile">Icon</label>

                    <div class="input-group">

                      <div class="custom-file">

                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file" id="file">

                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                      </div>

                     

                    </div>

                  </div>

                 <div class="form-group">

                   <img src="" id="imgDiv" style="width: 100px;" />

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