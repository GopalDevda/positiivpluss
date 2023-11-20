<?php include("include/header.php"); ?>
<?php include("include/menu.php");?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<div class="main-content-wrap sidenav-open d-flex flex-column custom_page document_page">
    <!-- ============ Body content start ============= -->
    <div class="main-content category_body">
    <div class="row">
        <div class="col-lg-12 col-md-12">
<?php 
$session = session();
if($session->get('success')){?>
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   <?php echo $session->get('success');?>
  </div> 
<?php } ?>
<?php 
if($session->get('error')){?>
  <div class="alert alert-danger alert-dismissible" style="font-size: 17px;">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   <?php echo $session->get('error');?>
  </div> 
<?php } ?> 
    </div>       
</div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Workplace</h4>
<!--                         <p>Company sub title</p> -->
                    </div>
                    <div class="col-sm-8 document_search">
                        <div class="theme_field mt-3">
                            <input type="text" placeholder="Search">
                            <img src="<?php echo base_url() ?>/public/uploads/dist-assets/search_icon.png" class="search_icon">
                            <div class="doc_compair_btn">
                                <a href="javascript:;" data-toggle="tooltip" data-placement="top" title="Select any two product" onclick="compareWorkplace()"> <i class="fa fa-balance-scale" aria-hidden="true"></i> compare</a>  
                                <!-- <a href="javascript:;" class="active" data-toggle="tooltip" data-placement="top" title="Select any two product"> <i class="fa fa-balance-scale " aria-hidden="true"></i> compare</a>   -->
                            </div>
                            <div class="doc_create_btn" data-toggle="modal" data-target="#docCreatPopup">
                                <input type="button" value="Add Office" data-toggle="tooltip" data-placement="top" title="Create Product">    
                            </div>
                            <div class="modal fade custom_modal action_modal create_modal doc_create" id="docCreatPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle-2">Add Office</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="create_doc_form">
                    <form action="<?php echo base_url() ?>/brand/createCompany" method="post">
                                                <div class="theme_field">
                                                    <div class="d-flex">
                                                        <div class="form_6">
                                                            <div class="theme_form_label">
                                                                Name
                                                            </div>
                                                            <div class="form-group">
            <input type="text" placeholder="Enter company name" name="company_name" required="" maxlength = "20">
                                                            </div>
                                                        </div>
                                                        <div class="form_center"></div>
                                                        <div class="form_6 doc_top_margin">
                                                            <div class="theme_form_label">
                                                                Type
                                                            </div>
                                                            <div class="form-group">
                            <select class="form-control" name="company_type" required="">
                                <option value="">Select Type</option>
                            <?php 
                                if($type) {
                                    foreach($type as $t) {
                            ?>
                                <option value="<?php echo $t['id']; ?>"><?php echo $t['type_name']; ?></option>
                            <?php
                                    }
                                }
                            ?>

                            </select>
                                                            </div>fo
                                                        </div>
                                                    </div>
                                                    <div class="form_center"></div>
                                                    <div class="d-flex">
                                                        <div class="form_6">
                                                            <div class="theme_form_label">
                                                                Address
                                                            </div>
                                                            <div class="form-group">
                                            <input type="text" id="company_address" name="company_address" required />
                                                            </div>
                                                        </div>
                                                        <div class="form_center"></div>
                                                        <div class="form_6 doc_top_margin">
                                                            <div class="theme_form_label">
                                            Country
                                                            </div>
                                                            <div class="form-group">
