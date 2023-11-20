<?php include('include/header.php'); ?>



<?php include('include/menu.php');?>



  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



    <!-- Content Header (Page header) -->



    <div class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1 class="m-0">Ghg Factor Management</h1>



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



              <form name="industry" id="industry" method="post" action="<?php echo base_url();?>/master/updateGhgFactor">



                <input type="hidden" id="ghg_factor_id" name="id" value="<?php echo $ghg_factor['id'] ?>" />



                <div class="card-body">







                  <div class="form-group">



                    <label for="exampleInputEmail1">Type</label>



                    <select name="type_id" id="type_id" required="required" class="form-control">



                      <option value="">Select Type</option>



                      <option value="1" <?php echo $ghg_factor['type']==1?'selected':'' ?>>Service</option>



                      <option value="2" <?php echo $ghg_factor['type']==2?'selected':'' ?>>Product</option>



                    </select>



                  </div>







                  <div class="form-group">



                    <label for="exampleInputEmail1">Industry</label>



                    <select name="industry_id" id="industry_id" required="required" class="form-control">



                        <option value="">Select Industry</option>

                        <option value="0" <?= $ghg_factor['industry_id']==0?'selected':'' ?>>All</option>

                        <?php if(!empty($industry)){



                          foreach($industry as $r){?>



                        <option value="<?php echo $r['id'];?>" <?php echo $r['id']==$ghg_factor['industry_id']?'selected':'' ?>><?php echo $r['industry_name'];?></option>



                       <?php  }



                        }?>



                    </select>



                  </div>







                  <div class="form-group">



                    <label for="exampleInputEmail1">Ghg Category</label>



                    <select name="ghg_category_id" id="ghg_category_id" required="required" class="form-control" onchange="getGhgAjax(this.value);">



                        <option value="">Select Ghg Category</option>



                        <?php if(!empty($ghg_category)){



                          foreach($ghg_category as $r){?>



                        <option value="<?php echo $r['id'];?>" <?php echo $r['id']==$ghg_factor['ghg_category_id']?'selected':'' ?>><?php echo $r['ghg_category_name'];?></option>



                       <?php  }



                        }?>



                    </select>



                  </div>







                  <div class="form-group">



                    <label for="exampleInputEmail1">Ghg</label>



                    <select name="ghg_id" id="ghgDiv" required="required" class="form-control ghg-for-factor">



                        <option value="">Select Ghg</option>



                        <?php 



                          if($ghg) {



                            foreach($ghg as $g) {



                        ?>



                        <option value="<?php echo $g['id'] ?>" <?php echo $g['id']==$ghg_factor['ghg_id']?'selected':'' ?>><?php echo $g['ghg_name'] ?></option>



                        <?php



                            }



                          }



                        ?>



                    </select>



                  </div>



                        <div class="form-group" id="hidecountrygrp">



                    <label for="exampleInputEmail1">Select group</label>



                    <select name="group_id" id="group_id" onchange="hidecountryname(this);" class="form-control">



                                    <option value="0" >Select Group </option>
            
                                
                                    <?php if(!empty($group)){
            
            
                                      foreach($group as $r){
                                          
                                          
                                      if(!empty($r['group_id'])){?>
            
                             <option value="<?= $r['group_id'] ?>" <?=$r['group_id']==$ghg_factor['group_id']?'selected':'' ?>><?= $r['group_id'] ?></option>
                             $ghg_factor['id']
                            
            
            
                                   <?php  } }
            
            
                                    }?>



                    </select>



                  </div>

                  <div class="form-group">



                    <label for="exampleInputEmail1">Name</label>

                    <select name="name" id="factor_name" required="required" class="form-control">                    

                      <option value="">Select Factor</option>

                  <?php 

                  if($factor) {

                    foreach($factor as $f) {

                  ?>

                    <option value="<?= $f['id'] ?>" <?= $f['id']==$ghg_factor['name']?'selected':'' ?>><?= $f['factor_name'] ?></option>

                  <?php

                    }

                  }

                  ?>                      

                    </select>

                  </div>







