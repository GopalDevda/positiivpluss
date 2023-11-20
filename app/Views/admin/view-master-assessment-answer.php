<?php include('include/header.php'); ?> <?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> <?php echo $title; ?> </h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="<?php echo base_url();?>/assessment/addallmasterassessmentanswer" class='btn btn-primary'><i class="fa fa-plus"></i> Add Master Assessment Answer </a> </li>

            </ol>

          </div><!-- /.col --> 
        
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid"> <?php 



if($session->get('success')){?> <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <?php echo $session->get('success');?>
      </div> <?php } ?> <?php 



if($session->get('error')){?> <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <?php echo $session->get('error');?>
      </div> <?php } ?> <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Master Answer </h3>
            </div> 
 <table class='table table-bordered table-hover'>

       <tr>

       <th>#</th>

       <th>Answer</th>
       
       <!--<th>choice</th>-->

       <th>Marks</th>

       <th>Degree</th>
       <th>Badge</th>
       <th>Action</th>

       </tr>
<?php 

        if(!empty($answers)){

            $s=1;

            foreach($answers as $key=>$ans){
?>
               <tr>

               <td><?php echo $s;?></td>
               
               <!--Answer Show start        --> 
<?php if($ans['choice']=='Multi'){ ?>
               <td>

<?php $answerJson= json_decode($ans['answer']);?>
                    <ul>

 
<?php 
     foreach($answerJson as $key=>$desc) {
?>
  <li><?php echo $desc;?></li>
        <?php }  ?>
  
 </ul>
               
          </td>
          
          <?php }else{ ?> 
          <td><?php echo $ans['answer']; ?></td> <?php } ?>
         
               <!--<td>-->

               <!--<?php echo $ans['answer'];?>-->

               <!--</td>-->

       <!--Answer Show End        -->
       
       
       <!--Marks Show start        -->
       
<?php if($ans['choice']=='Multi'){ ?>
               <td>

<?php $marksJson= json_decode($ans['marks']);?>
                    <ul>

 
<?php 
     foreach($marksJson as $key=>$descmark) {
?>
  <li><?php echo $descmark;?></li>
        <?php }  ?>
  
 </ul>
               
          </td>
          
          <?php }else{ ?> 
          <td><?php echo $ans['marks']; ?></td> <?php } ?>
          
          
<!--Marks Show End        -->




<!--Degree Show start        -->
       
<?php if($ans['choice']=='Multi'){ ?>
               <td>

<?php $degreeJson= json_decode($ans['degree_id']);?>
                    <ul>

 
<?php 
     foreach($degreeJson as $key=>$descdegree) {
?>
  <li><?php echo $descdegree;?></li>
        <?php }  ?>
  
 </ul>
               
          </td>
          
          <?php }else{ ?> 
          <td><?php echo $ans['degree_id']; ?></td> <?php } ?>
          
          
<!--Degree Show End        -->
              
               <td>
                <?php echo$ans["badge_id"].($ans["badge_name"])?$ans["badge_name"]:'NA';?>
               

               </td>
               <td>
<?php if($ans['choice']=='Multi'){ ?>
                <a class="btn btn-primary" href="<?php echo base_url() ?>/assessment/editmasteranser/<?php echo $ans['id'] ?>" ><i class="fa fa-pencil"></i></a>

<?php } else{?>
<a class='btn btn-primary' href='#' onclick='editSdg(this)' data-id="<?php echo $ans['id'];?>" 
               
               data-answer="answer" data-marks="<?php echo $ans['marks'];?>" data-degree="<?php echo $ans['degree_id'];?>" 
               
               data-badge="<?php echo $ans['badge_id'];?>"  ><i class='fa fa-pencil'></i></a>



<?php }  ?>
               <a class='btn btn-danger' href='<?php echo base_url();?>/assessment/deleteMasterAnswer/<?php echo $ans['id'];?>' onclick='return confirm(\"Do you want to delete?\");' data-name='' data-number='' ><i class='fa fa-trash'></i></a>

               </td>

               </tr>
<?php
                $s++;

             }

        }
