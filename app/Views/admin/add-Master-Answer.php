<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Answer Master</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#" onclick="addDisclosure()"
              class='btn btn-primary'><i class="fa fa-plus"></i> Add Answer</a> </li>
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
                      <h3 class="card-title">Option Answer List</h3>
                    </div>
                    <?php
                    if(!empty($list)){?>
                    <table class="table table-bordered table-hover" id="datatables">
                      <thead>
                        <tr>
                          <th>#</th>
                          
                          
                          <th>Answer</th>
                          <th>Option Answer</th>
                          
                          <th>Action</th>
                          <!-- <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php $s=1;
                        foreach($list as $d){?>
                        
                        <td><?php echo $s;?></td>
                        
                        <td><?php echo $d['answer_name'];?></td>
                        <td><?php $option =  json_decode($d['optionAnswer']);
                           $id=0;  foreach ($option as  $value) {
                                   echo ++$id; echo $value; echo '<br>';
                             }

                      ?></td>
                       
                       
                       
                        
                        
                        
                        <td>
                          <a class="btn btn-primary"   href="javascript:void(0);"
                            onclick="editAnswer(this)"
                            data-name='<?php echo $d['answer_name'];?>'
                            data-id='<?php echo $d['id'];?>'
                           
                          data-optionanser='<?php echo $d['optionAnswer']; ?>'><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-danger"
                            href="<?php echo base_url()?>/AnswerMaster/deletemaster/<?php echo $d['id'];?>"
                            onclick="return confirm('Do you want to delete?');"><i
                            class="fa fa-trash"></i>
                          </a>
                        
                          
                          
                        </td>
                      </tr>
                      <?php $s++;}?>
                    </tbody>
                  </table>
                  <?php } ?>
                </div>
              </div>
            </div>
            </div><!-- /.container-fluid -->
          </section>
        </div>
        
        
        
        <div class="modal fade" id="modal-add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form name="frm-supplier-plan" id="supplier-plan" method="post" action="<?php echo base_url();?>/AnswerMaster/addMasterAnswerSubmit">
                <div class="modal-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Add New Answer</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                      <div class="form-group">
                        
                        
                        <label for="exampleInputEmail1">Name Answer</label>
                        <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="answer_name">
                      </div>
                      <div class="form-group">
                        <div class="col-md-10" style="float:left;">
                          <label for="exampleInputEmail1">Option Answer</label>
                          <!--   <textarea class="textarea" placeholder="Description Here" name="description" style="width: 100%;" ></textarea> -->
                          <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="optionAnswer[]">
                        </div>
                        <div class="col-md-2" style="float:left;">
                          <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                          <button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>
                        </div>
                      </div>
                      <span class="stand_and_classific_div"></span>
                      
                      
                    </div>
                  </div>
                  <!-- /.card-body -->
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
        <div class="modal fade" id="modal-edit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form name="frm-supplier-plan" id="supplier-plan" method="post" action="<?php echo base_url();?>/AnswerMaster/editMasterAnswerSubmit">
                <div class="modal-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Edit  Answer</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                      <div class="form-group">
                        
                        
                        <label for="exampleInputEmail1">Name Answer</label>
                        <input type="text"  class="form-control" id="editAnswer" required="required"  name="answer_name">
                        <input type="hidden"  class="form-control" id="id" required="required"  name="answerid">
                      </div>
                      <div class="form-group">
                        <!-- <div class="col-md-10" style="float:left;">
                          <label for="exampleInputEmail1">Option Answer</label>
                            <textarea class="textarea" placeholder="Description Here" name="description" style="width: 100%;" ></textarea>
                          <input type="text"  class="form-control" id="optionanswer" required="required" name="optionAnswer[]">
                        </div> -->
                        <div id="option_show"></div>
                        <div class="col-md-2" style="float:left;">
                          <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
                          <button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>
                        </div>
                      </div>
                      <span class="stand_and_classific_div"></span>
                      
                      
                    </div>
                  </div>
                  <!-- /.card-body -->
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

      </div>
      
      
      
      
      
      
      <!--Sub Disclousre Add Form End-->
      <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
      crossorigin="anonymous"></script>
     
      <script>

  function addStandAndClassificDiv(){

      $('.stand_and_classific_div').append('<div class="standDiv"><div class="form-group"><div class="col-md-10" style="float: left;"><label for="exampleInputEmail1">&nbsp;</label><input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="optionAnswer[]"></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');



    }







  $(document).on('click','.remove_stand_and_classific_block',function(){







    $(this).closest('.standDiv').remove();







  });  

</script>
      <script>

 function editAnswer(that) {
                   

                        
                    var name = $(that).attr('data-name');
                    var id = $(that).attr('data-id');
                    var option_answer = $(that).attr('data-optionanser');
                   

                    $.ajax({

                    url: "<?php echo base_url()?>/AnswerMaster/option_answer_show/" + id,
                    type: "POST",
                    //dataType: "JSON",
                    success: function(data) {
                        // alert(data);
                    // $("#show_type_optionanswer").html(data);
                    $("#option_show").html(data);

                    },
                    error: function(xhr, status, error) {
                    }

                    });
                
                 
                   
                    $('#editAnswer').val(name);
                    
                    $('#id').val(id);
                    // $('#action_id').val(action);
                   
                    $('#modal-edit').modal('show');

                    }
</script>

<script>
       function addDisclosure() {
      $('#modal-add').modal('show');
      }
      </script>
      <?php include('include/footer.php');?>