<!--                 <input type="text" placeholder="Enter company pin" name="company_pin" class='company_pin' required="" maxlength = "10"> -->
    <select class="form-control" name="country_id" required="">
        <option value="">Select Country</option>
        <?php 
            if($country) {
                foreach($country as $t) {
        ?>
            <option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
        <?php
                }
            }
        ?>

                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form_center"></div>
                                                    <div class="d-flex">
                                                        <div class="form_6">
                                                            <div class="theme_form_label">
                                                        Total Employees
                                                            </div>
                                                            <div class="form-group">
                <input type="text" placeholder="Enter total employees" name="total_employees" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form_center"></div>
                                                        <div class="form_6">
                                                            <div class="theme_form_label">
                                                        Building Size
                                                            </div>
                                                            <div class="form-group">
                <input type="text" placeholder="Enter Building Size" name="building_size" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form_center"></div>
                                                    <div class="d-flex">
                                                        <div class="form_6">
                                                            <div class="theme_form_label">
                                                        Unit
                                                            </div>
                                                            <div class="form-group">
                                                            <?php  
                                                           $db = \Config\Database::connect();
                                                           $query = $db->query("select id,unit_name from unit where status=1");        
                                                           $unit = $query->getResultArray();      
                                                           ?>
                                                            <select class="form-control" name="unit_id" id="">
                                                                <option value="0">Select Unit</option>
                                                                    <?php   foreach($unit as $key=>$uni) {?>
                                                                    <option value="<?php echo $uni['id']; ?>"> <?php echo $uni['unit_name']; ?></option>
                                                                    <?php } ?>
                                                             </select>
                                                            </div>
                                                        </div>
                <!--                                        <div class="form_center"></div>-->
                <!--                                        <div class="form_6">-->
                <!--                                            <div class="theme_form_label">-->
                <!--                                        Building Size-->
                <!--                                            </div>-->
                <!--                                            <div class="form-group">-->
                <!--<input type="text" placeholder="Enter Building Size" name="building_size" required="">-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                                                    </div>
                                                </div>

                                                <div class="admin_btn mt-4">
                                                    <input type="submit" value="Create Office">    
                                                </div>
                                            </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade custom_modal action_modal create_modal doc_create" id="docComparePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle-2">Compare Workplace</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="compare_product_box">
                                                <div class="show_product" id="show_workplace">
                                                    <span><span></span>Product A</span>
                                                    <span><span class="gray"></span>Product B</span>
                                                </div>
<!--                                                 <h5 class="text-center">Workplace Name</h5>
                                                <p class="text-center">50kg CO2e</p> -->
                                                <div class="compare_bars rh_bar">
                                                    <div class="bar_single">
                                                        <div class="rh_bar_label line_width">Building</div>                                                        
                                                        <div class="progress" id="building_progress">                                                            
                                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>                                                            
                                                            <div class="progress-bar gray" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>                                                            
                                                        </div>
                                                        <div class="rh_bar_value" id="building_rh_bar_value">
                                                            <span> 10KG CO2e</span><br>
                                                            <span> 7KG CO2e</span>
                                                        </div>
                                                    </div>
                                                    <div class="bar_single">
                                                        <div class="rh_bar_label line_width">Flight</div>                                                        
                                                        <div class="progress" id="flight_progress">                                                            
                                                            <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>                                                            
                                                            <div class="progress-bar gray" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>                                                            
                                                        </div>
                                                        <div class="rh_bar_value" id="flight_rh_bar_value">
                                                            <span> 9KG CO2e</span><br>
                                                            <span> 10KG CO2e</span>
                                                        </div>
                                                    </div>
                                                    <div class="bar_single">
                                                        <div class="rh_bar_label line_width">Company Vehicle</div>                                                        
                                                        <div class="progress" id="company_vehicle_progress">                                                            
                                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>                                                            
                                                            <div class="progress-bar gray" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>                                                            
                                                        </div>
                                                        <div class="rh_bar_value" id="company_vehicle_rh_bar_value">
                                                            <span> 5KG CO2e</span><br>
                                                            <span> 9KG CO2e</span>
                                                        </div>
                                                    </div>
                                                    <div class="bar_single">
                                                        <div class="rh_bar_label line_width">Mobile Fuel</div>                                                        
                                                        <div class="progress" id="mobile_fuel_progress">                                                            
                                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>                                                            
                                                            <div class="progress-bar gray" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>                                                            
                                                        </div>
                                                        <div class="rh_bar_value" id="mobile_fuel_rh_bar_value">
                                                            <span> 10KG CO2e</span><br>
                                                            <span> 7KG CO2e</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bar_footer">
                                                    <span>0%</span>
                                                    <span>50%</span>
                                                    <span>100%</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="document_table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Total Employees</th>
                                    <th scope="col">Building Size</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Assessment</th>
