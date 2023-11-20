<?php include("include/header.php"); ?>

        <div class="main-content-wrap sidenav-open d-flex flex-column custom_page">
            <!-- ============ Body content start ============= -->
            <div class="main-content category_body">
                <div class="breadcrumb">
                    <h1>Targets</h1>
                    <ul>
                        <li><a href="">dummy</a></li>
                        <li>dummy</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row target_header">
                    <div class="col-lg-6">
                        <div class="search">
                            <input type="search" placeholder="Search">
                            <img src="dist-assets/custom_img/icon_search.png">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="target_menus">
                            <div href="" class="tm_single show_btn">
                                <img src="dist-assets/custom_img/icon_delete.svg">Delete
                            </div>
                            <div href="" class="tm_single" data-toggle="modal" data-target="#assignPopup">
                                <img src="dist-assets/custom_img/icon_assign.svg">Assign
                            </div>
                            <div href="" class="tm_single" data-toggle="modal" data-target="#editPopup">
                                <img src="dist-assets/custom_img/icon_edit.svg">Edit
                            </div>
                            <div href="" class="tm_single right_margin_menu" data-toggle="modal" data-target="#creatPopup">
                                <img src="dist-assets/custom_img/icon_plus.svg">Create
                            </div>
                        </div>
                        <div class="modal fade custom_modal action_modal create_modal" id="creatPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
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
                                                                <select class="form-control" 
                                                                id="exampleFormControlSelect1">
                                                                  <option>Category name 1</option>
                                                                  <option>Category name 2</option>
                                                                  <option>Category name 3</option>
                                                                  <option>Category name 4</option>
                                                                  <option>Category name 5</option>
                                                                  <img src="dist-assets/custom_img/arrow.png" class="select_arrow">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form_center">Or</div>
                                                        <div class="form_6">
                                                            <div class="theme_form_label">
                                                                Goals
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control" 
                                                                id="exampleFormControlSelect1">
                                                                  <option>Goal 1</option>
                                                                  <option>Goal 2</option>
                                                                  <option>Goal 3</option>
                                                                  <option>Goal 4</option>
                                                                  <option>Goal 5</option>
                                                                  <img src="dist-assets/custom_img/arrow.png" class="select_arrow">
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
                                                    <textarea class="custom_area" placeholder="Type here...">
                                                    </textarea>
                                                </div>
                                                <div class="theme_field">
                                                    <div class="theme_form_label mt-3">Select Due Date</div>
                                                    <input id="datepicker"/>
                                                </div>
                                            </div>
                                            <div class="admin_btn mt-4">
                                                <input type="button" value="Yes">    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade custom_modal action_modal create_modal" id="editPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle-2">Edit</h5>
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
                                                                <select class="form-control" 
                                                                id="exampleFormControlSelect1">
                                                                  <option>Category name 1</option>
                                                                  <option>Category name 2</option>
                                                                  <option>Category name 3</option>
                                                                  <option>Category name 4</option>
                                                                  <option>Category name 5</option>
                                                                  <img src="dist-assets/custom_img/arrow.png" class="select_arrow">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form_center">Or</div>
                                                        <div class="form_6">
                                                            <div class="theme_form_label">
                                                                Goals
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-control" 
                                                                id="exampleFormControlSelect1">
                                                                  <option>Goal 1</option>
                                                                  <option>Goal 2</option>
                                                                  <option>Goal 3</option>
                                                                  <option>Goal 4</option>
                                                                  <option>Goal 5</option>
                                                                  <img src="dist-assets/custom_img/arrow.png" class="select_arrow">
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
                                                        <label class="radio radio-primary checked">
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
                                                    <textarea class="custom_area" placeholder="Type here...">
                                                    </textarea>
                                                </div>
                                                <div class="theme_field">
                                                    <div class="theme_form_label mt-3">Select Due Date</div>
                                                    <input id="datepicker2"/>
                                                </div>
                                            </div>
                                            <div class="admin_btn mt-4">
                                                <input type="button" value="Yes">    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="modal fade custom_modal action_modal" id="assignPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle-2">Assign</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="assign_user">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                                <label class="custom-control-label" for="customCheck1">
                                                    <div class="assign_user_img">
                                                        <img src="dist-assets/custom_img/1.jpg">
                                                    </div>
                                                    <span>User's Name here 1</span>
                                                </label>
                                             </div>
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                                                <label class="custom-control-label" for="customCheck2">
                                                    <div class="assign_user_img">
                                                        <img src="dist-assets/custom_img/1.jpg">
                                                    </div>
                                                    <span>User's Name here 2</span>
                                                </label>
                                             </div>
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">
                                                    <div class="assign_user_img">
                                                        <img src="dist-assets/custom_img/1.jpg">
                                                    </div>
                                                    <span>User's Name here, If too big size here then</span>
                                                </label>
                                             </div>
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">
                                                    <div class="assign_user_img">
                                                        <img src="dist-assets/custom_img/1.jpg">
                                                    </div>
                                                    <span>User's Name here 4</span>
                                                </label>
                                             </div>
                                        </div>
                                        <div class="admin_btn mt-4">
                                            <input type="button" value="Done">    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row close_action">
                    <div class="col-md-12">
                        <div class="custom_action hide">
                            Close Delete <img src="dist-assets/custom_img/icon_close.png">
                        </div>
                    </div>
                </div>
                <div class="row target_body">
                    <div class="col-md-12">
                        <div class="target_single">
                            <div class="custom_action custom_action2" data-toggle="modal" data-target="#deletePopup">
                                <img src="dist-assets/custom_img/icon_delete.svg">
                            </div>
                            <div class="modal fade custom_modal action_modal" id="deletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle-2">Alart</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you delete this entry?
                                            <div class="admin_btn mt-4">
                                                <input type="button" value="Yes">    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ts_inner">
                                <div class="ts_two_column">
                                    <div class="ts_left">
                                        <div class="ts_title">
                                            Target Heading here
                                        </div>
                                    </div>
                                    <div class="ts_right">
                                        <div class="ts_category">
                                            <img src="dist-assets/custom_img/icon_1.jpg">
                                            No Poverty
                                        </div>
                                    </div>
                                </div>
                                <div class="ts_desc">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </div>
                                <div class="ts_two_column ts_footer">
                                    <div class="ts_left">
                                        <div class="ts_date">
                                            Due date : <span>May 19, 2021</span>
                                        </div>
                                        <div class="complete_btn grey_btn">
                                            <input type="button" value="Mark as Complete">
                                        </div>
                                    </div>
                                    <div class="ts_right">
                                        <div class="ts_footer_img">
                                            <img src="dist-assets/custom_img/1.jpg">
                                            <img src="dist-assets/custom_img/1.jpg">
                                            <img src="dist-assets/custom_img/1.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="target_single">
                            <div class="custom_action custom_action2" data-toggle="modal" data-target="#actionPopup">
                                <img src="dist-assets/custom_img/icon_delete.svg">
                            </div>
                            <div class="modal fade custom_modal action_modal" id="actionPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle-2">Alart</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you delete this entry?
                                            <div class="admin_btn mt-4">
                                                <input type="button" value="Yes">    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ts_inner">
                                <div class="ts_two_column">
                                    <div class="ts_left">
                                        <div class="ts_title">
                                            Target Heading here
                                        </div>
                                    </div>
                                    <div class="ts_right">
                                        <div class="ts_category">
                                            <img src="dist-assets/custom_img/icon_1.jpg">
                                            No Poverty
                                        </div>
                                    </div>
                                </div>
                                <div class="ts_desc">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </div>
                                <div class="ts_two_column ts_footer">
                                    <div class="ts_left">
                                        <div class="ts_date">
                                            Due date : <span>May 19, 2021</span>
                                        </div>
                                        <div class="complete_btn black_btn">
                                            <input type="button" value="Mark as Complete">
                                        </div>
                                    </div>
                                    <div class="ts_right">
                                        <div class="ts_footer_img">
                                            <img src="dist-assets/custom_img/1.jpg">
                                            <img src="dist-assets/custom_img/1.jpg">
                                            <img src="dist-assets/custom_img/1.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="target_single">
                            <div class="custom_action custom_action2" data-toggle="modal" data-target="#actionPopup">
                                <img src="dist-assets/custom_img/icon_delete.svg">
                            </div>
                            <div class="modal fade custom_modal action_modal" id="actionPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle-2">Alart</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you delete this entry?
                                            <div class="admin_btn mt-4">
                                                <input type="button" value="Yes">    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ts_inner">
                                <div class="ts_two_column">
                                    <div class="ts_left">
                                        <div class="ts_title">
                                            Target Heading here
                                        </div>
                                    </div>
                                    <div class="ts_right">
                                        <div class="ts_category">
                                            <img src="dist-assets/custom_img/icon_1.jpg">
                                            No Poverty
                                        </div>
                                    </div>
                                </div>
                                <div class="ts_desc">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </div>
                                <div class="ts_two_column ts_footer">
                                    <div class="ts_left">
                                        <div class="ts_date">
                                            Due date : <span>May 19, 2021</span>
                                        </div>
                                        <div class="complete_btn golden_btn">
                                            <input type="button" value="Mark as Complete">
                                            <div class="golden_msg">You already have done</div>
                                        </div>
                                    </div>
                                    <div class="ts_right">
                                        <div class="ts_footer_img">
                                            <img src="dist-assets/custom_img/1.jpg">
                                            <img src="dist-assets/custom_img/1.jpg">
                                            <img src="dist-assets/custom_img/1.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
    
<?php include("include/footer.php"); ?>