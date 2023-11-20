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



              <form name="frm-industry" id="industry" method="post" action="<?php echo base_url();?>/assessment/addAllAssessmentQuestion">



                <div class="card-body">







<input type="hidden"  class="form-control" required="required" value="<?= $indi_cat_id ?>" name="indicatid">
      <input type="hidden"  class="form-control" required="required" value="<?= $indi_id ?>" name="indiid">




      <div class="form-group">
        <label for="exampleInputEmail1">Question Title</label>
        <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="question_title">
      </div>
      <div class="form-group">



        <label for="exampleInputEmail1">Question</label>



        <textarea class="form-control" id="exampleInputEmail1" required="required" name="question"></textarea>



      </div>



                



      <div class="form-group">



        <label for="exampleInputEmail1"> Select Choice</label>



        <select name="choice" id="choice" required="required"  onchange="showanswertype(this);"class="form-control" >



            <option value="">Select Choice</option>



            <option value="Single">Single Choice</option>



            <option value="Multi">Multi Choice </option>



        </select>



      </div>







      <div class="form-group">



        <label for="exampleInputEmail1">Remark</label>



        <input type="text"  class="form-control" id="exampleInputEmail1"  name="remark">
        
        <input type="hidden"  class="form-control" id="exampleInputEmail1" value="<?php echo $title;?>" name="assess">




      </div>

      <div class="form-group">



                    <label for="exampleInputEmail1"> Select Standard</label>



                     <select name="standard" id="standard[]" class="form-control"
                                                            onchange="getClassification(this.value,0);">



                        <option value="">Select standard</option>



                        <?php if(!empty($standard)){



                          foreach($standard as $r){?>



                        <option value="<?php echo $r['id'];?>"><?php echo $r['standard_name'];?></option>



                       <?php  }



                        }?>



                    </select>



                  </div> 
                        <div class="form-group">

                                                        <label for="exampleInputEmail1">Classification</label>
                                                        <select name="classification" onchange="getSubClassification(this.value,0);" id="classificationDiv_0" class="form-control">
                                                            <option value="">Select Classification</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Sub Classification</label>
                                                        <select name="sub_classification_name0[]" id="sub_classification_name_0" class="form-control select2" multiple="multiple">
                                                            <option value="">Select Sub Classification name</option>
                                                        </select>
                                                    </div>

                 <!--  <div class="form-group">



                    <label for="exampleInputEmail1"> Select Indicator Category</label>



                    <select name="indicator_category_id" id="indicator_category_id" required="required" class="form-control" onchange="getIndicatorAjax(this.value);">



                        <option value="">Select Indicator Category </option>



                        <?php if(!empty($indicator_category)){



                          foreach($indicator_category as $r){?>



                        <option value="<?php echo $r['id'];?>"><?php echo $r['indicator_category_name'];?></option>



                       <?php  }



                        }?>



                    </select>



                  </div>



                  <div class="form-group">



                    <label for="exampleInputEmail1"> Select Indicator </label>



                    <select name="indicator_id" id="indicatorDiv" required="required" class="form-control" >



                        <option value="">Select Indicator </option>



                        



                    </select>



                  </div> -->
                 
                  
                 
                  <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Select Disclosure </label>
                    <select name="disclosure_id" id="disclosure_id"  class="form-control">
                        <option value="">Select Disclosure </option>
                        <?php if(!empty($disclosure)){
                          foreach($disclosure as $r){?>
                        <option value="<?php echo $r['id'];?>"><?php echo $r['disclosure_name'];?></option>
                       <?php  }
                        }?>
                    </select>
                  </div> -->
                  
                  
         <div class="form-group" >
                    
        <label for="exampleInputEmail1"> Select Answer</label>

        <div id="ANSWER"></div>



      
                  </div>





     <!--Start -->
      <!--<div class="form-group">-->



      <!--  <div class="col-md-5" style="float: left;">-->



      <!--    <label for="exampleInputEmail1">Standard</label>-->



      <!--    <select name="standard[]" id="standard[]"  class="form-control" onchange="getClassification(this.value,0);">-->



      <!--      <option value="">Select Standard</option>-->



            <?php 



              $stand_opt = "";



            //   if(!empty($standard)) 
            {



            //     foreach($standard as $stand) 
            {



                //   $stand_opt.='<option value="'.$stand['id'].'">'.$stand['standard_name'].'</option>';



            ?>



            <?php



                }



              }



            //   echo $stand_opt;



            ?>



      <!--    </select>-->



      <!--  </div>-->



      <!--  <div class="col-md-5" style="float: left;">-->



      <!--    <label for="exampleInputEmail1">Classification</label>-->



      <!--    <select name="classification[]" id="classificationDiv_0"  class="form-control" >-->



      <!--      <option value="">Select Classification</option>-->



      <!--    </select>-->



      <!--  </div>-->



      <!--  <div class="col-md-2" style="float: left;">-->



      <!--    <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>-->



      <!--    <button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button> -->



      <!--  </div>-->



      <!--</div>-->



      <!--<span class="stand_and_classific_div"></span>-->