<!--                   <div class="form-group">



                    <label for="exampleInputEmail1">Unit</label>



                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Unit" required="required" name="unit" value="<?php echo $ghg_factor['impact'] ?>">



                  </div>                 -->


<!--unit add more in edit start here/-->

<div class="form-group">

<!-- <label for="exampleInputEmail1">Description</label> -->

<!--   <textarea class="textarea" placeholder="Description Here" name="description" style="width: 100%;" ><?php echo $ghg_factor["impact"] ?></textarea> -->
  <!--<div class="col-md-3" style="float:left;">-->
  <!--    <label for="exampleInputEmail1">Impact</label>-->

  <!--   <textarea class="textarea" placeholder="Description Here" name="description" style="width: 100%;" ></textarea> -->

  <!--      <input type="text"  class="form-control" id="exampleInputEmail1"  required="required"  placeholder="Enter Source" name="unit[]" value="<?php echo $ghg_factor['impact']?(json_decode($ghg_factor['impact']))[0]:'' ?>">  -->
  <!--</div>-->
  <div class="col-md-3" style="float:left;">

                    <label for="exampleInputEmail1">Impact Name</label>

<?php 
$j= $ghg_factor['impact']?(json_decode($ghg_factor['impact']))[0]:'';
// echo $j;
?>

                    <select name="unit[]" id="unit" required="required" class="form-control">



                        <option value="">Select Impact Name</option>


                        <?php 



                          if($impact) {



                            foreach($impact as $impacta) {



                        ?>



                        <option value="<?php echo $impacta["id"]; ?>" <?php echo $impacta['id']==$j?'selected':'' ?>><?php echo $impacta["impact_name"]; ?></option>



                        <?php



                            }



                          }



                        ?>



                    </select>
</div>
  
  
  
  
  
    <div class="col-md-3" style="float:left;">
      <label for="exampleInputEmail1">Emission Factor</label>

  <!--   <textarea class="textarea" placeholder="Description Here" name="description" style="width: 100%;" ></textarea> -->

        <input type="text"  class="form-control" id="exampleInputEmail1"  required="required"  placeholder="Enter Source" name="emission_factor[]" value="<?php echo $ghg_factor['emission_factor']?(json_decode($ghg_factor['emission_factor']))[0]:'' ?>">  
  </div>
  
  
  <div class="col-md-3" style="float:left;">
      <label for="exampleInputEmail1">Source</label>

  <!--   <textarea class="textarea" placeholder="Description Here" name="description" style="width: 100%;" ></textarea> -->

        <input type="text"  class="form-control" id="exampleInputEmail1"  required="required"  placeholder="Enter Source" name="source[]" value="<?php echo $ghg_factor['source']?(json_decode($ghg_factor['source']))[0]:'' ?>">  
  </div>
  
  
  <div class="col-md-2" style="float:left;">
      <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
      <button type="button" class="btn btn-primary" onclick="unitaddStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>     
  </div>
</div>

      <span class="unit_stand_and_classific_div">
<?php 
  if($ghg_factor["impact"]) {
    foreach(json_decode($ghg_factor["impact"]) as $key=>$desc) {
      if($key!=0) {
?>

    <div class="form-group">

<div class="col-md-3" style="float:left;">

                    <label for="exampleInputEmail1">Impact Name</label>



                    <select name="unit[]" id="unit" required="required" class="form-control">



                        <option value="">Select Impact Name</option>


                        <?php 



                          if($impact) {



                            foreach($impact as $impacta) {



                        ?>



                        <option value="<?php echo $impacta["id"]; ?>" <?php echo $impacta['id']==$desc?'selected':'' ?>><?php echo $impacta["impact_name"]; ?></option>



                        <?php



                            }



                          }



                        ?>



                    </select>
</div>


                  </div>


<?php        
      }
?>
<?php
    }
  }
  
?>
<?php 
  if($ghg_factor["emission_factor"]) {
    foreach(json_decode($ghg_factor["emission_factor"]) as $key=>$desc) {
      if($key!=0) {
?>
<div class="unitstandDiv">
  <div class="col-md-3" style="float:left;">
      <label for="exampleInputEmail1">&nbsp;</label>
        <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="emission_factor[]" value="<?php echo $desc; ?>">  
  </div>
  
        
</div>
<?php        
      }
?>
<?php
    }
  }
  
