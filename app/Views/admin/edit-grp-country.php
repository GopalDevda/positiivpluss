<?php include('include/header.php'); ?>



<?php include('include/menu.php');?>



  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



    <!-- Content Header (Page header) -->



    <div class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1 class="m-0">Group name Management</h1>



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



                <h3 class="card-title">Update Group country</h3>



              </div>



              <!-- /.card-header -->



              <!-- form start -->



              <form name="industry" id="industry" method="post" action="<?php echo base_url();?>/master/updateGroupName">



                <input type="hidden" id="ghg_factor_id" name="id" value="<?php echo $grp_country['id'] ?>" />



                <div class="card-body">


                       

    
    <div class="col-md-12" style="float:left;">
      <label for="exampleInputEmail1">Group Name</label>

  
        <input type="text"  class="form-control"  placeholder="Enter Group Name" id="exampleInputEmail1" readonly value="<?php echo $grp_country['group_id'] ?>"  required="required" name="group_id">  
  </div>

              

                  <div class="form-group" id="hidecountry">



                    <label for="exampleInputEmail1" style="display:block">Country Name</label>
                    <!--multi column-->
                    <div class="row mb-3" >
                     
                     <!--Africa Country list start-->
                        <div class="col-md-2">
                            <ul class="p-0">
                            <li class="list-unstyled">
                                <div class="bg-warning checksty">
                              <input type="checkbox" id="option" onchange="hidecountrygroupname(this);"><label class="ml-2 mb-0" for="option"> Africa</label>
                              </div>
                              <?php if($Africa){
                              foreach($Africa as $key=> $afr){
                              ?>
                            <ul class="pl-3">
                                <li class="list-unstyled"><label class="font-weight-normal">
                                    <input  class="subOption" <?php if(in_array($afr["id"], $group_id_detail)){ echo 'checked'; }?> type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $afr["id"]; ?>">
                                    <?php echo $afr["name"]; 
                                ?></label>
                                </li>
                             </ul>
                      <?php } }?>
                            </li>
                          </ul>
                        </div>
                         <!--Africa Country list end-->
                        
                        <!--Antarctica Country list start-->
                                <div class="col-md-2">
                                    <ul class="p-0">
                                        <li class="list-unstyled">
                                            <div class="bg-warning checksty">
                                              <input type="checkbox" id="optionAntarctica"><label class="ml-2 mb-0" for="optionAntarctica"> Antarctica</label>
                                            </div>
                                                 <?php if($Antarctica){ foreach($Antarctica as $ant){ ?>
                                            <ul class="pl-3">
                                                <li class="list-unstyled"><label class="font-weight-normal">
                                                  <input  class="Antarctica" <?php if(in_array($ant["id"], $group_id_detail)){ echo 'checked'; }?> type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $ant["id"]; ?>">
                                                        <?php echo $ant["name"]; ?></label>
                                                </li>
                                            </ul>
                                                <?php } }?>
                                        </li>
                                    </ul>
                                </div>
                        <!--Antarctica Country list end-->
                        
                        <!--Asia Country list start-->
                        <div class="col-md-2">
                            <ul class="p-0">
                            <li class="list-unstyled">
                                <div class="bg-warning checksty">
                              <input type="checkbox" id="optionAsia"><label class="ml-2 mb-0" for="optionAsia">Asia</label>
                              </div>
                              <?php if($Asia){
                              foreach($Asia as $ass){
                              ?>
                            <ul class="pl-3">
                                <li class="list-unstyled"><label class="font-weight-normal">
                                    <input  class="Asia" <?php if(in_array($ass["id"], $group_id_detail)){ echo 'checked'; }?> type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $ass["id"]; ?>">
                                    <?php echo $ass["name"]; ?></label>
                                </li>
                             </ul>
                      <?php } }?>
                            </li>
                          </ul>
                        </div>
                         
                        
        <!--Asia Country list end-->
        
        <!--Europe Country list start-->
                        <div class="col-md-2">
                            <ul class="p-0">
                            <li class="list-unstyled">
                                <div class="bg-warning checksty">
                              <input type="checkbox" id="optionEurope"><label class="ml-2 mb-0" for="optionEurope">Europe</label>
                              </div>
                              <?php if($Europe){
                              foreach($Europe as $euro){
                              ?>
                            <ul class="pl-3">
                                <li class="list-unstyled"><label class="font-weight-normal">
                                    <input  class="Europe" <?php if(in_array($euro["id"], $group_id_detail)){ echo 'checked'; }?> type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $euro["id"]; ?>">
                                    <?php echo $euro["name"]; ?></label>
                                </li>
                             </ul>
                      <?php } }?>
                            </li>
                          </ul>
                        </div>
                         
                        
        <!--Europe Country list end-->
                                         <!--North_America Country list start-->
                                                <div class="col-md-2">
                                                    <ul class="p-0">
                                                    <li class="list-unstyled">
                                                        <div class="bg-warning checksty">
                                                      <input type="checkbox" id="optionNorth_America"><label class="ml-2 mb-0" for="optionNorth_America">North America</label>
                                                      </div>
                                                      <?php if($North_America){
                                                      foreach($North_America as $nortame){
                                                      ?>
                                                    <ul class="pl-3">
                                                        <li class="list-unstyled"><label class="font-weight-normal">
                                                            <input  class="North_America" <?php if(in_array($nortame["id"], $group_id_detail)){ echo 'checked'; }?> type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $nortame["id"]; ?>">
                                                            <?php echo $nortame["name"]; ?></label>
                                                        </li>
                                                     </ul>
                                              <?php } }?>
                                                    </li>
                                                  </ul>
                                                </div>
                                                 
                                                
                                <!--North_America Country list end-->
                                <!--!--Oceania Country list start-->
                                                <div class="col-md-2">
                                                    <ul class="p-0">
                                                    <li class="list-unstyled">
                                                        <div class="bg-warning checksty">
                                                      <input type="checkbox" id="optionOceania"><label class="ml-2 mb-0" for="optionOceania">Oceania</label>
                                                      </div>
                                                      <?php if($Oceania){
                                                      foreach($Oceania as $ocani){
                                                      ?>
                                                    <ul class="pl-3">
                                                        <li class="list-unstyled"><label class="font-weight-normal">
                                                            <input  class="Oceania" <?php if(in_array($ocani["id"], $group_id_detail)){ echo 'checked'; }?> type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $ocani["id"]; ?>">
                                                            <?php echo $ocani["name"]; ?></label>
                                                        </li>
                                                     </ul>
                                              <?php } }?>
                                                    </li>
                                                  </ul>
                                                </div>
                                                 
                                                
                                <!--Oceania Country list end-->
                                
        <!--South America Country list start-->
                        <div class="col-md-2">
                            <ul class="p-0">
                            <li class="list-unstyled">
                                <div class="bg-warning checksty">
                              <input type="checkbox" id="optionSouthAmerica"><label class="ml-2 mb-0" for="optionSouthAmerica"> South America</label>
                              </div>
                              <?php if($South_America){
                              foreach($South_America as $sa){
                              ?>
                            <ul class="pl-3">
                                <li class="list-unstyled"><label class="font-weight-normal">
                                    <input class="SouthAmerica"  <?php if(in_array($sa["id"], $group_id_detail)){ echo 'checked'; }?> type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $sa["id"]; ?>">
                                    <?php echo $sa["name"]; ?></label>
                                </li>
                             </ul>
                      <?php } }?>
                            </li>
                          </ul>
                        </div>
                         
                        
        <!--South  America Country list end-->                
                        
                     
                    </div>
                    
                   
                    
                  </div>
                  
                  

                  




                  
                  
                  .

             
  

  
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