<!--                                     <th scope="col">Supplier</th> -->
                                    <th class="footprint" scope="col">Footprint</th>                                            
                                    <th scope="col" style="text-align: right; width: 125px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
    if($list) {
        $no=1;
        foreach($list as $company) {
?>

                                <tr>
                                    <th scope="row">
                        <?php echo $no++; ?>                                        
                                    </th>
                                    <td>
                        <?php echo $company['cp_name']; ?>                                        
                                    </td>
                                    <td>
                        <?php echo $company['type_name']; ?>                                        
                                    </td>
                                    <td>
                        <?php echo $company['cp_address']; ?>                                        
                                    </td>
                                    <td>
                        <?php echo $company['country_name']; ?>                                        
                                    </td>
                                    <td>
                        <?php echo $company['no_of_employee']; ?>                                        
                                    </td>
                                    <td>
                        <?php echo $company['building_size']; ?>   
                        <td>
                        <?php echo $company['unit_name']; ?>
                        </td>
                        
                        <td>
                    <a href="<?php echo base_url(); ?>/supplier/baseAssessment"><i class="" aria-hidden="true">Building Assessment</i></a>
                    </td>
<!--                                     <td>
                                        <div class="doc_active doc_connected">Connected
                                            <div class="connection_popup">
                                                <table>
                                                    <tr>
                                                        <td>Base Assisment</td>
                                                        <td>Supply Change</td>
                                                        <td>suspenable sourcing</td>
                                                        <td><a href="" data-toggle="modal" data-target="#docDeletePopup">
                                                            <img src="dist-assets/custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        </a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Base Assisment</td>
                                                        <td>Supply Change</td>
                                                        <td>suspenable sourcing</td>
                                                        <td><a href="" data-toggle="modal" data-target="#docDeletePopup">
                                                            <img src="dist-assets/custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        </a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Base Assisment</td>
                                                        <td>Supply Change</td>
                                                        <td>suspenable sourcing</td>
                                                        <td><a href="" data-toggle="modal" data-target="#docDeletePopup">
                                                            <img src="dist-assets/custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        </a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Base Assisment</td>
                                                        <td>Supply Change</td>
                                                        <td>suspenable sourcing</td>
                                                        <td><a href="" data-toggle="modal" data-target="#docDeletePopup">
                                                            <img src="dist-assets/custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        </a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Base Assisment</td>
                                                        <td>Supply Change</td>
                                                        <td>suspenable sourcing</td>
                                                        <td><a href="" data-toggle="modal" data-target="#docDeletePopup">
                                                            <img src="dist-assets/custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        </a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Base Assisment</td>
                                                        <td>Supply Change</td>
                                                        <td>suspenable sourcing</td>
                                                        <td><a href="" data-toggle="modal" data-target="#docDeletePopup">
                                                            <img src="dist-assets/custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        </a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Base Assisment</td>
                                                        <td>Supply Change</td>
                                                        <td>suspenable sourcing</td>
                                                        <td><a href="" data-toggle="modal" data-target="#docDeletePopup">
                                                            <img src="dist-assets/custom_img/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        </a></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="sub_con">7 Connections</div>
                                        <div class="doc_deactive">Deactive</div>
                                    </td>            -->
                                    <?php 
                                        $new_date_from="";
                                        $new_date_to="";
                                        // if($ghg_assessment) {
                                            $new_date_from = date('m/d/Y',strtotime($company['date_from']));
                                            $new_date_to = date('m/d/Y',strtotime($company['date_to']));
                                        // }
                                    ?>
                                    <td><u>
<?php
    if($company['is_submit']==1) {
?>
    <a href="<?php echo base_url(); ?>/brand/company/<?php echo $company['id']; ?>"><i class="" aria-hidden="true"></i>
        <?php 
        if($company['total_footprint']<1000) {
            echo (number_format($company['total_footprint'],2,".","."))." kgs ";
        } 
        else {
            echo (number_format($company['total_footprint']/1000,2,".","."))." tonnes ";
        }
        ?> 
     CO2e</a>
<?php
    }
    else {
?>
    <a href="" data-toggle="modal" data-target="#submitModalCenter" onclick="setAssessment('<?php echo $company['id'] ?>','<?php echo $new_date_from ?>','<?php echo $new_date_to ?>','<?php echo $company['cp_name']; ?>')"><i class="fa fa-calculator" aria-hidden="true"></i> calculate</a>
<?php
    }
?>

                                    </u></td>                                 
                                    <td class="doc_action">
                                        <a href="" data-toggle="modal" data-target="#docEditePopup" data-name="<?php echo $company['cp_name']; ?>" data-type="<?php echo $company['cp_type_id']; ?>" data-address="<?php echo $company['cp_address'] ?>" data-country_id="<?php echo $company['country_id'] ?>" data-no_of_employee="<?php echo $company['no_of_employee']; ?>" data-number="<?php echo $company['id']; ?>" data-building_size="<?php echo $company['building_size']; ?>" data-unit-id="<?php echo $company['unit_id']; ?>" onclick="editCompany(this)">
                                            <img src="<?php echo base_url() ?>/public/uploads/dist-assets/icon_edit.svg" data-toggle="tooltip" data-placement="top" title="Edit">
                                        </a>&nbsp;&nbsp;
                                        <a href="" data-toggle="modal" data-target="#docDeletePopup" data-number="<?php echo $company['id']; ?>" onclick="deleteCompany(this)">
                                            <img src="<?php echo base_url() ?>/public/uploads/dist-assets/icon_delete.svg" data-toggle="tooltip" data-placement="top" title="Delete">
                                        </a>

                                        <label class="custom_checkbox">
                                            <input type="checkbox" name="workplace_info" id="" value="<?php echo $company['id']; ?>">
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>                                
<?php            
        }
    }
