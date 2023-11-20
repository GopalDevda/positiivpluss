<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Sub sub Industry Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Sub-sub Type</li>

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

          <div class="col-md-6">

            <!-- general form elements -->

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Add New Sub Sub Industry</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form name="from" id="form" method="post" action="<?php echo base_url();?>/SubSubIndustry/addsubsubindustry">

                <div class="card-body">

                             
                               <div class="form-group">

                    <label for="exampleInputEmail1">Industry Category</label>

                    <select name="industry_category_id" id="industry_category_id" required="required" onchange="getIndustryAjax(this.value);" class="form-control">

                        <option value="">Select Industry Cateory</option>

                        <?php if(!empty($industry_category)){

                          foreach($industry_category as $r){?>

                        <option value="<?php echo $r['id'];?>"><?php echo $r['industry_category_name'];?></option>

                       <?php  }

                        }?>

                    </select>

                  </div>

            <div class="form-group">



                    <label for="exampleInputEmail1">Industry</label>



                    <select name="industry" id="IndustryDiv" required="required" class="form-control ghgfactor">



                        <option value="">Select Industry</option>



                    </select>



                  </div>
            
                              <div class="form-group">
            
                                <label for="exampleInputEmail1">Sub-Sub-Industry Name</label>
            
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Sub-Sub-Industry  Name" required="required" name="subsubindustry">
            
                              </div>

                                  

                 

                </div>


                <!-- /.card-body -->



                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>

              </form>

            </div>

            <!-- /.card -->



          



           

          </div>



     <div class="col-md-6">

            <!-- general form elements -->

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title"><?php echo $title;?></h3></h3>

              </div>

              

    <?php 

    // print_r($list);

    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">
    <thead>
    <tr><th>#</th><th>Industry cat Name</th><th>Industry Name</th><th>Sub Name</th><th>Action</th></tr>
    </thead>
    <?php $s=1;

    foreach($list as $d){?>

      <tr><td><?php echo $s;?></td><td><?php echo $d['icm'];?></td><td><?php echo $d['indust'];?></td><td><?php echo $d['subsubindustry'];?></td>

           <td>

          <a class="btn btn-primary" href="javascript:void(0);" onclick="editFunction(this);"  data-ind_cat_name='<?php echo $d['industry_cat'];?>'data-sub_sub='<?php echo $d['subsubindustry'];?>' data-ind_name='<?php echo $d['industry'];?>' data-number='<?php echo $d['id'];?>' ><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="<?php echo base_url()?>/SubSubIndustry/deleteSubSubIndustry/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

        </td>

      </tr>

    <?php $s++;}?>

    </table>

  <?php } ?>





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

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/SubSubIndustry/editSubSub" enctype='multipart/form-data'>

            <input type="hidden" name="sub_sub_id" id="sub_sub_id" value="" required="required">

            <div class="modal-body">

               <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Update Sub Sub Industry Name</h3>

              </div>

         <div class="card-body">
                
                <div class="form-group">

                                    <label for="exampleInputEmail1">Industry Category</label>
                
                                    <select class="form-control" id="ind_cat_name" placeholder="Industry Category Type Name" required="required" name="ind_cat_name">
                
                                        <option value="">Select Industry Category</option>
                
                                        <?php if(!empty($industry_category)){
                
                                          foreach($industry_category as $rcar){?>
                
                                        <option value="<?php echo $rcar['id'];?>"><?php echo $rcar['industry_category_name'];?></option>
                
                                       <?php  }
                
                                        }?>

                                   </select>

                  </div>
                  
                  <div class="form-group">

                                    <label for="exampleInputEmail1">Industry </label>
                
                                    <select class="form-control" id="ind_name" placeholder="Industry  Name" required="required" name="ind_name">
                
                                        <option value="">Select Industry </option>
                
                                        <?php if(!empty($industry)){
                
                                          foreach($industry as $rind){?>
                
                                        <option value="<?php echo $rind['id'];?>"><?php echo $rind['industry_name'];?></option>
                
                                       <?php  }
                
                                        }?>

                                   </select>

                  </div>
                



                  <div class="form-group">

                        <label for="exampleInputEmail1">Sub-Sub-Industry Name </p1></label>
    
                        <input type="text" class="form-control" id="sub_sub" placeholder="Enter Sub Type  Name" required="required" name="sub_sub">
                   

                  </div>

               

              </div>

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

     function editFunction(that) {

      
            var num = $(that).attr('data-number'); // Sub Sub Industry Id
    
            var ind_cat_name = $(that).attr('data-ind_cat_name'); // industry category name
            
            var ind_name = $(that).attr('data-ind_name'); //industry name
            
            var sub_sub = $(that).attr('data-sub_sub'); //Sub Sub industry name
          
          

              $.ajax({

                        url : "<?php echo base_url()?>/documenttype/getsubdocumentdetails/"+num,
            
                        type: "GET",
            
                        success: function(data){
                            
                        $('#sub_sub_id').val(num);
                        
                        $('#ind_cat_name').val(ind_cat_name);
                        
                        $('#ind_name').val(ind_name);
                        
                        $('#sub_sub').val(sub_sub);
                        
                        $('#modal-edit').modal('show');
                        
                       


                        },

                            error: function(xhr, status, error){
                         }


                    });
                             }
    
    
    
    
     function getIndustryAjax(id=1){
    $.ajax({
          url : "<?php echo base_url()?>/SubSubIndustry/getIndustryByIndustryCategory/"+id,
          type: "POST",
          //dataType: "JSON",
          success: function(data){
            $('#IndustryDiv').html(data);
          },
          error: function(xhr, status, error){
            $('#IndustryDiv').html('<option value="">Select Industry </option>');
          }
      });
  }  


</script>