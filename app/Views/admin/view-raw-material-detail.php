<?php include('include/header.php'); ?>



<?php include('include/menu.php');?>



  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



    <!-- Content Header (Page header) -->



    <div class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1 class="m-0">Raw-Material Detail Management</h1>



          </div><!-- /.col -->



          <div class="col-sm-6">



            <ol class="breadcrumb float-sm-right">



              



              <li class="breadcrumb-item active"><a href="#" onclick="addRawmaterialDetail()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Raw-material Detail</a> </li>



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



                <h3 class="card-title">Rawmaterial Details List</h3>



              </div>



        



    <?php 







    if(!empty($list)){?>



    <table class="table table-bordered table-hover" id="datatables">



    <thead>



    <tr>

      <th>#</th>

      <th>Industry</th>
      
      <th>Sub Industry</th>

      <th>Ghg</th>

      <th>Process</th>

      <th>Per Quantity Val</th>

      <th>Unit</th>

      <th>I/O</th>

      <th>Per Quantity Amount</th>

      <th>Ghg Factor</th>

      <th>Action</th>

    </tr>



    </thead>



    <tbody>



    <?php $s=1;

    foreach($list as $d){

    ?>



      <tr>

        <td><?php echo $s;?></td>

        <td><?php echo $d['industry_name']; ?></td>
        
        <td><?php echo $d['subindus']; ?></td>

        <td><?php echo $d['ghg_name'] ?></td>

        <td><?php echo $d['process_name'];?></td>

        <td><?php echo $d['per_quantity_val']; ?></td>

        <td><?php echo $d['unit_name']; ?></td>

        <td><?php echo $d['inputOutput']; ?></td>

        <td><?php echo $d['per_quantity_amt']; ?></td>

        <td><?php echo $d['factor_name']; ?></td>

        <td>

          <a class="btn btn-primary" href="javascript:void(0);" onclick="editRawmaterialDetail(this)"data-subindustryyl='<?php echo $d['sub_industry_name'];?>'data-industry='<?php echo $d['industry_id'];?>' data-inputOutput='<?php echo $d['inputOutput'];?>' data-id='<?php echo $d['id'];?>' data-ghg='<?php echo $d['ghg_id']; ?>' data-process='<?php echo $d['process_id']; ?>' data-factor='<?php echo $d['ghg_factor_id']; ?>' data-per_quantity_val='<?php echo $d['per_quantity_val']; ?>' data-per_quantity_amt='<?php echo $d['per_quantity_amt']; ?>' data-unit='<?php echo $d['unit_id']; ?>' ><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteRawmaterialDetail/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

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

              <form method="post" name="Rawmaterial-detail-form" id="Rawmaterial-detail-form" action="<?php echo base_url();?>/master/editRawmaterialDetail">

              <input type="hidden" name="id" id="Rawmaterial_detail_id" value="" required="required">

            <div class="modal-body">

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Update Rawmaterial Details</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="industry">Select Industry</label>

                    <select id="industry" name="industry" required="required" class="form-control" onChange="getGhgFactor('industry','ghg','ghg_factor')">

                      <option value="">Select Industry</option>

                        <?php 
                        
                          if($industry) {
                        
                            foreach($industry as $indus) {
                        
                        ?>
                        
                              <option value="<?php echo $indus['id']; ?>"><?php echo $indus['industry_name']; ?></option>
                        
                        <?php      
                        
                            }
                        
                          }
                        
                        ?>                      

                    </select>

                  </div>
                  
                     <div class="form-group d-none">



                    <label for="exampleInputEmail1"> Select Sub industry </label>



                    <select name="sub_industry_name" id="subindustryy" class="form-control" >



                        <option value="">Select Sub industry </option>
                        <?php if(!empty($sub_industry)){
                           foreach($sub_industry  as $rt){?>
                           <option value="<?php echo $rt['id'];?>"><?php echo $rt['subsubindustry'];?></option>
                           <?php  }
                           }?>


                    </select>

                  
                </div>

                  <div class="form-group">

                    <label for="ghg">Select Ghg</label>

                    <select id="ghg" name="ghg" required="required" class="form-control" onChange="getGhgFactor('industry','ghg','ghg_factor')">

                      <option value="">Select Ghg</option>

<?php 

  if($ghg) {

    foreach($ghg as $g) {

?>

      <option value="<?php echo $g['id']; ?>"><?php echo $g['ghg_name']; ?></option>

<?php      

    }

  }

?>                      

                    </select>

                  </div>

                  <div class="form-group">

                    <label for="process">Select Process</label>

                    <select id="process" name="process" required="required" class="form-control">

                      <option value="">Select Process Name</option>

<?php 

  if($Rawmaterial_process) {

    foreach($Rawmaterial_process as $process) {

?>

      <option value="<?php echo $process['id']; ?>"><?php echo $process['process_name']; ?></option>

<?php      

    }

  }

?>                      

                    </select>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Per Quantity Value</label>

                    <input type="number" class="form-control" required="required" name="per_quantity_val" id="per_quantity_val" value="1" />

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Unit</label>

                    <select class="form-control" required="required" name="unit_id" id="unit_id">

                      <option value="">Select Unit</option>

<?php 

  if($unit) {

    foreach($unit as $u) {

?>

      <option value="<?php echo $u['id']; ?>"><?php echo $u['unit_name']; ?></option>

<?php      

    }

  }

?>

                    </select>

                  </div>                  

                  <div class="form-group">

                    <label for="exampleInputEmail1">Per Quantity Amount</label>

                    <input type="text" class="form-control" required="required" name="per_quantity_amt" id="per_quantity_amt" />

                  </div>

                  <div class="form-group">

                    <label for="process">Select Ghg Factor</label>

                    <select id="ghg_factor" name="ghg_factor" required="required" class="form-control">

                      <option value="">Select Ghg Factor</option>

                    </select>

                  </div>

                  

                  

                  <div class="form-group">

                    <label for="inputOutput">Select Input Output</label>

                    <select id="inputOutput" name="inputOutput" required="required" class="form-control">

                      <option value="">Select Input Output</option>



                         <option value="Input">Input</option>

                         <option value="Output">Output</option>



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

              <form method="post" name="Rawmaterial-detail-add-form" id="Rawmaterial-detail-add-form" action="<?php echo base_url();?>/master/addRawmaterialDetail">

            <div class="modal-body">

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Add Rawmaterial Details</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Industry</label>

                    <select class="form-control" required="required" name="industry" id="industry_id" onChange="getGhgFactor('industry_id','ghg_id','ghg_factor_id','process_id','processradio_id')">

                      <option value="">Select Industry</option>

<?php 

  if($industry) {

    foreach($industry as $indus) {

?>

      <option value="<?php echo $indus['id']; ?>"><?php echo $indus['industry_name']; ?></option>

<?php      

    }

  }

?>

                    </select>

                  </div>
                     <div class="form-group d-none">



                    <label for="exampleInputEmail1"> Select Sub industry </label>



                    <select name="sub_industry_name" id="subinstryy" class="form-control" >



                        <option value="">Select Sub industry </option>
                        <?php if(!empty($sub_industry)){
                           foreach($sub_industry  as $rt){?>
                           <option value="<?php echo $rt['id'];?>"><?php echo $rt['subsubindustry'];?></option>
                           <?php  }
                           }?>


                    </select>

                  
                </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Ghg</label>

                    <select class="form-control" required="required" name="ghg" id="ghg_id" onChange="getGhgFactor('industry_id','ghg_id','ghg_factor_id','process_id','processradio_id')">

                      <option value="">Select Ghg</option>

<?php 

  if($ghg) {

    foreach($ghg as $g) {

?>

      <option value="<?php echo $g['id']; ?>"><?php echo $g['ghg_name']; ?></option>

<?php      

    }

  }

?>

                    </select>

                  </div>



                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Process</label>

                    <select class="form-control" required="required" name="process" id="process_id">

                      <option value="">Select Process</option>

<?php 

  if($Rawmaterial_process) {

    foreach($Rawmaterial_process as $process) {

?>

      <option value="<?php echo $process['id']; ?>"><?php echo $process['process_name']; ?></option>

<?php      

    }

  }

?>

                    </select>

                  </div>                  

                  <div class="form-group">

                    <label for="exampleInputEmail1">Per Quantity Value</label>

                    <input type="number" class="form-control" required="required" name="per_quantity_val" value="1" />

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Unit</label>

                    <select class="form-control" required="required" name="unit_id">

                      <option value="">Select Unit</option>

<?php 

  if($unit) {

    foreach($unit as $u) {

?>

      <option value="<?php echo $u['id']; ?>"><?php echo $u['unit_name']; ?></option>

<?php      

    }

  }

?>

                    </select>

                  </div>                  

                  <div class="form-group">

                    <label for="exampleInputEmail1">Per Quantity Amount</label>

                    <input type="text" class="form-control" required="required" name="per_quantity_amt" />

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Ghg Factor</label>

                <input type="radio" class="ghg_link" onclick="ghgfactor(this)"  name="per_quantity_amt" />
                  <label for="exampleInputEmail1" class="px-3"> Process</label>

                <input type="radio" class="ghg_link" onclick="proc(this)"  name="per_quantity_amt" />

                  </div>

                  <div class="form-group" style="display:none;" id="ghg_factor_sho">

                    <label for="exampleInputEmail1">Select Ghg Factor</label>

                    <select class="form-control"  name="ghg_factor" id="ghg_factor_id">

                      <option value="">Select Ghg Factor</option>

                    </select>

                    </div>

                  <div class="form-group bb" style="display:none;">

                    <label for="exampleInputEmail1">Select Process</label>

                    <select class="form-control"  name="process_radio" id="processradio_id">

                      <option value="">Select Process</option>

<?php 

  if($Rawmaterial_process) {

    foreach($Rawmaterial_process as $process) {

?>

      <option value="<?php echo $process['id']; ?>"><?php echo $process['process_name']; ?></option>

<?php      

    }

  }

?>

                    </select>

                  </div>     
                   <div class="form-group">

                    <label for="inputOutput">Select Input Output</label>

                    <select id="inputOutput" name="inputOutput" required="required" class="form-control">

                      <option value="">Select Input Output</option>



                         <option value="Input">Input</option>

                         <option value="Output">Output</option>



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

function ghgfactor(that){


$('#ghg_factor_sho').show();
$('.bb').hide();


}
function proc(that){
  // alert('kk');

$('#ghg_factor_sho').hide();
$('.bb').show();


}

   function editRawmaterialDetail(that) {

        var id = $(that).attr('data-id')

        var industry = $(that).attr('data-industry');
        var subindustryyl = $(that).attr('data-subindustryyl');

        var inputOutput = $(that).attr('data-inputOutput');

        var ghg = $(that).attr('data-ghg');

        var process_id = $(that).attr('data-process');

        var factor = $(that).attr('data-factor');

        var per_quantity_val = $(that).attr('data-per_quantity_val');

        var per_quantity_amt = $(that).attr('data-per_quantity_amt');

        var unit_id = $(that).attr('data-unit');

        $('#Rawmaterial_detail_id').val(id);

        $('#industry').val(industry);
        $('#subindustryy').val(subindustryyl);

        $('#inputOutput').val(inputOutput);

        $('#ghg').val(ghg);

        $('#process').val(process_id);

        $("#per_quantity_val").val(per_quantity_val);

        $("#per_quantity_amt").val(per_quantity_amt);

        $("#unit_id").val(unit_id);

        var ref_url = '<?php echo base_url(); ?>'+'/master/getGhgFactor/'+industry+'/'+ghg;

        if(industry && ghg) {

          $("#ghg_factor").load(ref_url, function(responseTxt, statusTxt, xhr){

            if(statusTxt == "success") {

              $("#ghg_factor").val(factor);

            }

          });

        }

        $('#modal-edit').modal('show');

    }



    function addRawmaterialDetail() {

        $('#modal-add').modal('show');

    }



</script>



<?php include('include/footer.php');?>



<script>

  $(document).ready(function(){   

    // Initialize select2

    // $("#country_id").select2();

  });  



  function getGhgFactor(industry_ref,ghg_ref,ghg_factor_ref,ghg_process_ref,ghg_processradio_ref) {

    var industry_id = $("#"+industry_ref).val();

    var ghg_id = $("#"+ghg_ref).val();

    var ref_url = '<?php echo base_url(); ?>'+'/master/getGhgFactor/'+industry_id+'/'+ghg_id;

    if(industry_id && ghg_id) {

      $("#"+ghg_factor_ref).load(ref_url);

    }

     if(industry_id) {

       var  ref_url_process = '<?php echo base_url(); ?>'+'/master/getrawProcess/'+industry_id;

     
      $("#"+ghg_process_ref).load(ref_url_process);
      $("#"+ghg_processradio_ref).load(ref_url_process);

    }

  }

</script>