?>
       </table>

    
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
</div> <?php include('include/footer.php');?> <div class="modal fade" id="modal-answer">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Answers</h3>
          </div>
          <div class="card-body" id="answer_div"></div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" name="sdg-form" id="sdf-form" action="
        <?php echo base_url();?>/assessment/editMasterAnswer">
        <input type="hidden" name="id" id="answer_id" value="" required="required">
        <input type="hidden" name="baq_id" id="baq_id" value="" />
        <div class="modal-body" style="height:400px;overflow-y: scroll;">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Answer</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Answer</label>
                <input type="text" required="required" class="form-control" placeholder="Enter Answer" name="answer" id="answer">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Marks</label>
                <input type="text" required="required" class="form-control" placeholder="Enter Marks" name="marks" id="marks">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Degree</label>
                <select name="degree_id" id="degree_id" required="required" class="form-control"> <?php 
                        if(!empty($degree)) {
                          foreach($degree as $deg) {
                      ?> 
                      <option id="degree_<?php echo $deg['id'] ?>" value="<?php echo $deg['id'] ?>"> <?php echo $deg['name'] ?> </option> 
                      <?php
                          }
                        }
                      ?>
                  <!--                       <option value="1" id="degree_1">1st - High Risk - No</option><option value="2" id="degree_2">2nd - Medium Risk - Yes</option><option value="3" id="degree_3">3rd - Low Risk - Yes</option><option value="4" id="degree_4">4th - Good Practise - Yes</option><option value="5" id="degree_5">5th - Excellent - Yes</option> -->
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Badge</label>
                <select name="badge_id" id="badge_id" class="form-control"> 
                  <option value="0">--Select Badge--</option>
                      <?php 
                        if(!empty($badge)) {
                          foreach($badge as $bad) {
                      ?> 
                      <option value="<?php echo $bad['id'] ?>"> <?php echo $bad['badge_name'] ?> </option> 
                      <?php
                          }
                        }
                      ?>
                </select>
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
<div class="modal fade" id="modal-standard">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Standards</h3>
          </div>
          <div class="card-body" id="standard_div"></div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-standard-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" name="sdg-form" id="sdf-form" action="
              <?php echo base_url();?>/assessment/editStandard">
        <input type="hidden" name="id" id="assessment_question_standard_id" value="" required="required">
        <div class="modal-body">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Standard</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Standard</label>
                <select name="standard_id" id="standard_id" required="required" class="form-control" onchange="getClassification(this.value);">
                  <option value="">Select Standard</option> <?php 

                        if(!empty($standard)) {

                          foreach($standard as $stand) {

                      ?> <option id="standard_
                            <?php echo $stand['id'] ?>" value="
                            <?php echo $stand['id'] ?>"> <?php echo $stand['standard_name'] ?> </option> <?php

                          }

                        }

                      ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Classification</label>
                <select name="classification_id" id="classificationDiv" required="required" class="form-control"> <?php 

                        if(!empty($classification)) {

                          foreach($classification as $classific) {

                      ?> <option id="classification_
                            <?php echo $classific['id'] ?>" value="
                            <?php echo $classific['id'] ?>"> <?php echo $classific['classification_name'] ?> </option> <?php

                          }

                        }

                      ?> </select>
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
  function editSdg(that) {
    $('#modal-answer').modal('hide');
    var id = $(that).attr('data-id');
    var answer = $(that).attr('data-answer');
    var marks = $(that).attr('data-marks');
    var degree = $(that).attr('data-degree');
    var badge = $(that).attr('data-badge');
    var baq_id = $(that).attr('data-baqid');
    $('#answer_id').val(id);
    $('#answer').val(answer);
    $('#marks').val(marks);
    $('#degree_id').val(degree);
    $('#badge_id').val(badge);
    $('#baq_id').val(baq_id);
    $('#modal-edit').modal('show');
  }

  function editStandard(that) {
    $('#modal-standard').modal('hide');
    var id = $(that).attr('data-id');
    var standard = $(that).attr('data-standard');
    var classification = $(that).attr('data-classification');
    $('#assessment_question_standard_id').val(id);
    // $("#standard_"+standard).attr("selected","selected");
    $('#standard_id').val(standard);
    // $("#classification_"+classification).attr("selected","selected");
    $('#classificationDiv').val(classification);
    $('#modal-standard-edit').modal('show');
  }

  function show_answers(id) {
    $.ajax({
      url: "<?php echo base_url()?>/assessment/getAnswers/"+id,
      type: "POST",
      //dataType: "JSON",
      success: function(data) {
        $('#answer_div').html(data);
        $('#modal-answer').modal('show');
      },
    });
  }

  function show_standards(id) {
    $.ajax({
      url: "<?php echo base_url()?>/assessment/getStandards/"+id,
      type: "POST",
      //dataType: "JSON",
      success: function(data) {
        $('#standard_div').html(data);
        $('#modal-standard').modal('show');
      },
    });
  }

  function getClassification(id) {
    $.ajax({
        url: " < ? php echo base_url() ? > /assessment/getClassification / "+id,
        type: "POST",
        //dataType: "JSON",
        success: function(data) {
          $('#classificationDiv').html(data);
        },
        error: function(xhr, status, error) {
          $('#classificationDiv').html(' < option value = "" > Select Classification < /option>');
          }
        });
    }
</script>