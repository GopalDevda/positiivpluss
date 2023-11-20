<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Supplier Assessment Management</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="#" class='btn btn-primary'><i class="fa fa-plus"></i> Add Supplier</a> </li>

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

                <h3 class="card-title">Supplier Assessment List</h3>

              </div>

        

    <?php 



    if(!empty($list)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead><tr><th>#</th><th>Indicator Category Name </th><th>Indicator Name </th><th>Question </th><th>Answer </th><th>Marks</th><th>Document</th><th>Degree</th></tr></thead>

    <tbody>

    <?php $s=1;



    foreach($list as $d){?>

      <tr>

        <td><?php echo $s;?></td>

        <?php if(!empty($d['question']['indicator_category_name'])) { ?>       

        <td><?php echo $d['question']['indicator_category_name'];?></td>

        <?php } ?>

        <?php if(!empty($d['question']['sdg_name'])) { ?>       

        <td><?php echo $d['question']['sdg_name'];?></td>

        <?php } ?>

        <td><?php if(!empty($d['question'])) echo $d['question']['indicator_name'];?></td>

        <td><?php if(!empty($d['question'])) echo $d['question']['question'];?></td>

        <td><?php if(!empty($d['answer'])) echo $d['answer']['answer'];?></td>

        <td><?php if(!empty($d['answer'])) echo $d['answer']['marks'];?></td>       

        <td>

          <a class="btn btn-primary" href="#" onclick="show_doc(<?php echo $d['supplier_base_assessment']['supplier_assessment_id'] ?>,<?php echo $d['supplier_base_assessment']['base_assessment_question_id'] ?>)" ><i class="fa fa-eye"></i></a>          

        </td>          

        <td id="deg_<?php echo $d['supplier_base_assessment']['base_assessment_question_id']; ?>">
        <?php
        if($d['supplier_base_assessment']['degree_id']) {
        ?>
        <a class="btn btn-primary">Verified</a>
        <?php
        }
        else {
        ?>
        <a class="btn btn-primary" onclick="show_remark(<?php echo $d['supplier_base_assessment']['supplier_assessment_id'] ?>,<?php echo $d['supplier_base_assessment']['base_assessment_question_id'] ?>)">Verify</a>
      <?php
        }          
      ?>

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

<?php include('include/footer.php');?>



      <div class="modal fade" id="modal-doc">



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



                <h3 class="card-title">Documents</h3>



              </div>



             



                <div class="card-body" id="doc_div">





                </div>



              



            </div>



             </div>



          </div>







          <!-- /.modal-content -->



        </div>



        <!-- /.modal-dialog -->



      </div>


      <div class="modal fade" id="remark-doc">



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



                <h3 class="card-title">Remark</h3>



              </div>



             



                <div class="card-body" id="remark_doc_div">
        <input type="hidden" id="said" name="said" />
        <input type="hidden" id="baqid" name="baqid" />
        <div class="form-group">
          <label>Degree</label>
        <select class="btn btn-primary" id="remark_degree" class="form-control">

        <option value="">Select Degree </option>

        <?php

          if($degree) {

            foreach($degree as $deg) {

        ?>

        <option value="<?php echo $deg['id']; ?>"><?php echo $deg['name']; ?></option>

        <?php              

            }

          }

        ?>

        </select>
      </div>
        <div class="form-group">
          <label>Remark</label>
        <textarea id="remark" name="remark" class="form-control"></textarea>
      </div>
        <button type="button" class="btn btn-secondary" onclick="submit_remark()">Verify</button>


                </div>



              



            </div>



             </div>



          </div>







          <!-- /.modal-content -->



        </div>



        <!-- /.modal-dialog -->



      </div>


<script>

  function set_degree(that,id) {

    degree_id = $(that).val();

    $.ajax({

          url : "<?php echo base_url()?>/master/setDegree/"+id+"/"+degree_id,

          type: "POST",

          //dataType: "JSON",

          success: function(data){

            // alert('success');

          },

        });

  }



    function show_doc(supplier_assessment_id,base_assessment_question_id) {

      $.ajax({

            url : "<?php echo base_url()?>/master/getDocument/"+supplier_assessment_id+"/"+base_assessment_question_id,

            type: "POST",

            //dataType: "JSON",

            success: function(data){

              $('#doc_div').html(data);

              $('#modal-doc').modal('show');

            },

        });

    }

    function show_remark(said,baqid) {
      $("#said").val(said);
      $("#baqid").val(baqid);
      $('#remark-doc').modal('show');      
    }

    function submit_remark() {
      var supplier_assessment_id=$("#said").val();
      var base_assessment_question_id=$("#baqid").val();
      var remark = $("#remark").val();
      var remark_degree = $("#remark_degree").val();
      $.ajax({

            url : "<?php echo base_url()?>/master/setDegree/"+supplier_assessment_id+"/"+base_assessment_question_id+"/"+remark+"/"+remark_degree,

            type: "POST",

            //dataType: "JSON",

            success: function(data){

              $('#doc_div').html(data);
              $("#remark_degree").val("");
              $("#remark").val("");
              $('#remark-doc').modal('hide');
              $("#deg_"+base_assessment_question_id+" a").html("Verified");

            },

        });

    }

</script>

