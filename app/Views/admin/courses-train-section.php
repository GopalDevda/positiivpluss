<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>
<style>
    .card-css{
        width: 30rem; 
        display:none;
        color:black; 
        max-height: 520rem;
        height: 415px;
        background-image: url('https://png.pngtree.com/background/20210711/original/pngtree-blue-gradient-geometric-flat-business-card-background-picture-image_1070306.jpg');
    }
</style>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Courses Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active"> Courses</li>

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

                <h3 class="card-title">Add New Courses </h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form name="from" id="form" method="post" action="<?php echo base_url();?>/trainingCourses/addCourseName">

                <div class="card-body">

                             
                    <div class="form-group">
                    <label for="exampleInputEmail1">Training Course  Name</label>
                      <select class="form-control" name="course_name" id="course_name">
                          <?php  if($courselist){
                          ?>     
                        <option value="0">Select Training Course  </option>
                            <?php  foreach($courselist as $key=>$ind) {?>
                            <option value="<?php echo $ind['id']; ?>"> <?php echo $ind['courses_name']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                             
                             
                             
                            <div class="form-group">
            
                                <label for="exampleInputEmail1">Module  Name</label>
            
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Module Name" required="required" name="module_name">
            
                            </div>

                                
                    
                    <!--old content start-->
                    
                   

        </div>
                    
         

                <div class="card-footer">

                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>
                
</div>



                <!-- /.card-body -->



              </form>

            </div>

            <!-- /.card -->


   <div class="col-md-6">

            <!-- general form elements -->

            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title"> Course Module  List</h3>

              </div>

              

    <?php 

    // print_r($coursemodulelist);

    if(!empty($coursemodulelist)){?>

    <table class="table table-bordered table-hover" id="datatables">
    <thead>
    <tr><th>#</th><th>Courses  Name</th><th>Module Name</th><th>Action</th></tr>
    </thead>
    <?php $s=1;

    foreach($coursemodulelist as $d){?>

      <tr><td><?php echo $s;?></td><td><?php echo $d['courses_name'];?></td><td><?php echo $d['modulename'];?></td>

           <td>
  
  <a class="btn btn-primary" href="javascript:void(0);" onclick="editFunction(this);" data-number='<?php echo $d['id'];?>' data-courses_name='<?php echo $d['course'];?>' data-modulename='<?php echo $d['modulename'];?>' ><i class="fa fa-eye"></i></a>

        
          <a class="btn btn-danger" href="<?php echo base_url()?>/trainingCourses/deletetrainingmoduleCoursese/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>

        </td>

      </tr>

    <?php $s++;}?>

    </table>

  <?php } ?>





            </div>

          </div>
          



           

          </div>
          
           <!--Follow Up Details-->
          <div class="modal fade bd-example-modal-lg" style="width: 30rem;"id="show-modal-carddata">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="card" 
    style="width: 24rem;
 
    color:white;
    max-height: 520rem; height: 415px;
    background-image: url('https://png.pngtree.com/background/20210711/original/pngtree-blue-gradient-geometric-flat-business-card-background-picture-image_1070306.jpg');">
                      <div id="carddata"></div>
                     </div>
                  </div>
                </div>
              </div> 
            </div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#inText").on("input", function(){
          $("#output").text($(this).val());
        });
      });
    </script>

    <div class="card" 
    style="width: 24rem;
    display:none;
    color:white;
    max-height: 520rem; height: 415px;
    background-image: url('https://png.pngtree.com/background/20210711/original/pngtree-blue-gradient-geometric-flat-business-card-background-picture-image_1070306.jpg');">
        <div class="card-body">
    <h5 class="card-title">Content card</h5>
    <p class="card-text" id="output"></p>
                        <div class="card-body">
                                              
                                                       <h1 contentEditable="true"><input 
                                                                    style=" background-color: white; 
                                                                            width: 20rem;
                                                                            border-top-style: hidden;
                                                                            border-right-style: hidden;
                                                                            border-left-style: hidden;
                                                                            border-bottom-style: groove;
                                                                            background-color: #eee;
                                                                            opacity: .1; "
                                                                    type="text" value="Title" name="contenttitle"></h1>
                                                                    <div contentEditable="true"><textarea  
                                                                    style=" background-color: white; 
                                                                            width: 20rem;
                                                                            border-top-style: hidden;
                                                                            border-right-style: hidden;
                                                                            border-left-style: hidden;
                                                                            border-bottom-style: groove;
                                                                            background-color: #eee;
                                                                            opacity: .1; "
                                                                            value="You Favorite Movie" name="contentdiscription"></textarea></div>
                                                                    <p contentEditable="true">Your Comment</p> 
                                                                    
                                                                    
                                                                   
                                                             </div>
   
                                            <div class="card" style="width: 18rem;">
                                                            <div class="card-body">
                                                
                                                                    <h1 contentEditable="true">Title</h1>
                                                                    <div contentEditable="true">You Favorite Movie</div>
                                                                    <p contentEditable="true">Your Comment</p> 
                                            
                                                             </div>
                                            </div> <input type="submit" class="btn btn-primary" value="Save Card">
                                          
   
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

              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/trainingCourses/edittrainingmoduleCourses" enctype='multipart/form-data'>

            <input type="hidden" name="module_id" id="module_id" value="" required="required">

            <div class="modal-body">

               <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Update Courses  Name</h3>

              </div>

         <div class="card-body">
                
                                
                    <div class="form-group">
                    <label for="exampleInputEmail1">Training Course  Name</label>
                      <select class="form-control" name="courses_id" id="courses_id">
                          <?php  if($courselist){
                          ?>     
                        <option value="0">Select Training Course  </option>
                            <?php  foreach($courselist as $key=>$ind) {?>
                            <option value="<?php echo $ind['id']; ?>"> <?php echo $ind['courses_name']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    
                        
                      
                        <div class="form-group">
            
                                <label for="exampleInputEmail1">Course  Name</label>
            
                                <input type="text" class="form-control modulename"  placeholder="Enter Course Name" required="required" name="module_name">
            
                        </div>

                                 

 <!--Editor start for update-->
                <!--             <label for="exampleInputEmail1">Course Description </p1></label>-->
                             
            				<!--<div  class="form-group " id="edittor" >	</div>-->
            				
            				<!--<p class="suit"></p>-->
            				
            				   
            			 <!--       <div class="form-group note-control-selection" >-->
            			                
            			 <!--               <textarea  id="summernotedit" name="description"  ><p class="suit"></p></textarea>-->
            			                
            				<!--    </div>	-->
	<!--Editor end for update-->

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
    
            var courses_id = $(that).attr('data-courses_name');
            
            var modulename = $(that).attr('data-modulename');
         
        
            $('#module_id').val(num);
                        
            $('#courses_id').val(courses_id);
                        
            $('.modulename').val(modulename);
          
            $('#modal-edit').modal('show');
            
           
                             } 
                      
              
    function viewFunction(that) {

      
            var num = $(that).attr('data-number');
    
            
          

              $.ajax({

                        url : "<?php echo base_url()?>/trainingCourses/viewmodule/"+num,
            
                        type: "GET",
            
                        success: function(data){
                            
                        $('#carddata').html(data);
                        $('#show-modal-carddata').modal('show');
                
            
                        },

                            error: function(xhr, status, error){
                         }


                    });
                             }
    
    
    
    
    function showcardtype(that){
            // alert('test');
             var id = $(that).val();
            //   alert(id);
            if(id == '1') {
                            $('#showcontent').show();
                            $('#showimage').hide();
                            $('#showaudio').hide();
                            $('#showquiz').hide();
                            $('#showall').hide();
                            // $('input:checkbox').attr('checked','checked');
                            //  $('input:checkbox').removeAttr('checked');
                         }else if(id == '2') {
                            $('#showimage').show();
                            $('#showcontent').hide();
                            $('#showaudio').hide();
                            $('#showall').hide();
                            $('#showquiz').hide();
                            // $('input:checkbox').attr('checked','checked');
                            //  $('input:checkbox').removeAttr('checked');
                         }else if(id == '3') {
                            $('#showimage').hide();
                            $('#showcontent').hide();
                            $('#showaudio').show();
                            $('#showquiz').hide();
                            $('#showall').hide();
                            // $('input:checkbox').attr('checked','checked');
                            //  $('input:checkbox').removeAttr('checked');
                         }else if(id == '4') {
                            $('#showimage').hide();
                            $('#showcontent').hide();
                            $('#showaudio').hide();
                            $('#showquiz').show();
                            $('#showall').hide();
                            // $('input:checkbox').attr('checked','checked');
                            //  $('input:checkbox').removeAttr('checked');
                         }
                        else    { 
                            $('#showimage').hide();
                            $('#showcontent').hide();
                             $('#showaudio').hide();
                            $('#showquiz').hide();
                            $('#showall').show();
                                }
            }
    
    
$('textarea#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200,
        width: 464,
        height: 291,
        airMode: false,
        disableResizeEditor: true,
       
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
      

$('#summernotedit').summernote({
    
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




  function addAnswerDiv(){





      $('.questionDiv').append('<div class="answerDiv" ><div class="form-group"><div class="col-md-5" style="float: left;">   <label for="exampleInputEmail1">Answer</label><input type="text" class="form-control" id="exampleInputEmail1" required="required" name="answer[]"></div><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1">Marks</label><input type="text" class="form-control" id="exampleInputEmail1" required="required" name="marks[]"></textarea></div><div class="col-md-4" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addAnswerDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_question_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>')
    }



  $(document).on('click','.remove_question_block',function(){



    $(this).closest('.answerDiv').remove();



  });



</script>