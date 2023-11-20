<?php include('include/header.php'); ?>



<?php include('include/menu.php');?>



  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



    <!-- Content Header (Page header) -->



    <div class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1 class="m-0">Edit Master Answer Management</h1>



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



                <h3 class="card-title">Edit Answer </h3>



              </div>



              <!-- /.card-header -->



              <!-- form start -->


     <form name="frm-industry" id="industry" method="post" action="<?php echo base_url();?>/assessment/editAllAssessmentmasteranswer">



                <div class="card-body">



      <div class="form-group">



        <label for="exampleInputEmail1"> Select Choice</label>



        <select name="choice" id="choice" required="required"  onchange="showdata(this);"  class="form-control" >

             <!--<option value="Single">Single Choice</option>-->



            <option value="Multi" selected>Multi Choice </option>



        </select>



      </div>



      <div class="form-group"  id="showoption" >



        <label>Show Answer&nbsp;&nbsp;</label>



        <input type="radio" id="yes" name="answeroption" value="1"<?php echo $answer[0]['answeroption']==1?'checked':'' ?>>



        <label for="yes">Radio</label>&nbsp;&nbsp;



        <input type="radio" id="no" name="answeroption" value="2" <?php echo $answer[0]['answeroption']==2?'checked':'' ?>>



        <label for="no">Check Box</label>



      </div>









    
  
           
 
<div class="form-group">



  <div class="col-md-5" id="multitypeanser"style="float: left;">



    <label for="exampleInputEmail1">Answer</label>


<?php $answeredit=json_decode($answer[0]['answer']);?>
    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $answeredit[0];?>" name="answer[]">
    <input type="hidden" class="form-control" id="exampleInputEmail1" value="<?php echo $answer[0]['id'];?>" name="id">



  </div>



  <div class="col-md-1" style="float: left;">



    <label for="exampleInputEmail1">Marks</label>


<?php $marksedit=json_decode($answer[0]['marks']);?>
    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $marksedit[0];?>"  required="required" name="marks[]">


  </div>
  
  
  
   <div class="col-md-2" style="float:left;">

                    <label for="exampleInputEmail1">Degree</label>
<?php $degreeedit=json_decode($answer[0]['degree_id']);?>

                  


   <select name="degree_id[]" id="degree_id[]" required="required" class="form-control" >
                           
                           
                            <option value="">Select Impact Name</option>


                        <?php 



                          if($degree) {



                            foreach($degree as $deg) {



                        ?>



                        <option value="<?php echo $deg["id"]; ?>" <?php echo $deg['id']==$degreeedit[0]?'selected':'' ?>><?php echo $deg["name"]; ?></option>



                        <?php



                            }



                          }



                        ?>



                    </select>
