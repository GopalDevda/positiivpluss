<?php include('include/header.php'); ?>


<?php include('include/menu.php');?>


  <!-- Content Wrapper. Contains page content -->


  <div class="content-wrapper">


    <!-- Content Header (Page header) -->


    <div class="content-header">


      <div class="container-fluid">


        <div class="row mb-2">


          <div class="col-sm-6">


            <h1 class="m-0">Classification Management</h1>


          </div><!-- /.col -->


          <div class="col-sm-6">


            <ol class="breadcrumb float-sm-right">


              


              <li class="breadcrumb-item active"><a href="#" onclick="addClassification()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Classification</a> </li>
              <li class="px-2"><button type="submit" id="Alldelete" onclick="deletedata(this)" class="btn btn-danger"> All Delete
</button></li>


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

 <div id="divrohit" style="display:none;" class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
 </div> 

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


                <h3 class="card-title">Classification List</h3>
                


              </div>


        


    <?php 





    if(!empty($list)){?>


    <table class="table table-bordered table-hover" id="datatables">


    <thead>


    <tr><th>#</th><th>Classification Name </th><th>Standard</th><th>Action</th></tr>


    </thead>


    <tbody>


    <?php $s=1;





    foreach($list as $d){?>


      <tr>


        <td><form id="bulkform"><input type="checkbox" name="data[]" id="data" value="<?php echo $d['id'];?>" onclick="showdata(this)"></form><br>
        <?php echo $s;?></td>


        <td><?php echo $d['classification_name'] ?></td>


        <td><?php echo $d['standard_name'];?></td>


           <td>


          <a class="btn btn-primary" href="javascript:void(0);" onclick="editClassification(this)" data-name='<?php echo $d['classification_name'];?>' data-number='<?php echo $d['id'];?>' data-standard='<?php echo $d['standard_id']; ?>' ><i class="fa fa-pencil"></i></a>


          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteClassification/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>


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





              <form method="post" name="classification-form" id="classification-form" action="<?php echo base_url();?>/master/editClassification">





              <input type="hidden" name="id" id="classification_id" value="" required="required">





            <div class="modal-body">











            <div class="card card-primary">





              <div class="card-header">





                <h3 class="card-title">Update Classification</h3>





              </div>





              <!-- /.card-header -->





              <!-- form start -->





                <div class="card-body">





                  <div class="form-group">





                    <label for="exampleInputEmail1">Classification Name</label>





                    <input type="text" required="required" class="form-control"  placeholder="Enter Classification Name" name="name" id="classification_name">





                  </div>





                  <div class="form-group">


                    <label for="exampleInputEmail1">Select Standard</label>


                    <select name="standard_id" id="standard_id" required="required" class="form-control">


                        <option value="">Select Standard </option>


                        <?php 


                          if($standard) {


                            foreach($standard as $cat) {


                        ?>


                        <option id="standard_cat_<?php echo $cat['id'] ?>" value="<?php echo $cat['id'] ?>"><?php echo $cat['standard_name'] ?></option>


                        <?php


                            }


                          }


                        ?>


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





              <form method="post" name="classification-form" id="classification-form" action="<?php echo base_url();?>/master/addClassification">








            <div class="modal-body">











            <div class="card card-primary">





              <div class="card-header">





                <h3 class="card-title">Add Classification</h3>





              </div>





              <!-- /.card-header -->





              <!-- form start -->





                <div class="card-body">





                  <div class="form-group">





                    <label for="ghg_name">Classification Name</label>





                    <input type="text" required="required" class="form-control"  placeholder="Enter Classification Name" name="name" id="classification_name">





                  </div>








                  <div class="form-group">


                    <label for="exampleInputEmail1">Select Standard</label>


                    <select name="standard_id" id="standard_id" required="required" class="form-control">


                        <option value="">Select Standard </option>


                        <?php 


                          if($standard) {


                            foreach($standard as $cat) {


                        ?>


                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['standard_name'] ?></option>


                        <?php


                            }


                          }


                        ?>


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





   function editClassification(that) {





        var num = $(that).attr('data-number');


        var name = $(that).attr('data-name');





        var standard = $(that).attr('data-standard');





        $('#classification_id').val(num);





        $('#classification_name').val(name);





        $("#standard_cat_"+standard).attr("selected","selected");





        $('#modal-edit').modal('show');





    }


function showdata(that) {
  var vehicles = [];

$("input:checked").each(function() {
  vehicles.push($(this).val());
  // alert(vehicles);

});


// $('#modal-add').modal('show');

}
function deletedata() {

  { 
     var inputs = $("input[type='checkbox']");
     
               
                var vals=[];
                var res;
                for(var i = 0; i < inputs.length; i++) 
                { 
                    var type = inputs[i].getAttribute("type");
                    if(type == "checkbox") 
                    {
                        if(inputs[i].id=="data"&&inputs[i].checked){
                            vals.push(inputs[i].value);
                        }
                    } 
                }

                var count_checked = $("[name='data[]']:checked").length; 
                if(count_checked == 0) 
                {
                    alert("Please select a Classification(s) to delete.");
                    return false;
                } 
                if(count_checked == 1) 
                {
                    res= confirm("Are you sure you want to delete All selected Classification?");  
                    // alert(res); 
                } 
                else 
                {
                    res= confirm("Are you sure you want to delete  All selected Classification?");  
                    // alert(res);
                }       
                if(res){
               /*** This portion is the ajax/jquery post calling   ****/
                $.post("<?php echo base_url()?>/Master/deletebulkclassificationdata", 
                {data:vals}, 
                function(result){
                 if(result==1){
                  $("#divrohit").show();
                  setTimeout(location.reload.bind(location), 20);
                  $("#divrohit").html('Classification Data deleted succesfully');

                  // alert('all set');

                }
                 if(result==0){alert('Something went wrong');}
                    // $("#table_data").html(result);
                 }); 
                }
              }
                






// $("input:checked").each(function() {
//   vehicles.push($(this).val());
//   // alert(vehicles);

// });


// $('#modal-add').modal('show');

}



 




    function addClassification() {


        $('#modal-add').modal('show');


    }






</script>





<?php include('include/footer.php');?>





