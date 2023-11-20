<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')?>">
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js')?>"></script>
<style>
   .select2-container--classic .select2-results__option, .select2-container--default .select2-results__option{
   font-weight:bolder;
   }
   .fw-bolder{
   font-weight:bolder;
   }
   .select #assign option[value="Admin"]
   {
   background-image:url(john.jpg);   }
   .box.bg-primary.text-white {
   height: 6rem;
   align-items: center;
   justify-content: center;
   display: flex;
   }
   .box-2.bg-primary.text-white {
   height: 32px;
   align-items: center;
   justify-content: center;
   display: flex;
   }
   .my-7{
   margin: 7px 0;
   }
   p.mb-0.fs {
    font-size: 13px;
}
</style>
<?= $this->endSection();?>
<?= $this->section('content') ?>
<div class="app-content content">

<div class="row">
<div class="offset-md-10 col-md-2 text-end">
  <a href="<?php echo base_url('/automotion') ?>" class="btn btn-primary">Back</a>
</div>
   <div class="content-wrapper container-xxl p-0">
      <!-- <h5>Weather</h5>
         <img id="weather" style="width: 100px;" src="https://i.pinimg.com/736x/34/bf/77/34bf773ad848b29fadbdc670a99c1e42--morning-news-sunday-morning.jpg">
         -->

      <div class="container p-1">
         <?php $value=$last_id_data;?> 
         <!-- <h2 class="px-4"> <?php echo $value['description'];?>
            </h2> -->
         <div class="card">
           
            <div class="card-body p-1 pb-1">
                <p class="mb-0 fs">
               <?php $input =$value['updated_at'];
                  $date = time();
                  echo date('d M Y h:i A', $date);
                  ?>
               <!-- <h5 class="pt-2"><?php echo $value['description'];?> </h5> -->
            </p>
               <div class="container">
                  <div class="row">
                     <div class="col-md-2">
                        <img  style="width: 50px;" src="https://i.pinimg.com/736x/34/bf/77/34bf773ad848b29fadbdc670a99c1e42--morning-news-sunday-morning.jpg">
                     </div>
                     <div class="col-md-3 pt-2">
                        <h6 class="fw-bolder">Place</h6>
                        <p class="mb-0 fs"> <?php echo $value['city_name'];?> </p>
                     </div>
                     <div class="col-md-2 pt-2">
                        <h6  class="fw-bolder">Temperature</h6>
                        <p class="mb-0 fs"> <?php echo $value['temp'];?> <span>'C</span>
                        </p>
                     </div>
                     <div class="col-md-1 pt-2">
                        <h6  class="fw-bolder">Wind</h6>
                        <p class="mb-0 fs"> <?php echo $value['wind'];?> <span>KM/h</span>
                        </p>
                     </div>
                     <div class="col-md-2 pt-2">
                        <h6  class="fw-bolder">Humidity</h6>
                        <p class="mb-0 fs"> <?php echo $value['humidity'];?> <span>% RH</span>
                        </p>
                     </div>
                               <div class="col-md-1 pt-2">
     <h6 class="fw-bolder">Status</h6>
 <span class="rohit badge badge-light-success"  data-id="<?php echo $value['id']; ?>">Connected</span>
 </div>
       <div class="col-md-1 pt-2 text-end">
                <div class="ms-2">
                  <a
                    class="btn btn-icon rounded-circle hide-arrow dropdown-toggle p-0"
                    href="javascript:void(0)"
                    id="dropdownMenuButton1"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    >
                    <i data-feather="more-vertical" class="font-medium-4"></i>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                        <i data-feather="edit-2" class="me-50"></i><span>Update</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                        <i data-feather="trash-2" class="me-50"></i><span>Delete</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
                  </div>
    
               </div>
            </div>
         </div>
      </div>
      
   </div>
</div>
<div class="row">
   <!-- Area Chart starts -->
   <div class="col-12">
      <div class="card">
         <div class="
            card-header
            d-flex
            flex-sm-row flex-column
            justify-content-md-between
            align-items-start
            justify-content-start
            ">
            <div>
               <h4 class="card-title">Weather Line Chart</h4>
            </div>
            <div class="">
              
               <b class="me-1">Last Updated 12 Hrs <?php  $meth = strtotime('now');
echo  date('m-d-Y',$meth); ?></b>
                
               <!--<i class="font-medium-2" data-feather="calendar"></i>-->
               <form class="d-inline-flex" action="<?php echo base_url('sensor/months')?>" method="post">
                  <input type="hidden" name="id" value="<?php echo $id;?>">

                  <!-- <select name="months" id="months" class="me-1" required="required">
                     <option  <?= $check==1?"selected":""?> value="1">Last 12 Months</option>
                     <option  <?= $check==2?"selected":""?>  value="2">Last 24 Hrs</option>
                  </select> -->
                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
               </form>
               <div  class="form-control flat-picker bg-transparent border-0" placeholder="YYYY-MM-DD">
                  <p></p>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div id="line-area-char"></div>
         </div>
      </div>
   </div>