?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade custom_modal action_modal create_modal doc_create" id="docConnectePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle-2">Connect Document</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="create_doc_form connect_doc_form">
                                    <div class="theme_field">
                                        <div class="d-flex">
                                            <div class="form_6">
                                                <div class="theme_form_label">
                                                    Categories
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Select Category</option>
                                                        <option>Category name 2</option>
                                                        <option>Category name 3</option>
                                                        <option>Category name 4</option>
                                                        <option>Category name 5</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form_center"></div>
                                            <div class="form_6">
                                                <div class="theme_form_label">
                                                    Select Type
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Select Type</option>
                                                        <option>Type 2</option>
                                                        <option>Type 3</option>
                                                        <option>Type 4</option>
                                                        <option>Type 5</option>
                                                        
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion custom_accordion round_accordion mt-3" id="accordionRightIcon">
                                        <div class="card">
                                            <div class="card-header header-elements-inline" id="colorId" onclick="changeColor()">
                                                <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0"><a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-1" aria-expanded="false"><span></span>Title Here</a></h6>
                                                <span class="one">
                                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                </span>
                                                <span class="two"></span>
                                            </div>
                                            <div class="collapse" id="accordion-item-icons-1" data-parent="#accordionRightIcon" style="">
                                                <div class="card-body">
                                                    The business has in place a supply chain code of
                                                    conduct. The said should address and establish 
                                                    guidelines broadly encompassing environmental issues.
                                                    <div class="q_radio_btn">
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="radio" value="0"><span>Yes</span><span class="checkmark"></span>
                                                        </label>
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="radio" value="0"><span>No</span><span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <textarea class="custom_area" placeholder="Your comment...">Dummy comment typed dummy comment typed Dummy comment typed dummy comment typed</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header header-elements-inline" id="colorId2" onclick="changeColor2()">
                                                <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0"><a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-2"><span></span>Sustainable Sourcing</a></h6>
                                                <span class="one">
                                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                </span>
                                                <span class="two"></span>
                                            </div>
                                            <div class="collapse" id="accordion-item-icons-2" data-parent="#accordionRightIcon">
                                                <div class="card-body">
                                                    The business has in place a supply chain code of
                                                    conduct. The said should address and establish 
                                                    guidelines broadly encompassing environmental issues.
                                                    <div class="q_radio_btn">
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="radio" value="0"><span>Yes</span><span class="checkmark"></span>
                                                        </label>
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="radio" value="0"><span>No</span><span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <textarea class="custom_area" placeholder="Your comment...">Dummy comment typed dummy comment typed Dummy comment typed dummy comment typed</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="admin_btn mt-4">
                                        <input type="button" value="Connect">    
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="modal fade custom_modal action_modal create_modal doc_create" id="docEditePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle-2">Edit Office</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                            <div class="create_doc_form">
                <form action="<?php echo base_url() ?>/brand/editCompany" method="post">
                <input type="hidden" id="company_id" name="company_id" />
                                <div class="theme_field">
                                    <div class="d-flex">
                                        <div class="form_6">
                                            <div class="theme_form_label">
                                                Name
                                            </div>
                                            <div class="form-group">
        <input type="text" placeholder="Enter company name" id="company_name" name="name" required="">
                                            </div>
                                        </div>
                                        <div class="form_center"></div>
                                        <div class="form_6 doc_top_margin">
                                            <div class="theme_form_label">
                                                Type
                                            </div>
                                            <div class="form-group">
                                            <select class="form-control" id="company_type" name="type" required="">
                                                <option value="">Select Type</option>