</div>
  
 
  
  <div class="col-md-2" style="float: left;">
    <label for="exampleInputEmail1">Badge</label>
    <select name="badge_id[]" id="badge_id[]" class="form-control" >
      <option value="0">--Select Badge--</option>
      <?php 
        $badge_opt = "";
        if(!empty($badge)) {
          foreach($badge as $bad) {
            $badge_opt.='<option value="'.$bad['id'].'">'.$bad['badge_name'].'</option>';
          }
        }
        echo $badge_opt;
      ?>
    </select>
  </div>
  <div class="col-md-2" id="showPlus"style="float: left;">
    <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
    <button type="button" class="btn btn-primary" onclick="addAnswerDiv()" ><i class="fa fa-plus"></i></button> 
  </div>
 </div>


    <span class="questionDiv">

            <?php 
              if($answer[0]['answer']) {
                  
                  ?>
                   <?php 
                foreach(json_decode($answer[0]['answer']) as $key=>$desc) {
                 ?><div class="answerDiv"><?php
                    
                  if($key!=0) {
            ?>
            
            <div >
              <div class="col-md-5" style="float:left;">
                  <label for="exampleInputEmail1">&nbsp;</label>
                    <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="answer[]" value="<?php echo $desc; ?>">  
              </div>
              
                    
            </div>
            <?php 
              if($answer[0]['marks']) {
                  
                  $markssmarks=json_decode($answer[0]['marks']) ;
              
                  if($key!=0) {
            ?>
            <div class="answerDiv">
              <div class="col-md-1" style="float:left;">
                  <label for="exampleInputEmail1">&nbsp;</label>
                    <input type="text"  class="form-control" id="exampleInputEmail1" value="<?php echo $markssmarks[$key];?>"  required="required" name="marks[]">  
              </div>
              
                    
            </div>
            
            
            
            <?php        
                  }
            ?>
            <?php
                
              }
              
            ?>
            
            <?php  
            if($answer[0]['degree_id']) {
               $degree_ids=json_decode($answer[0]['degree_id']);
                  if($key!=0) {
            ?>
            
                <div class="form-group">
            
            <div class="col-md-2" style="float:left;">
            
                                <label for="exampleInputEmail1">Degree</label>
            
            
            
                              <select name="degree_id[]" id="degree_id[]" required="required" class="form-control" >
                              
                            
            
            
            
                                    <option value="">Select Degree</option>
            
            
                                    <?php 
            
            
            
                                      if($degree) {
            
            
            
                                        foreach($degree as $degrees) {
            
            
            
                                    ?>
            
            
            
                                    <option value="<?php echo $degrees["id"]; ?>" <?php echo $degrees['id']==$degree_ids[$key]?'selected':'' ?>><?php echo $degrees["name"]; ?></option>
            
            
            
                                    <?php
            
            
            
                                        }
            
            
            
                                      }
            
            
            
                                    ?>
            
            
            
                                </select>
            </div>
            
            
                              </div>
            
            
            <?php        
                  }
            ?>
            <?php
                
              }
            ?>
            
            <?php 
              if($answer[0]['badge_id']) {
              $badgess=json_decode($answer[0]['badge_id']);
                  if($key!=0) {
            ?>
            
                <div class="form-group ">
            
            <div class="col-md-2" style="float:left;">
            
                                <label for="exampleInputEmail1">Badge</label>
            
            
            
                              <select name="badge_id[]" id="badge_id[]" required="required" class="form-control" >
                              
                            
            
            
            
                                    <option value="">Select Badge</option>
            
            
                                    <?php 
            
            
            
                                      if($badge) {
            
            
            
                                        foreach($badge as $badges) {
            
            
            
                                    ?>
            
            
            
                                    <option value="<?php echo $badges["id"]; ?>" <?php echo $badges['id']==$badgess[$key]?'selected':'' ?>><?php echo $badges["badge_name"]; ?></option>
            
            
            
                                    <?php
            
            
            
                                        }
            
            
            
                                      }
            
            
            
                                    ?>
            
            
            
                                </select>
            </div>
            
            <div class="col-md-2" style="float: left;">
                <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                <button type="button" class="btn btn-primary" onclick="addAnswerDiv()" > <i class="fa fa-plus"></i></button>&nbsp;
                <button class="remove_question_block btn btn-danger"> <i class="fa fa-trash"></i>  </button>
            </div>
                    
                      
                              </div>
            
            
            <?php        
                  }
            ?>
            <?php
                
              }
              
            ?>
            <?php        
                  }
            ?>
            <?php ?>
                     </div><?php
                }
            
              }
              
            ?>

    </span>                                  

</div>



                <!-- /.card-body -->







                <div class="card-footer">



                  <button type="submit" class="btn btn-primary">Update</button>



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

function addAnswerDiv(){



      



      $('.questionDiv').append('<div class="answerDiv" >  <div class="form-group"> <div class="col-md-5" id="multitypeanser"style="float: left;"><label for="exampleInputEmail1"></label> <input type="text" class="form-control" id="exampleInputEmail1" name="answer[]">  </div>  <div class="col-md-1" style="float: left;"> <label for="exampleInputEmail1"></label> <input type="text" class="form-control" id="exampleInputEmail1" value=""  required="required" name="marks[]"></div>  <div class="col-md-2" style="float:left;"><label for="exampleInputEmail1"></label> <select name="degree_id[]" id="degree_id[]" required="required" class="form-control" ><option value="">Select Impact Name</option> <?php  if($degree) { foreach($degree as $deg) { ?><option value="<?php echo $deg["id"]; ?>"  ><?php echo $deg["name"]; ?></option><?php }}?></select></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1"></label> <select name="badge_id[]" id="badge_id[]" class="form-control" ><option value="0">--Select Badge--</option><?php $badge_opt = "";if(!empty($badge)) {foreach($badge as $bad) {$badge_opt.='<option value="'.$bad['id'].'">'.$bad['badge_name'].'</option>';}}echo $badge_opt;?></select></div><div class="col-md-2" id="showPlus"style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><div><button type="button" class="btn btn-primary" onclick="addAnswerDiv()" ><i class="fa fa-plus"></i><button class="remove_question_block btn btn-danger"><i class="fa fa-trash"></i></button></button></div></div> </div>')
    }



  $(document).on('click','.remove_question_block',function(){



    $(this).closest('.answerDiv').remove();



  });


</script>
