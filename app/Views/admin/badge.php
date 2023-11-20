<?php include('include/header.php'); ?> <?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Badges</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <a href="#" onclick="addBadge()" class='btn btn-primary'>
                <i class="fa fa-plus"></i> Add Badge </a>
            </li>
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
              <h3 class="card-title">Badges List</h3>
            </div> <?php if(!empty($badges_details)){?> 
            <table class="table table-bordered table-hover" id="datatables">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th>No. of Question</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody> <?php $s=1; foreach($badges_details as $d){?> 
                <tr>
                  <td> <?php echo $s;?> </td>
                  <td> <?php echo $d['badge_name']; ?> </td>
                  <td> <img src="<?php echo base_url();?>/public/uploads/badges/<?php echo $d['badge_image'];?>" style="width: 100px;"> </td>
                  <td> <?php echo $d['badge_description'];?> </td>
                  <td> <?php echo $d['badge_no_of_question'];?> </td>
                  <td>
                    <a class="btn btn-primary" href="javascript:void(0);" onclick="editbadgeDetails(this)" data-badgeId='<?php echo $d['id'];?>' data-img='<?php echo base_url();?>/public/uploads/badges/'><i class="fa fa-pencil"></i>
                    </a>
                    <a class="btn btn-danger" href="
                      <?php echo base_url()?>/master/deleteBages/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr> <?php $s++;}?> </tbody>
            </table> <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
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
      <form method="post" name="factor-form" id="factor-form" action="
        <?php echo base_url();?>/master/addBadges" enctype='multipart/form-data'>
        <div class="modal-body">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Badges Detail</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start --> 
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Badge Name</label>
                  <input type="text" required="required" class="form-control" id="exampleInputEmail1" placeholder="Enter Badge Name" name="badge_name">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Badge Description</label>
                  <textarea class="form-control" name="badge_description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Number of Questions</label>
                  <input type="number" required="required" class="form-control" id="exampleInputEmail1" placeholder="Enter Number of Questions" name="badge_no_of_question">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Badge image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="file" id="file" required="required">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  </div>
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
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" name="factor-form" id="factor-form" action="
            <?php echo base_url();?>/master/editBadgesDetails" enctype='multipart/form-data'>
        <input type="hidden" id="editbadgeId" name="editbadgeId" value="">
        <div class="modal-body">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Badge</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body" id="editBadgeForm">
                <div class="form-group">
                  <label for="exampleInputEmail1">Badge Name</label>
                  <input type="text" required="required" class="form-control" id="edit_badge_name" placeholder="Enter Badge Name" name="badge_name">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Badge Description</label>
                  <textarea class="form-control" name="badge_description" id="edit_badge_description" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Number of Questions</label>
                  <input type="number" required="required" class="form-control" id="edit_badge_no_of_question" placeholder="Enter Number of Questions" name="badge_no_of_question">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Badge image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="editfile" id="editfile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                   <img src="" id="imgDiv" style="width: 100px;" />
                </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
  function editbadgeDetails(that) {
    var data_badgeId = $(that).attr('data-badgeId');
    var data_img = $(that).attr('data-img');
    $.ajax({
      url: ' <?php echo base_url();?>/master/getBadge',
      type : 'POST',
      data: {
        badge_id: data_badgeId
      }
    }).done(function(response) {
      var value = JSON.parse(response);
      $('#edit_badge_name').val(value.badge_name);
      $('#imgDiv').attr('src',data_img+value.badge_image);
      $('#edit_badge_description').val(value.badge_description);
      $('#edit_badge_no_of_question').val(value.badge_no_of_question);
      $('#editbadgeId').val(value.id);
      $('#modal-edit').modal('show');
  });

}

  function addBadge() {
    $('#modal-add').modal('show');
  }

  // function showOptions(s) {
  //   var company_id = s[s.selectedIndex].value;
  //   $.ajax({
  //     url: ' < ? php echo base_url(); ? > /master/getSuplierPlane',
  //     type : 'POST',
  //     data: {
  //       company_id: company_id
  //     }
  //   }).done(function(response) {
  //     console.log(response);
  //     $("#supplier_plan_id").html(response);
  //   });
  // }

  // function editShowOptions(s) {
  //   var company_id = s[s.selectedIndex].value;
  //   $.ajax({
  //     url: ' < ? php echo base_url(); ? > /master/getSuplierPlane',
  //     type : 'POST',
  //     data: {
  //       company_id: company_id
  //     }
  //   }).done(function(response) {
  //     console.log(response);
  //     $("#edit_supplier_plan_id").html(response);
  //   });
  // }
  // function editSuplierPlanDetails() {
  //  $('#modal-edit').modal('show');
  // }
</script> <?php include('include/footer.php');?>