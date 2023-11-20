<?php include('include/header.php'); ?> <?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> <?php echo $heading; ?> </h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="<?php echo base_url();?>/assessment/alladvanceassessmentQuestion/<?php echo $title;?>" class='btn btn-primary'><i class="fa fa-plus"></i> Add <?php echo $heading; ?> </a> </li>

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
              <h3 class="card-title"><?php echo $heading; ?>  List</h3>
            </div> <?php 



    if(!empty($list)){?> <table class="table table-bordered table-hover" id="datatables">
              <thead>
                <tr>
                  <th>#</th>
                 
                  <th>Question Title</th>
                  <th>Question</th>
                  <th>Choice</th>
                   <!--<th>Disclosure</th>-->
                  <th>Answers</th>
                  <th>Mandatary</th>
                  <th>Remark</th>
                  <!--<th>Indicator Category</th>-->
                  <!--<th>Indicator</th>-->
                  <th>Document Needed</th>
                  <th>Action</th>
                </tr>
              </thead> <?php $s=1;



    foreach($list as $d){?> <tr>
                <td> <?php echo $s;?> </td>
                
               
                <td> <?php echo $d['question_title'];?> </td>
                <td> <?php echo $d['question'];?> </td>
                <td> <?php echo $d['choice'];?> </td>
              
                <td>
                  <a class="btn btn-primary" href="#" onclick="show_answers('<?php echo $d['assessment_id'] ?>')" data-id='<?php echo $d['assessment_id'] ?>' data-name='' data-number=''><i class="fa fa-eye"></i>
                  </a>
                </td>
                <td> <?php 

            if($d["is_mandatory_needed"] == 1) {

              echo "YES";

            }

            else {

              echo "NO";

            }

          ?> </td>
                </td>
                <td> <?php echo $d['remark'];?> </td>
               
                <td> <?php 

            if($d["is_document_needed"] == 1) {

              echo "YES";

            }

            else {

              echo "NO";

            }

          ?> </td>
                <td>
                  <a class="btn btn-primary" href="
                    <?php echo base_url()?>/assessment/editAllAdvanceAssessmentQuestion/<?php echo $d['assessment_id'];?>" onclick="" data-name='' data-number=''>
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a class="btn btn-danger" href="
                    <?php echo base_url()?>/assessment/deleteAllAdvanceAssessmentQuestion/<?php echo $d['assessment_id'];?>/<?php echo $title;?>" onclick="return confirm('Do you want to delete?');">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>
              </tr> <?php $s++;}?>
            </table> <?php } ?>
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
        <?php echo base_url();?>/assessment/editAllAnswer/<?php echo $title;?>">
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
              <?php echo base_url();?>/assessment/editAllStandard/"<?php echo $title;?>>
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
                <select name="standard_id" id="standard_id" required="required" class="form-control" onchange="getProClassification(this.value);">
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
      url: "<?php echo base_url()?>/assessment/getalladvanceAnswers/"+id,
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
      url: "<?php echo base_url()?>/assessment/getAllStandards/"+id,
      type: "POST",
      //dataType: "JSON",
      success: function(data) {
        $('#standard_div').html(data);
        $('#modal-standard').modal('show');
      },
    });
  }

  function getProClassification(id) {
    $.ajax({
        url: " <?php echo base_url()?>/assessment/getProClassification/"+id,
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