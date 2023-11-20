<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Training Courses Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Training Courses </li>

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

                <h3 class="card-title">Add New Training Courses </h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form name="from" id="form" method="post" action="<?php echo base_url();?>/trainingCourses/addModuleName">

                <div class="card-body">

                             
                            <div class="form-group">
            
                                <label for="exampleInputEmail1">Course  Name</label>
            
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Name" required="required" name="course_name">
            
                            </div>

                                  


                            <div class="form-group col-md-12">
                                
									<label for="icon_facilities">Course Description</label>
									
									<textarea id="summernote" class="summernote"name="description"></textarea>
									
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

                <h3 class="card-title">Training Courses  List</h3>

              </div>

              

    <?php 

    // print_r($courselist);

    if(!empty($courselist)){?>

    <table class="table table-bordered table-hover" id="datatables">
    <thead>
    <tr><th>#</th><th>Course Name</th><th>Action</th></tr>
    </thead>
    <?php $s=1;

    foreach($courselist as $d){?>

      <tr><td><?php echo $s;?></td><td><?php echo $d['courses_name'];?></td>

           <td>

          <a class="btn btn-primary" href="javascript:void(0);" onclick="editFunction(this);" data-summernote='<?php echo $d['details'];?>' data-courses_name='<?php echo $d['courses_name'];?>' data-number='<?php echo $d['id'];?>' ><i class="fa fa-pencil"></i></a>

          <a class="btn btn-danger" href="<?php echo base_url()?>/trainingCourses/deletetrainingCoursese/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

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

              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/trainingCourses/edittrainingCourses" enctype='multipart/form-data'>

            <input type="hidden" name="courses_id" id="courses_id" value="" required="required">

            <div class="modal-body">

               <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Update Training Courses  Name</h3>

              </div>

         <div class="card-body">
                
                <div class="form-group">
            
                                <label for="exampleInputEmail1">Course  Name</label>
            
                                <input type="text" class="form-control" id="courses_name" placeholder="Enter Course Name" required="required" name="course_name">
            
                            </div>

                                 


                 <label for="exampleInputEmail1">Course Description </p1></label>
                 
		
			        <div class="form-group note-control-selection" >
			                
			                <textarea  id="summernotedit" name="description"  ><p  id="edittor"></p></textarea>
			                
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
    
            var courses_name = $(that).attr('data-courses_name');
            
            var suit = $(that).attr('data-summernote');
          

              $.ajax({

                        url : "<?php echo base_url()?>/trainingCourses/gettrainingCoursesdetails/"+num,
            
                        type: "GET",
            
                        success: function(data){
                            
                        $('#courses_id').val(num);
                        
                        $('#courses_name').val(courses_name);
                        
                        $('.suit').val(suit);
                        
                        $('#modal-edit').modal('show');
                        
                        $("#edittor").html(data);


                        },

                            error: function(xhr, status, error){
                         }


                    });
                             }
    
    $('textarea#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200,
  toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        //['fontname', ['fontname']],
       // ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        //['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],
      });
      

    $('textarea#summernotedit').summernote({
    
        tabsize: 2,
        height: 200,
  toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        ['help', ['help']]
      ],
      });
</script>