<!--End here-->













      <div class="form-group">



        <label>Document Needed&nbsp;&nbsp;</label>



        <input type="radio" id="yes" name="doc_needed_status" value="1">



        <label for="yes">YES</label>&nbsp;&nbsp;



        <input type="radio" id="no" name="doc_needed_status" value="0" checked="checked">



        <label for="no">NO</label>



      </div>
      
      <div class="form-group">



        <label>Mandatory &nbsp;&nbsp;</label>



        <input type="radio" id="yes" name="mandatory_needed_status" value="1">



        <label for="yes">YES</label>&nbsp;&nbsp;



        <input type="radio" id="no" name="mandatory_needed_status" value="0" checked="checked">



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

  function getSubClassification(id, i) {
                    $.ajax({
                    url: "<?php echo base_url()?>/assessment/getSubClassification/" + id,
                    type: "POST",
                    //dataType: "JSON",
                    success: function(data) {
                    $('#sub_classification_name_' + i).html(data);
                    },
                    error: function(xhr, status, error) {
                    $('#sub_classification_name_' + i).html('<option value="">Select Sub Classification</option>');
                    }
                    });
                    }
</script>

<script type="text/javascript">










    function getClassification(id,i) {



      $.ajax({



            url : "<?php echo base_url()?>/assessment/getClassification/"+id,



            type: "POST",



            //dataType: "JSON",



            success: function(data){



              $('#classificationDiv_'+i).html(data);



            },



            error: function(xhr, status, error){



              $('#classificationDiv_'+i).html('<option value="">Select Classification</option>');



            }



        });



    }



  var i=1;



  function addStandAndClassificDiv(){



      stand_opt = '<?php echo $stand_opt ?>';



      $('.stand_and_classific_div').append('<div class="standDiv"><div class="form-group"><div class="col-md-5" style="float: left;"><label for="exampleInputEmail1">Classification</label><select name="standard[]" id="standard[]" required="required" class="form-control" onchange="getClassification(this.value,'+i+');"><option value="">Select Classification</option>'+stand_opt+'</select></div><div class="col-md-5" style="float: left;"><label for="exampleInputEmail1">Classification</label><select name="classification[]" id="classificationDiv_'+i+'" required="required" class="form-control" ><option value="">Select Classification</option></select></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');



      i+=1;



    }



  $(document).on('click','.remove_stand_and_classific_block',function(){



    $(this).closest('.standDiv').remove();



  });



function showanswertype(that){
            // alert('test');
             var id = $(that).val();
            //   alert(id);
              
              
                            $.ajax({

                        url : "<?php echo base_url()?>/assessment/getallallAnswers/"+id,
            
                        type: "GET",
            
                        success: function(data){
                            
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