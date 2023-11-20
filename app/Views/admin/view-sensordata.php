<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sensor Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item active"><a href="#" onclick="addCompanyVehicle()" class='btn btn-primary'><i class="fa fa-plus"></i> Add Data</a> </li>
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
                      <h3 class="card-title">Sensor Data  List</h3>
                    </div>
                    
                    <?php
                    if(!empty($electricity_board)){?>
                    <table class="table table-bordered table-hover" id="datatables">
                      <thead>
                        <tr>
                          <th>#</th>
                          
                          <th>Provider</th>
                          <th>State</th>
                          <th>Type</th>
                          <th>Type</th>
                          
                          
                          <!--       <th>Derivative</th>
                          <th>Efficiency</th>
                          <th>Emission Factor</th> -->
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $s=1;
                        
                        foreach($electricity_board as $d){?>
                        <tr>
                          <td><?php echo $s;?></td>
                          <td><?php echo $d['uniq_id'];?></td>
                          
                          <td><?php echo $d['name_discom'];?></td>
                          <td><?php foreach($state as $bb){ ?>
                            <?php if($bb['id'] == $d['state']){
                            echo $bb['name'];
                            }?>
                            <?php
                            }?>
                          </td>
                          <td>
                            <?php if($d['type']== '1'){
                            echo 'Electricity';
                            } ?>
                            <?php if($d['type']== '2'){
                            echo 'Water';
                            }?>
                            
                          </td>
                          
                          
                          <td>
                            <a class="btn btn-primary" href="javascript:void(0);" onclick="editCompanyVehicle(this)" data-id="<?php echo $d['id']; ?>" data-name_discom="<?php echo $d['name_discom']; ?>" data-type="<?php echo $d['type']; ?>" data-state="<?php echo $d['state']; ?>" 
                              data-uniqid="<?php echo $d['uniq_id']; ?>" 
                              data-abbre="<?php echo $d['abbrevation']; ?>"
                            > <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger" href="<?php echo base_url()?>/Sensor/delete/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
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
                <form method="post" name="company-vehicle-add-form" id="company-vehicle-add-form" action="<?php echo base_url();?>/Sensor/adminsensoredit">
                  <div class="modal-body">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Edit Sensor</h3>
                      </div>
                      <input type="hidden" name="id" id="id" value="">
                      <!-- /.card-header -->
                      <!-- form start -->
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select State</label>
                          <select name="state" id="state_id" required="required" class="form-control">
                            <option value="">Select State </option>
                            <?php
                            
                            if($state) {
                            foreach($state as $v) {
                            ?>
                            <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                            <?php
                            }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          
                          <label for="exampleInputEmail1">Select Type</label>
                          <select name="type" id="type" required="required" class="form-control">
                            <option value="NULL">Select Type </option>
                            <option value="1">Electricity </option>
                            <option value="2">Water </option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Provider</label>
                          <input type="text" required="required" class="form-control"  placeholder="Enter Provider" name="provider" id="provider">
                        </div>
                        <div class="form-group">
                      <label for="exampleInputEmail1">Abbrevation</label>
                      <input type="text" required="required" class="form-control"  placeholder="Enter Abbrevation" name="editAbbrevation" id="editAbbrevation">
                     </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Username</label>
                          <br>
                          <label>Yes</label>
                          <input type="checkbox" name="username[]" id="us" value="us">
                          <label>No</label>
                          <input type="checkbox" name="username[]" id="ac_0" value="0">
                        </div>
                         <div class="form-group">
                          <label for="exampleInputEmail1">Account No.</label>
                          <br>
                          <label>Yes</label>
                          <input type="checkbox" name="username[]" id="ac" value="ac">
                          <label>No</label>
                          <input type="checkbox" name="username[]" id="ac_0" value="0">
                        </div>
                        
                        
                        <div class="form-group">
                          <label for="exampleInputEmail1">Password</label>
                          <br>
                          <label>Yes</label>
                          <input type="checkbox" name="username[]" id="pa" value="pa">
                          <label>No</label>
                          <input type="checkbox" name="username[]" id="pa_0" value="0">
                        </div>
                        
                        
                         
                
                <div class="form-group">
                  <label for="exampleInputEmail1">BP NO.</label>
                  <br>
                  <label>Yes</label>
                  <input type="checkbox" name="username[]" id="bp" value="bp">
                  <label>No</label>
                  <input type="checkbox" name="username[]" value="">
                </div>
                        
                        <div class="form-group">
                          
                          <label for="exampleInputEmail1">Service No.</label>
                          <br>
                          <label>Yes</label>
                          <input type="checkbox" name="username[]" id="ser" value="ser">
                          <label>No</label>
                          <input type="checkbox" name="username[]" id="ser_0" value="0">
                        </div>
                        
                        <div class="form-group">
                          
                          <label for="exampleInputEmail1">CA No.</label>
                          <br>
                          <label>Yes</label>
                          <input type="checkbox" name="username[]" id="ca" value="ca">
                          <label>No</label>
                          <input type="checkbox" name="username[]" id="ca_0" value="0">
                        </div>
                        
                        <div class="form-group">
                          
                          <label for="exampleInputEmail1">KN No.</label>
                          <br>
                          <label>Yes</label>
                          <input type="checkbox" name="username[]" id="kn" value="kn">
                          <label>No</label>
                          <input type="checkbox" name="username[]" id="kn_0" value="0">
                        </div>
                        <div class="form-group">
                  
                  <label for="exampleInputEmail1">Consumer No.</label>
                  <br>
                  <label>Yes</label>
                  <input type="checkbox" name="username[]" id="co" value="co">
                  <label>No</label>
                  <input type="checkbox" name="username[]" value="0">
                </div>
                <div class="form-group">
                  
                  <label for="exampleInputEmail1">Mobile No.</label>
                  <br>
                  <label>Yes</label>
                  <input type="checkbox" name="username[]" id="mo" value="mo">
                  <label>No</label>
                  <input type="checkbox" name="username[]" value="0">
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
        <form method="post" name="company-vehicle-add-form" id="company-vehicle-add-form" action="<?php echo base_url();?>/Sensor/adminsensoradd">
          <div class="modal-body">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Sensor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Select State</label>
                  <select name="state" id="state" required="required" class="form-control">
                    <option value="">Select State </option>
                    <?php
                    
                    if($state) {
                    foreach($state as $v) {
                    ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                    <?php
                    }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  
                  <label for="exampleInputEmail1">Select Type</label>
                  <select name="type" id="type" required="required" class="form-control">
                    <option value="NULL">Select Type </option>
                    <option value="1">Electricity </option>
                    <option value="2">Water </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Provider</label>
                  <input type="text" required="required" class="form-control"  placeholder="Enter Provider" name="provider" id="provider">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Abbrevation</label>
                  <input type="text" required="required" class="form-control"  placeholder="Enter Abbrevation" name="Abbrevation" id="Abbrevation">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <br>
                  <label>Yes</label>
                  <input type="checkbox"  name="username[]" value="us">
                  <label>No</label>
                  <input type="checkbox" name="username[]" value="0">
                </div> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Account No.</label>
                  <br>
                  <label>Yes</label>
                  <input type="checkbox"  name="username[]" value="ac">
                  <label>No</label>
                  <input type="checkbox" name="username[]" value="0">
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <br>
                  <label>Yes</label>
                  <input type="checkbox"  name="username[]" value="pa">
                  <label>No</label>
                  <input type="checkbox" name="username[]" value="0">
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputEmail1">BP NO.</label>
                  <br>
                  <label>Yes</label>
                  <input type="checkbox" name="username[]" value="bp">
                  <label>No</label>
                  <input type="checkbox" name="username[]" value="">
                </div>
                
                <div class="form-group">
                  
                  <label for="exampleInputEmail1">Service No.</label>
                  <br>
                  <label>Yes</label>
                  <input type="checkbox" name="username[]" value="ser">
                  <label>No</label>
                  <input type="checkbox" name="username[]" value="0">
                </div>
                
                <div class="form-group">
                  
                  <label for="exampleInputEmail1">CA No.</label>
                  <br>
                  <label>Yes</label>
                  <input type="checkbox" name="username[]" value="ca">
                  <label>No</label>
                  <input type="checkbox" name="username[]" value="0">
                </div>
                
                <div class="form-group">
                  
                  <label for="exampleInputEmail1">KN No.</label>
                  <br>
                  <label>Yes</label>
                  <input type="checkbox" name="username[]" value="kn">
                  <label>No</label>
                  <input type="checkbox" name="username[]" value="0">
                </div>
                <div class="form-group">
                  
                  <label for="exampleInputEmail1">Consumer No.</label>
                  <br>
                  <label>Yes</label>
                  <input type="checkbox" name="username[]" value="co">
                  <label>No</label>
                  <input type="checkbox" name="username[]" value="0">
                </div>
                <div class="form-group">
                  
                  <label for="exampleInputEmail1">Mobile No.</label>
                  <br>
                  <label>Yes</label>
                  <input type="checkbox" name="username[]" value="mo">
                  <label>No</label>
                  <input type="checkbox" name="username[]" value="0">
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
  function editCompanyVehicle(that) {
  var num = $(that).attr('data-id');
  var name_discom = $(that).attr('data-name_discom');
  var type = $(that).attr('data-type');
  var uniq_id = $(that).attr('data-uniqid');
  var state = $(that).attr('data-state');
  var editAbbrevation = $(that).attr('data-abbre');

// alert
// var i = JSON.parse(uniq_id);


if(uniq_id == 'acpa')
{
$("#ac").prop('checked', true);
$("#pa").prop('checked', true);
}
if(uniq_id == 'paca')
{
$("#ca").prop('checked', true);
$("#pa").prop('checked', true);
}
if(uniq_id == 'pamo')
{
$("#mo").prop('checked', true);
$("#pa").prop('checked', true);
}
if(uniq_id == 'pabp')
{
$("#bp").prop('checked', true);
$("#pa").prop('checked', true);
}
if(uniq_id == 'paco')
{
$("#co").prop('checked', true);
$("#pa").prop('checked', true);
}if(uniq_id == 'paser')
{
$("#ser").prop('checked', true);
$("#pa").prop('checked', true);
}if(uniq_id == 'pakn')
{
$("#kn").prop('checked', true);
$("#pa").prop('checked', true);
}if(uniq_id == 'uspa')
{
$("#us").prop('checked', true);
$("#pa").prop('checked', true);
}



  
  $('#id').val(num);
  $('#provider').val(name_discom);
  $('#state_id').val(state);
  $('#type').val(type);
  $('#editAbbrevation').val(editAbbrevation);
  $('#username').val(uniq_id);
  $('#modal-edit').modal('show');
  }
  function addCompanyVehicle() {
  $('#modal-add').modal('show');
  }
  </script>
  <?php include('include/footer.php');?>