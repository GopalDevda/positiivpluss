<?php include('include/header.php'); ?>



<?php include('include/menu.php');?>



  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



    <!-- Content Header (Page header) -->



    <div class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1 class="m-0">Factor Management</h1>



          </div><!-- /.col -->



          <div class="col-sm-6">



            <ol class="breadcrumb float-sm-right">



              

<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" id="getconnectedghg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document" style="max-width: 800px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle-2">View Info</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        <div class="create_doc_form">
        <div id="labelconnectedghg"></div>

            <div id="sum">
            </div>
        </div>
        </div>
    </div>
</div>
</div>


              <li class="breadcrumb-item active"><a href="#" onclick="addFactor()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Factor</a> </li>



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



                <h3 class="card-title">Factor List</h3>



              </div>



        



    <?php 







    if(!empty($list)){?>



    <table class="table table-bordered table-hover" id="datatables">



    <thead>



    <tr><th>#</th><th>Ghg</th><th>Factor Name </th><th>Connected Ghg Factor</th><th>Factor Unit</th><th>Remark</th><th>Action</th></tr>



    </thead>



    <tbody>



    <?php $s=1;







    foreach($list as $d){

    

   ?>



      <tr>



        <td><?php echo $s;?></td>

        <td><?php echo $d['ghg_name'];?></td>

        <td><?php echo $d['factor_name'];?></td>

                       <td><?php if(!empty($d['factor_name'])){?>

       <a class="btn btn-primary" href="javascript:void(0);" button 

       onclick="getghgfactor('<?php echo $d['id']; ?>')" ><i class="fa fa-info"></i></a>



          <?php }else {

              echo "";

          } 

        //   print_r($d['country_name']);

       

       

        // echo "GRP-".$d['id'];

    //  print_r(json_decode($d['country_id']));

    //  echo json_decode($d['country_id']);

        ?></td> 

        <td><?php echo $d['unit_name'];?></td>

        <td><?php echo $d['remark'];?></td>

           <td>



          <a class="btn btn-primary" href="javascript:void(0);" onclick="editFactor(this)" data-name='<?php echo $d['factor_name'];?>' data-remark='<?php echo $d['remark'];?>' data-unit='<?php echo $d['factor_unit'];?>' data-number='<?php echo $d['id'];?>' data-ghg='<?php echo $d['ghg_id'];?>' ><i class="fa fa-pencil"></i></a>



          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteFactor/<?php echo $d['id'];?>/<?php echo $d['factor_name'];?>" onclick="return confirm(' All related Ghg Factor Will also be deleted  Do you want to delete');"><i class="fa fa-trash"></i></a>



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







              <form method="post" name="factor-form" id="factor-form" action="<?php echo base_url();?>/master/editFactor">







              <input type="hidden" name="id" id="factor_id" value="" required="required">







            <div class="modal-body">















            <div class="card card-primary">







              <div class="card-header">







                <h3 class="card-title">Update Factor</h3>







              </div>







              <!-- /.card-header -->







              <!-- form start -->







                <div class="card-body">



                  <div class="form-group">

                    <label for="exampleFormControlSelect1">Ghg</label>

                    <select class="form-control" id="factor_ghg" name="ghg" placeholder="Enter Factor Ghg" required="required">

                      <option value="">--Select Ghg--</option>

                      <?php if($ghg){ foreach($ghg as $g){?>

                      <option value="<?php echo $g['id']; ?>"><?php echo $g['ghg_name']; ?></option>

                      <?php }} ?>

                    </select>

                  </div>



                  <div class="form-group">







                    <label for="exampleInputEmail1">Factor Name</label>







                    <input type="text" required="required" class="form-control"  placeholder="Enter Factor Name" name="name" id="factor_name">







                  </div>



                  <div class="form-group">

                    <label for="exampleFormControlSelect1">Factor Unit</label>

                    <select class="form-control" id="factor_unit" name="unit" placeholder="Enter Factor Unit" required="required">

                      <option value="">--Select Unit--</option>

                      <?php if($unit){ foreach($unit as $u){?>

                      <option value="<?php echo $u['id']; ?>"><?php echo $u['unit_name']; ?></option>

                      <?php }} ?>

                    </select>

                  </div>





               

                <div class="form-group">







                    <label for="exampleInputEmail1">Remark</label>







                    <input type="text" required="required" class="form-control"  placeholder="Enter Remark" name="remark" id="remark">







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







              <form method="post" name="factor-form" id="factor-form" action="<?php echo base_url();?>/master/addFactor">











            <div class="modal-body">















            <div class="card card-primary">







              <div class="card-header">







                <h3 class="card-title">Add Factor</h3>







              </div>







              <!-- /.card-header -->







              <!-- form start -->







                <div class="card-body">



                 <div class="card-body">



                  <div class="form-group">

                    <label for="exampleFormControlSelect1">Ghg</label>

                    <select class="form-control" id="factor_ghg" name="ghg" placeholder="Enter Factor Ghg" required="required">

                      <option value="">--Select Ghg--</option>

                      <?php if($ghg){ foreach($ghg as $g){?>

                      <option value="<?php echo $g['id']; ?>"><?php echo $g['ghg_name']; ?></option>

                      <?php }} ?>

                    </select>

                  </div>



                  <div class="form-group">







                    <label for="exampleInputEmail1">Factor Name</label>







                    <input type="text" required="required" class="form-control"  placeholder="Enter Factor Name" name="name" id="factor_name">







                  </div>

                  



                  <div class="form-group">

                    <label for="exampleFormControlSelect1">Factor Unit</label>

                    <select class="form-control" name="unit" placeholder="Enter Factor Unit" required="required">

                      <option value="">--Select Unit--</option>

                      <?php 

                      if($unit){ 

                        foreach($unit as $u){ ?>

                      <option value="<?php echo $u['id']; ?>"><?php echo $u['unit_name']; ?></option>

                      <?php 

                        }

                      } 

                    ?>

                    </select>

                  </div>

                  

               <div class="form-group">







                    <label for="exampleInputEmail1">Remark</label>







                    <input type="text" required="required" class="form-control"  placeholder="Enter remark" name="remark" id="remark">







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







   function editFactor(that) {







        var num = $(that).attr('data-number');

        var ghg = $(that).attr('data-ghg');





        // alert(num);







        var name = $(that).attr('data-name');

        var remark = $(that).attr('data-remark');

        var unit = $(that).attr('data-unit');





        $('#factor_id').val(num);

        $('#factor_ghg').val(ghg);





        $('#factor_name').val(name);

        $('#factor_unit').val(unit); 

        

        $('#remark').val(remark);







        $('#modal-edit').modal('show');







    }







    function addFactor() {



        $('#modal-add').modal('show');



    }





function getghgfactor(id) {



        var ghgfactor_id=$("#id").val(id);



              $.ajax({



                url : "<?php echo base_url()?>/master/getghgfactogropup/"+id,

                

                type: "GET",

                

                success: function(data){

                    

                    $("#labelconnectedghg").html(data);

                    $("#getconnectedghg").modal('show');

                                  

    

                },



                    error: function(xhr, status, error){

        

                        // alert('error');

        

                    }

        

        

        

                });





    } 

</script>







<?php include('include/footer.php');?>