</div>
<section class="sensor-styled__Section-sc-wa4lha-4 hDwqNW">
   <h3 class="typography__H3-sc-rmkozr-2 dtcQgF">Alert configuration</h3>
   <section class="card">
      <div class="px-2 pt-2">
         <div class="form-switch">
            <input type="checkbox" class="form-control-input" id="formSwitch1"
               <?php foreach($checked_data as $data){?>
               <?php echo($data['name']=="Temperature" ? 'checked' : '')?>
               <?php
                  }?> >
         </div>
         <div data-anchor="alert-config-enabled-switch-1" tabindex="0" role="checkbox" aria-checked="false" class="checkbox__CheckboxContainer-sc-1w2w3z1-0 xxrKk">
            <input id="alert-config-enabled-switch-1" hidden="" aria-hidden="false" type="checkbox" aria-checked="false">
            <div class="switch-renderer__SwitchContainer-sc-1hwzdgm-0 gcJxPV">
               <div class="switch-renderer__SwitchInput-sc-1hwzdgm-1 mNjXg"></div>
            </div>
         </div>
         <div class="alert-configuration-card-styled__TitleDescriptionWrapper-sc-1j188c6-2 ERHSc">
            <div class="alert-configuration-card-styled__DescriptionWrapper-sc-1j188c6-3 jpYSiJ">
               <?php foreach($checked_data as $data){?>
               <?php if($data['name']=="Temperature"){?>
               <button id="formSwitch111" style="float:right;">Edit</button>
               <?php
                  }?>
               <?php
                  }?>
               <h4 class="typography__H4-sc-rmkozr-3 alert-configuration-card-styled__Title-sc-1j188c6-5 dCdsgd fcfDsy">Temperature alert</h4>
               <?php foreach($checked_data as $data){?>
               <?php if($data['name']=="Temperature"){?>
               <p class="" style="float:left;">When temperature goes
                  <?php if($data['above'] == '0'){?>
                  below <?php echo $data['below']; ?> ˚C
                  <?php
                     }?>
                  <?php if($data['below'] == '0'){?>
                  above  <?php echo $data['above']; ?> ˚C
                  <?php
                     }?>
                  for <?php echo $data['for_longer']; ?>
                  <?php foreach($assign as $s)
                     { ?>
                  <?php if($s['id'] == $data['noti_to']){?>
                  - <?php echo $s['supplier_name']; ?> assigned
                  <?php
                     }  ?>
                  <?php
                     }?>
               </p>
               <?php
                  }
                  else{?>
               <?php
                  }?>
               <?php
                  }?>
            </div>
         </div>
      </div>
      <section id="sidedemo" class="form-control" style="display:none;">
         <form action="<?php echo base_url() ?>/Sensor/alert" method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="Wind" value="Temperature">
            <input type="hidden" name="alert_id" value="">
            <div class="form-control">
               <div>
                  <div class="" data-anchor="config-type-above">
                     <input id="1" type="radio" class="" name="above" checked="">
                     <label for="1" class="radio-group-styled__InputLabel-sc-1du9lbm-4 cVJYXN">Above</label>
                  </div>
                  <span>
                  <input id="2" type="radio" class="" name="above">
                  <label for="2" class="radio-group-styled__InputLabel-sc-1du9lbm-4 cVJYXN">Below</label></span>
                  <div class="" data-anchor="config-type-below">
                     <input id="3" type="radio" class="" name="above">
                     <label for="2" class="radio-group-styled__InputLabel-sc-1du9lbm-4 cVJYXN">Above or Below</label>
                  </div>
               </div>
            </div>
            <div class="alert-configuration-card-styled__InnerBody-sc-1j188c6-8 ijWSCd">
            <!-- <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first" id="aaaaa">Above</span> -->
            <div class="alert-threshold-input-styled__StyledInput-sc-tcymlu-1 eNbWSY" style="display: flex; position: relative; overflow: hidden;">
            <div class="row">
            <div class="col-md-3 col-12" id="below1" style="display:none;">
               <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first">Above</span>
               <div class="mb-1">
                  <?php if($temp){?>
                  <?php foreach($temp as $data){?>
                  <input class="form-control"  type="number" name="above" value="<?php echo $data['above'] ?>">
                  <?php
                     }?>
                  <?php
                     }else
                     {?>
                  <input class="form-control"  type="number" name="above" value="0">
                  <?php
                     }?>
                  <div class="input-with-icon__TxtWrapper-sc-1p1fir-2 bNWmDn">˚C</div>
               </div>
            </div>
            <div class="col-md-3 col-12" id="below2" style="display:none;">
               <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first">Below</span>
               <div class="mb-1">
                  <?php if($temp){?>
                  <?php foreach($temp as $data){?>
                  <input class="form-control"  type="number" name="below" value="<?php echo $data['below'] ?>">
                  <?php
                     }?>
                  <?php
                     }else
                     {?>
                  <input class="form-control"  type="number" name="below" value="0">
                  <?php
                     }?>
                  <span>˚C</span>
               </div>
            </div>
            <span class="form-lable">For longer than</span>
            <div class="row">
               <div class="col-md-3 col-12">
                  <div class="mb-1">
                     <select name="for_longer" id="boundary" class="form-control select2" required="required">
                        <?php if($temp){?>
                        <option  value="">Select Minutes</option>
                        <?php foreach($temp as $data){?>
                        <option <?php echo($data['for_longer']=="60 minutes" ? 'selected' : '')?> value="60 minutes">60 minutes</option>
                        <option  <?php echo($data['for_longer']=="30 minutes" ? 'selected' : '')?> value="30 minutes">30 minutes</option>
                        <option  <?php echo($data['for_longer']=="45 minutes" ? 'selected' : '')?> value="45 minutes">45 minutes</option>
                        <option  <?php echo($data['for_longer']=="90 minutes" ? 'selected' : '')?> value="90 minutes">90 minutes</option>
                        <option  <?php echo($data['for_longer']=="120 minutes" ? 'selected' : '')?> value="120 minutes">120 minutes</option>
                        <?php
                           }?>
                        <?php
                           }else{?>
                        <option  value="">Select Minutes</option>
                        <option  value="60 minutes">60 minutes</option>
                        <option   value="30 minutes">30 minutes</option>
                        <option   value="45 minutes">45 minutes</option>
                        <option   value="90 minutes">90 minutes</option>
                        <option   value="120 minutes">120 minutes</option>
                        <?php
                           }?>
                     </select>
                  </div>
               </div>
               <span class="form-lable">Send notification to</span>
               <div class="row">
                  <div class="col-md-6 col-12">
                     <select class="select2 form-select" style="width: 200px;" name="noti_to" id="assignn">
                        <?php
                           foreach($assign as $s) { ?>
                        <option value="<?php echo $s['id']; ?>"><?php echo $s['supplier_name']; ?>
                           <?php
                              if($s['role'] == 10)
                              {
                              echo "( Admin )";
                              }
                              elseif($s['role'] == 11){
                              echo "( Manager )";
                              }
                              elseif($s['role'] == 0){
                              echo "( Owner )";
                              }
                              elseif($s['role'] == 12){
                              echo "( Emploee )";
                              }
                              else{
                              echo "( Supplier )";
                              }
                              ?>
                        </option>
                        <?php  } ?>
                        <option value="manuly">Manually</option>
                     </select>
                  </div>
                  <div id="manuallyemail" class="pt-1 pb-1"  style="display:none;">
                     <label class="">Email</label>
                     <input type="email" name="email" class="form-control">
                  </div>
               </div>
            </div>
            <div>
               <button type="submit">Save</button>
               <button  class="button__StyledButton-sc-ftmyi7-1 chnkCq alert-configuration-card-styled__StyledButton-sc-1j188c6-12 hAQYCt" type="button">Cancel</button>
            </div>
         </form>
      </section>
   </section>
   <section class="card">
      <div class="px-2 pt-2">
         <div class="form-switch">
            <input type="checkbox" class="form-control-input" id="formSwitch0" <?php foreach($checked_data as $data){?>
               <?php echo($data['name']=="Humidity" ? 'checked' : '')?>
               <?php
                  }?>>
         </div>
         <div data-anchor="alert-config-enabled-switch-2" tabindex="0" role="checkbox" aria-checked="false" class="checkbox__CheckboxContainer-sc-1w2w3z1-0 xxrKk">
            <input id="alert-config-enabled-switch-2" hidden="" aria-hidden="false" type="checkbox" aria-checked="false">
            <div class="switch-renderer__SwitchContainer-sc-1hwzdgm-0 gcJxPV">
               <div class="switch-renderer__SwitchInput-sc-1hwzdgm-1 mNjXg"></div>
            </div>
         </div>
         <div class="alert-configuration-card-styled__TitleDescriptionWrapper-sc-1j188c6-2 ERHSc">
            <div class="alert-configuration-card-styled__DescriptionWrapper-sc-1j188c6-3 jpYSiJ">
               <h4 class="typography__H4-sc-rmkozr-3 alert-configuration-card-styled__Title-sc-1j188c6-5 dCdsgd fcfDsy">Humidity alert</h4>
               <?php foreach($checked_data as $data){?>
               <?php if($data['name']=="Humidity"){?>
               <button id="formSwitch000" style="float:right;">Edit</button>
               <?php
                  }?>
               <?php
                  }?>
               <?php foreach($checked_data as $data){?>
               <?php if($data['name']=="Humidity"){?>
               <p class="" style="float:left;">When temperature goes <?php if($data['above'] == '0'){?> below <?php echo $data['below']; ?> ˚C
                  <?php
                     }?>
                  <?php if($data['below'] == '0'){?> above  <?php echo $data['above']; ?> ˚C
                  <?php
                     }?> for <?php echo $data['for_longer']; ?>
                  <?php
                     foreach($assign as $s)
                     { ?>
                  <?php if($s['id'] == $data['noti_to']){?>
                  - <?php echo $s['supplier_name']; ?>assigned
                  <?php
                     }  ?>
                  <?php
                     }?>
               </p>
               <?php
                  }
                  else{?>
               <p class="alert-description-styled__P-sc-k43g5r-0 dWbbbv">Alert <strong>OFF</strong></p>
               <?php
                  }?>
               <?php
                  }?>
            </div>
         </div>
      </div>
      <section id="sidedemo0" class="form-control" style="display:none;">
         <form action="<?php echo base_url() ?>/Sensor/alert" method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="Wind" value="Humidity">
            <input type="hidden" name="alert_id" value="">
            <div class="form-control">
               <div>
                  <div class="" data-anchor="config-type-above">
                     <input id="11" type="radio" class="" name="above" checked="">
                     <label for="1" class="radio-group-styled__InputLabel-sc-1du9lbm-4 cVJYXN">Above</label>
                  </div>
                  <span>
                  <input id="22" type="radio" class="" name="above">
                  <label for="2" class="radio-group-styled__InputLabel-sc-1du9lbm-4 cVJYXN">Below</label></span>
                  <div class="" data-anchor="config-type-below">
                     <input id="33" type="radio" class="" name="above">
                     <label for="2" class="radio-group-styled__InputLabel-sc-1du9lbm-4 cVJYXN">Above or Below</label>
                  </div>
               </div>
            </div>
            <div class="alert-configuration-card-styled__InnerBody-sc-1j188c6-8 ijWSCd">
            <!-- <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first" id="aaaaa">Above</span> -->
            <div class="alert-threshold-input-styled__StyledInput-sc-tcymlu-1 eNbWSY" style="display: flex; position: relative; overflow: hidden;">
            <div class="row">
            <div class="col-md-3 col-12" id="below11" style="display:none;">
               <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first">Above</span>
               <div class="mb-1">
                  <?php if($humidity){?>
                  <?php foreach($humidity as $data){?>
                  <input class="form-control"  type="number" name="above" value="<?php echo $data['above'] ?>">
                  <?php
                     }?>
                  <?php
                     }else
                     {?>
                  <input class="form-control"  type="number" name="above" value="0">
                  <?php
                     }?>
                  <div class="input-with-icon__TxtWrapper-sc-1p1fir-2 bNWmDn">˚C</div>
               </div>
            </div>
            <div class="col-md-3 col-12" id="below22" style="display:none;">
               <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first">Below</span>
               <div class="mb-1">
                  <?php if($humidity){?>
                  <?php foreach($humidity as $data){?>
                  <input class="form-control"  type="number" name="below" value="<?php echo $data['below'] ?>">
                  <?php
                     }?>
                  <?php
                     }else
                     {?>
                  <input class="form-control"  type="number" name="below" value="0">
                  <?php
                     }?>
                  <div class="input-with-icon__TxtWrapper-sc-1p1fir-2 bNWmDn">˚C</div>
               </div>
            </div>
            <span class="form-lable">For longer than</span>
            <div class="row">
               <div class="col-md-3 col-12">
                  <div class="mb-1">
                     <select name="for_longer" id="boundary" class="form-control select2" required="required">
                        <?php if($humidity){?>
                        <?php foreach($humidity as $data){?>
                        <option <?php echo($data['for_longer']=="60 minutes" ? 'selected' : '')?> value="60 minutes">60 minutes</option>
                        <option  <?php echo($data['for_longer']=="30 minutes" ? 'selected' : '')?> value="30 minutes">30 minutes</option>
                        <option  <?php echo($data['for_longer']=="45 minutes" ? 'selected' : '')?> value="45 minutes">45 minutes</option>
                        <option  <?php echo($data['for_longer']=="90 minutes" ? 'selected' : '')?> value="90 minutes">90 minutes</option>
                        <option  <?php echo($data['for_longer']=="120 minutes" ? 'selected' : '')?> value="120 minutes">120 minutes</option>
                        <?php
                           }?>
                        <?php
                           }else{?>
                        <option  value="60 minutes">60 minutes</option>
                        <option   value="30 minutes">30 minutes</option>
                        <option   value="45 minutes">45 minutes</option>
                        <option   value="90 minutes">90 minutes</option>
                        <option   value="120 minutes">120 minutes</option>
                        <?php
                           }?>
                     </select>
                  </div>
               </div>
               <span class="form-lable">Send notification to</span>
               <div class="row">
                  <
                  <div class="col-md-6 col-12">
                     <select class="select2 form-select" style="width: 200px;" name="noti_to" id="assignn">
                        <?php
                           foreach($assign as $s)
                           { ?>
                        <option data-img_src="https://user.positiivplus.io/public/uploads/owner/john.jpg" value="<?php echo $s['id']; ?>">
                           <?php echo $s['supplier_name']; ?>
                           <?php
                              if($s['role'] == 10)
                              {
                              echo "( Admin )";
                              }
                              elseif($s['role'] == 11){
                              echo "( Manager )";
                              }
                              elseif($s['role'] == 0){
                              echo "( Owner )";
                              }
                              elseif($s['role'] == 12){
                              echo "( Emploee )";
                              }
                              else{
                              echo "( Supplier )";
                              }
                              ?>
                        </option>
                        <?php  } ?>
                        <option value="manuly" class="manually">Manually</option>
                     </select>
                  </div>
                  <div id="manuallyemaiy" class="pt-1 pb-1"  style="display:none;">
                     <label class="">Email</label>
                     <input type="email" name="email" class="form-control">
                  </div>
               </div>
            </div>
            <div>
               <button   type="submit">Save</button>
               <button  class="button__StyledButton-sc-ftmyi7-1 chnkCq alert-configuration-card-styled__StyledButton-sc-1j188c6-12 hAQYCt" type="button">Cancel</button>
            </div>
         </form>
      </section>
   </section>
   <section class="card">
      <div class="px-2 pt-2">
         <div class="form-switch">
            <input type="checkbox" class="form-control-input" id="formSwitch2"
               <?php foreach($checked_data as $data){?>
               <?php echo($data['name']=="Wind speed" ? 'checked' : '')?>
               <?php
                  }?>
               >
         </div>
         <div data-anchor="alert-config-enabled-switch-13" tabindex="0" role="checkbox" aria-checked="false" class="checkbox__CheckboxContainer-sc-1w2w3z1-0 xxrKk">
            <input id="alert-config-enabled-switch-13" hidden="" aria-hidden="false" type="checkbox" aria-checked="false">
            <div class="switch-renderer__SwitchContainer-sc-1hwzdgm-0 gcJxPV">
               <div class="switch-renderer__SwitchInput-sc-1hwzdgm-1 mNjXg"></div>
            </div>
         </div>
         <div class="alert-configuration-card-styled__TitleDescriptionWrapper-sc-1j188c6-2 ERHSc">
            <div class="alert-configuration-card-styled__DescriptionWrapper-sc-1j188c6-3 jpYSiJ">
               <h4 class="typography__H4-sc-rmkozr-3 alert-configuration-card-styled__Title-sc-1j188c6-5 dCdsgd fcfDsy">Wind speed alert</h4>
               <?php foreach($checked_data as $data){?>
               <?php if($data['name']=="Wind speed"){?>
               <button id="formSwitch222" style="float:right;">Edit</button>
               <?php
                  }?>
               <?php
                  }?>
               <?php foreach($checked_data as $data){?>
               <?php if($data['name']=="Wind speed"){?>
               <p class="" style="float:left;">When temperature goes above <?php echo $data['above']; ?> KM/h for <?php echo $data['for_longer']; ?> - no recipients assigned</p>
               <?php
                  }
                  else{?>
               <p class="alert-description-styled__P-sc-k43g5r-0 dWbbbv">Alert <strong>OFF</strong></p>
               <?php
                  }?>
               <?php
                  }?>
            </div>
         </div>
      </div>
      <section id="sidedemo2" class="form-control" style="display:none;">
         <form action="<?php echo base_url() ?>/Sensor/alert" method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="Wind" value="Wind speed">
            <input type="hidden" name="alert_id" value="">
            <div class="alert-configuration-card-styled__InnerBody-sc-1j188c6-8 ijWSCd">
            <!-- <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first" id="aaaaa">Above</span> -->
            <div class="alert-threshold-input-styled__StyledInput-sc-tcymlu-1 eNbWSY" style="display: flex; position: relative; overflow: hidden;">
            <div class="row">
            <div class="col-md-3 col-12" id="below1">
               <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first">Above</span>
               <div class="mb-1">
                  <?php if($wind){?>
                  <?php foreach($wind as $data){?>
                  <input class="form-control"  type="number" name="above" value="<?php echo $data['above'] ?>">
                  <?php
                     }?>
                  <?php
                     }else
                     {?>
                  <input class="form-control"  type="number" name="above" value="0">
                  <?php
                     }?>
                  <div class="input-with-icon__TxtWrapper-sc-1p1fir-2 bNWmDn">KM/h</div>
               </div>
            </div>
            <span class="form-lable">For longer than</span>
            <div class="row">
            <div class="col-md-3 col-12">
               <div class="mb-1">
                  <select name="for_longer" id="boundary" class="form-control select2" required="required">
                     <?php if($wind){?>
                     <?php foreach($wind as $data){?>
                     <option <?php echo($data['for_longer']=="60 minutes" ? 'selected' : '')?> value="60 minutes">60 minutes</option>
                     <option  <?php echo($data['for_longer']=="30 minutes" ? 'selected' : '')?> value="30 minutes">30 minutes</option>
                     <option  <?php echo($data['for_longer']=="45 minutes" ? 'selected' : '')?> value="45 minutes">45 minutes</option>
                     <option  <?php echo($data['for_longer']=="90 minutes" ? 'selected' : '')?> value="90 minutes">90 minutes</option>
                     <option  <?php echo($data['for_longer']=="120 minutes" ? 'selected' : '')?> value="120 minutes">120 minutes</option>
                     <?php
                        }?>
                     <?php
                        }else{?>
                     <option  value="60 minutes">60 minutes</option>
                     <option   value="30 minutes">30 minutes</option>
                     <option   value="45 minutes">45 minutes</option>
                     <option   value="90 minutes">90 minutes</option>
                     <option   value="120 minutes">120 minutes</option>
                     <?php
                        }?>
                  </select>
               </div>
            </div>
            <span class="form-lable">Send notification to</span>
            <div class="row">
               <div class="col-md-6 col-12">
                  <select class="select2 form-select" style="width: 200px;" name="noti_to" id="assignn">
                     <?php
                        foreach($assign as $s)
                        { ?>
                     <option data-img_src="https://user.positiivplus.io/public/uploads/owner/john.jpg" value="<?php echo $s['id']; ?>">
                        <?php echo $s['supplier_name']; ?>
                        <?php
                           if($s['role'] == 10)
                           {
                           echo "( Admin )";
                           }
                           elseif($s['role'] == 11){
                           echo "( Manager )";
                           }
                           elseif($s['role'] == 0){
                           echo "( Owner )";
                           }
                           elseif($s['role'] == 12){
                           echo "( Emploee )";
                           }
                           else{
                           echo "( Supplier )";
                           }
                           ?>
                     </option>
                     <?php  } ?>
                     <option value="manuly" class="manually">Manually</option>
                  </select>
               </div>
               <div id="manuallyemai" class="pt-1 pb-1"  style="display:none;">
                  <label class="">Email</label>
                  <input type="email" name="email" class="form-control">
               </div>
            </div>
            <div>
               <button type="submit">Save</button>
               <button  class="button__StyledButton-sc-ftmyi7-1 chnkCq alert-configuration-card-styled__StyledButton-sc-1j188c6-12 hAQYCt" type="button">Cancel</button>
            </div>
         </form>
      </section>
   </section>
   <section class="card">
      <div class="px-2 pt-2">
         <div class="form-switch">
            <input type="checkbox" class="form-control-input" id="formSwitch3"
               <?php foreach($checked_data as $data){?>
               <?php echo($data['name']=="Wind gust" ? 'checked' : '')?>
               <?php
                  }?>>
         </div>
         <div data-anchor="alert-config-enabled-switch-15" tabindex="0" role="checkbox" aria-checked="false" class="checkbox__CheckboxContainer-sc-1w2w3z1-0 xxrKk">
            <input id="alert-config-enabled-switch-15" hidden="" aria-hidden="false" type="checkbox" aria-checked="false">
            <div class="switch-renderer__SwitchContainer-sc-1hwzdgm-0 gcJxPV">
               <div class="switch-renderer__SwitchInput-sc-1hwzdgm-1 mNjXg"></div>
            </div>
         </div>
         <div class="alert-configuration-card-styled__TitleDescriptionWrapper-sc-1j188c6-2 ERHSc">
            <div class="alert-configuration-card-styled__DescriptionWrapper-sc-1j188c6-3 jpYSiJ">
               <h4 class="typography__H4-sc-rmkozr-3 alert-configuration-card-styled__Title-sc-1j188c6-5 dCdsgd fcfDsy">Wind gust alert</h4>
               <?php foreach($checked_data as $data){?>
               <?php if($data['name']=="Wind gust"){?>
               <button id="formSwitch333" style="float:right;">Edit</button>
               <?php
                  }?>
               <?php
                  }?>
               <?php foreach($checked_data as $data){?>
               <?php if($data['name']=="Wind gust"){?>
               <p class="" style="float:left;">When temperature goes above <?php echo $data['above']; ?> KM/h for <?php echo $data['for_longer']; ?> - no recipients assigned</p>
               <?php
                  }
                  else{?>
               <p class="alert-description-styled__P-sc-k43g5r-0 dWbbbv">Alert <strong>OFF</strong></p>
               <?php
                  }?>
               <?php
                  }?>
            </div>
         </div>
      </div>
      <section id="sidedemo3" class="form-control" style="display:none;">
         <form action="<?php echo base_url() ?>/Sensor/alert" method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="Wind" value="Wind gust">
            <input type="hidden" name="alert_id" value="">
            <div class="alert-configuration-card-styled__InnerBody-sc-1j188c6-8 ijWSCd">
            <!-- <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first" id="aaaaa">Above</span> -->
            <div class="alert-threshold-input-styled__StyledInput-sc-tcymlu-1 eNbWSY" style="display: flex; position: relative; overflow: hidden;">
               <div class="row">
                  <div class="col-md-3 col-12" id="below1">
                     <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first">Above</span>
                     <div class="mb-1">
                        <?php if($wind_gust){?>
                        <?php foreach($wind_gust as $data){?>
                        <input class="form-control"  type="number" name="above" value="<?php echo $data['above'] ?>">
                        <?php
                           }?>
                        <?php
                           }else
                           {?>
                        <input class="form-control"  type="number" name="above" value="0">
                        <?php
                           }?>
                        <div class="input-with-icon__TxtWrapper-sc-1p1fir-2 bNWmDn">KM/h</div>
                     </div>
                  </div>
                  <span class="form-lable">For longer than</span>
                  <div class="row">
                     <div class="col-md-3 col-12">
                        <div class="mb-1">
                           <select name="for_longer" id="boundary" class="form-control select2" required="required">
                              <?php if($wind_gust){?>
                              <?php foreach($wind_gust as $data){?>
                              <option <?php echo($data['for_longer']=="60 minutes" ? 'selected' : '')?> value="60 minutes">60 minutes</option>
                              <option  <?php echo($data['for_longer']=="30 minutes" ? 'selected' : '')?> value="30 minutes">30 minutes</option>
                              <option  <?php echo($data['for_longer']=="45 minutes" ? 'selected' : '')?> value="45 minutes">45 minutes</option>
                              <option  <?php echo($data['for_longer']=="90 minutes" ? 'selected' : '')?> value="90 minutes">90 minutes</option>
                              <option  <?php echo($data['for_longer']=="120 minutes" ? 'selected' : '')?> value="120 minutes">120 minutes</option>
                              <?php
                                 }?>
                              <?php
                                 }else{?>
                              <option  value="60 minutes">60 minutes</option>
                              <option   value="30 minutes">30 minutes</option>
                              <option   value="45 minutes">45 minutes</option>
                              <option   value="90 minutes">90 minutes</option>
                              <option   value="120 minutes">120 minutes</option>
                              <?php
                                 }?>
                           </select>
                        </div>
                     </div>
                     <span class="form-lable">Send notification to</span>
                     <div class="row">
                        <div class="col-md-6 col-12">
                           <select class="select2 form-select" style="width: 200px;" name="noti_to" id="assignn">
                              <?php
                                 foreach($assign as $s)
                                 { ?>
                              <option data-img_src="https://user.positiivplus.io/public/uploads/owner/john.jpg" value="<?php echo $s['id']; ?>">
                                 <?php echo $s['supplier_name']; ?>
                                 <?php
                                    if($s['role'] == 10)
                                    {
                                    echo "( Admin )";
                                    }
                                    elseif($s['role'] == 11){
                                    echo "( Manager )";
                                    }
                                    elseif($s['role'] == 0){
                                    echo "( Owner )";
                                    }
                                    elseif($s['role'] == 12){
                                    echo "( Emploee )";
                                    }
                                    else{
                                    echo "( Supplier )";
                                    }
                                    ?>
                              </option>
                              <?php  } ?>
                              <option value="manuly" class="manually">Manually</option>
                           </select>
                        </div>
                        <div id="manuallyemai" class="pt-1 pb-1"  style="display:none;">
                           <label class="">Email</label>
                           <input type="email" name="email" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div>
                     <button type="submit">Save</button>
                     <button  class="button__StyledButton-sc-ftmyi7-1 chnkCq alert-configuration-card-styled__StyledButton-sc-1j188c6-12 hAQYCt" type="button">Cancel</button>
                  </div>
         </form>
      </section>
      <b></b>
   </section>