?>
<?php 
  if($ghg_factor["source"]) {
    foreach(json_decode($ghg_factor["source"]) as $key=>$desc) {
      if($key!=0) {
?>
<div class="unitstandDiv">
  <div class="col-md-3" style="float:left;">
      <label for="exampleInputEmail1">&nbsp;</label>
        <input type="text"  class="form-control" id="exampleInputEmail1" required="required" name="source[]" value="<?php echo $desc; ?>">  
  </div>
  
  <div class="col-md-2" style="float:left;">
      <label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label>
      <button type="button" class="btn btn-primary" onclick="unitaddStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>
      &nbsp;<button type="button" class="unitremove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button>           
  </div>          
</div>
<?php        
      }
?>
<?php
    }
  }
  
?>





      </span>                                  


<!--Unit end here edit add more too -->



                  <!--<div class="form-group">-->



                  <!--  <label for="exampleInputEmail1">Emission Factor</label>-->



                  <!--  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Emission Factor" required="required" name="emission_factor" value="<?php echo $ghg_factor["emission_factor"] ?>">-->



                  <!--</div>                -->




















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
  function addStandAndClassificDiv(){
      $('.stand_and_classific_div').append('<div class="standDiv"><div class="form-group"><div class="col-md-10" style="float: left;"><label for="exampleInputEmail1">&nbsp;</label><input type="text"   placeholder="Enter Source" class="form-control" id="exampleInputEmail1" required="required" name="source[]"></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="addStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="remove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');

    }



  $(document).on('click','.remove_stand_and_classific_block',function(){



    $(this).closest('.standDiv').remove();



  });    
</script>
<script>
  function emission_factoraddStandAndClassificDiv(){
      $('.emission_factor_stand_and_classific_div').append('<div class="emission_factorstandDiv"><div class="form-group"><div class="col-md-10" style="float: left;"><label for="exampleInputEmail1">&nbsp;</label><input type="text"   placeholder="Enter emission factor" class="form-control" id="exampleInputEmail1" required="required" name="emission_factor[]"></div><div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="emission_factoraddStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="emission_factorremove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');

    }



  $(document).on('click','.emission_factorremove_stand_and_classific_block',function(){



    $(this).closest('.emission_factorstandDiv').remove();



  });    
</script>
<script>
  function unitaddStandAndClassificDiv(){
      $('.unit_stand_and_classific_div').append('<div class="unitstandDiv"><div class="form-group"><div class="col-md-3" style="float:left;"><label for="exampleInputEmail1">Impact Name</label> <select name="unit[]" id="unit" required="required" class="form-control"> <option value="">Select Impact Name</option>  <?php  if($impact) { foreach($impact as $impacta) { ?> <option value="<?php echo $impacta["id"]; ?>"><?php echo $impacta["impact_name"]; ?></option> <?php } }?></div><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1">&nbsp;</label><input type="text"   placeholder="Enter emission factor" class="form-control" id="exampleInputEmail1" required="required" name="emission_factor[]"></div><div class="col-md-3" style="float: left;"><label for="exampleInputEmail1">&nbsp;</label><input type="text"   placeholder="Enter Source" class="form-control" id="exampleInputEmail1" required="required" name="source[]"></div> <div class="col-md-2" style="float: left;"><label for="exampleInputEmail1" style="width: 100%;">&nbsp;</label><button type="button" class="btn btn-primary" onclick="unitaddStandAndClassificDiv()" ><i class="fa fa-plus"></i></button>&nbsp;<button class="unitremove_stand_and_classific_block btn btn-danger"><i class="fa fa-trash"></i></button></div></div></div>');

    }



  $(document).on('click','.unitremove_stand_and_classific_block',function(){



    $(this).closest('.unitstandDiv').remove();



  });    
</script>

<script>



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
      $("select.ghg-for-factor").change(function(){
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