<script>

          function hidecountryname(that){
            // alert('test');
             var id = $(that).val();
            if(id == '') {
                            $('#hidecountry').show();
                            // $('input:checkbox').attr('checked','checked');
                            //  $('input:checkbox').removeAttr('checked');
                         }
                        else    {
                                     $('#hidecountry').hide();
                                }
            }
        
        
            function unhidecountryname(that){
                $('#hidecountry').show();
                }
            function hidecountrygroupname(that){
                $('#hidecountrygrp').hide();
                }
                
  function getGhgAjax(id=1){
    $.ajax({
          url : "<?php echo base_url()?>/master/getGhgByGhgCategory/"+id,
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

  $(document).ready(function(){
    $("select.ghgfactor").change(function(){
        var id = $(this).children("option:selected").val();
        $.ajax({
          url : "<?php echo base_url()?>/master/getFactorsByGhg/"+id,
          type: "POST",
          //dataType: "JSON",
          success: function(data){
            $('#factor_name').html(data);
          },
          error: function(xhr, status, error){
            $('#factor_name').html('<option value="">Select Ghg </option>');
          }
      });
    });
  });

</script>

<!--Source js-->

<script>
                                                                                                            // checkbox script
                                                                                                            var checkboxes = document.querySelectorAll('input.subOption'),
                                                                                                                checkall = document.getElementById('option');
                                                                                                            
                                                                                                            for(var i=0; i<checkboxes.length; i++) {
                                                                                                              checkboxes[i].onclick = function() {
                                                                                                                var checkedCount = document.querySelectorAll('input.subOption:checked').length;
                                                                                                            
                                                                                                                checkall.checked = checkedCount > 0;
                                                                                                                checkall.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
                                                                                                              }
                                                                                                            }
                                                                                                            
                                                                                                            checkall.onclick = function() {
                                                                                                              for(var i=0; i<checkboxes.length; i++) {
                                                                                                                checkboxes[i].checked = this.checked;
                                                                                                              }
                                                                                                            }

                                             // checkboxes1 script Antarctica
                                                        var checkboxes2 = document.querySelectorAll('input.Antarctica'),
                                                            checkall2 = document.getElementById('optionAntarctica');
                                                        
                                                        for(var i=0; i<checkboxes2.length; i++) {
                                                          checkboxes2[i].onclick = function() {
                                                            var checkedCount2 = document.querySelectorAll('input.Antarctica:checked').length;
                                                        
                                                            checkall2.checked = checkedCount2 > 0;
                                                            checkall2.indeterminate = checkedCount2 > 0 && checkedCount2 < checkboxes2.length;
                                                          }
                                                        }
                                                        
                                                        checkall2.onclick = function() {
                                                          for(var i=0; i<checkboxes2.length; i++) {
                                                            checkboxes2[i].checked = this.checked;
                                                          }
                                                        }
                                                     
// checkboxes3 script Asia
var checkboxes3 = document.querySelectorAll('input.Asia'),
    checkall3 = document.getElementById('optionAsia');

for(var i=0; i<checkboxes3.length; i++) {
  checkboxes3[i].onclick = function() {
    var checkedCount3 = document.querySelectorAll('input.Asia:checked').length;

    checkall3.checked = checkedCount3 > 0;
    checkall3.indeterminate = checkedCount3 > 0 && checkedCount3 < checkboxes3.length;
  }
}

checkall3.onclick = function() {
  for(var i=0; i<checkboxes3.length; i++) {
    checkboxes3[i].checked = this.checked;
  }
}
                            // checkboxes4 script Europe
                            var checkboxes4 = document.querySelectorAll('input.Europe'),
                                checkall4 = document.getElementById('optionEurope');
                            
                            for(var i=0; i<checkboxes4.length; i++) {
                              checkboxes4[i].onclick = function() {
                                var checkedCount4 = document.querySelectorAll('input.Europe:checked').length;
                            
                                checkall4.checked = checkedCount4 > 0;
                                checkall4.indeterminate = checkedCount4 > 0 && checkedCount4 < checkboxes4.length;
                              }
                            }
                            
                            checkall4.onclick = function() {
                              for(var i=0; i<checkboxes4.length; i++) {
                                checkboxes4[i].checked = this.checked;
                              }
                            }

                                                                                  // checkboxes5 script North_America
                                                var checkboxes5 = document.querySelectorAll('input.North_America'),
                                                    checkall5 = document.getElementById('optionNorth_America');
                                                
                                                for(var i=0; i<checkboxes5.length; i++) {
                                                  checkboxes5[i].onclick = function() {
                                                    var checkedCount5 = document.querySelectorAll('input.North_America:checked').length;
                                                
                                                    checkall5.checked = checkedCount5 > 0;
                                                    checkall5.indeterminate = checkedCount5 > 0 && checkedCount5 < checkboxes5.length;
                                                  }
                                                }
                                                
                                                checkall5.onclick = function() {
                                                  for(var i=0; i<checkboxes5.length; i++) {
                                                    checkboxes5[i].checked = this.checked;
                                                  }
                                                }
                                                                                                                 // checkboxes6 script Oceania
                                                                                                var checkboxes6 = document.querySelectorAll('input.Oceania'),
                                                                                                    checkall6 = document.getElementById('optionOceania');
                                                                                                
                                                                                                for(var i=0; i<checkboxes6.length; i++) {
                                                                                                  checkboxes6[i].onclick = function() {
                                                                                                    var checkedCount6 = document.querySelectorAll('input.Oceania:checked').length;
                                                                                                
                                                                                                    checkall6.checked = checkedCount6 > 0;
                                                                                                    checkall6.indeterminate = checkedCount6 > 0 && checkedCount6 < checkboxes6.length;
                                                                                                  }
                                                                                                }
                                                                                                
                                                                                                checkall6.onclick = function() {
                                                                                                  for(var i=0; i<checkboxes6.length; i++) {
                                                                                                    checkboxes6[i].checked = this.checked;
                                                                                                  }
                                                                                                }
// checkboxes7 script SouthAmerica
var checkboxes7 = document.querySelectorAll('input.SouthAmerica'),
    checkall7 = document.getElementById('optionSouthAmerica');

for(var i=0; i<checkboxes7.length; i++) {
  checkboxes7[i].onclick = function() {
    var checkedCount7 = document.querySelectorAll('input.SouthAmerica:checked').length;

    checkall7.checked = checkedCount7 > 0;
    checkall7.indeterminate = checkedCount7 > 0 && checkedCount7 < checkboxes7.length;
  }
}

checkall7.onclick = function() {
  for(var i=0; i<checkboxes7.length; i++) {
    checkboxes7[i].checked = this.checked;
  }
}

</script>
