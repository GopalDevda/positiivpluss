<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ghg Question Management</h1>
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
                <h3 class="card-title">Edit Ghg Question </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="frm-ghg-question" id="ghg-question" method="post" action="<?php echo base_url();?>/master/updateGhgQuestion">
                <input type="hidden" id="ghg_question_id" name="id" value="<?php echo $rs->id ?>" />
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Industry </label>
                    <select name="industry_id" id="industry_id" required="required" class="form-control">
                        <option value="">Select Industry </option>
                        <option value="0" <?php echo $rs->industry_id==0?'selected':'' ?>>All</option>
                        <?php if(!empty($industry)){
                          foreach($industry as $r){?>
                        <option value="<?php echo $r['id'];?>" <?php echo $r['id']==$rs->industry_id?'selected':'' ?>><?php echo $r['industry_name'];?></option>
                       <?php  }
                        }?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Indicator </label>
                    <select name="indicator_id" id="indicator_id" required="required" class="form-control">
                        <option value="">Select Indicator </option>
                        <?php if(!empty($indicator)){
                          foreach($indicator as $r){?>
                        <option value="<?php echo $r['id'];?>" <?php echo $r['id']==$rs->indicator_id?'selected':'' ?>><?php echo $r['indicator_name'];?></option>
                       <?php  }
                        }?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Footprint </label>
                    <select name="footprint_id" id="footprint_id" required="required" class="form-control" onchange="getGhgAjax(this.value);">
                        <option value="">Select Footprint </option>
                        <?php if(!empty($footprint)){
                          foreach($footprint as $r){?>
                        <option value="<?php echo $r['id'];?>" <?php echo $r['id']==$rs->footprint_id?'selected':'' ?>><?php echo $r['footprint_name'];?></option>
                       <?php  }
                        }?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Ghg </label>
                    <select name="ghg_id" id="ghgDiv" required="required" class="form-control">
                        <option value="">Select Ghg </option>
                        <?php 
                          if($ghg) {
                            foreach($ghg as $g) {
                        ?>
                          <option value="<?php echo $g['id'] ?>" <?php echo $g['id']==$rs->ghg_id?'selected':'' ?>><?php echo $g['ghg_name'] ?></option>
                        <?php
                            }
                          }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Ghg Factor </label>
                    <select name="ghg_factor_id" id="ghg_factor_id" required="required" class="form-control">
                        <option value="">Select Ghg Factor </option>
                        <?php if(!empty($ghg_factor)){
                          foreach($ghg_factor as $r){?>
                        <option value="<?php echo $r['id'];?>" <?php echo $r['id']==$rs->ghg_factor_id?'selected':'' ?>><?php echo $r['name'];?></option>
                       <?php  }
                        }?>
                    </select>
                  </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Question</label>
        <textarea class="form-control" id="exampleInputEmail1" required="required" name="question"><?php echo $rs->question ?></textarea>
      </div>
                
      <div class="form-group">
        <label for="exampleInputEmail1">Remark</label>
        <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="remark" value="<?php echo $rs->remark ?>">
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

function getGhgAjax(id=1){
  $.ajax({
        url : "<?php echo base_url()?>/master/getGhgByFootprint/"+id,
        type: "POST",
        //dataType: "JSON",
        success: function(data){
          $('#ghgDiv').html(data);
        },
        error: function(xhr, status, error){
          $('#ghgDiv').html('<option value="">Select Ghg </option>');
        }
    });
}

</script>
