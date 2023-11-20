<?php include('include/header.php'); ?>



<?php include('include/menu.php');?>



  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



    <!-- Content Header (Page header) -->



    <div class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1 class="m-0">Ghg Factor Management</h1>



          </div><!-- /.col -->



          <div class="col-sm-6">



            <ol class="breadcrumb float-sm-right">



              



              <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>/master/addGhgFactor" class='btn btn-primary'><i class="fa fa-plus"></i> Add Ghg Factor</a> </li>



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



                <h3 class="card-title">Module List</h3>



              </div>



        



    <?php 







    if(!empty($list)){?>



    <table class="table table-bordered table-hover" id="datatables">



    <thead>



    <tr><th>#</th><th>Type </th><th>Industry </th><th>Ghg Category</th><th>Ghg</th><th>Group_id</th><th>Manufacturing process</th><th>Raw process</th><th>Name</th>

    <!--<th>Impact</th>-->
    <th >Emission Factor</th>

    <th>Action</th></tr>



    </thead>



    <tbody>



    <?php $s=1;







    foreach($list as $d){?>



      <tr>



        <td><?php echo $s;?></td>



        <td><?php echo $d['type'] ?></td>



        <td>

          <?php 

            if($d['industry_name']==0)

              echo 'All';

            else

              echo $d['industry_name'];

          ?>

            

          </td>



        <td><?php echo $d['ghg_category_name'];?></td>



        <td><?php echo $d['ghg_name'];?></td>



        <td><?php if(!empty($d['group_id'])){?>

       <a class="btn btn-primary" href="javascript:void(0);" button onclick="getcountry('<?php echo $d['id']; ?>','<?php echo $d['group_id']; ?>')"  

       data-name='<?php echo $d['impact'];?>' data-number='<?php echo $d['id'];?>'><?php  echo $d['group_id']; ?></a>



          <?php }else {

              echo "";

          } 

        //   print_r($d['country_name']);

       

       

        // echo "GRP-".$d['id'];

    //  print_r(json_decode($d['country_id']));

    //  echo json_decode($d['country_id']);

        ?></td>

               <td><?php if(!empty($d['group_id'])){?>

       <a class="btn btn-primary" href="javascript:void(0);" button 

       onclick="getprocess('<?php echo $d['id']; ?>','<?php echo $d['factor_name']; ?>')" ><i class="fa fa-info"></i></a>



          <?php }else {

              echo "";

          } 

        //   print_r($d['country_name']);

       

       

        // echo "GRP-".$d['id'];

    //  print_r(json_decode($d['country_id']));

    //  echo json_decode($d['country_id']);

        ?></td> 

        <td>

       <a class="btn btn-primary" href="javascript:void(0);" button 

       onclick="getrawmanuprocess('<?php echo $d['id']; ?>','<?php echo $d['factor_name']; ?>')" ><i class="fa fa-info"></i></a></td>

    

        <td><?php echo $d['factor_name'];?></td>



        <!--<td><?php echo $d['impact'];?></td>-->

        

        

        

        <td>
           <?php $new_emission_factor = json_decode($d['emission_factor']);?>
           <ul><?php foreach($new_emission_factor as $nea){?><li><?= $nea ?></li><?php }?></ul>
        </td>



           <td>

               

<a class="btn btn-primary" href="javascript:void(0);" button onclick="getimpact('<?php echo $d['id']; ?>','<?php echo $d['name']; ?>')"  data-name='<?php echo $d['impact'];?>' data-number='<?php echo $d['id'];?>'><i class="fa fa-info"></i></a>



          <a class="btn btn-primary" href="<?php echo base_url() ?>/master/editGhgFactor/<?php echo $d['id'] ?>" onclick="" data-name='<?php echo $d['name'];?>' data-number='<?php echo $d['id'];?>' ><i class="fa fa-pencil"></i></a>



          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteGhgFactor/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>



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







              







              <input type="hidden" name="id" id="ghg_id" value="" required="required">







            <div class="modal-body">















            <div class="card card-primary">







              <div class="card-header">







                <h3 class="card-title">Update Ghg</h3>







              </div>







              <!-- /.card-header -->







              <!-- form start -->







                <div class="card-body">





 







                </div>







                <!-- /.card-body -->















                







            







            </div>















           </div>







            <div class="modal-footer justify-content-between">







              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>







              <button type="submit" class="btn btn-primary">Save changes</button>







            </div>







              







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







              <form method="post" name="ghg-form" id="ghg-form" action="<?php echo base_url();?>/master/addGhg">











            <div class="modal-body">















            <div class="card card-primary">







              <div class="card-header">







                <h3 class="card-title">Add Ghg</h3>







              </div>







              <!-- /.card-header -->







              <!-- form start -->







                <div class="card-body">







                  <div class="form-group">







                    <label for="ghg_name">Ghg Name</label>







                    <input type="text" required="required" class="form-control"  placeholder="Enter Ghg Name" name="name" id="ghg_name">







                  </div>











                  <div class="form-group">



                    <label for="exampleInputEmail1">Select Ghg Category</label>



                    <select name="category_id" id="ghg_category_id" required="required" class="form-control">



                        <option value="">Select Category </option>







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

    <div class="modal fade bd-example-modal-lg" id="getimpact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">



                    <div class="modal-dialog modal-lg" role="document" style="max-width: 800px !important;">



                        <div class="modal-content">



                            <div class="modal-header">



                                <h5 class="modal-title" id="exampleModalCenterTitle-2">View Info</h5>



                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>



                            </div>



                            <div class="modal-body">



                            <div class="create_doc_form">



               



                               <div id="label"></div>



                                <div id="sum">

                                   

                                </div>



                               

                          



                            </div>



                                



                            </div>



                        </div>



                    </div>



                </div>

    <div class="modal fade bd-example-modal-lg" id="getcountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">



                    <div class="modal-dialog modal-lg" role="document" style="max-width: 800px !important;">



                        <div class="modal-content">



                            <div class="modal-header">



                                <h5 class="modal-title" id="exampleModalCenterTitle-2">View Info</h5>



                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>



                            </div>



                            <div class="modal-body">



                            <div class="create_doc_form">



               



                               <div id="labelcountry"></div>



                                <div id="sum">

                                   

                                </div>



                               

                          



                            </div>



                                



                            </div>



                        </div>



                    </div>



                </div>





<script type="text/javascript">



 

    function getimpact(id,name) {



        var product_id=$("#id").val(id);



              $.ajax({



            url : "<?php echo base_url()?>/master/getimpact/"+id+"/"+name,



            type: "GET",



            //dataType: "JSON",



            success: function(data){

// alert(data);

 $("#label").html(data);

$("#getimpact").modal('show');

                // $(obj2).find("select[name='unit[]']").html(data);



            },



            error: function(xhr, status, error){



                // alert('error');



            }







        });





    }

    function getcountry(id,name) {



        var product_id=$("#id").val(id);



              $.ajax({



            url : "<?php echo base_url()?>/master/getcountry/"+id+"/"+name,



            type: "GET",



            //dataType: "JSON",



            success: function(data){

// alert(data);

 $("#labelcountry").html(data);

$("#getcountry").modal('show');

                // $(obj2).find("select[name='unit[]']").html(data);



            },



            error: function(xhr, status, error){



                // alert('error');



            }







        });





    }

    function getprocess(id,name) {



        var product_id=$("#id").val(id);



              $.ajax({



            url : "<?php echo base_url()?>/master/getmanuprocess/"+id+"/"+name,



            type: "GET",



           



            success: function(data){

// alert(data);

 $("#labelcountry").html(data);

$("#getcountry").modal('show');

              



            },



            error: function(xhr, status, error){



                // alert('error');



            }







        });





    }  

    function getrawmanuprocess(id,name) {



        var product_id=$("#id").val(id);



              $.ajax({



            url : "<?php echo base_url()?>/master/getrawmanuprocess/"+id+"/"+name,



            type: "GET",



           



            success: function(data){

// alert(data);

 $("#labelcountry").html(data);

$("#getcountry").modal('show');

              



            },



            error: function(xhr, status, error){



                // alert('error');



            }







        });





    }



</script>





<?php include('include/footer.php');?>