<?php 
    if($type) {
        foreach($type as $t) {
?>
    <option value="<?php echo $t['id'] ?>"><?php echo $t['type_name']; ?></option>
<?php
        }
    }
?>                                                
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_center"></div>
                                    <div class="d-flex">
                                        <div class="form_6">
                                            <div class="theme_form_label">
                                                Address
                                            </div>
                                            <div class="form-group">
            <input type="text" placeholder="Enter company address" id="address" name="address" required="">
                                            </div>
                                        </div>
                                        <div class="form_center"></div>
                                        <div class="form_6 doc_top_margin">
                                            <div class="theme_form_label">
                                Country
                                            </div>
                                            <div class="form-group">
<!-- <input type="text" placeholder="Enter company pin" id="company_pin" class="company_pin" name="pin" required="" maxlength="10"> -->
<select class="form-control" id="country_id" name="country_id" required="">
    <option value="">Select Country</option>
<?php 
    if($country) {
        foreach($country as $t) {
?>
    <option value="<?php echo $t['id'] ?>"><?php echo $t['name']; ?></option>
<?php
        }
    }
?>                                                
</select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_center"></div>
                                    <div class="d-flex">
                                        <div class="form_6">
                                            <div class="theme_form_label">
                                                Total Employees
                                            </div>
                                            <div class="form-group">
            <input type="text" placeholder="Enter total employees" id="no_of_employee" name="no_of_employee" required="">
                                            </div>
                                        </div>
                                        <div class="form_center"></div>
                                        <div class="form_6">
                                            <div class="theme_form_label">
                                                Building Size
                                            </div>
                                            <div class="form-group">
            <input type="text" placeholder="Enter Building Size" id="building_size" name="building_size" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_center"></div>
                            <div class="d-flex">
                                <div class="form_6">
                                    <div class="theme_form_label">
                                        Unit
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        $db = \Config\Database::connect();
                                        $query = $db->query("select id,unit_name from unit where status=1");
                                        $unit = $query->getResultArray();
                                        ?>
                                        <select class="form-control" name="unit_id" id="unit_id">
                                            <option value="0">Select Unit</option>
                                            <?php   foreach($unit as $key=>$uni) {?>
                                            <option value="<?php echo $uni['id']; ?>"> <?php echo $uni['unit_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
              
                            </div>
                                </div>

                                <div class="admin_btn mt-4">
                                    <input type="submit" value="Edit Office">    
                                </div>
                            </form>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade custom_modal action_modal create_modal doc_create" id="docDeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle-2">Delete Document</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="doc_delete">
                                    <form action="<?php echo base_url() ?>/brand/deleteCompany" method="post">
                                    <input type="hidden" id="del_company_id" name="company_id" />
                                    Are you sure you want to delete this document ?
                                    <div class="admin_btn mt-4">
                                        <input type="submit" value="Yes">    
                                    </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
               <!--  <div class="row doc_table_footer"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="zero_configuration_table_info" role="status" aria-live="polite">Showing 12 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="zero_configuration_table_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="zero_configuration_table_previous"><a href="#" aria-controls="zero_configuration_table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="zero_configuration_table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_configuration_table" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_configuration_table" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_configuration_table" data-dt-idx="4" tabindex="0" class="page-link">...</a></li><li class="paginate_button page-item next" id="zero_configuration_table_next"><a href="#" aria-controls="zero_configuration_table" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div> -->
            </div>
        </div>
    </div>
    
</div>
<div class="modal fade custom_modal action_modal create_modal doc_create" id="submitModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalCenterTitle-2">Select Time Period for Assessment</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
    <div class="modal-body">
        <div class="create_doc_form">
<form name="assessment-form" method="post" action="<?php echo base_url() ?>/brand/companyAssessmentSubmit" id='assessment-form'> 
<input type="hidden" name="company_id" id="assessment_id" value="0" />
        <div class="theme_field">
            <div class="d-flex">
                <div class="form_6">
                    <div class="">
<!--                         <input id="datepicker"/> -->
        <input id="date_from" name="date_from" value="" />
                    </div>
                </div>
                <div class="stc_center">to</div>
                <div class="form_6 doc_top_margin">
                    <div class="">
<!--                         <input id="datepicker2"/> -->
        <input id="date_to" name="date_to" value="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="admin_btn mt-4" id="tab2">
            <input type="submit" value="Submit" name="Submit">    
        </div>
<!--<table>
    <tr>
        <td>
        <label style="color: #fff;">Select From Date </label>            
        </td>
        <td>
        <input id="date_from" name="date_from" value="" style="background:white;" />            
        </td>
    </tr>
    <tr>
        <td>
        <label style="color: #fff;padding-top: 5px;">Select To Date </label>            
        </td>
        <td>
        <input id="date_to" name="date_to" value="" style="background:white;" />            
        </td>
    </tr>
</table> -->
<!-- <br> -->
<!-- <div class="">
<input type="submit" name="Submit" style="background-color: #C39A4A;color: white;
font-size: 16px;
font-weight: 600;
border: none;
padding: 3px 15px; 
cursor: pointer;" value="Submit">
</div> -->
</form>
</div>
    </div>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
        $("#date_from").datepicker();
        $("#date_to").datepicker();
    }); 
