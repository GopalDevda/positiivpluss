<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Initiative Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="#" onclick="addInitiative()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Initiative</a> </li>

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

                <h3 class="card-title">Initiative List</h3>

              </div>

        

    <?php 



    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead>

    <tr><th>#</th><th>Sdg</th><th>Target</th><th>Stakeholder</th><th>Disclosure</th><th>Initiative Name </th><th>Action</th></tr>

    </thead>

    <tbody>

    <?php $s=1;



    foreach($list as $d){?>

      <tr>
        <td><?php echo $s;?></td>
        <td><?php echo $d['sdg_name'];?></td>
        <td><?php echo $d['target_name'];?></td>
        <td><?php echo $d['stakeholder_name'];?></td>
        <td><?php echo $d['disclosure_name'];?></td>
        <td><?php echo $d['initiative_name'] ?></td>
           <td>

          <a class="btn btn-primary" href="javascript:void(0);" onclick="editInitiative(this)" data-initiative_name='<?php echo $d['initiative_name'];?>' data-number='<?php echo $d['id'];?>' data-sdg_id='<?php echo $d['sdg_id']; ?>' data-goal_target_id='<?php echo $d['goal_target_id']; ?>' data-stakeholder_id='<?php echo $d['stakeholder_id']; ?>' data-disclosure_id='<?php echo $d['disclosure_id']; ?>' ><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteInitiative/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

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



              <form method="post" name="initiative-form" id="initiative-form" action="<?php echo base_url();?>/master/editInitiative">



              <input type="hidden" name="id" id="initiative_id" value="" required="required">



            <div class="modal-body">







            <div class="card card-primary">



              <div class="card-header">



                <h3 class="card-title">Update Initiative</h3>



              </div>



              <!-- /.card-header -->



              <!-- form start -->



                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Sdg</label>
                    <select name="sdg_id" id="sdg_id" required="required" class="form-control" onchange="getTargetBySdgForEdit(this)">
                        <option value="">Select Sdg </option>
                        <?php 
                          if($sdg) {
                            foreach($sdg as $cat) {
                        ?>
                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['sdg_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Target</label>
                    <select name="goal_target_id" id="goal_target_id" required="required" class="form-control">
                        <option value="">Select Target </option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Stakeholder</label>
                    <select name="stakeholder_id" id="stakeholder_id" required="required" class="form-control">
                        <option value="">Select Stakeholder </option>
                        <?php 
                          if($stakeholder) {
                            foreach($stakeholder as $cat) {
                        ?>
                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['stakeholder_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Disclosure</label>
                    <select name="disclosure_id" id="disclosure_id" required="required" class="form-control">
                        <option value="">Select Disclosure </option>
                        <?php 
                          if($disclosure) {
                            foreach($disclosure as $cat) {
                        ?>
                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['disclosure_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">



                    <label for="exampleInputEmail1">Initiative Name</label>



                    <input type="text" required="required" class="form-control"  placeholder="Enter Initiative Name" name="initiative_name" id="initiative_name">



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
             <form method="post" name="initiative-form" id="initiative-form" action="<?php echo base_url();?>/master/addInitiative">

            <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Initiative</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Sdg</label>
                    <select name="sdg_id" required="required" class="form-control" onchange="getTargetBySdg(this)">
                        <option value="">Select Sdg </option>
                        <?php 
                          if($sdg) {
                            foreach($sdg as $cat) {
                        ?>
                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['sdg_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Target</label>
                    <select name="goal_target_id" id="goal_target" required="required" class="form-control">
                        <option value="">Select Target </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Stakeholder</label>
                    <select name="stakeholder_id" required="required" class="form-control">
                        <option value="">Select Stakeholder </option>
                        <?php 
                          if($stakeholder) {
                            foreach($stakeholder as $cat) {
                        ?>
                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['stakeholder_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Disclosure</label>
                    <select name="disclosure_id" required="required" class="form-control">
                        <option value="">Select Disclosure </option>
                        <?php 
                          if($disclosure) {
                            foreach($disclosure as $cat) {
                        ?>
                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['disclosure_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="ghg_name">Initiative Name</label>
                    <input type="text" required="required" class="form-control"  placeholder="Enter Initiative Name" name="initiative_name">
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

   function editInitiative(that) {
        var num = $(that).attr('data-number');
        var name = $(that).attr('data-initiative_name');
        var sdg_id = $(that).attr('data-sdg_id');
        var goal_target_id = $(that).attr('data-goal_target_id');
        var stakeholder_id = $(that).attr('data-stakeholder_id');
        var disclosure_id = $(that).attr('data-disclosure_id');
      $.ajax({
            url : "<?php echo base_url()?>/master/getTargetBySdg/"+sdg_id,
            type: "POST",
            success: function(data){
              $("#goal_target_id").html(data);
              $('#goal_target_id').val(goal_target_id);
            },
            error: function(xhr, status, error){
            }
        });      
        $('#initiative_id').val(num);
        $('#sdg_id').val(sdg_id);
        $('#initiative_name').val(name);
        $('#stakeholder_id').val(stakeholder_id);
        $('#disclosure_id').val(disclosure_id);
        $('#modal-edit').modal('show');
    }

    function addInitiative() {
        $('#modal-add').modal('show');
    }

    function getTargetBySdg(that) {
      var sdg_id = $(that).val();
      $.ajax({
            url : "<?php echo base_url()?>/master/getTargetBySdg/"+sdg_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data){
              $("#goal_target").html(data);
              // $('#classificationDiv_'+i).html(data);
            },
            error: function(xhr, status, error){
              // $('#classificationDiv_'+i).html('<option value="">Select Classification</option>');
            }
        });      
    }

    function getTargetBySdgForEdit(that) {
      var sdg_id = $(that).val();
      $.ajax({
            url : "<?php echo base_url()?>/master/getTargetBySdg/"+sdg_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data){
              $("#goal_target_id").html(data);
            },
            error: function(xhr, status, error){
            }
        });            
    }

</script>

<?php include('include/footer.php');?>



