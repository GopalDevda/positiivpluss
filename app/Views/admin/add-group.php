<?php include('include/header.php'); ?>



<?php include('include/menu.php');?>



  <!-- Content Wrapper. Contains page content -->

<style>
    .checksty{
            padding: 2px 6px;
            border-radius: 6px;
            margin-bottom: 9px;
    }
</style>

  <div class="content-wrapper">



    <!-- Content Header (Page header) -->



    <div class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1 class="m-0">Group Management</h1>



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



                <h3 class="card-title">Add Ghg Factor </h3>



              </div>



              <!-- /.card-header -->



              <!-- form start -->



              <form name="industry" id="industry" method="post" action="<?php echo base_url();?>/master/addGroupname">



                <div class="card-body">



                        <div class="form-group" id="hidecountrygrp">



                    <label for="exampleInputEmail1"> group Name</label>

                        
                        <input type="text" id="group_id" name="group_id"onchange="hidecountrygroupname(this);">

                    
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
                              foreach($Africa as $afr){
                              ?>
                            <ul class="pl-3">
                                <li class="list-unstyled"><label class="font-weight-normal">
                                    <input  class="subOption" type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $afr["id"]; ?>">
                                    <?php echo $afr["name"]; ?></label>
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
                                                  <input  class="Antarctica" type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $ant["id"]; ?>">
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
                                    <input  class="Asia" type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $ass["id"]; ?>">
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
                                    <input  class="Europe" type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $euro["id"]; ?>">
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
                                                            <input  class="North_America" type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $nortame["id"]; ?>">
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
                                                            <input  class="Oceania" type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $ocani["id"]; ?>">
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
                                    <input  class="SouthAmerica" type="checkbox" id="checkbox" name="country_id[]" value="<?php echo $sa["id"]; ?>">
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
                  
                  



<span class="unit_stand_and_classific_div"></span> 


                  <!--<div class="form-group">-->



                  <!--  <label for="exampleInputEmail1">Emission Factor</label>-->



                  <!--  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Emission Factor" required="required" name="emission_factor">-->



                  <!--</div>                -->



                  <!--<div class="form-group">-->



                  <!--  <label for="exampleInputEmail1">Source</label>-->



                  <!--  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Source" required="required" name="source">-->



                  <!--</div>                 -->





 

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

<script>
  function addStandAndClassificDiv(){
      $('.stand_and_classific_div').append('<div class="standDiv"><div class="form-group"><div class="col-md-10" style="float: left;"><label for="exampleInputEmail1">&nbsp;</label><input type="text"   placeholder="Enter Source" class="form-control" id="exampleInputEmail1" required="required" name="source[]"></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');

    }



  $(document).on('click','.remove_stand_and_classific_block',function(){



    $(this).closest('.standDiv').remove();



  });  
</script>

<!--Emission Factor js -->
<script>
  function addemissionStandAndClassificDiv(){
      $('.emission_factor_stand_and_classific_div').append('<div class="emission_factorstandDiv"><div class="form-group"><div class="col-md-10" style="float: left;"><label for="exampleInputEmail1">&nbsp;</label><input type="text"   placeholder="Enter Emission Factor" class="form-control" id="exampleInputEmail1" required="required" name="emission_factor[]"></div><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1">&nbsp;</label><input type="text"   placeholder="Enter Source" class="form-control" id="exampleInputEmail1" required="required" name="source[]"></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addemissionStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="emission_factor_remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');

    }



  $(document).on('click','.emission_factor_remove_stand_and_classific_block',function(){



    $(this).closest('.emission_factorstandDiv').remove();



  });  
</script>

<!--Unit js-->

<script>
  function addunitStandAndClassificDiv(){
      $('.unit_stand_and_classific_div').append('<div class="unitstandDiv"><div class="form-group"><div class="col-md-3" style="float:left;"> <label for="exampleInputEmail1">Impact</label> <select name="unit[]" id="unit" required="required" class="form-control">    <option value="">Select Impact</option><?php if(!empty($trImpact)){ foreach($trImpact as $r){?><option value="<?php echo $r['id'];?>"><?php echo $r['impact_name'];?></option> <?php  }}?> </select></div></div><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1">&nbsp;</label><input type="text"   placeholder="Enter Emission Factor" class="form-control" id="exampleInputEmail1" required="required" name="emission_factor[]"></div><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1">&nbsp;</label><input type="text"   placeholder="Enter Source" class="form-control" id="exampleInputEmail1" required="required" name="source[]"></div>      <div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addunitStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="unit_remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');

    }



  $(document).on('click','.unit_remove_stand_and_classific_block',function(){



    $(this).closest('.unitstandDiv').remove();



  });  
</script>

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