</script>
<?php  include("include/footer.php"); ?>
<script>
    var input = document.getElementById('company_address');
    var company_address = new google.maps.places.Autocomplete(input);    
</script>

<script>
    $('.company_pin').keypress (function(){
            var regExp = /[a-z]/i;
              $('.company_pin').on('keydown keyup', function(e) {
                var value = String.fromCharCode(e.which) || e.key;
                // No letters
                if (regExp.test(value)) {
                  e.preventDefault();
                  return false;
                }
            });
    });

    function editCompany(that) {
        var id = $(that).attr("data-number");
        var name = $(that).attr("data-name");
        var type = $(that).attr("data-type");
        var address = $(that).attr("data-address");
        // var pin = $(that).attr("data-pin");
        var country_id = $(that).attr("data-country_id");
        var no_of_employee = $(that).attr("data-no_of_employee");
        var building_size = $(that).attr("data-building_size");
        var unit_id = $(that).attr("data-unit-id");
        $("#company_id").val(id);
        $("#company_name").val(name);
        $("#company_type").val(type);
        $("#address").val(address);
        // $("#company_pin").val(pin);
        $("#country_id").val(country_id);
        $("#no_of_employee").val(no_of_employee);
        $("#building_size").val(building_size);
        $("#unit_id").val(unit_id);
        $('#docEditePopup').modal('show');
    }

    function deleteCompany(that) {
        var id = $(that).attr("data-number");
        $("#del_company_id").val(id);
        $("#docDeletePopup").modal('show');
    }
