<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Lead Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-plus"></i> Generate Lead</button>
            </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
          
          <!--Follow Up Details-->
          <div class="modal fade bd-example-modal-lg" id="show-modal-lead">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Follow Up Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div id="leadfollow"></div>
                     
                  </div>
                </div>
              </div> 
            </div>
          
          <!-- Main content -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Lead</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo base_url() ?>/LeadController/leadSubmit" method="post">
                      
                      <div class="row">
                          <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">Person Name</label>
                            <input type="text" class="form-control" id="lead" name="lead" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="message-text" class="col-form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="message-text" class="col-form-label">Phone Number</label>
                            <input type="number" class="form-control" id="phone_number" name="phone_number" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="message-text" class="col-form-label">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="message-text" class="col-form-label">Industry</label>
                            <select class="form-control" id="industry_id" name="industry_id" required>
                                <option value="">Select Industry</option>
                                <?php foreach($ind as $i){ ?>
                                <option value="<?php echo $i['id'] ?>"><?php echo $i['industry_name'] ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="message-text" class="col-form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                          </div>
                          <!--<div class="form-group col-md-4">-->
                          <!--  <label for="message-text" class="col-form-label">Follow - up Date</label>-->
                          <!--  <input type="date" class="form-control" id="follow_up_date" name="follow_up_date">-->
                          <!--</div>-->
                          <div class="form-group col-md-12">
                            <label for="message-text" class="col-form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" required></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </form>
                </div>
              </div>
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
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card card-primary table-responsive">
                    <div class="card-header">
                      <h3 class="card-title">Lead List</h3>
                    </div>
                    <table class="table table-bordered table-hover" id="datatables">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Person Name</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                          <th>Company Name</th>
                          <th>Industry</th>
                          <th>Location</th>
                          <th>Description</th>
                          <th>Generate Date</th>
                          <th>Closed Date</th>
                          <th>Follow Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                     <?php $s=1;$d=0;
                        foreach($lead as $l){?>
                      <tr>
                        <td><?php echo $s; ?></td>
                        <td><?php echo $l['lead'] ?></td>
                        <td><?php echo $l['email'] ?></td>
                        <td><?php echo $l['phone_number'] ?></td>
                        <td><?php echo $l['company_name'] ?></td>
                        <td><?php echo $l['industry_name'] ?></td>
                        <td><?php echo $l['location'] ?></td>
                        <td><?php echo $l['description'] ?></td>
                        <td><?php echo date("d-m-Y", strtotime($l['create_on'])) ?></td>
                        <td><?php if($l['deal_status']==0 || $l['deal_status']==2){ if($followup[$d][0]['lead_id']== $l['id']){echo $followup[$d][0]['calldate'];} }?></td>
                        <td><?php if($followup[$d][0]['lead_id']== $l['id']){ echo date("d-m-Y", strtotime($followup[$d][0]['nextdate']));} ?></td>
                        
                      <td>
                          
                          
                        <button type="button" class="btn btn-primary btn-sm showdata" value="<?php echo $l['id']?>"><i class="fa fa-comment"></i></button>
                        
                                        <!--Open section start-->
        
                        <?php if( $l['deal_status']==1){ ?>
                        <a class="btn btn-warning btn-sm" href="javascript:void(0);" onclick="addFollow(this);" data-number='<?php echo $l['id'] ?>'><i class="fa fa-plus"></i></a>
                        <?php }?>
                        
                                        <!--Open section end-->
                        
        <!--Closed section start-->
                       
                        <?php if( $l['deal_status']==1){ ?>
                        
                        <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="closedeal(this);" data-number='<?php echo $l['id'] ?>'><i class="fa fa-edit"></i></a>
                        
                        <?php }elseif($l['deal_status']==2){?><a class="btn btn-info btn-sm" href="javascript:void(0);">Closed</a> 
                         
                        <?php }elseif($l['deal_status']==0){?><a class="btn btn-secondary btn-sm" href="javascript:void(0);">Closed</a><?php }?>
                        
         <!--Closed section end-->
                       
                      </td>
                    </tr>
                   <?php $s++;$d++;} ?>
                  </table>
                  
                </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Follow Up form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/LeadController/followupSubmit" enctype='multipart/form-data'>
                <input type="hidden" name="lead_id" id="id" value="" required="required">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Date :</label>
                    <input type="text" readonly class="form-control" id="follow_up_date" name="follow_up_date" value="<?php echo date("d-m-Y"); ?>">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Follow Up :</label>
                    <textarea class="form-control" name="follow_up" id="follow_up"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Next Follow Up Date:</label>
                    <input type="date" class="form-control" id="next_follow_up_date" name="next_follow_up_date" value="<?php echo date("d-m-Y"); ?>">
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
          <!-- /.modal-dialog --></div>
          
          <div class="modal fade" id="modal-closedeal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deal close form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/LeadController/closedealSubmit" enctype='multipart/form-data'>
                <input type="hidden" name="lead_id" id="idclosed" value="" required="required">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Date :</label>
                    <input type="text" readonly class="form-control" id="follow_up_date" name="follow_up_date" value="<?php echo date("d-m-Y"); ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Positiiv Close:</label>
                    <input type="radio" class="form-control" id="positive" name="dealstatus" value="2">
                    <label for="recipient-name" class="col-form-label">Negatiiv Close:</label>
                    <input type="radio" class="form-control" id="negative" name="dealstatus" value="0">
                  </div> 
                  
                  <div class="form-group">
                  
                    <input type="hidden" class="form-control" id="next_follow_up_date" name="next_follow_up_date" value="00-00-0000"">
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Remark :</label>
                    <textarea class="form-control" name="remark" id="remark"></textarea>
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Close The Deal</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
          
          
        <script type="text/javascript">
        function addFollow(that) {
        var num = $(that).attr('data-number');
        $('#id').val(num);
        $('#modal-edit').modal('show');
        }
        
        function closedeal(that) {
        var num = $(that).attr('data-number');
     
        $('#idclosed').val(num);
        $('#modal-closedeal').modal('show');
        }
        
        
        </script>
        
        <script>
            $(document).on('click', '.showdata', function(event) {
              event.preventDefault();
              var l_id = $(this).val()
                
                $.ajax({
                type: 'GET',
                url: 'showData/'+l_id,
                success: function(response){
                    $('#leadfollow').html(response);
                     $('#show-modal-lead').modal('show');
                
                  
                }
              
              });
            });
            
        </script>