</section>
<p><b>Weather details</b><p>
<p>Weather:
Data feed - weather</p>
<p>Selected location:
<?php $value=$last_id_data;?>
<?php echo $value['long']; ?>, <?php echo $value['lat']; ?>

</p>
Powered by:Aeris-Weather
</div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<script>
   $(document).ready(function() {
   $(document).on('click', '.rohit', function(event) {
   event.preventDefault();
   var id = $(this).data('id');
   
   window.location.href = "/view_weather_data";
   
   });
   });
</script>
<!-- <script type="text/javascript">
   function custom_template(obj){
   var data = $(obj.element).data();
   var text = $(obj.element).text();
   if(data && data['img_src']){
   img_src = data['img_src'];
   // template1 = $("<div>ddddd </div>");
   // template = $("<div><p class='p-10px' style=\"text-align:;\">" + text + "</p><img  style=\"width:15%;height:15px;padding-right: 10px; \"  class='rounded-circle' src=\"" + img_src + "\" style=\"width:15%;height:15px;\"/></div>");
   template = $("<div class='media'> <div class='media-aside align-self-center'><a href='#' class='b-avatar badge-light-info rounded-circle' target='_self' style='width: 32px; height: 32px;'><span class='b-avatar-img'><img src='https://user.positiivplus.io/public/uploads/owner/john.jpg' alt='avatar'></span></a></div><div class='media-body'><a href='#' class='fw-bolder d-block text-nowrap text-dark' target='_self'>"+ text +"</a></div> ");
   return template;
   }
   }
   var options = {
   'templateSelection': custom_template,
   'templateResult': custom_template,
   }
   $('#assignn').select2(options);
   $('.select2-container--default .select2-selection--single').css({'height': '40px'});
   </script> -->
