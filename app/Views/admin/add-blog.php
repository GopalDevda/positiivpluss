<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Blog Management</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blog </li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>/blog/viewBlog" class="btn btn-primary">View Blog</a> </li>
          </ol>
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.container-fluid --> 
  </div>
  <!-- /.content-header --> 
  <!-- Main content -->
  
  <section class="content">
    <div class="container-fluid">
      <?php
	if($session->get('success')){?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $session->get('success');?> </div>
      <?php } ?>
      <?php
	if($session->get('error')){?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $session->get('error');?> </div>
      <?php } ?>
      <div class="row"> 
        <!-- left column -->
        <div class="col-md-12"> 
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Blog </h3>
            </div>
            <!-- /.card-header --> 
            <!-- form start -->
					<form name="frm-industry" id="industry" method="post" action="<?php echo base_url();?>/blog/addBlogSub" enctype="multipart/form-data">
						<div class="card-body">
							<div class="row">
								<div class="form-group col-md-4">
									<label for="exampleInputEmail1">Type</label>
									<select name="type" class="form-control" id="type" required="required" onchange="getReport(this.value)">
										<option value="">Select Type</option>
										<option value="Article">Articles</option>
										<option value="Survey">Survey</option>
										<option value="Report">Reports</option>
										<option value="Webinar">Webinar</option>
									</select>
								</div>
								<div class="form-group col-md-4" id="urlDiv" style="display:none;">
									<label for="name_facilities">URL</label>
									<input type="text" class="form-control" id="url" name="url" placeholder="URL" >
								</div>
								<div class="form-group col-md-4" id="reportDiv" style="display:none;">
									<label for="name_facilities">Upload PDF</label>
									<input type="file" class="form-control" id="reports" name="report" placeholder="" >
								</div>
								<div class="form-group col-md-4">
									<label for="icon_facilities">Heading</label>
									<input type="text" name="heading" class="form-control" placeholder="Heading" required='required' id="heading">
								</div>
								<div class="form-group col-md-4">
									<label for="icon_facilities">Image</label>
									<input type="file" name="image" class="form-control" placeholder="Heading" required='required' id="heading">
								</div>
								<div class="form-group col-md-12">
									<label for="icon_facilities">Description</label>
									<textarea id="summernote" name="description"></textarea>
								</div>
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
    </div>
    <!-- /.container-fluid --> 
  </section>
</div>
<?php include('include/footer.php');?>

<script>
function getReport(type){
	if(type=='Survey' || type=='Webinar'){
		$('#urlDiv').show();	
  		$("#url").attr("required","required");
  		$('#reportDiv').hide();	
	}
	if(type=='Report'){
		$('#urlDiv').hide();	
		$('#reportDiv').show();	
  		$("#reports").attr("required","required");
	}
	if(type=='Article'){
		$('#urlDiv').hide();	
		$('#reportDiv').hide();	
  		$("#url").removeAttr("required","required");
  		$("#reports").removeAttr("required","required");
	}
}

$('textarea#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200,
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
</script>
