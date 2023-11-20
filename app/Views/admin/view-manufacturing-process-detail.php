<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Manufacturing Process Detail</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="#" onclick="addManufacturingProcessDetail()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Manufacturing Process Detail</a> </li>

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

                <h3 class="card-title">Manufacturing Process Details List</h3>

              </div>

        

    <?php 



    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead>

    <tr>
      <th>#</th>
      <th>Process Name</th>
      <th>Industry</th>
      <th>Sub Industry</th>
      <th>Unit</th>
      <th>Remark</th>
      <th>Action</th>
    </tr>

    </thead>

    <tbody>

    <?php $s=1;
    foreach($list as $d){
    ?>

      <tr>
        <td><?php echo $s;?></td>
        <td><?php echo $d['process_name']; ?></td>
        <td><?php echo $d['industry_name']; ?></td>
        <td><?php echo $d['ssid']; ?></td>
        <td><?php echo $d['unit_name']; ?></td>
        <td><?php echo $d['remark']; ?></td>
        <td>
          <a class="btn btn-primary" href="javascript:void(0);" onclick="editManufacturingProcessDetail(this)" data-sub_id='<?php echo $d['sub_industry_name'];?>' data-id='<?php echo $d['mpdid'];?>' data-name='<?php echo $d['process_name']; ?>' data-industry-id='<?php echo $d['industry_id'] ?>' data-unit-id='<?php echo $d['unit_id'] ?>'data-remark='<?php echo $d['remark'] ?>'><i class="fa fa-pencil"></i></a>
          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteManufacturingProcessDetail/<?php echo $d['mpdid'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
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
              <form method="post" name="manufacturing-process-detail-form" id="hotel-stay-form" action="<?php echo base_url();?>/master/editManufacturingProcessDetail">
              <input type="hidden" name="id" id="process_id" value="" required="required">
            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Manufacturing Process Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Process Name</label>
                    <input type="text" class="form-control"  placeholder="Enter Process Name" name="name" id="name" required="required">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Industry Name</label>
                      <select class="form-control" name="industry_id" id="industry_id">
                          <?php  
                          $db = \Config\Database::connect();
                          $query = $db->query("select id,industry_name from industry where status=1");        
                          $industry = $query->getResultArray();      
                          ?>     <!--industry Id-->
                        <option value="0">Select industry</option>
                            <?php  foreach($industry as $key=>$ind) {?>
                            <option value="<?php echo $ind['id']; ?>"> <?php echo $ind['industry_name']; ?></option>
                            <?php } ?>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Industry Name</label>
                     <select class="form-control" name="sub_industry_id" id="sub_industry">
                        <option value="0">Select Sub industry</option>
                            <?php   foreach($sub_industry as $key=>$subind) {?>
                            <option value="<?php echo $subind['id']; ?>"> <?php echo $subind['subsubindustry']; ?></option>
                            <?php } ?>
                     </select>
                  </div>
                   <?php  
                   $db = \Config\Database::connect();
                   $query = $db->query("select id,unit_name from unit where status=1");        
                   $unit = $query->getResultArray();      
                   ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Unit Name</label>
                     <select class="form-control" name="unit_id" id="unit_id">
                        <option value="0">Select Unit</option>
                            <?php   foreach($unit as $key=>$uni) {?>
                            <option value="<?php echo $uni['id']; ?>"> <?php echo $uni['unit_name']; ?></option>
                            <?php } ?>
                     </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Remark </label>
                    <input type="text" class="form-control"  placeholder="Enter Remark " name="remark" id="remark" required="required">
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
              <form method="post" name="manufacturing-process-detail-add-form" id="manufacturing-process-detail-add-form" action="<?php echo base_url();?>/master/addManufacturingProcessDetail">
            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Manufacturing Process Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Process Name</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Process Name" name="name">
                  </div>
                  <?php  
                  $db = \Config\Database::connect();
                  $query = $db->query("select id,industry_name from industry where status=1");        
                  $industry = $query->getResultArray();      
                  ?><!--industry Id-->
                  
                <div class="form-group">
                       <label for="exampleInputEmail1"> Select Industry </label>
                       <select name="industry_id" id="industry_id" required="required" class="form-control" onchange="getsubindustryDivAjax(this.value);">
                           <option value="">Select Industry   </option>
                           <?php if(!empty($industry)){
                           foreach($industry  as $r){?>
                           <option value="<?php echo $r['id'];?>"><?php echo $r['industry_name'];?></option>
                           <?php  }
                           }?>
                        </select>
                  </div>



                  <div class="form-group">



                    <label for="exampleInputEmail1"> Select Sub industry </label>



                    <select name="sub_industry_name" id="subindustryDiv" required="required" class="form-control" >



                        <option value="">Select Sub industry </option>


                    </select>



                  </div>
                
                
                  
                  <?php  
                  $db = \Config\Database::connect();
                  $query = $db->query("select id,unit_name from unit where status=1");        
                  $unit = $query->getResultArray();      
                  ?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Unit Name</label>
                     <select class="form-control" name="unit_id">
                        <option value="0">Select Unit</option>
                            <?php   foreach($unit as $key=>$uni) {?>
                            <option value="<?php echo $uni['id']; ?>"> <?php echo $uni['unit_name']; ?></option>
                            <?php } ?>
                     </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Remark </label>
                    <input type="text" class="form-control"  placeholder="Enter Remark " name="remark" id="remark" required="required">
                  </div>
                </div>
                
                                                    
                                                    <!--indusrt end -->
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

   function editManufacturingProcessDetail(that) {
        var id = $(that).attr('data-id');
        var name = $(that).attr('data-name');
        var industry_id = $(that).attr('data-industry-id');
        var sub_id_ind = $(that).attr('data-sub_id');
        var unit_id = $(that).attr('data-unit-id');
        var Remark = $(that).attr('data-remark');
        $('#process_id').val(id);
        $('#name').val(name);
        $('#industry_id').val(industry_id);
        $('#sub_industry').val(sub_id_ind);
        $('#unit_id').val(unit_id);
        $('#remark').val(Remark);
        $('#modal-edit').modal('show');
    }

    function addManufacturingProcessDetail() {
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

<script>
  $(document).ready(function(){   
    // Initialize select2
    // $("#country_id").select2();
  });  
</script>