<script>
   $(document).ready(function(){
   $("#1").click(function(){
   $("#aaaaa").html('Above');
   $("#below1").show();
   $("#below2").hide();
   
   
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#11").click(function(){
   $("#aaaaa").html('Above');
   $("#below11").show();
   $("#below22").hide();
   
   
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#2").click(function(){
   $("#aaaaa").html('Below');
   
   $("#below2").show();
   $("#below1").hide();
   
   
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#22").click(function(){
   $("#aaaaa").html('Below');
   
   $("#below22").show();
   $("#below11").hide();
   
   
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#3").click(function(){
   $("#aaaaa").html('Above or Below');
   $("#below1").show();
   $("#below2").show();
   
   
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#33").click(function(){
   $("#aaaaa").html('Above or Below');
   
   $("#below11").show();
   $("#below22").show();
   
   
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#formSwitch1").click(function(){
   $("#sidedemo").slideToggle("slow");
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#formSwitch111").click(function(){
   $("#sidedemo").slideToggle("slow");
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#formSwitch0").click(function(){
   $("#sidedemo0").slideToggle("slow");
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#formSwitch000").click(function(){
   $("#sidedemo0").slideToggle("slow");
   });
   });
</script>
<script>
   $(document).ready(function() {
   $('select[name="noti_to"]').on('change', function() {
   var sId = $(this).val();
   if(sId == "manuly"){
   $("#manuallyemail").show();
   }else{
   $("#manuallyemail").hide();
   }
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#formSwitch3").click(function(){
   $("#sidedemo3").slideToggle("slow");
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#formSwitch333").click(function(){
   $("#sidedemo3").slideToggle("slow");
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#formSwitch2").click(function(){
   $("#sidedemo2").slideToggle("slow");
   });
   });
