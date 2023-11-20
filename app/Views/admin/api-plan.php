<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Plan API Management</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Plan APIs </li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
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
        <!-----------------------------------------------P L A N ------------------A P I--------------------------------------------------------------------->
        <div class="col-12 col-sm-12">
          <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <li class="pt-2 px-3">
                  <h3 class="card-title">Plan</h3>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Create Plan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Plan Manage</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Modifire</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                  <div class="card card-primary">
                    <!-- form start -->
                    <form name="frm-supplier-plan" id="supplier-plan" method="post" action="<?php echo base_url();?>/apiPlanController/addPlanSubmit">
                      <div class="card-body">
                        
                        <div class="form-group">
                          <label for="exampleInputEmail1">Plan Name</label>
                          <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="plan_name">
                        </div>
                        <div class="col-md-3" style="float: left;">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Plan Price</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" required="required" name="plan_price">
                          </div>
                        </div>
                        <div class="col-md-3" style="float: left;">
                          <div class="form-group">
                            <label for="exampleInputEmail1">User Hitting</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" required="required" name="no_of_hitting">
                          </div>
                        </div>
                        <div class="col-md-3" style="float: left;">
                          <div class="form-group">
                            <label for="exampleInputEmail1"> Select Plan Type</label>
                            <select name="plan_validity" id="plan_validity" required="required" class="form-control" >
                              <option value="">Select Plan Type</option>
                              <option value="month">Monthly</option>
                              <option value="year">Yearly</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3" style="float: left;">
                          <div class="form-group">
                            <label for="exampleInputEmail1"> Select Plan Active Time</label>
                            <select class="form-control" name="plan_validity_time" id="plan_validity_time" required="required">
                              <option value="">Select Plan Active Time</option>
                              <option value="1">Monthly</option>
                              <option value="3">Quaterly</option>
                              <option value="6">Half Yearly</option>
                              <option value="1">Yearly</option>
                            </select>
                          </div>
                        </div>
                         <div class="form-group">
						
                        
                           				<label class="form-label">Select Api's </label>
										<select class="multiple-select" data-placeholder="Choose anything" name="api_name[]"multiple="multiple">
										<?php
										if(!empty($api)){
										    
										    foreach($api as $ap){?>
 <option value="<?php echo $ap['id'] ?>"><?php echo $ap['api_name'] ?></option>
<?php 
										        
  }  
    } ?>
										</select>
									</div>
                        
                        <div class="form-group">
                          <div class="col-md-10" style="float:left;">
                            <label for="exampleInputEmail1">Description</label>
                            <!--   <textarea class="textarea" placeholder="Description Here" name="description" style="width: 100%;" ></textarea> -->
                            <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="description[]">  
                          </div>
                          <div class="col-md-2" style="float:left;">
                            <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                            <button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>     
                          </div>
                        </div>
                        <span class="stand_and_classific_div"></span>                 
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                   <table class="table table-bordered table-hover" id="datatables">
                       <thead>
                            <tr>
                               <th>#</th>
                               <th>Plan Name </th>
                               <th>Plan Price </th>
                               <th>no of hitting </th>
                               <th>Plan Type </th>
                               <th>Plan Validity</th>
                               <th>Description </th>
                               <th>Api </th>
                               <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
										if(!empty($api_plan_module)){
										    $i=1;
										    foreach($api_plan_module as $apm){?>
                            <tr>
                               <td><?php echo $i;?></td>
                               <td><?php echo $apm['plan_name'];?></td>
                               <td><?php echo $apm['plan_price'];?></td>
                               <td><?php echo $apm['no_of_hitting'];?></td>
                               
                               <td><?php echo $apm['plan_validity'];?></td>
                               <td><?php echo $apm['plan_validity_time'];?></td>
                               <td> <?php $Description= json_decode($apm['description']);
                                       
                                        foreach($Description as $ription){?>
                                       
                                            <ul style="font-size: 18px;">
                                               
                                                <li><?php  echo $ription.'<br>';?></li>
            
                                            </ul>  
                                            
                                       <?php }
                                       
                                       ?>
                                       
                               </td>
                               
                                <td><?php $api_name= json_decode($apm['api_name']);
                                       
                                       foreach($api_name as $apiname){?>
                                       
                                       <?php  
                                       
                                            $db = \Config\Database::connect();
           
                                            $query = $db->query("SELECT api_module.api_name FROM `api_module` WHERE `id`=".$apiname);
                                            
                                            $api_name = $query->getResultArray();
              
                                            foreach($api_name[0] as $apirealname){ ?>
                
                                                <ul style="font-size: 18px;">
                                                
                                                        <li><?php  echo $apirealname;?></li>    
                                                
                                                </ul>
                                                           
                                                       <?php 
                                                    }  }
                                                       
                                                       ?>
                                </td>
                               
                               
                               <td>Action</td>
                               
                               
                            </tr>
                            
                            <?php 
                            
										    } 
                            
                            } ?>
                        </tbody>
                    </table>
                      
                  </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                  Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                  Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
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
<script>
  function addStandAndClassificDiv(){
      $('.stand_and_classific_div').append('<div class="standDiv"><div class="form-group"><div class="col-md-10" style="float: left;"><label for="exampleInputEmail1">&nbsp;</label><input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="description[]"></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');

    }



  $(document).on('click','.remove_stand_and_classific_block',function(){



    $(this).closest('.standDiv').remove();



  });  
</script>

	<script>
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	</script>