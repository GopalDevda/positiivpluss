<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Pro Assessment Question Management</h1>

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

                <h3 class="card-title">Add New Pro Assessment Question </h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form name="frm-industry" id="industry" method="post" action="<?php echo base_url();?>/assessment/updateProAssessmentQuestion">

                <input type="hidden" id="assessment_id" name="id" value="<?php echo $rs->id ?>" />

                <div class="card-body">



                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Industry </label>

                    <select name="industry_id" id="industry_id" required="required" class="form-control">

                        <option value="">Select Industry </option>
                        <option value="0" <?= $rs->industry_id==0?'selected':'' ?>> All </option>
                        <?php if(!empty($industry)){

                          foreach($industry as $r){?>

                        <option value="<?php echo $r['id'];?>" <?= $r['id']==$rs->industry_id?'selected':'' ?>><?php echo $r['industry_name'];?></option>

                       <?php  }

                        }?>

                    </select>

                  </div>


                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Location </label>

                    <select name="location_id" id="location_id" required="required" class="form-control">

                        <option value="">Select Location </option>
                        <option value="0" <?= $rs->location==0?'selected':'' ?>>All</option>

                        <?php 
                          if($country) {
                            foreach($country as $c) {
                        ?>
                          <option value="<?php echo $c['id'] ?>" <?= $c['id']==$rs->location?'selected':'' ?>><?php echo $c['name'] ?></option>
                        <?php                              
                            }
                          }
                        ?>

                    </select>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1">Select Company Size </label>

                    <select name="company_id" id="company_id" required="required" class="form-control">

                        <option value="">Select Industry </option>
                        <option value="0" <?= $rs->company==0?'selected':'' ?>>All</option>

                        <?php 
                          if($company) {
                            foreach($company as $c) {
                        ?>
                          <option value="<?php echo $c['id'] ?>" <?= $c['id']==$rs->company?'selected':'' ?>><?php echo $c['company_size'] ?></option>
                        <?php                              
                            }
                          }
                        ?>

                    </select>

                  </div>


                  <div class="form-group">

                    <label for="exampleInputEmail1"> Select Indicator Category</label>

                    <select name="indicator_category_id" id="indicator_category_id" required="required" class="form-control" onchange="getIndicatorAjax(this.value);">

                        <option value="">Select Indicator Category </option>

                        <?php if(!empty($indicator_category)){

                          foreach($indicator_category as $r){?>

                        <option value="<?php echo $r['id'];?>" <?= $r['id']==$rs->indicator_category_id?'selected':'' ?>><?php echo $r['indicator_category_name'];?></option>

                       <?php  }

                        }?>

                    </select>

                  </div>

                  <div class="form-group">

                    <label for="exampleInputEmail1"> Select Indicator Category</label>

                    <select name="indicator_id" id="indicatorDiv" required="required" class="form-control" >

                        <option value="">Select Indicator </option>

                        <?php 

                          if(!empty($indicator)) {

                            foreach($indicator as $indi) {

                        ?>

                        <option value="<?php echo $indi["id"] ?>" <?= $indi["id"]==$rs->indicator_id?'selected':'' ?>>

                          <?php echo $indi["indicator_name"] ?>

                        </option>

                        <?php

                            }

                          }

                        ?>

                    </select>

                  </div>


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

        <select name="choice" id="choice" required="required" class="form-control" >

            <option value="">Select Choice</option>

            <option value="Single" <?= $rs->choice=="Single"?'selected':'' ?>>Single Choice</option>

            <option value="Multi" <?= $rs->choice=="Multi"?'selected':'' ?>>Multi Choice </option>

        </select>

      </div>



      <div class="form-group">

        <label for="exampleInputEmail1">Remark</label>

        <input type="text"  class="form-control" id="exampleInputEmail1" name="remark" value="<?php echo $rs->remark ?>">

      </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Disclosure </label>
                    <select name="disclosure_id" id="disclosure_id" class="form-control">
                        <option value="">Select Disclosure </option>
                        <?php if(!empty($disclosure)){
                          foreach($disclosure as $r){?>
                        <option value="<?php echo $r['id'];?>" <?= $r['id']==$rs->disclosure_id?'selected':'' ?>><?php echo $r['disclosure_name'];?></option>
                       <?php  }
                        }?>
                    </select>
                  </div>

      <div class="form-group">

        <div class="col-md-5" style="float: left;">

          <label for="exampleInputEmail1">Standard</label>

          <select name="standard[]" id="standard[]" class="form-control" onchange="getProClassification(this.value,0);">

            <option value="">Select Standard</option>

            <?php 

              $stand_opt = "";

              if(!empty($standard)) {

                foreach($standard as $stand) {

                  $stand_opt.='<option value="'.$stand['id'].'">'.$stand['standard_name'].'</option>';

            ?>

            <?php

                }

              }

              echo $stand_opt;

            ?>

          </select>

        </div>

        <div class="col-md-5" style="float: left;">

          <label for="exampleInputEmail1">Classification</label>

          <select name="classification[]" id="classificationDiv_0" class="form-control" >

            <option value="">Select Classification</option>

          </select>

        </div>

        <div class="col-md-2" style="float: left;">

          <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>

          <button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button> 

        </div>

      </div>

      <span class="stand_and_classific_div"></span>



      <div class="form-group">

        <label>Document Needed&nbsp;&nbsp;</label>

        <input type="radio" id="yes" name="doc_needed_status" value="1" <?php echo $rs->is_document_needed==1?'checked=checked':'' ?>>

        <label for="yes">YES</label>&nbsp;&nbsp;

        <input type="radio" id="no" name="doc_needed_status" value="0" <?php echo $rs->is_document_needed==0?'checked=checked':'' ?>>

        <label for="no">NO</label>

      </div>

           

