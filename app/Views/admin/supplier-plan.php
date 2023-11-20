<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Supplier Plan Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item active"><a href="<?php echo base_url();?>/master/addSupplierPlan" class='btn btn-primary'><i class="fa fa-plus"></i> Add Supplier Plan</a> </li>
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
                      <h3 class="card-title">Supplier Plan List</h3>
                    </div>
                    
                    <?php
                    if(!empty($list)){?>
                    <table class="table table-bordered table-hover" id="datatables">
                      <thead>
                        <tr><th>#</th><th>Plan Name </th><th>Plan Price </th><th>User Allow </th><th>Plan Type </th><th>Plan Validity</th><th>Description </th><th>Action</th></tr>
                      </thead>
                      <tbody>
                        <?php $s=1;
                        foreach($list as $d){?>
                        <tr>
                          <td><?php echo $s;?></td>
                          <td><?php echo $d['plan_name'];?></td>
                          <td><?php echo $d['plan_price'];?></td>
                          <td><?php echo $d['no_of_user'];?></td>
                          <td><?php echo $d['plan_validity'];?></td>
                          <td><?php echo $d['plan_validity_time'];?></td>
                          <td>
                            <ul style="font-size: 18px;">
                              <?php
                              if($d["description"]) {
                              foreach(json_decode($d["description"]) as $desc) {
                              ?>
                              <li><?php echo $desc; ?></li>
                              <?php
                              }
                              }
                              ?>
                            </ul>
                          </td>
                          
                          <td>
                            <a class="btn btn-primary" href="<?php echo base_url() ?>/master/editSupplierPlan/<?php echo $d['id'] ?>" onclick="editSdg(this);" data-name='<?php echo $d['plan_name'];?>' data-number='<?php echo $d['id'];?>' ><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger" href="<?php echo base_url()?>/master/deleteSupplierPlan/<?php echo $d['id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
                            <form action="<?php echo base_url() ?>/home/signupexper/"  >
                              
                              
                              
                              <!-- <form action="<?php ?>https://new.positiivplus.io/home/signupexper/"  > -->
                              
                              <input type="hidden" name="csrf_token" value="<?= csrf_hash() ?>" />
                              <input type="hidden" value="<?php $t= $d['id']; echo  base64_encode($t); ?>" name="plan_id"id="myInput">
                              <button class="btn btn-primary" id="myInput" target="_blank" href="#" onclick="clipboard();" onclick="clipboard()" ><i class="fa fa-share"></i></button>
                            </form>
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
          <script>
          function clipboard() {
          /* Get the text field */
          var copyText = document.getElementById("myInput");
          /* Select the text field */
          copyText.select();
          copyText.setSelectionRange(0, 99999); /* For mobile devices */
          /* Copy the text inside the text field */
          navigator.clipboard.writeText(copyText.href);
          
          /* Alert the copied text */
          alert("Copied the text: " + copyText.href);
          }
          </script>
          <?php include('include/footer.php');?>