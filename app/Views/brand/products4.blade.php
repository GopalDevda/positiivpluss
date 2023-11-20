<?php include("header.php"); ?>
<?php include("include/menu.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
        <div class="main-content-wrap sidenav-open d-flex flex-column custom_page company_page">
            <!-- ============ Body content start ============= -->
            <div class="main-content category_body">
                <div class="breadcrumb">
                    <h1>Company</h1>
                    <ul></ul>
                        <li><a href="">dummy</a></li>
                        <li>dummy</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                    <div class="category_page_header">
                            <div class="cph_inner">
                                <div class="cph_left">
                                    <span><img src="dist-assets/custom_img/custom_img/products.png" alt=""></span>
                                </div>
                                <div class="cph_right">
                                    <div class="cph_title">Products Footprints</div>
                                    <div class="cph_short_desc">
                                        Utopiic positive assessment tool is free and confidential, used by brands evaluate their impacts in the areas
                                        of sustainability.
                                    </div>
                                    <div class="cph_status">
                                        <div class="cph_status_left d-flex">
                                            <div class="cph_score_icon">
                                                <img src="dist-assets/custom_img/icon_score.png">
                                            </div>
                                            <div class="cph_score_content">
                                                <div class="cph_score_label">Utopiic Score</div>
                                                <div class="cph_score_result">0 Out of 100</div>
                                            </div>
                                        </div>
                                        <div class="cph_status_right d-flex">
                                            <div class="cph_score_icon">
                                                <img src="dist-assets/custom_img/icon_complete.png">
                                            </div>
                                            <div class="cph_score_content">
                                                <div class="cph_score_label">Utopiic Score</div>
                                                <div class="cph_score_result">0 Out of 100</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img src="dist-assets/custom_img/custom_img/map.png" alt="" class="cph_map">
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-12">
                        
                        <div id="tab1c">                            
                            <div class="step_body">
                                <div class="step_form">                              
                                    <div class="indicators d-flex text-light">
                                        <div class="rounded-circle bg-secondary"><span><i class="material-icons">volunteer_activism</i></span></div>
                                        <div class="rounded-circle bg-secondary"><span><i class="material-icons">view_in_ar</i></span></div>
                                        <div class="rounded-circle bg-secondary mr-0"><span><i class="material-icons">local_shipping</i></span></div>
                                        <div class="rounded-circle bg-secondary mr-0"><span><i class="material-icons">precision_manufacturing</i></span></div>
                                        <div class="rounded-circle bg-secondary mr-0"><span><i class="material-icons">opacity</i></span></div>
                                        <div class="rounded-circle bg-secondary mr-0"><span><i class="material-icons">assignment_late</i></span></div>
                                        <hr>
                                    </div>
                                </div>   
                                <div class="position-relative">
                                    <form  class="stepped" action="#" method="post">
                                        <div class="steps step_1">
                                        <div class="row sfb">
                                            <div class="col-sm-1">
                                                <div class="step_form_img">
                                                    <i class="fa fa-calculator" aria-hidden="true"></i>
                                                </div>    
                                            </div>
                                            <div class="col-sm-11 spt_right">
                                                <div class="form_big_title">Welcome to the Product Carbon Footprint Calculator</div>
                                                <div class="form_title_sub">
                                                    First, please tell us about your collections / product
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Name or type of product</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Select Location</option>
                                                        <option>Location 1</option>
                                                        <option>Location 2</option>
                                                        <option>Location 3</option>
                                                        <option>Location 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">
                                            <div class="step_label">
                                                <label for="inp1">How many products are produced</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Select number of employees</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">
                                            <div class="step_label">
                                                <label for="inp1">
                                                    Carbon footprint calculations are typically based on annual emissions from the previous 12 months.
                                                    If you would like to calculate your carbon footprint for a different period use the calendar boxes below (optional):
                                                    <i class="fa fa-info-circle info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                                </label>
                                                
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field step_three_column">
                                                    <div class="stc_left"><input id="datepicker"/></div>
                                                    <div class="stc_center">to</div>
                                                    <div class="stc_right"><input id="datepicker2"/></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="step_form_bottom_line">
                                            Next, select the appropriate tab above to calculate the part of your product LCA you are most interested in, e.g. raw materials.
                                            Or, visit each of the tabs above to calculate the full carbon footprint for your product.<br><br> 
                                            Following your calculation, you can offset / neutralise your emissions through one of our climate-friendly projects.
                                        </div>
                                    </div> 
                                    </form>
                                    <form  class="stepped" action="#" method="post">
                                        <div class="steps step_2">
                                        <div class="row sfb">
                                            <div class="col-sm-1">
                                                <div class="step_form_img">
                                                    <i class="fa fa-calculator" aria-hidden="true"></i>
                                                </div>    
                                            </div>
                                            <div class="col-sm-11 spt_right">
                                                <div class="form_big_title">Raw material carbon footprint calculator</div>
                                                <div class="form_title_sub">
                                                    If you don't have access to your utility bills, press the Estimate button 
                                                    to estimate your building's carbon footprint based on the number of employees (20)
                                                </div>                                                                                               
                                            </div>
                                        </div>
                                        <div class="step_inner">
                                            <div class="step_label">
                                                <label for="inp1">Materials</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field step_three_column">
                                                    <div class="stc_left">
                                                        Quantity
                                                    </div>
                                                    <div class="stc_center"></div>
                                                    <div class="stc_right">
                                                        Unit
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner append_row">
                                            <div class="theme_field step_label">
                                                <select class="form-control label_select" id="exampleFormControlSelect1">
                                                    <option>Natural Gas</option>
                                                    <option>Option 2</option>                                                            
                                                </select>
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field step_three_column">
                                                    <div class="stc_left">
                                                        <input type="number" placeholder="Enter number">
                                                    </div>
                                                    <div class="stc_center"></div>
                                                    <div class="stc_right">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                            <option>kWh</option>
                                                            <option>therms</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="close append_close" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="You can add more"><span aria-hidden="true">+</span></button>
                                        </div>
                                        <div class="step_inner append_row">
                                            <div class="theme_field step_label">
                                                <select class="form-control label_select" id="exampleFormControlSelect1">
                                                    <option>Natural Gas</option>
                                                    <option>Option 2</option>                                                            
                                                </select>
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field step_three_column">
                                                    <div class="stc_left">
                                                        <input type="number" placeholder="Enter number">
                                                    </div>
                                                    <div class="stc_center"></div>
                                                    <div class="stc_right">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                            <option>kWh</option>
                                                            <option>therms</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="close append_close append_close_red" type="button" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete this row"><span aria-hidden="true">x</span></button>
                                        </div>
                                        <div class="step_inner append_row">
                                            <div class="theme_field step_label">
                                                <select class="form-control label_select" id="exampleFormControlSelect1">
                                                    <option>Heating Oil</option>
                                                    <option>Option 2</option>                                                            
                                                </select>
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field step_three_column">
                                                    <div class="stc_left">
                                                        <input type="number" placeholder="Enter number">
                                                    </div>
                                                    <div class="stc_center"></div>
                                                    <div class="stc_right">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                            <option>litres</option>
                                                            <option>kWh</option>
                                                            <option>tones</option>
                                                            <option>US gallons</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="close append_close" type="button"><span aria-hidden="true">+</span></button>
                                        </div>
                                        <div class="step_inner">
                                            <div class="theme_field step_label">
                                                <select class="form-control label_select" id="exampleFormControlSelect1">
                                                    <option>Coal</option>
                                                    <option>Option 2</option>                                                            
                                                </select>
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field step_three_column">
                                                    <div class="stc_left">
                                                        <input type="number" placeholder="Enter number">
                                                    </div>
                                                    <div class="stc_center"></div>
                                                    <div class="stc_right">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                            <option>tones</option>
                                                            <option>kWh</option>    
                                                            <option>x 10 kg bags</option>
                                                            <option>x 20 kg bags</option>
                                                            <option>x 25 kg bags</option>
                                                            <option>x 50 kg bags</option>                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="close append_close" type="button"><span aria-hidden="true">+</span></button>
                                        </div>
                                        <div class="step_inner">
                                            <div class="theme_field step_label">
                                                <select class="form-control label_select" id="exampleFormControlSelect1">
                                                    <option>LPG</option>
                                                    <option>Option 2</option>                                                            
                                                </select>
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field step_three_column">
                                                    <div class="stc_left">
                                                        <input type="number" placeholder="Enter number">
                                                    </div>
                                                    <div class="stc_center"></div>
                                                    <div class="stc_right">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                            <option>litres</option>
                                                            <option>kWh</option>
                                                            <option>themes</option>                                                            
                                                            <option>US gallons</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="close append_close" type="button"><span aria-hidden="true">+</span></button>
                                        </div>
                                        <div class="step_inner">
                                            <div class="theme_field step_label">
                                                <select class="form-control label_select" id="exampleFormControlSelect1">
                                                    <option>Propane</option>
                                                    <option>Option 2</option>                                                            
                                                </select>
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field step_three_column">
                                                    <div class="stc_left">
                                                        <input type="number" placeholder="Enter number">
                                                    </div>
                                                    <div class="stc_center"></div>
                                                    <div class="stc_right">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                            <option>tones</option>
                                                            <option>US gallons</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="close append_close" type="button"><span aria-hidden="true">+</span></button>
                                        </div>
                                        <div class="step_inner">
                                            <div class="theme_field step_label">
                                                <select class="form-control label_select" id="exampleFormControlSelect1">
                                                    <option>Wood</option>
                                                    <option>Option 2</option>                                                            
                                                </select>
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field step_three_column">
                                                    <div class="stc_left">
                                                        <input type="number" placeholder="Enter number">
                                                    </div>
                                                    <div class="stc_center"></div>
                                                    <div class="stc_right">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                            <option>tones</option>                                                                                                                       
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="close append_close" type="button"><span aria-hidden="true">+</span></button>
                                        </div>
                                        <div class="step_inner">
                                            <div class="theme_field step_label">
                                                <select class="form-control label_select" id="exampleFormControlSelect1">
                                                    <option>Diesel</option>
                                                    <option>Option 2</option>                                                            
                                                </select>
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field step_three_column">
                                                    <div class="stc_left">
                                                        <input type="number" placeholder="Enter number">
                                                    </div>
                                                    <div class="stc_center"></div>
                                                    <div class="stc_right">
                                                        <select class="form-control" id="exampleFormControlSelect1">
                                                            <option>litres</option>
                                                            <option>tones</option>  
                                                            <option>UK gallons</option>  
                                                            <option>US gallons</option>                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="close append_close" type="button"><span aria-hidden="true">+</span></button>
                                        </div>                                        
                                        <div class="step_inner">
                                            <div class="step_label">
                                                <label for="inp1">What percentage of your raw material normally goes to waste</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div> 
                                            <div class="step_field">
                                                <div class="theme_field step_three_column column_shor">
                                                    <div class="stc_left">
                                                        <input type="number">
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="sf_center_desc">
                                            <div class="admin_btn btn_black">
                                                <input type="button" value="Calculate & Add To Footprint">    
                                            </div>                                            
                                            <div class="alert alert-success custom_alert" role="alert">
                                                52.00 tonnes:	Estimate of building's footprint for 20 employees
                                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                        </div>                                                                            
                                    </div>  
                                    </form>
                                    <form  class="stepped" action="#" method="post">
                                     <div class="steps step_3">
                                        <div class="row sfb">
                                            <div class="col-sm-1">
                                                <div class="step_form_img">
                                                    <i class="fa fa-car" aria-hidden="true"></i>
                                                </div>    
                                            </div>
                                            <div class="col-sm-11 spt_right">
                                                <div class="form_big_title">Transportation carbon footprint calculator</div>
                                                <div class="form_title_sub">
                                                    You can enter details for up to 5 vehicles
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Mileage</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Distance covered by particular vehicles"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="text" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>km</option>
                                                        <option>miles</option>                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">
                                            <div class="step_label">
                                                <label for="inp1">Choose vehicle</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Type of vehicle .... year ........ & model to identity .... efficiency"></i>
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Average van, motorbike & car database</option>
                                                        <option>EU car database</option>
                                                        <option>India car database</option>
                                                        <option>USA car database</option>                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="step_inner">                                            
                                            <div class="step_label">                                                
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field">                                                    
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Select year or type</option>
                                                        <option>dummy</option>
                                                        <option>dummy</option>
                                                        <option>dummy</option>
                                                        <option>dummy</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">                                                
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field">                                                    
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>dummy</option>                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="step_inner">                                            
                                            <div class="step_label">                                                
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field">                                                    
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>dummy</option>                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">                                                
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field">                                                    
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>dummy</option>                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Or enter efficiency</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Efficiency average of the particular vehicle"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control mr-2" id="exampleFormControlSelect1">
                                                        <option>g/km</option>
                                                        <option>L/100km</option>   
                                                        <option>mpg UK</option>                                                       
                                                        <option>mpg US</option>                                                 
                                                    </select>
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Petrol</option>
                                                        <option>Diesel</option>   
                                                        <option>LPG</option>                                                       
                                                        <option>CNG</option>                                                 
                                                    </select>
                                                </div> 
                                            </div>
                                        </div>  
                                        <div class="step_inner">
                                            <div class="step_label">
                                                <label for="inp1">Connect raw material</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>
                                            <div class="step_field">
                                                <div class="theme_field">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Select raw material</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>                                         
                                        <div class="sf_center_desc">
                                            <div class="admin_btn btn_black">
                                                <input type="button" value="Calculate & Add To Footprint">    
                                            </div> 
                                            <div class="alert alert-success custom_alert" role="alert">
                                                Total transport footprint = 0.00 tonnes of CO2e
                                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div> 
                                        </div>                          
                                    </div>  
                                    </form>
                                    <form  class="stepped" action="#" method="post">
                                        <div class="steps step_4">
                                        <div class="row sfb">
                                            <div class="col-sm-1">
                                                <div class="step_form_img">
                                                    <i class="fa fa-car" aria-hidden="true"></i>
                                                </div>    
                                            </div>
                                            <div class="col-sm-11 spt_right">
                                                <div class="form_big_title">Manufacturing carbon footprint calculator</div>
                                                <div class="form_title_sub">
                                                    You can enter details for all manufacturing process etc directly for the product
                                                    <br>
                                                    Enter your usage of each type of fuel, and press the Calculate button
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Electricity consumption</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Water consumption</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Petrol</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Diesel</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">LPG</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">CNG</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>                                     
                                        <div class="sf_center_desc">
                                            <div class="admin_btn btn_black">
                                                <input type="button" value="Calculate & Add To Footprint">    
                                            </div> 
                                            <div class="alert alert-success custom_alert" role="alert">
                                                2.54 tonnes:	6 x Economy class direct return flight from DEL to GOI
                                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                        </div>                          
                                    </div>
                                    </form>
                                    <form  class="stepped" action="#" method="post">
                                        <div class="steps step_5">
                                        <div class="row sfb">
                                            <div class="col-sm-1">
                                                <div class="step_form_img">
                                                    <i class="fa fa-car" aria-hidden="true"></i>
                                                </div>    
                                            </div>
                                            <div class="col-sm-11 spt_right">
                                                <div class="form_big_title">Manufacturing carbon footprint calculator</div>
                                                <div class="form_title_sub">
                                                    You can enter details for all manufacturing process etc directly for the product
                                                    <br>
                                                    Enter your usage of each type of fuel, and press the Calculate button
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Electricity consumption</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Water consumption</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Petrol</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Diesel</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">LPG</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">CNG</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>                                     
                                        <div class="sf_center_desc">
                                            <div class="admin_btn btn_black">
                                                <input type="button" value="Calculate & Add To Footprint">    
                                            </div> 
                                            <div class="alert alert-success custom_alert" role="alert">
                                                2.54 tonnes:	6 x Economy class direct return flight from DEL to GOI
                                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                        </div>                          
                                    </div>  
                                    </form>
                                    <form  class="stepped" action="#" method="post">
                                        <div class="steps step_6">
                                        <div class="row sfb">
                                            <div class="col-sm-1">
                                                <div class="step_form_img">
                                                    <i class="fa fa-car" aria-hidden="true"></i>
                                                </div>    
                                            </div>
                                            <div class="col-sm-11 spt_right">
                                                <div class="form_big_title">Manufacturing carbon footprint calculator</div>
                                                <div class="form_title_sub">
                                                    You can enter details for all manufacturing process etc directly for the product
                                                    <br>
                                                    Enter your usage of each type of fuel, and press the Calculate button
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Electricity consumption</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Water consumption</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Petrol</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">Diesel</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">LPG</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="step_inner">                                            
                                            <div class="step_label">
                                                <label for="inp1">CNG</label>
                                                <i class="fa fa-info-circle info_icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Content here"></i>
                                            </div>                                        
                                            <div class="step_field">
                                            <div class="theme_field d-flex">
                                                    <input type="number" class="mr-2">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Litres</option>
                                                        <option>Tonnes</option>  
                                                        <option>UK gallons</option>
                                                        <option>US gallons</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>                                     
                                        <div class="sf_center_desc">
                                            <div class="admin_btn btn_black">
                                                <input type="button" value="Calculate & Add To Footprint">    
                                            </div> 
                                            <div class="alert alert-success custom_alert" role="alert">
                                                2.54 tonnes:	6 x Economy class direct return flight from DEL to GOI
                                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                        </div>                          
                                    </div>                                
                                    </form>
                                </div>
                            </div>
                            <div class="step_form_btns text-right">
                                <button type="button" class="btnPrev btn btn-outline-success">Previous</button>
                                <button type="button" class="btnNext btn btn-outline-success">Next</button>
                                <div id="tab2">next</div>
                            </div>
                        </div>
                            
                        
                        
                    </div>
                </div>
                
                <div class="row" id="tab2c">
                    <div class="col-sm-12">
                        <div class="confirm_box">
                            <div class="cb_single">
                                <div class="cb_left"><span>Reliance Industries Pvt Ltd.</span></div>
                                <div class="cb_right">
                                    <div class="admin_btn" data-toggle="modal" data-target="#confirmModal">
                                        <input type="button" value="Verify">    
                                    </div>
                                </div>
                            </div>
                            <div class="cb_single mt-2">
                                <div class="cb_left">April 2020 - March 2021</div>
                                <div class="cb_right">
                                    <div class="undo" id="tab1"><u>Undo</u></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade custom_modal" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle-2">Confirmation </h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        Connect your answers with the supporting document from the Documents Library!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion custom_accordion round_accordion" id="accordionRightIcon">
                            <div class="card custom_tab">
                                <div class="card-header header-elements-inline">
                                    <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">
                                        <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icons-1" aria-expanded="false"><span></span>
                                            Title Here
                                        </a>
                                        <i class="fa fa-info-circle info_icon_ac info_icon info_icon_2" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Content here"></i>
                                    </h6>
                                </div> 
                                <div class="collapse" id="accordion-item-icons-1" data-parent="#accordionRightIcon" style="">
                                    <div class="card-body">
                                        <div class="custom_tab">
                                            <ul class="nav nav-pills" id="myPillTab" role="tablist">
                                                <li class="nav-item"><a class="nav-link active show" id="home-icon-pill" data-toggle="pill" href="#Result" role="tab" aria-controls="homePIll" aria-selected="false">Result</a></li>
                                                <li class="nav-item"><a class="nav-link" id="profile-icon-pill" data-toggle="pill" href="#Target" role="tab" aria-controls="profilePIll" aria-selected="false">Target</a></li>
                                                <li class="nav-item"><a class="nav-link" id="contact-icon-pill" data-toggle="pill" href="#Offset" role="tab" aria-controls="contactPIll" aria-selected="true">Offset</a></li>
                                            </ul> 
                                            <div class="tab-content" id="myPillTabContent">
                                                <div class="tab-pane fade active show" id="Result" role="tabpanel" aria-labelledby="home-icon-pill">
                                                    <div class="rh_bar">
                                                        <div class="bar_single">   
                                                            Building&nbsp;&nbsp;                                                                                                           
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>                                                            
                                                            </div>
                                                            <div class="rh_bar_value">50%</div>
                                                        </div>
                                                        <div class="bar_single"> 
                                                            Building&nbsp;&nbsp;                                                                                          
                                                            <div class="progress">                                                            
                                                                <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>                                                            
                                                            </div>
                                                            <div class="rh_bar_value">20%</div>
                                                        </div>
                                                        <div class="bar_single">  
                                                            Building&nbsp;&nbsp;                                                                                                               
                                                            <div class="progress">                                                            
                                                                <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>                                                            
                                                            </div>
                                                            <div class="rh_bar_value">40%</div>
                                                        </div>    
                                                        <div class="bar_single">  
                                                            Building&nbsp;&nbsp;                                                                                                               
                                                            <div class="progress">                                                            
                                                                <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>                                                            
                                                            </div>
                                                            <div class="rh_bar_value">30%</div>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show" id="Target" role="tabpanel" aria-labelledby="home-icon-pill">
                                                <div class="accordion_table">
                                                     <div class="table-responsive">
                                                        <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Category</th>
                                                                        <th scope="col">Sub Category</th>
                                                                        <th scope="col">Status</th>    
                                                                        <th scope="col">Document</th>
                                                                        <th scope="col">Remark</th>    
                                                                        <th scope="col" class="float-right">Action</th>                                                                                                                             
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>                                                            
                                                                        <td>Category name 1</td>
                                                                        <td>Sub Cat name 1</td>
                                                                        <td><div class="status_bg high_bg">High</div></td>   
                                                                        <td>Document here</td>  
                                                                        <td>Remark here</td>    
                                                                        <td class="doc_action"d><a href="#"> <span data-toggle="tooltip" data-placement="top" title="Set Target" ><i data-toggle="modal" data-target="#creatPopup" class="material-icons">adjust</i></span></a></td>                                                                      
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <td>Category name 2</td>
                                                                        <td>Sub Cat name 2</td>
                                                                        <td><div class="status_bg medium_bg">Medium</div></td>  
                                                                        <td>Document here</td>
                                                                        <td>Remark here</td>  
                                                                        <td class="doc_action"><a href="#"> <span data-toggle="tooltip" data-placement="top" title="Set Target" ><i data-toggle="modal" data-target="#creatPopup" class="material-icons">adjust</i></span></a></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <td>Category name 3</td>
                                                                        <td>Sub Cat name 3</td>
                                                                        <td><div class="status_bg low_bg">Low</div></td> 
                                                                        <td>Document here</td> 
                                                                        <td>Remark here</td> 
                                                                        <td class="doc_action"><a href="#"> <span data-toggle="tooltip" data-placement="top" title="Set Target" ><i data-toggle="modal" data-target="#creatPopup" class="material-icons">adjust</i></span></a></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <td>Category name 4</td>
                                                                        <td>Sub Cat name 4</td>
                                                                        <td><div class="status_bg low_bg">Low</div></td> 
                                                                        <td>Document here</td> 
                                                                        <td>Remark here</td> 
                                                                        <td class="doc_action"><a href="#"> <span data-toggle="tooltip" data-placement="top" title="Set Target" ><i data-toggle="modal" data-target="#creatPopup" class="material-icons">adjust</i></span></a></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <td>Category name 5</td>
                                                                        <td>Sub Cat name 5</td>
                                                                        <td><div class="status_bg low_bg">Low</div></td> 
                                                                        <td>Document here</td> 
                                                                        <td>Remark here</td>                                                             
                                                                        <td class="doc_action"><a href="#"> <span data-toggle="tooltip" data-placement="top" title="Set Target" ><i data-toggle="modal" data-target="#creatPopup" class="material-icons">adjust</i></span></a></td> 
                                                                        <div class="modal fade custom_modal action_modal create_modal doc_create" id="docEditePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalCenterTitle-2">Edit Document</h5>
                                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="create_doc_form">
                                                                                            <div class="theme_field">
                                                                                                <div class="d-flex">
                                                                                                    <div class="form_6">
                                                                                                        <div class="theme_form_label">
                                                                                                            Document Name
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <input type="text" value="Name typed here">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form_center"></div>
                                                                                                    <div class="form_6 doc_top_margin">
                                                                                                        <div class="theme_form_label">
                                                                                                            Type
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <input type="text" value="Typed here">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="doc_upload">
                                                                                                <input type="file" class="form-control" id="customFile">
                                                                                            </div>
                                                                                            <div class="admin_btn mt-4">
                                                                                                <input type="button" value="Update">    
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> 

                                                                        <div class="modal fade custom_modal action_modal create_modal doc_create" id="docDeletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" style="padding-right: 17px; display: block;">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalCenterTitle-2">Delete Document</h5>
                                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="doc_delete">
                                                                                            Are you sure you want to delete this document ?
                                                                                            <div class="admin_btn mt-4">
                                                                                                <input type="button" value="Yes">    
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>                                                                         
                                                                    </tr> 
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade show" id="Offset" role="tabpanel" aria-labelledby="home-icon-pill">
                                                    <div class="offset_inner">
                                                        <div class="offset_title">
                                                            Carbon ....... Projects
                                                        </div>
                                                        <div class="">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-4 col-sm-6">
                                                                <div class="offset_single">
                                                                    <img src="dist-assets/custom_img/offset_1.jpg">
                                                                    <div class="os_title">Renewable Energy</div>
                                                                    <div>
                                                                        The transition from fossil-based energy production to renewable needs 
                                                                        acceleration, and we support projects that verifiably reduce and 
                                                                        offset emissions through clean energy alternatives.
                                                                    </div>
                                                                    <div class="admin_btn btn_black mt-3">
                                                                        <input type="button" value="Buy">    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 custom_margin_top_3">
                                                                <div class="offset_single">
                                                                    <img src="dist-assets/custom_img/offset_2.jpg">
                                                                    <div class="os_title">Community Projects</div>
                                                                    <div>
                                                                        Community-focused projects help to address carbon emissions while 
                                                                        supporting the local communities through solutions like improved 
                                                                        cooking technology, improved access to weter, and economic development.
                                                                    </div>
                                                                    <div class="admin_btn btn_black mt-3">
                                                                        <input type="button" value="Buy">    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 custom_margin_top_2">
                                                                <div class="offset_single">
                                                                    <img src="dist-assets/custom_img/offset_3.jpg">
                                                                    <div class="os_title">Nature-based Solutions</div>
                                                                    <div>
                                                                        Nature has a time-tested ability to absorb and store carbon within the 
                                                                        natural carbon cycle. Nature-based solutions include projects focused 
                                                                        on reforestation and afforestation.
                                                                    </div>
                                                                    <div class="admin_btn btn_black mt-3">
                                                                        <input type="button" value="Buy">    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

<!-- step form start-->
<script>
    document.addEventListener("DOMContentLoaded", () => {
     class MultiStep {
      constructor(formId) {
       let myForm = document.querySelector(formId),
        steps = myForm.querySelectorAll(".steps"),
        btnPrev = myForm.querySelector(".btnPrev"),
        btnNext = myForm.querySelector(".btnNext"),
        indicators = myForm.querySelectorAll(".rounded-circle"),
        inputClasses = ".form-control",
        currentTab = 0;
    
       // we'll need 4 different functions to do this
       showTab(currentTab);
    
       function showTab(n) {
        steps[n].classList.add("active");
        if (n == 0) {
         btnPrev.classList.add("hidden");
         btnPrev.classList.remove("show");
        } else {
         btnPrev.classList.add("show");
         btnPrev.classList.remove("hidden");
        }
        if (n == steps.length - 1) {
         btnNext.textContent = "Submit";
        } else {
         btnNext.textContent = "Next";
        }
        showIndicators(n);
       }
    
       function showIndicators(n) {
        for (let i = 0; i < indicators.length; i++) {
         indicators[i].classList.replace("bg-warning", "bg-success");
        }
        indicators[n].className += " bg-warning";
       }
    
       function clickerBtn(n) {
        if (n == 1 && !validateForm()) return false;
        steps[currentTab].classList.remove("active");
        currentTab = currentTab + n;
        if (currentTab >= steps.length) {
         myForm.submit();
         return false;
        }
        showTab(currentTab);
       }
    // Do whatever validation you want
       function validateForm() {
        let input = steps[currentTab].querySelectorAll(inputClasses),
         valid = true;
        for (let i = 0; i < input.length; i++) {
         if (input[i].value == "") {
          if (!input[i].classList.contains("invalid")) {
           input[i].classList.add("invalid");
          }
          valid = false;
         }
         if (!input[i].value == "") {
          if (input[i].classList.contains("invalid")) {
           input[i].classList.remove("invalid");
          }
         }
        }
        return valid;
       }
       btnPrev.addEventListener("click", () => {
        clickerBtn(-1);
       });
       btnNext.addEventListener("click", () => {
        clickerBtn(1);
       });
      }
     }
     let MS = new MultiStep("#tab1c");
    });
</script>
<!-- step form end-->


<div class="modal fade custom_modal action_modal create_modal " id="creatPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle-2">Create</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="create_form">
                                <div class="theme_field">
                                    <div class="d-flex">
                                        <div class="form_6">
                                            <div class="theme_form_label">
                                                Categories
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Category name 1</option>
                                                    <option>Category name 2</option>
                                                    <option>Category name 3</option>
                                                    <option>Category name 4</option>
                                                    <option>Category name 5</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form_center">Or</div>
                                        <div class="form_6">
                                            <div class="theme_form_label">
                                                Goals
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Goal 1</option>
                                                    <option>Goal 2</option>
                                                    <option>Goal 3</option>
                                                    <option>Goal 4</option>
                                                    <option>Goal 5</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="theme_field">
                                    <div class="theme_form_label mt-3">Suggestions</div>
                                    <div class="q_radio_btn">
                                        <label class="radio radio-primary">
                                            <input type="radio" name="radio" value="0">
                                            <span>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Lorem Ipsum i
                                            </span>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio radio-primary">
                                            <input type="radio" name="radio" value="0">
                                            <span>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply dummy
                                            </span>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio radio-primary">
                                            <input type="radio" name="radio" value="0">
                                            <span>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Lorem Ipsum i
                                            </span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="theme_field">
                                    <div class="theme_form_label mt-3">
                                        Description 
                                        <img class="icon_info" src="dist-assets/custom_img/icon_info.png">
                                        <div class="info_msg">
                                            Description information here 
                                        </div>
                                    </div>
                                    <textarea class="custom_area" placeholder="Type here...">                                                    </textarea>
                                </div>
                                <div class="theme_field">
                                    <div class="theme_form_label mt-3">Select Due Date</div>
                                    <div role="wrapper" class="gj-datepicker gj-datepicker-bootstrap gj-unselectable input-group"><input id="datepicker" data-type="datepicker" data-guid="03321e1d-5d0f-ea2a-4153-80015e634f02" data-datepicker="true" class="form-control" role="input"><span class="input-group-append" role="right-icon"><button class="btn btn-outline-secondary border-left-0" type="button"><i class="gj-icon">event</i></button></span></div>
                                </div>
                            </div>
                            <div class="admin_btn mt-4">
                                <input type="button" value="Yes">    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script>
    var j = jQuery.noConflict();
j(document).ready(function(){
  j('#tab2c, #tab3c').hide();
		j('#tab1').click(function(){
		j('#tab1c').show();						  
		j('#tab2c, #tab3c').hide();					  
		});
		
		j('#tab2').click(function(){
		j('#tab2c').show();						  
		j('#tab1c, #tab3c').hide();						  
		});
		
		j('#tab3').click(function(){
		j('#tab3c').show();						  
		j('#tab1c, #tab2c').hide();						  
        });
});
</script>

<!-- tooltip start -->
<script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
</script>   
<!-- tooltip end --> 

<?php include("footer.php"); ?>