<div class="form-group">

  <div class="col-md-5" style="float: left;">

    <label for="exampleInputEmail1">Answer</label>

    <input type="text" class="form-control" id="exampleInputEmail1" name="answer[]">

  </div>

  <div class="col-md-1" style="float: left;">

    <label for="exampleInputEmail1">Marks</label>

    <input type="text" class="form-control" id="exampleInputEmail1" name="marks[]">

    </textarea>

  </div>



  <div class="col-md-2" style="float: left;">

    <label for="exampleInputEmail1">Degree</label>

    <select name="degree_id[]" id="degree_id[]" required="required" class="form-control" >

      <?php 

        $degree_opt = "";

        if(!empty($degree)) {

          foreach($degree as $deg) {

            $degree_opt.='<option value="'.$deg['id'].'">'.$deg['name'].'</option>';

          }

        }

        echo $degree_opt;

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

  <div class="col-md-2" style="float: left;">

    <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>

    <button type="button" class="btn btn-primary" onclick="addAnswerDiv()" ><i class="fa fa-plus"></i></button> 

  </div>

</div>

<span class="questionDiv"></span>

                 

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

  function addAnswerDiv(){

      degree_opt = '<?php echo $degree_opt ?>';
      badge_opt = '<?php echo $badge_opt ?>';

      $('.questionDiv').append('<div class="answerDiv" ><div class="form-group"><div class="col-md-5" style="float: left;">   <label for="exampleInputEmail1">Answer</label><input type="text" class="form-control" id="exampleInputEmail1" required="required" name="answer[]"></div><div class="col-md-1" style="float: left;"><label for="exampleInputEmail1">Marks</label><input type="text" class="form-control" id="exampleInputEmail1" required="required" name="marks[]"></textarea></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1">Degree</label><select name="degree_id[]" id="degree_id[]" required="required" class="form-control" >'+degree_opt+'</select></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1">Badge</label><select name="badge_id[]" id="badge_id[]" class="form-control" ><option value="0">--Select Badge--</option>'+badge_opt+'</select></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addAnswerDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_question_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>')

    }

  $(document).on('click','.remove_question_block',function(){

    $(this).closest('.answerDiv').remove();

  });



    function getProClassification(id,i) {

      $.ajax({

            url : "<?php echo base_url()?>/assessment/getProClassification/"+id,

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

      $('.stand_and_classific_div').append('<div class="standDiv"><div class="form-group"><div class="col-md-5" style="float: left;"><label for="exampleInputEmail1">Classification</label><select name="standard[]" id="standard[]" required="required" class="form-control" onchange="getProClassification(this.value,'+i+');"><option value="">Select Classification</option>'+stand_opt+'</select></div><div class="col-md-5" style="float: left;"><label for="exampleInputEmail1">Classification</label><select name="classification[]" id="classificationDiv_'+i+'" required="required" class="form-control" ><option value="">Select Classification</option></select></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');

      i+=1;

    }

  $(document).on('click','.remove_stand_and_classific_block',function(){

    $(this).closest('.standDiv').remove();

  });



</script>