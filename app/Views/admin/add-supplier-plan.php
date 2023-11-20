<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Supplier Plan Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo base_url();?>/master/supplierPlan" class='btn btn-primary'><i class="fa fa-eye"></i> View Supplier Plan</a> </li>

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

                <h3 class="card-title">Add New Supplier Plan </h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form name="frm-supplier-plan" id="supplier-plan" method="post" action="<?php echo base_url();?>/master/addSupplierPlanSubmit">

                <div class="card-body">



                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Company Size </label>

                    <select name="company_id" id="company_id" required="required" class="form-control">

                        <option value="">Select Company Size </option>

                        <?php if(!empty($company)){

                          foreach($company as $r){?>

                        <option value="<?php echo $r['id'];?>"><?php echo $r['company_size'];?></option>

                       <?php  }

                        }?>

                    </select>

                  </div>




<div class="col-md-3" style="float: left;">
      <div class="form-group">

        <label for="exampleInputEmail1">Plan Name</label>

        <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="plan_name">

      </div>
      </div>
      <div class="col-md-3" style="float: left;">
        <div class="form-group">

        <label for="exampleInputEmail1">Admin Allow</label>

        <input type="number"  class="form-control" id="exampleInputEmail1" required="required" name="admin_num">

      </div>
      </div>
      
      <div class="col-md-3" style="float: left;">
        <div class="form-group">

        <label for="exampleInputEmail1">Employee Allow</label>

        <input type="number"  class="form-control" id="exampleInputEmail1" required="required" name="employee_num">

      </div>
      </div>
      <div class="col-md-3" style="float: left;">
        <div class="form-group">

        <label for="exampleInputEmail1">Manager Allow</label>

        <input type="number"  class="form-control" id="exampleInputEmail1" required="required" name="manager_num">

      </div>
      </div>
      

     <div class="col-md-3" style="float: left;">

      <div class="form-group">

        <label for="exampleInputEmail1">Plan Price</label>

        <input type="text" class="form-control" id="exampleInputEmail1" required="required" name="plan_price">

      </div>

  </div>

     <div class="col-md-3" style="float: left;">

      <div class="form-group">

        <label for="exampleInputEmail1">User Allow</label>

        <input type="text" class="form-control" id="exampleInputEmail1" required="required" name="no_of_user">

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

            <!-- /.card -->

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>

  </div>

<?php include('include/footer.php');?>

<script>
  function addStandAndClassificDiv(){
      $('.stand_and_classific_div').append('<div class="standDiv"><div class="form-group"><div class="col-md-10" style="float: left;"><label for="exampleInputEmail1">&nbsp;</label><input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="description[]"></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');

    }



  $(document).on('click','.remove_stand_and_classific_block',function(){



    $(this).closest('.standDiv').remove();



  });  
</script>