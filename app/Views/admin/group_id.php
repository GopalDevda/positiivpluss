<?php include('include/header.php'); ?>

<?php include('include/menu.php');?>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0">Country Group Management</h1>

          </div><!-- /.col -->
          
 <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              

              <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>/master/addGroup" class='btn btn-primary'><i class="fa fa-plus"></i> Add Group</a> </li>

            </ol>

          </div><!-- /.col -->
          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Country Group </li>

            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    

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

                <h3 class="card-title">Country Group List</h3>

              </div>

              

<div class="card-body">

    <?php 

    // print_r($grp_name);
    if(!empty($grp_name)){?>

    <table class="table table-bordered table-hover" id="datatables">

    <thead><tr><th>#</th><th>Groop Name</th>
    <th class="text-center"title="View Country / Ghg " colspan="2">View Country - Ghg</th>
   
    <th>Edit Group Name</th>
    </tr></thead>

    <?php $s=1;

    foreach($grp_name as $d){
if(!empty($d['group_id']))
{?>
      <tr><td><?php echo $s;?></td>
      <td><?php echo $d['group_id'];?></td>

        <td><a class="btn btn-primary" href="javascript:void(0);" button onclick="getcountrygro('<?php echo $d['id']; ?>')"  
       data-name='<?php echo $d['country_id'];?>' data-number='<?php echo $d['id'];?>'><?php  echo "View Country"; ?></a>
       </td>
        
        <td><a class="btn btn-primary" href="javascript:void(0);" button onclick="getconnectedghg('<?php echo $d['id']; ?>','<?php echo $d['group_id']; ?>')"  
       data-name='<?php echo $d['country_id'];?>' data-number='<?php echo $d['id'];?>'><?php  echo "View GHG"; ?></a>
       
       </td>
       
        <td>

         <a class="btn btn-primary" href="javascript:void(0);" onclick="edit_group_id(this);" data-name='<?php echo $d['group_id'];?>' data-number='<?php echo $d['id'];?>' ><i class="fa fa-pencil"></i></a>
 <a class="btn btn-danger" href="<?php echo base_url()?>/master/deletegrpname/<?php echo $d['id'];?>/<?php echo $d['group_id'];?>" onclick="return confirm('Do you want to delete?');"><i class="fa fa-trash"></i></a>
  <a class="btn btn-warning" href="<?php echo base_url()?>/master/showcountryforedit/<?php echo $d['id'];?>"><i class="fa fa-eye"></i></a>
        </td>

      </tr>
     

    <?php  } $s++; }?>

    </table>

  <?php } ?>

</div>



            </div>

          </div>

        </div>



      </div><!-- /.container-fluid -->

    </section>



  </div>

<?php include('include/footer.php');?>

      <div class="modal fade" id="modal-edit">

        <div class="modal-dialog">

          <div class="modal-content">

            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

              <form method="post" name="sdg-form" id="sdf-form" action="<?php echo base_url();?>/master/edit_group_id_name" enctype='multipart/form-data'>

<input type="hidden" name="id" id="sdg_id" value="" required="required">

            <div class="modal-body">



            <div class="card card-primary">

              <div class="card-header">

                <h3 class="card-title">Update Group Name</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

                <div class="card-body">

                  <div class="form-group">

                    <label for="exampleInputEmail1">Group Id Name</label>

                    <input type="text" required="required" class="form-control"  placeholder="Enter SDG Name" name="group_id" id="sdg_name_id">

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
      
      
       <div class="modal fade bd-example-modal-lg" id="getcountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">

                    <div class="modal-dialog modal-lg" role="document" style="max-width: 800px !important;">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title" id="exampleModalCenterTitle-2">View Info</h5>

                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                            </div>

                            <div class="modal-body">

                            <div class="create_doc_form">

               

                               <div id="labelcountry"></div>

                                <div id="sum">
                                   
                                </div>

                               
                          

                            </div>

                                

                            </div>

                        </div>

                    </div>

                </div>



<script type="text/javascript">

   function edit_group_id(that) {

        var num = $(that).attr('data-number');

        // alert(num);

        var name = $(that).attr('data-name');

        var img = $(that).attr('data-img');

        $('#sdg_id').val(num);

        $('#sdg_name_id').val(name);

        $('#imgDiv').attr('src',img);

        $('#modal-edit').modal('show');

    }
    
    function getcountrygro(id) {

        var product_id=$("#id").val(id);

              $.ajax({

            url : "<?php echo base_url()?>/master/getcountrygro/"+id,

            type: "GET",

            //dataType: "JSON",

            success: function(data){
// alert(data);
 $("#labelcountry").html(data);
$("#getcountry").modal('show');
                // $(obj2).find("select[name='unit[]']").html(data);

            },

            error: function(xhr, status, error){

                // alert('error');

            }



        });


    }
    
    
    function getconnectedghg(id,name) {

        var product_id=$("#id").val(id);

              $.ajax({

            url : "<?php echo base_url()?>/master/getconnectedghg/"+id+"/"+name,

            type: "GET",

            //dataType: "JSON",

            success: function(data){

                            $("#labelcountry").html(data);
                            $("#getcountry").modal('show');
             },

            error: function(xhr, status, error){
    }

 });


    }

</script>