<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0"><?php echo $title; ?></h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active"><?php echo $title; ?></li>

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

          <div class="col-md-4">

            <!-- general form elements -->

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Add issue</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form name="from" id="form" method="post" action="<?php echo base_url();?>/IssuesController/addissue">

                <div class="card-body">

                             
                          

           
            
                              <div class="form-group">
            
                                <label for="exampleInputEmail1">Issue </label>
            
                                <input type="text" class="form-control" id="issue_name" placeholder="Enter issue_name" required="required" name="issue_name">
            
                              </div>

                             

                 

                </div>


                <!-- /.card-body -->



                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Add Issue</button>

                </div>

              </form>

            </div>

            <!-- /.card -->



          



           

          </div>



     <div class="col-md-8">

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
    <tr><th>#</th><th>Issue name</th><th>Action</th></tr>
    </thead>
    <?php $s=1;

    foreach($list as $d){?>

      <tr><td><?php echo $s;?></td><td><?php echo $d['issue_name'];?></td>
           <td>

          <a class="btn btn-primary" href="javascript:void(0);" onclick="editFunction(this);"  data-issue_name='<?php echo $d['issue_name'];?>' 
          data-number='<?php echo $d['id'];?>' ><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="<?php echo base_url()?>/IssuesController/deleteissue/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

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

        <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/IssuesController/editissues" enctype='multipart/form-data'>

            <input type="hidden" name="issue_id" id="issue_id" value="" required="required">
            
                        <div class="modal-body">
            
                           <div class="card card-primary">
                            
                                <div class="card-header">
                        
                                <h3 class="card-title">Update Issue Data</h3>
                        
                                </div>
            
                                        <div class="card-body">
                                        
                                            <div class="form-group">
                        
                                            <label for="exampleInputEmail1">Issue Name</label>
                        
                                            <input type="text" class="form-control" id="issue_names" placeholder="Enter issue" required="required" name="issue_name">
                        
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

      
            var num = $(that).attr('data-number'); 
    
            var issue_name = $(that).attr('data-issue_name'); 
            
                            
                        $('#issue_id').val(num);
                        
                        $('#issue_names').val(issue_name);
                      
                        $('#modal-edit').modal('show');
                       
                             }
    
    
    
    


</script>