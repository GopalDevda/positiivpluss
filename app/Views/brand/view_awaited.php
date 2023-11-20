<?php
use App\Models\SensorModel;
use App\Models\Data_electricityModel;
?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/toastr.min.js');?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css');?>">
<style>
p.fs {
font-size: 13px!important;
}
.fs-smaller{
font-size: 10px!important;
}
</style>
<?= $this->endSection();?>
<?= $this->section('content') ?>
<div class="app-content content">
  <div class="row">
    <div class="offset-md-10 col-md-2 mb-1 text-end">
      <a href="<?php echo base_url('/automotion') ?>" class="btn btn-primary">Back</a>
    </div>

    <div  class="col-md-4 pb-2">
    <form class="form" method="get" action="<?php echo base_url('Automotion/financial/'.$id)?>" enctype="multipart/form-data" >  
    <select class="form-control" name="finacial_year" required>
      <option>Select financial year</option>
      <option value="2020-2021" <?php if($financial_year == "2020-2021"){ echo 'selected';
      }   ?>>2020-2021</option>
      <option value="2021-2022" <?php if($financial_year == "2021-2022"){ echo 'selected';
      }   ?>>2021-2022</option>
      <option value="2022-2023" <?php if($financial_year == "2022-2023"){ echo 'selected';
      }   ?>>2022-2023</option>
      <option value="2023-2024" <?php if($financial_year == "2023-2024"){ echo 'selected';
      }   ?>>2023-2024</option>
      <option value="2024-2025" <?php if($financial_year == "2024-2025"){ echo 'selected';
      }   ?>>2024-2025</option>
      <option value="2025-2026" <?php if($financial_year == "2025-2026"){ echo 'selected';
      }   ?>>2025-2026</option>
    </select>
    </div>

    <!-- <div  class="col-md-4 pb-2">  
    <select class="form-control">
      <option>Select form list</option>
      <option value="1">India</option>
      <option value="2">United states</option>
    </select>
    </div> -->

    <div  class="col-md-2 pb-2">  
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
<?php
  $session = session();
  if($session->get('financial')){?>
  <script type="text/javascript">
  var id = '<?php echo $session->get('financial'); ?>';
  
  toastr.warning(id, "Warning", {
  closeButton: !0,
  tapToDismiss: !1,
  progressBar: !0,
  })
  
  </script>
  <?php } ?>

    <?php
    $sensor = new SensorModel();
    $Dataelectricity = new Data_electricityModel();
    $sensor1 = $sensor->where('id',$sensor_id)->where('supplier_id',$u_id)->where('owner_id',$o_id)->first();
  
    
    $electricity_amount_id = $Dataelectricity->where('status',1)->where('electricity_id',$id)->findAll();

 $month_name_show=array();
 $arr=0;

foreach ($electricity_amount_id as $key => $valuefff) 
{

$middle_id = strtotime($valuefff['bill_date']);

$dkjg =  date('m', $middle_id);
$month_name_show[] = $dkjg;
$month_name_show[$arr++];

 // print_r($ksf); 
}