</script>
<script>
   $(document).ready(function(){
   $("#formSwitch222").click(function(){
   $("#sidedemo2").slideToggle("slow");
   });
   });
</script>
<script type="text/javascript">
   $(window).on('load',  function(){
   if (feather) {
   feather.replace({ width: 14, height: 14 });
   }
   })
</script>
<script>
   $("document").ready(function() {
   $('#weather').on('click', function() {
   // alert('l');
   window.location.href = "/weather";
   });
   });
</script>
<script>
   $((
   function(){"use strict";var e=$(".flat-picker"),t="rtl"===$("html").attr("data-textdirection"),
   a={series1:"#826af9",series2:"#d2b0ff",bg:"#f8d3ff"},
   o={series1:"#ffe700",series2:"#00d4bd",series3:"#826bf8",series4:"#2b9bf4",series5:"#FFA1A1"},r={series3:"#a4f8cd",series2:"#60f2ca",series1:"#2bdac7"};function s(e,t){for(var a=0,o=[];a<e;)
   {var r="w"+(a+1).toString(),
   s=Math.floor(Math.random()*(t.max-t.min+1))+t.min;o.push({x:r,y:s}),a++}return o}if(e.length)
   var i=document.querySelector("#line-area-char"),
   n={
   chart:{
   height:400,type:"area",parentHeightOffset:0,
   toolbar:{
   show:!1}},dataLabels:{enabled:!1},
   stroke:{show:!1,curve:"straight"},
   legend:{show:!0,position:"top",horizontalAlign:"start"},
   grid:{xaxis:{lines:{show:!0}}},colors:[r.series3,r.series2,r.series1],
   series:[
   {
   name:"Humidity",data:
   [
   <?php if($month){foreach ($month as $key => $value) {
      echo $value['humidity']; ?>,
   
   <?php
      }}
      
      ?>
   
  
   ]},
   {
   name:"Temperature",
   
   data:[
   <?php if($month){foreach ($month as $key => $value) {
      echo $value['temp']; ?>,
   
   <?php
      } }?>
   
      

   ]},
   {
   name:"Wind",
   data:[
   <?php if($month){foreach ($month as $key => $value)
      {
      echo $value['wind']; ?>,
   
   <?php
      } }?>
   
   ]}],
   xaxis:
   {
   categories:
   [
   <?php if($timereal){foreach ($timereal as $key => $value) {
      echo "'".$value."'"; ?>,
   
   <?php
      }}
      
      ?>
   <?php if($monthsall){foreach ($monthsall as $key => $value) {
      echo "'".$value."'"; ?>,
   
   <?php
      }}
      
      ?>
   
   ]
   },
   fill:
   {
   opacity:1,type:"solid"
   },
   tooltip:{shared:!1},
   yaxis:{opposite:t}};
   void 0!==typeof i&&null!==i&&new ApexCharts(i,n).render();
   var l=document.querySelector("#column-chart"),
   d={
   chart:{height:400,type:"bar",stacked:!0,parentHeightOffset:0,toolbar:{show:!1}},
   plotOptions:{bar:{columnWidth:"15%",colors:{backgroundBarColors:[a.bg,a.bg,a.bg,a.bg,a.bg],
   backgroundBarRadius:10}}},dataLabels:{enabled:!1},legend:{show:!0,position:"top",horizontalAlign:"start"},colors:[a.series1,a.series2],stroke:{show:!0,colors:["transparent"]},grid:{xaxis:{lines:{show:!0}}},series:[{name:"Apple",data:[90,120,55,100,80,125,175,70,88,180]},{name:"Samsung",data:[85,100,30,40,95,90,30,110,62,20]}],
   xaxis:{categories:["7/12","8/12","9/12","10/12","11/12","12/12","13/12","14/12","15/12","16/12"]},fill:{opacity:1},yaxis:{opposite:t
   }
   };
   void 0!==typeof l&&null!==l&&new ApexCharts(l,d).render();var p=document.querySelector("#scatter-chart"),c={chart:{height:400,type:"scatter",zoom:{enabled:!0,type:"xy"},parentHeightOffset:0,toolbar:{show:!1}},grid:{xaxis:{lines:{show:!0}}},legend:{show:!0,position:"top",horizontalAlign:"start"},colors:[window.colors.solid.warning,window.colors.solid.primary,window.colors.solid.success],series:[{name:"Angular",data:[[5.4,170],[5.4,100],[6.3,170],[5.7,140],[5.9,130],[7,150],[8,120],[9,170],[10,190],[11,220],[12,170],[13,230]]},{name:"Vue",data:[[14,220],[15,280],[16,230],[18,320],[17.5,280],[19,250],[20,350],[20.5,320],[20,320],[19,280],[17,280],[22,300],[18,120]]},{name:"React",data:[[14,290],[13,190],[20,220],[21,350],[21.5,290],[22,220],[23,140],[19,400],[20,200],[22,90],[20,120]]}],xaxis:{tickAmount:10,labels:{formatter:function(e){return parseFloat(e).toFixed(1)}}},yaxis:{opposite:t}};
   void 0!==typeof p&&null!==p&&new ApexCharts(p,c).render();var h=document.querySelector("#line-chart"),m={chart:{height:400,type:"line",zoom:{enabled:!1},parentHeightOffset:0,toolbar:{show:!1}},series:[{data:[280,200,220,180,270,250,70,90,200,150,160,100,150,100,50]}],markers:{strokeWidth:7,strokeOpacity:1,strokeColors:[window.colors.solid.white],colors:[window.colors.solid.warning]},dataLabels:{enabled:!1},stroke:{curve:"straight"},colors:[window.colors.solid.warning],grid:{xaxis:{lines:{show:!0}},padding:{top:-20}},tooltip:{custom:function(e){return'<div class="px-1 py-50"><span>'+e.series[e.seriesIndex][e.dataPointIndex]+"%</span></div>"}},xaxis:{
   categories:["7/12","8/12","9/12","10/12","11/12","12/12","13/12","14/12","15/12","16/12","17/12","18/12","19/12","20/12","21/12"]},yaxis:{opposite:t}};
   void 0!==typeof h&&null!==h&&new ApexCharts(h,m).render();var f=document.querySelector("#bar-chart"),w={chart:{height:400,type:"bar",parentHeightOffset:0,toolbar:{show:!1}},plotOptions:{bar:{horizontal:!0,barHeight:"30%",endingShape:"rounded"}},grid:{xaxis:{lines:{show:!1}},padding:{top:-15,bottom:-10}},colors:window.colors.solid.info,dataLabels:{enabled:!1},series:[{data:[700,350,480,600,210,550,150]}],xaxis:{categories:["MON, 11","THU, 14","FRI, 15","MON, 18","WED, 20","FRI, 21","MON, 23"]},yaxis:{opposite:t}};
   void 0!==typeof f&&null!==f&&new ApexCharts(f,w).render();var g=document.querySelector("#candlestick-chart"),u={chart:{height:400,type:"candlestick",parentHeightOffset:0,toolbar:{show:!1}},series:[{data:[{x:new Date(15387786e5),y:[150,170,50,100]},{x:new Date(15387804e5),y:[200,400,170,330]},{x:new Date(15387822e5),y:[330,340,250,280]},{x:new Date(1538784e6),y:[300,330,200,320]},{x:new Date(15387858e5),y:[320,450,280,350]},{x:new Date(15387876e5),y:[300,350,80,250]},{x:new Date(15387894e5),y:[200,330,170,300]},{x:new Date(15387912e5),y:[200,220,70,130]},{x:new Date(1538793e6),y:[220,270,180,250]},{x:new Date(15387948e5),y:[200,250,80,100]},{x:new Date(15387966e5),y:[150,170,50,120]},{x:new Date(15387984e5),y:[110,450,10,420]},{x:new Date(15388002e5),y:[400,480,300,320]},{x:new Date(1538802e6),y:[380,480,350,450]}]}],xaxis:{type:"datetime"},yaxis:{tooltip:{enabled:!0},opposite:t},grid:{xaxis:{lines:{show:!0}},padding:{top:-23}},plotOptions:{candlestick:{colors:{upward:window.colors.solid.success,downward:window.colors.solid.danger}},bar:{columnWidth:"40%"}}};
   void 0!==typeof g&&null!==g&&new ApexCharts(g,u).render();var x=document.querySelector("#heatmap-chart"),y={chart:{height:350,type:"heatmap",parentHeightOffset:0,toolbar:{show:!1}},plotOptions:{heatmap:{enableShades:!1,colorScale:{ranges:[{from:0,to:10,name:"0-10",color:"#b9b3f8"},{from:11,to:20,name:"10-20",color:"#aba4f6"},{from:21,to:30,name:"20-30",color:"#9d95f5"},{from:31,to:40,name:"30-40",color:"#8f85f3"},{from:41,to:50,name:"40-50",color:"#8176f2"},{from:51,to:60,name:"50-60",color:"#7367f0"}]}}},dataLabels:{enabled:!1},legend:{show:!0,position:"bottom"},grid:{padding:{top:-25}},series:[{name:"SUN",data:s(24,{min:0,max:60})},{name:"MON",data:s(24,{min:0,max:60})},{name:"TUE",data:s(24,{min:0,max:60})},{name:"WED",data:s(24,{min:0,max:60})},{name:"THU",data:s(24,{min:0,max:60})},{name:"FRI",data:s(24,{min:0,max:60})},{name:"SAT",data:s(24,{min:0,max:60})}],xaxis:{labels:{show:!1},axisBorder:{show:!1},axisTicks:{show:!1}}};
   void 0!==typeof x&&null!==x&&new ApexCharts(x,y).render();var b=document.querySelector("#radialbar-chart"),S={chart:{height:350,type:"radialBar"},colors:[o.series1,o.series2,o.series4],plotOptions:{radialBar:{size:185,hollow:{size:"25%"},track:{margin:15},dataLabels:{name:{fontSize:"2rem",fontFamily:"Montserrat"},value:{fontSize:"1rem",fontFamily:"Montserrat"},total:{show:!0,fontSize:"1rem",label:"Comments",formatter:function(e){return"80%"}}}}},grid:{padding:{top:-35,bottom:-30}},legend:{show:!0,position:"bottom"},stroke:{lineCap:"round"},series:[80,50,35],labels:["Comments","Replies","Shares"]};
   void 0!==typeof b&&null!==b&&new ApexCharts(b,S).render();var v=document.querySelector("#radar-chart"),k={chart:{height:400,type:"radar",toolbar:{show:!1},parentHeightOffset:0,dropShadow:{enabled:!1,blur:8,left:1,top:1,opacity:.2}},legend:{show:!0,position:"bottom"},yaxis:{show:!1},series:[{name:"iPhone 11",data:[41,64,81,60,42,42,33,23]},{name:"Samsung s20",data:[65,46,42,25,58,63,76,43]}],colors:[o.series1,o.series3],xaxis:{categories:["Battery","Brand","Camera","Memory","Storage","Display","OS","Price"]},fill:{opacity:[1,.8]},stroke:{show:!1,width:0},markers:{size:0},grid:{show:!1,padding:{top:-20,bottom:-20}}};
   void 0!==typeof v&&null!==v&&new ApexCharts(v,k).render();var O=document.querySelector("#donut-chart"),D={chart:{height:350,type:"donut"},legend:{show:!0,position:"bottom"},labels:["Operational","Networking","Hiring","R&D"],series:[85,16,50,50],colors:[o.series1,o.series5,o.series3,o.series2],dataLabels:{enabled:!0,formatter:function(e,t){return parseInt(e)+"%"}},plotOptions:{pie:{donut:{labels:{show:!0,name:{fontSize:"2rem",fontFamily:"Montserrat"},value:{fontSize:"1rem",fontFamily:"Montserrat",formatter:function(e){return parseInt(e)+"%"}},total:{show:!0,fontSize:"1.5rem",label:"Operational",formatter:function(e){return"31%"}}}}}},responsive:[{breakpoint:992,options:{chart:{height:380}}},{breakpoint:576,options:{chart:{height:320},plotOptions:{pie:{donut:{labels:{show:!0,name:{fontSize:"1.5rem"},value:{fontSize:"1rem"},total:{fontSize:"1.5rem"}}}}}}}]};
   void 0!==typeof O&&null!==O&&new ApexCharts(O,D).render()}));
</script>
<?= $this->endSection(); ?>