</script>
<script>
    function setAssessment(assessment_id,date_from,date_to) {
        $("#assessment_id").val(assessment_id);
        $("#date_from").val(date_from);
        $("#date_to").val(date_to);
    }


    function compareWorkplace() {
        var workplaces = new Array();
        var workplace_info = $('input[name="workplace_info"]');
         for (var i = 0; i < workplace_info.length; i++) {
            if (workplace_info[i].checked) {
                workplaces.push(workplace_info[i].value);
            }
        }
        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>/brand/compareWorkplace",
            data: ({workplaces : workplaces }),
            success: function(data){
                rs = JSON.parse(data);
                var color_arr = ["#C39A4A","#828282","blue","brown","orange"];
                var workplace_name = "";
                var building = "";
                var building_rh_bar_value = "";
                var company_vehicle = "";
                var company_vehicle_rh_bar_value ="";
                var flight = "";
                var flight_rh_bar_value ="";
                var mobile_fuel = "";
                var mobile_fuel_rh_bar_value ="";
                if(rs.workplace_name) {
                     for (var i = 0; i < rs.workplace_name.length; i++) {
                        if (rs.workplace_name[i]) {
                            workplace_name+="<span><span style='background:"+color_arr[i]+"'></span>"+rs.workplace_name[i]+"</span>";
                        }
                    }                    
                }
                if(rs.building) {
                     for (var i = 0; i < rs.building.length; i++) {
                        var building_per = 0;
                        if(rs.total_building_footprint && rs.total_building_footprint!=0.00) {
                            building_per = Math.round((rs.building[i]*100)/rs.total_building_footprint);
                        }
                        if (rs.building[i]) {
                            building+='<div class="progress-bar" role="progressbar" style="width: '+building_per+'%;background:'+color_arr[i]+'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                            building_rh_bar_value+='<span>'+rs.building[i]+' tonne CO2e</span><br>';
                        }
                        else {
                            building+='<div class="progress-bar" role="progressbar" style="width: 0%;background:'+color_arr[i]+'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
                            building_rh_bar_value+='<span>0 tonne CO2e</span><br>';                            
                        }
                    }                    
                }
                if(rs.company_vehicle) {
                     for (var i = 0; i < rs.company_vehicle.length; i++) {
                        var company_vehicle_per = 0;
                        if(rs.total_company_vehicle_footprint && rs.total_company_vehicle_footprint!=0.00) {
                            company_vehicle_per = Math.floor((rs.company_vehicle[i]*100)/rs.total_company_vehicle_footprint);
                        }
                        if (rs.company_vehicle[i]) {
                            company_vehicle+='<div class="progress-bar" role="progressbar" style="width: '+company_vehicle_per+'%;background:'+color_arr[i]+'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                            company_vehicle_rh_bar_value+='<span>'+rs.company_vehicle[i]+' tonne CO2e</span><br>';
                        }
                        else {
                            company_vehicle+='<div class="progress-bar" role="progressbar" style="width: 0%;background:'+color_arr[i]+'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
                            company_vehicle_rh_bar_value+='<span>0 tonne CO2e</span><br>';                            
                        }
                    }                    
                }
                if(rs.flight) {
                     for (var i = 0; i < rs.flight.length; i++) {
                        var flight_per = 0;
                        if(rs.total_flight_footprint && rs.total_flight_footprint!=0.00) {
                            flight_per = Math.floor((rs.flight[i]*100)/rs.total_flight_footprint);
                        }
                        if (rs.flight[i]) {
                            flight+='<div class="progress-bar" role="progressbar" style="width: '+flight_per+'%;background:'+color_arr[i]+'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                            flight_rh_bar_value+='<span>'+rs.flight[i]+' tonne CO2e</span><br>';
                        }
                        else {
                            flight+='<div class="progress-bar" role="progressbar" style="width: 0%;background:'+color_arr[i]+'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
                            flight_rh_bar_value+='<span>0 tonne CO2e</span><br>';                            
                        }
                    }                    
                }
                if(rs.mobile_fuel) {
                     for (var i = 0; i < rs.mobile_fuel.length; i++) {
                        var mobile_fuel_per = 0;
                        if(rs.total_mobile_fuel_footprint && rs.total_mobile_fuel_footprint!=0.00) {
                            mobile_fuel_per = Math.floor((rs.mobile_fuel[i]*100)/rs.total_mobile_fuel_footprint);
                        }
                        if (rs.mobile_fuel[i]) {
                            mobile_fuel+='<div class="progress-bar" role="progressbar" style="width: '+mobile_fuel_per+'%;background:'+color_arr[i]+'" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                            mobile_fuel_rh_bar_value+='<span>'+rs.mobile_fuel[i]+' tonne CO2e</span><br>';
                        }
                        else {
                            mobile_fuel+='<div class="progress-bar" role="progressbar" style="width: 0%;background:'+color_arr[i]+'" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
                            mobile_fuel_rh_bar_value+='<span>0 tonne CO2e</span><br>';                            
                        }
                    }                    
                }
                $("#show_workplace").html(workplace_name);
                $("#building_progress").html(building);
                $("#building_rh_bar_value").html(building_rh_bar_value);
                $("#flight_progress").html(flight);
                $("#flight_rh_bar_value").html(flight_rh_bar_value);
                $("#company_vehicle_progress").html(company_vehicle);
                $("#company_vehicle_rh_bar_value").html(company_vehicle_rh_bar_value);
                $("#mobile_fuel_progress").html(mobile_fuel);
                $("#mobile_fuel_rh_bar_value").html(mobile_fuel_rh_bar_value);
                $("#docComparePopup").modal('show');
            }
          });
    }
</script>