$jdf =  max($month_name_show);
$Dataelectricity1 = $Dataelectricity->where('status',1)->where('electricity_id',$id)->where('MONTH(bill_date)',$jdf)->first();
// print_r($Dataelectricity1);
    ?>

    <section id="accordion">
      <div class="row">
        <div class="col-sm-12">
          <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
            <div class="card">
              <!--       -->
              <div class="card-body p-1 pb-0  ">
                
                <div class="row">
                  <div class="col-md-2">
                    <p class="pb-0 mb-0 fs-smaller"><?php  
                    $middle = strtotime($Dataelectricity1['currentdatetime']);
                    echo date('d-M-Y h:i:s:A', $middle);  ?></p>
                    <img src="https://user.positiivplus.io/public/icon/electricity.png" width="50px">
                  </div>
                  <!-- <div class="col-md-1 p-0 pt-2">
                    <h6 class="fw-bolder">Boundary</h6>
                    <p class="fs"><?php foreach($boundary_item as $bb){ ?>
                      <?php if($bb['id'] == $sensor1['boundary_id']){
                      echo $bb['item_name'];
                      }?>
                      <?php
                    }?></p>
                  </div> -->
                  <div class="col-md-3 pt-2">
                    <h6 class="fw-bolder">Site Name</h6>
                    <p class="fs"><?php foreach($sub_boundary_item as $bb){ ?>
                      <?php if($bb['id'] == $sensor1['subboundary_id']){
                      echo $bb['cp_name'];
                      echo '<br>';
                      echo substr_replace($bb['cp_address'], "...", 23) ;
                      }?>
                      <?php
                    }?></p>
                  </div>
                  <div class="col-md-2 pt-2">
                    <h6 class="fw-bolder">Provider Name</h6>
                    <p class="fs"><?php
                      foreach($electricity_board as $ele_id){
                      if($ele_id['id'] == $sensor1['provider_type']){
                      echo $ele_id['abbrevation'];
                      }}?>
                    </p>
                    
                  </div>
                  <div class="col-md-2 pt-2">
                    <h6 class="fw-bolder">Consumed Unit</h6>
                    
                    <p class="fs"><?php echo $Dataelectricity1['consume_unit']; ?></p>
                    
                  </div>
                  <div class="col-md-1 p-0 pt-2">
                    <h6 class="fw-bolder">Amount</h6>
                    <p class="fs"><?php echo $Dataelectricity1['amount']; ?></p>
                  </div>
                  <div class="col-md-2 pt-2">
                    <h6 class="fw-bolder">Status</h6>
                    
                    <!--<span class='bg-success' style='border-radius:90%;'>&nbsp;o&nbsp;</span>-->
                    <span class="rohit badge badge-light-success" data-id="3">Connected</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="row">
    <div class="content-wrapper container-xxl">
      <section id="chartjs-chart">
        <div class="row">
          <!--Bar Chart Start -->
          <div class="col-xl-6 col-12">
            <div class="card">
              <div
                class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                <div class="header-left">
                  <h4 class="card-title">Electricity Load</h4>
                </div>
                <!-- <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                  <i data-feather="calendar"></i>
                  <input
                  type="text"
                  class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                  placeholder="YYYY-MM-DD"
                  />
                </div> -->
              </div>
              <div class="card-body">
                <div id="charts"></div>
              </div>
            </div>
          </div>
          <!-- Bar Chart End -->
          <!-- Horizontal Bar Chart Start -->
          <div class="col-xl-6 col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                <div class="header-left">
                  <p class="card-title">Power Factor </p>
                  <!--<h4 class="card-title">$74,123</h4>-->
                </div>
                <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                  <!-- <i data-feather="calendar"></i> -->
                  <!--  <input
                  type="text"
                  class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                  placeholder="YYYY-MM-DD"
                  /> -->
                </div>
              </div>
              <div class="card-body">
                <canvas class="horizontal-bar-chart-ex chartjs" data-height="605"></canvas>
              </div>
            </div>
          </div>
          <!-- Horizontal Bar Chart End -->
        </div>
        <!-- Line Chart Starts-->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div>
                  <h4 class="card-title">Consumed Unit</h4>
                </div>
                <!-- <div class="d-flex align-items-center mt-md-0 mt-1">
                  <i class="font-medium-2" data-feather="calendar"></i>
                  <input
                  type="text"
                  class="form-control flat-picker bg-transparent border-0 shadow-none"
                  placeholder="YYYY-MM-DD"
                  />
                </div> -->
              </div>
              
              <div class="card-body">
                <div id="line-charts"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Line Chart Ends-->
        <!--Start Electricity Log Table-->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Electricity Log</h4>
              </div>
              <div class="table-responsive card-body">
                <table class="table" id="mytable">
                  <thead>
                    <tr>
                      <th style="width: 18.1719px;">#</th>
                      <th style="width: 405.2656px;">Bill Name</th>
                      <th style="width: 145.25px;">Bill Generation Date</th>
                      <th style="width: 126.078px;">Consumed Unit (in kWh)</th>
                      <th style="width: 134.531px;">Consumed Unit (in MJ)</th>
                      <th style="width: 95.7188px;">Amount(in Currency)</th>
                      <th style="width: 43.3281px;">Bill PDF</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $key=0; foreach($join_model as $key=>$electricity){?>
                    <tr>
                      <td><?php echo ++$key ?></td>
                      <td><?php echo $electricity['bill_no']; ?></td>
                      <td><?php
                        $date = strtotime($electricity['bill_date']);
                       echo  date("d-m-y",$date) ?></td>
                      <td><?php echo $electricity['consume_unit'];?> </td>
                      <td><?php echo $electricity['consume_unit']*'3.6';?> </td>
                      <td><?php echo $electricity['amount'];?></td>
                      <!--<td><?php echo $electricity['to_date'];?></td>-->
                      <td><a href="javascript:void(0);" NAME="My Window Name" title="Bill"
                      onClick="window.open('<?php echo base_url('public/uploads/pdfElectricity/'.$electricity['pdf_file'])?>','Ratting','width=750,height=650,0,status=0,scrollbars=1');"><i class="fa-solid fa-file-pdf text-danger fs-4"></i></a></td>
                      
                    </tr>
                    <?php
                    }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--End Electricity Log Table-->
      </section>
      <!--   <h3 class="typography__H3-sc-rmkozr-2 dtcQgF">Alert configuration</h3>
      <section class="card"> -->
        <!--  <div class="px-2 pt-2">
          <div class="form-switch">
            <?php if($Demand_load){  ?>
            <?php foreach ($Demand_load as $key => $value) {?>
            <?php if($value['name'] == "Demand_load"){?>
            <input type="checkbox" class="form-control-input" id="formSwitch1" checked>
            <?php   }
            }?>
            <?php }else{?>
            <input type="checkbox" class="form-control-input" id="formSwitch1">
            <?php
            }
            ?>
          </div>
          <div data-anchor="alert-config-enabled-switch-1" tabindex="0" role="checkbox" aria-checked="false" class="checkbox__CheckboxContainer-sc-1w2w3z1-0 xxrKk">
            <input id="alert-config-enabled-switch-1" hidden="" aria-hidden="false" type="checkbox" aria-checked="false">
            <div class="switch-renderer__SwitchContainer-sc-1hwzdgm-0 gcJxPV">
              <div class="switch-renderer__SwitchInput-sc-1hwzdgm-1 mNjXg"></div>
            </div>
          </div>
          <div class="alert-configuration-card-styled__TitleDescriptionWrapper-sc-1j188c6-2 ERHSc">
            <div class="alert-configuration-card-styled__DescriptionWrapper-sc-1j188c6-3 jpYSiJ">
              <?php if($Demand_load){  ?>
              <?php foreach ($Demand_load as $key => $value) {?>
              <?php if($value['name'] == "Demand_load"){?>
              <button id="formSwitch111" style="float:right;">Edit</button>
              <?php   }
              }
              }?>
              <h4 class="typography__H4-sc-rmkozr-3 alert-configuration-card-styled__Title-sc-1j188c6-5 dCdsgd fcfDsy">Demand load alert</h4>
            </div>
          </div>
        </div> -->
        <!--  <section id="sidedemo" class="form-control" style="display:none;">
          <form action="<?php echo base_url() ?>/Automotion/alert" method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="name" value="Demand_load">
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
              </div> -->
              <!--  <div class="alert-configuration-card-styled__InnerBody-sc-1j188c6-8 ijWSCd">
                <div class="alert-threshold-input-styled__StyledInput-sc-tcymlu-1 eNbWSY" style="display: flex; position: relative; overflow: hidden;">
                  <div class="row">
                    <div class="col-md-3 col-12" id="below1" style="display:none;">
                      <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first">Above</span>
                      <div class="mb-1">
                        <input class="form-control"  type="number" name="above" value="">
                        <div class="input-with-icon__TxtWrapper-sc-1p1fir-2 bNWmDn">Unit</div>
                      </div>
                    </div>
                    <div class="col-md-3 col-12" id="below2" style="display:none;">
                      <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first">Below</span>
                      <div class="mb-1">
                        <input class="form-control"  type="number" name="below" value="0">
                        <span>Unit</span>
                      </div>
                    </div>
                    <span class="form-lable">For longer than</span>
                    <div class="row">
                      <div class="col-md-3 col-12">
                        <div class="mb-1">
                          <select name="time" id="boundary" class="form-control select2">
                            <option value="">select option</option>
                            <option value="60 minutes">60 minutes</option>
                            <option value="30 minutes">30 minutes</option>
                            <option value="45 minutes">45 minutes</option>
                            <option value="90 minutes">90 minutes</option>
                            <option value="120 minutes">120 minutes</option>
                            <option value="manually">Manually</option>
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
                          </select>
                        </div>
                        <div id="manuallyemail" class="pt-1 pb-1"  style="display:none;">
                          <label class="">manually</label>
                          <input type="text" name="for_longer" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div>
                      <button type="submit">Save</button>
                      <button  class="button__StyledButton-sc-ftmyi7-1 chnkCq alert-configuration-card-styled__StyledButton-sc-1j188c6-12 hAQYCt" type="button">Cancel</button>
                    </div>
                  </form>
                </section>
              </section> -->
              <!--   <section class="card">
                <div class="px-2 pt-2">
                  <div class="form-switch">
                    <?php if($consume_unit){?>
                    <?php foreach ($consume_unit as $key => $value) {?>
                    <?php if($value['name'] == "consume_unit"){?>
                    <input type="checkbox" class="form-control-input" id="formSwitch0" checked>
                    <?php   }
                    } ?>
                    <?php
                    }else{?>
                    <input type="checkbox" class="form-control-input" id="formSwitch0">
                    <?php
                    }?>
                  </div>
                  <div data-anchor="alert-config-enabled-switch-1" tabindex="0" role="checkbox" aria-checked="false" class="checkbox__CheckboxContainer-sc-1w2w3z1-0 xxrKk">
                    <input id="alert-config-enabled-switch-1" hidden="" aria-hidden="false" type="checkbox" aria-checked="false">
                    <div class="switch-renderer__SwitchContainer-sc-1hwzdgm-0 gcJxPV">
                      <div class="switch-renderer__SwitchInput-sc-1hwzdgm-1 mNjXg"></div>
                    </div>
                  </div>
                  <div class="alert-configuration-card-styled__DescriptionWrapper-sc-1j188c6-3 jpYSiJ">
                    <?php foreach ($consume_unit as $key => $value) {?>
                    <?php if($value['name'] == "consume_unit"){?>
                    <button id="formSwitch112" style="float:right;">Edit</button>
                    <?php   }
                    } ?>
                    <h4 class="typography__H4-sc-rmkozr-3 alert-configuration-card-styled__Title-sc-1j188c6-5 dCdsgd fcfDsy">Consume Unit alert</h4>
                  </div> -->
                  <!-- <section id="sidedemo0" class="form-control" style="display:none;">
                    <form action="<?php echo base_url() ?>/Automotion/alert" method="post"
                      enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <input type="hidden" name="name" value="consume_unit">
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
                        <div class="row">
                          <div class="col-md-3 col-12" id="below11" style="display:none;">
                            <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first">Above</span>
                            <div class="mb-1">
                              <input class="form-control"  type="number" name="above" value="">
                              <div class="input-with-icon__TxtWrapper-sc-1p1fir-2 bNWmDn">Unit</div>
                            </div>
                          </div>
                          <div class="col-md-3 col-12" id="below22" style="display:none;">
                            <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first">Below</span>
                            <div class="mb-1">
                              <input class="form-control"  type="number" name="below" value="0">
                              <div class="input-with-icon__TxtWrapper-sc-1p1fir-2 bNWmDn">Unit</div>
                            </div>
                          </div>
                          <span class="form-lable">For longer than</span>
                          <div class="row">
                            <div class="col-md-3 col-12">
                              <div class="mb-1">
                                <select name="for_longer" id="boundary" class="form-control select2" required="required">
                                  <option  value="60 minutes">60 minutes</option>
                                  <option   value="30 minutes">30 minutes</option>
                                  <option   value="45 minutes">45 minutes</option>
                                  <option   value="90 minutes">90 minutes</option>
                                  <option   value="120 minutes">120 minutes</option>
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
                    <section class="card" -->
                      <!--  <div class="px-2 pt-2">
                        <div class="form-switch">
                          <?php if($senstion){?>
                          <?php foreach ($senstion as $key => $value) {?>
                          <?php if($value['name'] == "senstion"){?>
                          <input type="checkbox" class="form-control-input" id="formSwitch3" checked>
                          <?php   }
                          } ?>
                          <?php
                          }else{?>
                          <input type="checkbox" class="form-control-input" id="formSwitch3">
                          <?php
                          }?>
                        </div>
                        <div data-anchor="alert-config-enabled-switch-1" tabindex="0" role="checkbox" aria-checked="false" class="checkbox__CheckboxContainer-sc-1w2w3z1-0 xxrKk">
                          <input id="alert-config-enabled-switch-1" hidden="" aria-hidden="false" type="checkbox" aria-checked="false">
                          <div class="switch-renderer__SwitchContainer-sc-1hwzdgm-0 gcJxPV">
                            <div class="switch-renderer__SwitchInput-sc-1hwzdgm-1 mNjXg"></div>
                          </div>
                        </div>
                        <div class="alert-configuration-card-styled__TitleDescriptionWrapper-sc-1j188c6-2 ERHSc">
                          <div class="alert-configuration-card-styled__DescriptionWrapper-sc-1j188c6-3 jpYSiJ">
                            <?php foreach ($senstion as $key => $value) {?>
                            <?php if($value['name'] == "senstion"){?>
                            <button id="formSwitch113" style="float:right;">Edit</button>
                            <?php   }
                            } ?>
                            <h4 class="typography__H4-sc-rmkozr-3 alert-configuration-card-styled__Title-sc-1j188c6-5 dCdsgd fcfDsy">Senstion alert</h4>
                          </div>
                        </div>
                      </div>
                      <section id="sidedemo3" class="form-control" style="display:none;">
                        <form action="<?php echo base_url() ?>/Automotion/alert" method="post"
                          enctype="multipart/form-data">
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                          <input type="hidden" name="name" value="senstion">
                          <input type="hidden" name="alert_id" value="">
                          <div class="alert-configuration-card-styled__InnerBody-sc-1j188c6-8 ijWSCd">
                            <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first" id="aaaaa">Above</span> -->
                            <!--  <div class="col-md-3 col-12" id="below1">
                              <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first">Above</span>
                              <div class="mb-1">
                                <input class="form-control"  type="number" name="above" value="0">
                                <div class="input-with-icon__TxtWrapper-sc-1p1fir-2 bNWmDn">Unit</div>
                              </div>
                            </div>
                            <span class="form-lable">For longer than</span>
                            <div class="row">
                              <div class="col-md-3 col-12">
                                <div class="mb-1">
                                  <select name="for_longer" id="boundary" class="form-control select2" required="required">
                                    <option  value="60 minutes">60 minutes</option>
                                    <option   value="30 minutes">30 minutes</option>
                                    <option   value="45 minutes">45 minutes</option>
                                    <option   value="90 minutes">90 minutes</option>
                                    <option   value="120 minutes">120 minutes</option>
                                  </select>
                                </div>
                              </div> -->
                              <!--  <span class="form-lable">Send notification to</span>
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
                                  </select>
                                </div>
                                <div id="manuallyemail" class="pt-1 pb-1"  style="display:none;">
                                  <label class="">Email</label>
                                  <input type="email" name="email" class="form-control">
                                </div>
                              </div>
                            </div> -->
                            <!--   <div>
                              <button type="submit">Save</button>
                              <button  class="button__StyledButton-sc-ftmyi7-1 chnkCq alert-configuration-card-styled__StyledButton-sc-1j188c6-12 hAQYCt" type="button">Cancel</button>
                            </div>
                          </form>
                        </section>
                      </section> -->
                      <!--  <section class="card"> -->
                      <!--  <div class="px-2 pt-2">
                        <div class="form-switch">
                          <?php if($power_load){?>
                          <?php foreach ($power_load as $key => $value) {?>
                          <?php if($value['name'] == "power_load"){?>
                          <input type="checkbox" class="form-control-input" id="formSwitch2" checked>
                          <?php   }
                          } ?>
                          <?php
                          }else{?>
                          <input type="checkbox" class="form-control-input" id="formSwitch2">
                          <?php
                          }?>
                        </div>
                        <div data-anchor="alert-config-enabled-switch-1" tabindex="0" role="checkbox" aria-checked="false" class="checkbox__CheckboxContainer-sc-1w2w3z1-0 xxrKk">
                          <input id="alert-config-enabled-switch-1" hidden="" aria-hidden="false" type="checkbox" aria-checked="false">
                          <div class="switch-renderer__SwitchContainer-sc-1hwzdgm-0 gcJxPV">
                            <div class="switch-renderer__SwitchInput-sc-1hwzdgm-1 mNjXg"></div>
                          </div>
                        </div>
                        <div class="alert-configuration-card-styled__TitleDescriptionWrapper-sc-1j188c6-2 ERHSc">
                          <div class="alert-configuration-card-styled__DescriptionWrapper-sc-1j188c6-3 jpYSiJ">
                            <?php foreach ($power_load as $key => $value) {?>
                            <?php if($value['name'] == "power_load"){?>
                            <button id="formSwitch114" style="float:right;">Edit</button>
                            <?php   }
                            } ?>
                            <h4 class="typography__H4-sc-rmkozr-3 alert-configuration-card-styled__Title-sc-1j188c6-5 dCdsgd fcfDsy">Power load alert</h4>
                          </div>
                        </div>
                      </div> -->
                      <!-- <section id="sidedemo2" class="form-control" style="display:none;"> -->
                      <!-- <form action="<?php echo base_url() ?>/Automotion/alert" method="post"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="name" value="power_load">
                        <input type="hidden" name="alert_id" value="">
                        <div class="alert-configuration-card-styled__InnerBody-sc-1j188c6-8 ijWSCd">
                          <div class="alert-threshold-input-styled__StyledInput-sc-tcymlu-1 eNbWSY" style="display: flex; position: relative; overflow: hidden;">
                            <div class="row">
                              <div class="col-md-3 col-12" id="below1">
                                <span class="alert-configuration-card-styled__InputTitle-sc-1j188c6-9 hOhUBt first">Above</span>
                                <div class="mb-1">
                                  <input class="form-control"  type="number" name="above" value="">
                                  <div class="input-with-icon__TxtWrapper-sc-1p1fir-2 bNWmDn">Unit</div>
                                </div>
                              </div>
                              <span class="form-lable">For longer than</span>
                              <div class="row">
                                <div class="col-md-3 col-12">
                                  <div class="mb-1">
                                    <select name="for_longer" id="boundary" class="form-control select2">
                                      <option  value="60 minutes">60 minutes</option>
                                      <option   value="30 minutes">30 minutes</option>
                                      <option   value="45 minutes">45 minutes</option>
                                      <option   value="90 minutes">90 minutes</option>
                                      <option   value="120 minutes">120 minutes</option>
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
                      </div>
                    </div>-->
                  </div>
                  <script>
                  $(window).on('load',  function(){
                  if (feather) {
                  feather.replace({ width: 14, height: 14 });
                  }
                  })
                  </script>
                  <?= $this->endSection(); ?>
                  <?= $this->section('script') ?>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js')?>"></script>
                  <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js')?>"></script>
                  <script>
                  $(document).ready(function() {
                  $('#mytable').DataTable();
                  
                  });
                  </script>
                  <script>
                  $((function() {
                  "use strict";
                  var e = $(".flat-picker"),
                  t = "rtl" === $("html").attr("data-textdirection"),
                  a = {
                  series1: "#826af9",
                  series2: "#d2b0ff",
                  bg: "#f8d3ff"
                  },
                  o = {
                  series1: "#ffe700",
                  series2: "#00d4bd",
                  series3: "#826bf8",
                  series4: "#2b9bf4",
                  series5: "#FFA1A1"
                  },
                  r = {
                  series3: "#a4f8cd",
                  series2: "#60f2ca",
                  series1: "#2bdac7"
                  };
                  function s(e, t) {
                  for (var a = 0, o = []; a < e;) {
                  var r = "w" + (a + 1).toString(),
                  s = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min;
                  o.push({
                  x: r,
                  y: s
                  }), a++
                  }
                  return o
                  }
                  if (e.length) {
                  new Date;
                  e.each((function() {
                  $(this).flatpickr({
                  mode: "range",
                  defaultDate: ["2019-05-01", "2019-05-10"]
                  })
                  }))
                  }
                  var i = document.querySelector("#line-area-chart"),
                  n = {
                  chart: {
                  height: 400,
                  type: "area",
                  parentHeightOffset: 0,
                  toolbar: {
                  show: !1
                  }
                  },
                  dataLabels: {
                  enabled: !1
                  },
                  stroke: {
                  show: !1,
                  curve: "straight"
                  },
                  legend: {
                  show: !0,
                  position: "top",
                  horizontalAlign: "start"
                  },
                  grid: {
                  xaxis: {
                  lines: {
                  show: !0
                  }
                  }
                  },
                  colors: [r.series3, r.series2, r.series1],
                  series: [{
                  name: "Visits",
                  data: [100, 120, 90, 170, 130, 160, 140, 240, 220, 180, 270, 200, 375]
                  }, {
                  name: "Clicks",
                  data: [60, 80, 70, 110, 80, 100, 90, 180, 160, 140, 200, 220, 275]
                  }, {
                  name: "Sales",
                  data: [20, 40, 30, 70, 40, 60, 50, 140, 120, 100, 140, 180, 220]
                  }],
                  xaxis: {
                  categories: ["7/12", "8/12", "9/12", "10/12", "11/12", "12/12", "13/12", "14/12", "15/12", "16/12", "17/12", "18/12", "19/12", "20/12"]
                  },
                  fill: {
                  opacity: 1,
                  type: "solid"
                  },
                  tooltip: {
                  shared: !1
                  },
                  yaxis: {
                  opposite: t
                  }
                  };
                  void 0 !== typeof i && null !== i && new ApexCharts(i, n).render();
                  var l = document.querySelector("#column-chart"),
                  d = {
                  chart: {
                  height: 400,
                  type: "bar",
                  stacked: !0,
                  parentHeightOffset: 0,
                  toolbar: {
                  show: !1
                  }
                  },
                  plotOptions: {
                  bar: {
                  columnWidth: "15%",
                  colors: {
                  backgroundBarColors: [a.bg, a.bg, a.bg, a.bg, a.bg],
                  backgroundBarRadius: 10
                  }
                  }
                  },
                  dataLabels: {
                  enabled: !1
                  },
                  legend: {
                  show: !0,
                  position: "top",
                  horizontalAlign: "start"
                  },
                  colors: [a.series1, a.series2],
                  stroke: {
                  show: !0,
                  colors: ["transparent"]
                  },
                  grid: {
                  xaxis: {
                  lines: {
                  show: !0
                  }
                  }
                  },
                  series: [{
                  name: "Apple",
                  data: [90, 120, 55, 100, 80, 125, 175, 70, 88, 180]
                  }, {
                  name: "Samsung",
                  data: [85, 100, 30, 40, 95, 90, 30, 110, 62, 20]
                  }],
                  xaxis: {
                  categories: ["7/12", "8/12", "9/12", "10/12", "11/12", "12/12", "13/12", "14/12", "15/12", "16/12"]
                  },
                  fill: {
                  opacity: 1
                  },
                  yaxis: {
                  opposite: t
                  }
                  };
                  void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
                  var p = document.querySelector("#scatter-chart"),
                  c = {
                  chart: {
                  height: 400,
                  type: "scatter",
                  zoom: {
                  enabled: !0,
                  type: "xy"
                  },
                  parentHeightOffset: 0,
                  toolbar: {
                  show: !1
                  }
                  },
                  grid: {
                  xaxis: {
                  lines: {
                  show: !0
                  }
                  }
                  },
                  legend: {
                  show: !0,
                  position: "top",
                  horizontalAlign: "start"
                  },
                  colors: [window.colors.solid.warning, window.colors.solid.primary, window.colors.solid.success],
                  series: [{
                  name: "Angular",
                  data: [
                  [5.4, 170],
                  [5.4, 100],
                  [6.3, 170],
                  [5.7, 140],
                  [5.9, 130],
                  [7, 150],
                  [8, 120],
                  [9, 170],
                  [10, 190],
                  [11, 220],
                  [12, 170],
                  [13, 230]
                  ]
                  }, {
                  name: "Vue",
                  data: [
                  [14, 220],
                  [15, 280],
                  [16, 230],
                  [18, 320],
                  [17.5, 280],
                  [19, 250],
                  [20, 350],
                  [20.5, 320],
                  [20, 320],
                  [19, 280],
                  [17, 280],
                  [22, 300],
                  [18, 120]
                  ]
                  }, {
                  name: "React",
                  data: [
                  [14, 290],
                  [13, 190],
                  [20, 220],
                  [21, 350],
                  [21.5, 290],
                  [22, 220],
                  [23, 140],
                  [19, 400],
                  [20, 200],
                  [22, 90],
                  [20, 120]
                  ]
                  }],
                  xaxis: {
                  tickAmount: 10,
                  labels: {
                  formatter: function(e) {
                  return parseFloat(e).toFixed(1)
                  }
                  }
                  },
                  yaxis: {
                  opposite: t
                  }
                  };
                  void 0 !== typeof p && null !== p && new ApexCharts(p, c).render();
                  var h = document.querySelector("#line-charts"),
                  m = {
                  chart: {
                  height: 400,
                  type: "line",
                  zoom: {
                  enabled: !1
                  },
                  parentHeightOffset: 0,
                  toolbar: {
                  show: !1
                  }
                  },
                  series: [{
                  data: <?php echo $consume_unit_value; ?>
                  }],
                  markers: {
                  strokeWidth: 7,
                  strokeOpacity: 1,
                  strokeColors: [window.colors.solid.white],
                  colors: [window.colors.solid.warning]
                  },
                  dataLabels: {
                  enabled: !1
                  },
                  stroke: {
                  curve: "straight"
                  },
                  colors: [window.colors.solid.warning],
                  grid: {
                  xaxis: {
                  lines: {
                  show: !0
                  }
                  },
                  padding: {
                  top: -20
                  }
                  },
                  tooltip: {
                  custom: function(e) {
                  return '<div class="px-1 py-50"><span>' + e.series[e.seriesIndex][e.dataPointIndex] + "KWH</span></div>"
                  }
                  },
                  xaxis: {
                  categories: <?php echo $data_indicate; ?>
                  },
                  yaxis: {
                  opposite: t
                  }
                  };
                  void 0 !== typeof h && null !== h && new ApexCharts(h, m).render();
                  var f = document.querySelector("#bar-chart"),
                  w = {
                  chart: {
                  height: 400,
                  type: "bar",
                  parentHeightOffset: 0,
                  toolbar: {
                  show: !1
                  }
                  },
                  plotOptions: {
                  bar: {
                  horizontal: !0,
                  barHeight: "30%",
                  endingShape: "rounded"
                  }
                  },
                  grid: {
                  xaxis: {
                  lines: {
                  show: !1
                  }
                  },
                  padding: {
                  top: -15,
                  bottom: -10
                  }
                  },
                  colors: window.colors.solid.info,
                  dataLabels: {
                  enabled: !1
                  },
                  series: [{
                  data: [700, 350, 480, 600, 210, 550, 150]
                  }],
                  xaxis: {
                  categories: ["MON, 11", "THU, 14", "FRI, 15", "MON, 18", "WED, 20", "FRI, 21", "MON, 23"]
                  },
                  yaxis: {
                  opposite: t
                  }
                  };
                  void 0 !== typeof f && null !== f && new ApexCharts(f, w).render();
                  var g = document.querySelector("#candlestick-chart"),
                  u = {
                  chart: {
                  height: 400,
                  type: "candlestick",
                  parentHeightOffset: 0,
                  toolbar: {
                  show: !1
                  }
                  },
                  series: [{
                  data: [{
                  x: new Date(15387786e5),
                  y: [150, 170, 50, 100]
                  }, {
                  x: new Date(15387804e5),
                  y: [200, 400, 170, 330]
                  }, {
                  x: new Date(15387822e5),
                  y: [330, 340, 250, 280]
                  }, {
                  x: new Date(1538784e6),
                  y: [300, 330, 200, 320]
                  }, {
                  x: new Date(15387858e5),
                  y: [320, 450, 280, 350]
                  }, {
                  x: new Date(15387876e5),
                  y: [300, 350, 80, 250]
                  }, {
                  x: new Date(15387894e5),
                  y: [200, 330, 170, 300]
                  }, {
                  x: new Date(15387912e5),
                  y: [200, 220, 70, 130]
                  }, {
                  x: new Date(1538793e6),
                  y: [220, 270, 180, 250]
                  }, {
                  x: new Date(15387948e5),
                  y: [200, 250, 80, 100]
                  }, {
                  x: new Date(15387966e5),
                  y: [150, 170, 50, 120]
                  }, {
                  x: new Date(15387984e5),
                  y: [110, 450, 10, 420]
                  }, {
                  x: new Date(15388002e5),
                  y: [400, 480, 300, 320]
                  }, {
                  x: new Date(1538802e6),
                  y: [380, 480, 350, 450]
                  }]
                  }],
                  xaxis: {
                  type: "datetime"
                  },
                  yaxis: {
                  tooltip: {
                  enabled: !0
                  },
                  opposite: t
                  },
                  grid: {
                  xaxis: {
                  lines: {
                  show: !0
                  }
                  },
                  padding: {
                  top: -23
                  }
                  },
                  plotOptions: {
                  candlestick: {
                  colors: {
                  upward: window.colors.solid.success,
                  downward: window.colors.solid.danger
                  }
                  },
                  bar: {
                  columnWidth: "40%"
                  }
                  }
                  };
                  void 0 !== typeof g && null !== g && new ApexCharts(g, u).render();
                  var x = document.querySelector("#heatmap-chart"),
                  y = {
                  chart: {
                  height: 350,
                  type: "heatmap",
                  parentHeightOffset: 0,
                  toolbar: {
                  show: !1
                  }
                  },
                  plotOptions: {
                  heatmap: {
                  enableShades: !1,
                  colorScale: {
                  ranges: [{
                  from: 0,
                  to: 10,
                  name: "0-10",
                  color: "#b9b3f8"
                  }, {
                  from: 11,
                  to: 20,
                  name: "10-20",
                  color: "#aba4f6"
                  }, {
                  from: 21,
                  to: 30,
                  name: "20-30",
                  color: "#9d95f5"
                  }, {
                  from: 31,
                  to: 40,
                  name: "30-40",
                  color: "#8f85f3"
                  }, {
                  from: 41,
                  to: 50,
                  name: "40-50",
                  color: "#8176f2"
                  }, {
                  from: 51,
                  to: 60,
                  name: "50-60",
                  color: "#7367f0"
                  }]
                  }
                  }
                  },
                  dataLabels: {
                  enabled: !1
                  },
                  legend: {
                  show: !0,
                  position: "bottom"
                  },
                  grid: {
                  padding: {
                  top: -25
                  }
                  },
                  series: [{
                  name: "SUN",
                  data: s(24, {
                  min: 0,
                  max: 60
                  })
                  }, {
                  name: "MON",
                  data: s(24, {
                  min: 0,
                  max: 60
                  })
                  }, {
                  name: "TUE",
                  data: s(24, {
                  min: 0,
                  max: 60
                  })
                  }, {
                  name: "WED",
                  data: s(24, {
                  min: 0,
                  max: 60
                  })
                  }, {
                  name: "THU",
                  data: s(24, {
                  min: 0,
                  max: 60
                  })
                  }, {
                  name: "FRI",
                  data: s(24, {
                  min: 0,
                  max: 60
                  })
                  }, {
                  name: "SAT",
                  data: s(24, {
                  min: 0,
                  max: 60
                  })
                  }],
                  xaxis: {
                  labels: {
                  show: !1
                  },
                  axisBorder: {
                  show: !1
                  },
                  axisTicks: {
                  show: !1
                  }
                  }
                  };
                  void 0 !== typeof x && null !== x && new ApexCharts(x, y).render();
                  var b = document.querySelector("#radialbar-chart"),
                  S = {
                  chart: {
                  height: 350,
                  type: "radialBar"
                  },
                  colors: [o.series1, o.series2, o.series4],
                  plotOptions: {
                  radialBar: {
                  size: 185,
                  hollow: {
                  size: "25%"
                  },
                  track: {
                  margin: 15
                  },
                  dataLabels: {
                  name: {
                  fontSize: "2rem",
                  fontFamily: "Montserrat"
                  },
                  value: {
                  fontSize: "1rem",
                  fontFamily: "Montserrat"
                  },
                  total: {
                  show: !0,
                  fontSize: "1rem",
                  label: "Comments",
                  formatter: function(e) {
                  return "80%"
                  }
                  }
                  }
                  }
                  },
                  grid: {
                  padding: {
                  top: -35,
                  bottom: -30
                  }
                  },
                  legend: {
                  show: !0,
                  position: "bottom"
                  },
                  stroke: {
                  lineCap: "round"
                  },
                  series: [80, 50, 35],
                  labels: ["Comments", "Replies", "Shares"]
                  };
                  void 0 !== typeof b && null !== b && new ApexCharts(b, S).render();
                  var v = document.querySelector("#radar-chart"),
                  k = {
                  chart: {
                  height: 400,
                  type: "radar",
                  toolbar: {
                  show: !1
                  },
                  parentHeightOffset: 0,
                  dropShadow: {
                  enabled: !1,
                  blur: 8,
                  left: 1,
                  top: 1,
                  opacity: .2
                  }
                  },
                  legend: {
                  show: !0,
                  position: "bottom"
                  },
                  yaxis: {
                  show: !1
                  },
                  series: [{
                  name: "iPhone 11",
                  data: [41, 64, 81, 60, 42, 42, 33, 23]
                  }, {
                  name: "Samsung s20",
                  data: [65, 46, 42, 25, 58, 63, 76, 43]
                  }],
                  colors: [o.series1, o.series3],
                  xaxis: {
                  categories: ["Battery", "Brand", "Camera", "Memory", "Storage", "Display", "OS", "Price"]
                  },
                  fill: {
                  opacity: [1, .8]
                  },
                  stroke: {
                  show: !1,
                  width: 0
                  },
                  markers: {
                  size: 0
                  },
                  grid: {
                  show: !1,
                  padding: {
                  top: -20,
                  bottom: -20
                  }
                  }
                  };
                  void 0 !== typeof v && null !== v && new ApexCharts(v, k).render();
                  var O = document.querySelector("#donut-chart"),
                  D = {
                  chart: {
                  height: 350,
                  type: "donut"
                  },
                  legend: {
                  show: !0,
                  position: "bottom"
                  },
                  labels: ["Operational", "Networking", "Hiring", "R&D"],
                  series: [85, 16, 50, 50],
                  colors: [o.series1, o.series5, o.series3, o.series2],
                  dataLabels: {
                  enabled: !0,
                  formatter: function(e, t) {
                  return parseInt(e) + "%"
                  }
                  },
                  plotOptions: {
                  pie: {
                  donut: {
                  labels: {
                  show: !0,
                  name: {
                  fontSize: "2rem",
                  fontFamily: "Montserrat"
                  },
                  value: {
                  fontSize: "1rem",
                  fontFamily: "Montserrat",
                  formatter: function(e) {
                  return parseInt(e) + "%"
                  }
                  },
                  total: {
                  show: !0,
                  fontSize: "1.5rem",
                  label: "Operational",
                  formatter: function(e) {
                  return "31%"
                  }
                  }
                  }
                  }
                  }
                  },
                  responsive: [{
                  breakpoint: 992,
                  options: {
                  chart: {
                  height: 380
                  }
                  }
                  }, {
                  breakpoint: 576,
                  options: {
                  chart: {
                  height: 320
                  },
                  plotOptions: {
                  pie: {
                  donut: {
                  labels: {
                  show: !0,
                  name: {
                  fontSize: "1.5rem"
                  },
                  value: {
                  fontSize: "1rem"
                  },
                  total: {
                  fontSize: "1.5rem"
                  }
                  }
                  }
                  }
                  }
                  }
                  }]
                  };
                  void 0 !== typeof O && null !== O && new ApexCharts(O, D).render()
                  }));
                  </script>
                  <script>
                  $(window).on("load", (function() {
                  "use strict";
                  var o = $(".chartjs"),
                  r = $(".flat-picker"),
                  t = $(".bar-chart-ex"),
                  a = $(".horizontal-bar-chart-ex"),
                  e = $(".line-chart-ex"),
                  i = $(".radar-chart-ex"),
                  l = $(".polar-area-chart-ex"),
                  n = $(".bubble-chart-ex"),
                  d = $(".doughnut-chart-ex"),
                  s = $(".scatter-chart-ex"),
                  c = $(".line-area-chart-ex"),
                  p = "#836AF9",
                  b = "#28dac6",
                  C = "#ffe802",
                  u = "#2c9aff",
                  h = "#84D0FF",
                  y = "#EDF1F4",
                  g = "rgba(0, 0, 0, 0.25)",
                  w = "#666ee8",
                  f = "#ff4961",
                  x = "#6e6b7b",
                  k = "rgba(200, 200, 200, 0.2)";
                  if ($("html").hasClass("dark-layout") && (x = "#b4b7bd"), o.length && o.each((function() {
                  $(this).wrap($('<div style="height:' + this.getAttribute("data-height") + 'px"></div>'))
                  })), r.length) {
                  new Date;
                  r.each((function() {
                  $(this).flatpickr({
                  mode: "range",
                  defaultDate: ["2022-01-01", "2022-11-14"]
                  })
                  }))
                  }
                  if (t.length) new Chart(t, {
                  type: "bar",
                  options: {
                  elements: {
                  rectangle: {
                  borderWidth: 2,
                  borderSkipped: "bottom"
                  }
                  },
                  responsive: !0,
                  maintainAspectRatio: !1,
                  responsiveAnimationDuration: 500,
                  legend: {
                  display: !1
                  },
                  tooltips: {
                  shadowOffsetX: 1,
                  shadowOffsetY: 1,
                  shadowBlur: 8,
                  shadowColor: g,
                  backgroundColor: window.colors.solid.white,
                  titleFontColor: window.colors.solid.black,
                  bodyFontColor: window.colors.solid.black
                  },
                  scales: {
                  xAxes: [{
                  display: !0,
                  gridLines: {
                  display: !0,
                  color: k,
                  zeroLineColor: k
                  },
                  scaleLabel: {
                  display: !1
                  },
                  ticks: {
                  fontColor: x
                  }
                  }],
                  yAxes: [{
                  display: !0,
                  gridLines: {
                  color: k,
                  zeroLineColor: k
                  },
                  ticks: {
                  stepSize: 500,
                  min: <?php echo $data_min;?>,
                  max: <?php echo $data_max+500;?>,
                  fontColor: x
                  }
                  }]
                  }
                  },
                  data: {
                  labels: <?php echo $data_indicate;?>,
                  datasets: [{
                  data: <?php echo $data_show?>,
                  barThickness: 15,
                  backgroundColor: b,
                  borderColor: "transparent"
                  }]
                  }
                  });
                  if (Chart.elements.Rectangle.prototype.draw = function() {
                  var o, r, t, a, e, i, l, n = this._chart.ctx,
                  d = this._view,
                  s = d.borderWidth;
                  if (d.horizontal ? (o = d.base, r = d.x, t = d.y - d.height / 2, a = d.y + d.height / 2, e = r > o ? 1 : -1, i = 1, l = d.borderSkipped || "left") : (o = d.x - d.width / 2, r = d.x + d.width / 2, e = 1, i = (t = d.y) > (a = d.base) ? 1 : -1, l = d.borderSkipped || "bottom"), s) {
                  var c = Math.min(Math.abs(o - r), Math.abs(t - a)),
                  p = (s = s > c ? c : s) / 2,
                  b = o + ("left" !== l ? p * e : 0),
                  C = r + ("right" !== l ? -p * e : 0),
                  u = t + ("top" !== l ? p * i : 0),
                  h = a + ("bottom" !== l ? -p * i : 0);
                  b !== C && (t = u, a = h), u !== h && (o = b, r = C)
                  }
                  n.beginPath(), n.fillStyle = d.backgroundColor, n.strokeStyle = d.borderColor, n.lineWidth = s;
                  var y = [
                  [o, a],
                  [o, t],
                  [r, t],
                  [r, a]
                  ],
                  g = ["bottom", "left", "top", "right"].indexOf(l, 0);
                  function w(o) {
                  return y[(g + o) % 4]
                  } - 1 === g && (g = 0);
                  var f = w(0);
                  n.moveTo(f[0], f[1]);
                  for (var x = 1; x < 4; x++) {
                  f = w(x);
                  var k = x + 1;
                  4 == k && (k = 0);
                  w(k);
                  var v, m = y[2][0] - y[1][0],
                  S = y[0][1] - y[1][1],
                  B = y[1][0],
                  A = y[1][1];
                  (v = 20) > S / 2 && (v = S / 2), v > m / 2 && (v = m / 2), d.horizontal ? (n.moveTo(B + v, A), n.lineTo(B + m - v, A), n.quadraticCurveTo(B + m, A, B + m, A + v), n.lineTo(B + m, A + S - v), n.quadraticCurveTo(B + m, A + S, B + m - v, A + S), n.lineTo(B + v, A + S), n.quadraticCurveTo(B, A + S, B, A + S), n.lineTo(B, A + v), n.quadraticCurveTo(B, A, B, A)) : (n.moveTo(B + v, A), n.lineTo(B + m - v, A), n.quadraticCurveTo(B + m, A, B + m, A + v), n.lineTo(B + m, A + S - v), n.quadraticCurveTo(B + m, A + S, B + m, A + S), n.lineTo(B + v, A + S), n.quadraticCurveTo(B, A + S, B, A + S), n.lineTo(B, A + v), n.quadraticCurveTo(B, A, B + v, A))
                  }
                  n.fill(), s && n.stroke()
                  }, a.length && new Chart(a, {
                  type: "horizontalBar",
                  options: {
                  elements: {
                  rectangle: {
                  borderWidth: 2,
                  borderSkipped: "right"
                  }
                  },
                  tooltips: {
                  shadowOffsetX: 1,
                  shadowOffsetY: 1,
                  shadowBlur: 8,
                  shadowColor: g,
                  backgroundColor: window.colors.solid.white,
                  titleFontColor: window.colors.solid.black,
                  bodyFontColor: window.colors.solid.black
                  },
                  responsive: !0,
                  maintainAspectRatio: !1,
                  responsiveAnimationDuration: 500,
                  legend: {
                  display: !1
                  },
                  layout: {
                  padding: {
                  bottom: -30,
                  left: -25
                  }
                  },
                  scales: {
                  xAxes: [{
                  display: !0,
                  gridLines: {
                  zeroLineColor: k,
                  borderColor: "transparent",
                  color: k
                  },
                  scaleLabel: {
                  display: !0
                  },
                  ticks: {
                  min: 0,
                  fontColor: x
                  }
                  }],
                  yAxes: [{
                  display: !0,
                  gridLines: {
                  display: !1
                  },
                  scaleLabel: {
                  display: !0
                  },
                  ticks: {
                  fontColor: x
                  }
                  }]
                  }
                  },
                  data: {
                  // labels: ["MON", "TUE", "WED ", "THU", "FRI", "SAT", "SUN"],
                  labels: <?php echo $data_indicate;?>,
                  datasets: [{
                  //data: [0.9, 0.350, 0.470, 0.580, 0.230, 0.460, 0.120],
                  data: <?php echo $power_factor_value; ?>,
                  barThickness: 15,
                  backgroundColor: window.colors.solid.info,
                  borderColor: "transparent"
                  }]
                  }
                  }), e.length) new Chart(e, {
                  type: "line",
                  plugins: [{
                  beforeInit: function(o) {
                  o.legend.afterFit = function() {
                  this.height += 20
                  }
                  }
                  }],
                  options: {
                  responsive: !0,
                  maintainAspectRatio: !1,
                  backgroundColor: !1,
                  hover: {
                  mode: "label"
                  },
                  tooltips: {
                  shadowOffsetX: 1,
                  shadowOffsetY: 1,
                  shadowBlur: 8,
                  shadowColor: g,
                  backgroundColor: window.colors.solid.white,
                  titleFontColor: window.colors.solid.black,
                  bodyFontColor: window.colors.solid.black
                  },
                  layout: {
                  padding: {
                  top: -15,
                  bottom: -25,
                  left: -15
                  }
                  },
                  scales: {
                  xAxes: [{
                  display: !0,
                  scaleLabel: {
                  display: !0
                  },
                  gridLines: {
                  display: !0,
                  color: k,
                  zeroLineColor: k
                  },
                  ticks: {
                  fontColor: x
                  }
                  }],
                  yAxes: [{
                  display: !0,
                  scaleLabel: {
                  display: !0
                  },
                  ticks: {
                  stepSize: 15,
                  min: <?php echo $data_min_dem;?>,
                  max:  <?php echo $data_max_san+50;?>,
                  fontColor: x
                  },
                  gridLines: {
                  display: !0,
                  color: k,
                  zeroLineColor: k
                  }
                  }]
                  },
                  legend: {
                  position: "top",
                  align: "start",
                  labels: {
                  usePointStyle: !0,
                  padding: 25,
                  boxWidth: 9
                  }
                  }
                  },
                  data: {
                  // labels: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140],
                  labels:  <?php echo $data_indicate;?>,
                  datasets: [{
                  // data: [80, 150, 180, 270, 210, 160, 160, 202, 265, 210, 270, 255, 290, 360, 375],
                  data:  <?php echo $data_show_san;?>,
                  label: "Sanctioned lOAD",
                  borderColor: f,
                  lineTension: .5,
                  pointStyle: "circle",
                  backgroundColor: f,
                  fill: !1,
                  pointRadius: 1,
                  pointHoverRadius: 5,
                  pointHoverBorderWidth: 5,
                  pointBorderColor: "transparent",
                  pointHoverBorderColor: window.colors.solid.white,
                  pointHoverBackgroundColor: f,
                  pointShadowOffsetX: 1,
                  pointShadowOffsetY: 1,
                  pointShadowBlur: 5,
                  pointShadowColor: g
                  }, {
                  data: <?php echo $data_show_dem;?>,
                  label: "Demand lOAD",
                  borderColor: C,
                  lineTension: .5,
                  pointStyle: "circle",
                  backgroundColor: C,
                  fill: !1,
                  pointRadius: 1,
                  pointHoverRadius: 5,
                  pointHoverBorderWidth: 5,
                  pointBorderColor: "transparent",
                  pointHoverBorderColor: window.colors.solid.white,
                  pointHoverBackgroundColor: C,
                  pointShadowOffsetX: 1,
                  pointShadowOffsetY: 1,
                  pointShadowBlur: 5,
                  pointShadowColor: g
                  }]
                  }
                  });
                  }));
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
                  $("#formSwitch112").click(function(){
                  $("#sidedemo0").slideToggle("slow");
                  });
                  });
                  </script>
                  <script>
                  $(document).ready(function(){
                  $("#formSwitch113").click(function(){
                  $("#sidedemo3").slideToggle("slow");
                  });
                  });
                  </script>
                  <script>
                  $(document).ready(function(){
                  $("#formSwitch114").click(function(){
                  $("#sidedemo2").slideToggle("slow");
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
                  $('select[name="time"]').on('change', function() {
                  var sId = $(this).val();
                  if(sId == "manually"){
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
                  $("document").ready(function() {
                  $('#weather').on('click', function() {
                  // alert('l');
                  window.location.href = "/weather";
                  });
                  });
                  </script>
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
                  var options = {
                  series: [{
                  name: 'Sanctioned Load ',
                  data: <?php echo  $santion_load_value; ?>
                  },{
                  name: 'Demand Load',
                  data:  <?php echo  $demand_load_value; ?>
                  }],
                  chart: {
                  type: 'bar',
                  height: 590,
                  toolbar: {
                  show: false
                  }
                  },
                  plotOptions: {
                  bar: {
                  horizontal: true,
                  borderRadius: 5,
                  },
                  },
                  dataLabels: {
                  enabled: false,
                  
                  },
                  stroke: {
                  show: true,
                  width: 2,
                  colors: ['#fff']
                  },
                  tooltip: {
                  shared: true,
                  intersect: false
                  },
                  xaxis: {
                  categories: <?php echo $data_indicate; ?>,
                  },
                  
                  colors:['#fbbd1f', '#36c6da'],
                  fill: {
                  opacity: 1
                  },
                  };
                  var chart = new ApexCharts(document.querySelector("#charts"), options);
                  chart.render();
                  </script>
                  <?= $this->endSection(); ?>