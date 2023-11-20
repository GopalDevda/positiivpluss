<?php include('include/header.php'); ?>



<?php include('include/menu.php');?>



  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



    <!-- Content Header (Page header) -->



    <div class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1 class="m-0"><?php echo $heading; ?>  Management</h1>



          </div><!-- /.col -->



          <div class="col-sm-6">



            <ol class="breadcrumb float-sm-right">



              <li class="breadcrumb-item"><a href="#">Home</a></li>



              <li class="breadcrumb-item active">Industry  </li>



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



                <h3 class="card-title">Add <?php echo $heading; ?>  Question </h3>



              </div>



              <!-- /.card-header -->



              <!-- form start -->


<form name="frm-industry" id="industry" method="post" action="<?php echo base_url();?>/assessment/updatealladvanceAssessmentQuestion">

<input type="hidden" id="assessment_id" name="assess" value="<?php echo $rs->id ?>" />


                <div class="card-body">












      <div class="form-group">
        <label for="exampleInputEmail1">Question Title</label>
        <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="question_title" value="<?php echo $rs->question_title ?>">
      </div>
      
      
      <div class="form-group">

        <label for="exampleInputEmail1">Question</label>

        <textarea class="form-control" id="exampleInputEmail1" required="required" name="question"><?php echo $rs->question; ?></textarea>

      </div>




      <div class="form-group">

        <label for="exampleInputEmail1"> Select Choice</label>

        <select name="choice" id="choice" onchange="showanswertype(this,1);" required="required" class="form-control" >

            <option value="">Select Choice</option>

            <option value="Single" <?= $rs->choice=="Single"?'selected':'' ?>>Single Choice</option>

            <option value="Multi" <?= $rs->choice=="Multi"?'selected':'' ?>>Multi Choice </option>

        </select>

      </div>




<div class="form-group">

        <label for="exampleInputEmail1">Remark</label>

        <input type="text"  class="form-control" id="exampleInputEmail1" name="remark" value="<?php echo $rs->remark ?>">

      </div>




            
                  
                  
             
 <div class="form-group" >
                    
                    
      


       
 <label for="exampleInputEmail1"> Select Answer</label>

<div id="answerselected" class="form-group">
                 
                    <select name="answer" id="answer"  class="form-control">
                        <option value="">Select Answer </option>
                        <?php if(!empty($answer)){
                          foreach($answer as $ans){?>
                        <option <?php if($ans['id']==$rs->answer){echo "selected";}?> value="<?php echo $ans['id'];?>"><?php echo $ans['answer'];?></option>
                       <?php  }
                        }?>
                    </select>
                  </div>
                  
        <div id="ANSWER"></div>



      
                  </div>







   




<div class="form-group">

        <label>Document Needed&nbsp;&nbsp;</label>

        <input type="radio" id="yes" name="doc_needed_status" value="1" <?php echo $rs->is_document_needed==1?'checked=checked':'' ?>>

        <label for="yes">YES</label>&nbsp;&nbsp;

        <input type="radio" id="no" name="doc_needed_status" value="0" <?php echo $rs->is_document_needed==0?'checked=checked':'' ?>>

        <label for="no">NO</label>

      </div>
      
      
      <div class="form-group">

        <label>Mandatory &nbsp;&nbsp;</label>

        <input type="radio" id="yes" name="mandatory_needed_status" value="1" <?php echo $rs->is_mandatory_needed==1?'checked=checked':'' ?>>

        <label for="yes">YES</label>&nbsp;&nbsp;

        <input type="radio" id="no" name="mandatory_needed_status" value="0" <?php echo $rs->is_mandatory_needed==0?'checked=checked':'' ?>>

        <label for="no">NO</label>

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



        </div>



      </div><!-- /.container-fluid -->



    </section>



  </div>



<?php include('include/footer.php');?>



<script type="text/javascript">



function getIndicatorAjax(id=1){



  $.ajax({



        url : "<?php echo base_url()?>/assessment/getIndicatorByIndicatorCategory/"+id,



        type: "POST",



        //dataType: "JSON",



        success: function(data){



          $('#indicatorDiv').html(data);



        },



    });



}



</script>



<script type="text/javascript">











function showanswertype(that,$Ed){
            // alert('test');
             var id = $(that).val();
            //   alert(id);
              
              
                            $.ajax({

                        url : "<?php echo base_url()?>/assessment/getalleditallAnswers/"+id,
            
                        type: "GET",
            
                        success: function(data){
                             $('#answerselected').hide();
                        $('#ANSWER').html(data);
                        
                
            
                        },

                            error: function(xhr, status, error){
                         }


                    });
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



</script>

          