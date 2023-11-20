<?php

use App\Models\UserNotification;
use App\Models\SupplierModel;
?>
<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>">
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Account Setting</h2>
                        <div class="breadcrumb-wrapper">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-success alert-dismissible fade show" id="updatesuccess" role="alert" style="padding: 0.71rem 1rem;display:none;">
            <strong>Success!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-danger alert-dismissible fade show" id="updateerror" role="alert" style="padding: 0.71rem 1rem;display:none;">
            <strong>Error!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="content-body">
            <div class="row">
                <div class="col-md-3 col-12">
                    <ul class="nav nav-pills flex-column nav-left mb-2">
                        <!-- account -->
                        <li class="nav-item">
                            <a class="nav-link active" id="stacked-pill-1" data-bs-toggle="pill" href="#vertical-pill-1" aria-expanded="true">
                                <i data-feather="user" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Account</span>
                            </a>
                        </li>
                        <!-- security -->
                        <li class="nav-item">
                            <a class="nav-link" id="stacked-pill-2" data-bs-toggle="pill" href="#vertical-pill-2" aria-expanded="false">
                                <i data-feather="lock" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Change Password</span>
                            </a>
                        </li>
                        <!-- billing and plans -->
                        <li class="nav-item">
                            <a class="nav-link" id="stacked-pill-3" data-bs-toggle="pill" href="#vertical-pill-3" aria-expanded="false">
                                <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Information</span>
                            </a>
                        </li>
                        <!-- notification -->
                        <li class="nav-item">
                            <a class="nav-link" id="stacked-pill-4" data-bs-toggle="pill" href="#vertical-pill-4" aria-expanded="false">
                                <i data-feather="bell" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Notifications</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php

                $supplier_model = new SupplierModel();
                $session = session();
                $sid = session()->supplier_info['supplier_id'];
                $o = $supplier_model->where('id', $sid)->first();
                $nameproof = $o['nameproof'];
                $image = $o['image'];
                $addressproof = $o['addressproof'];
                $date_joining = $o['role'];

                ?>
                <div class="modal fade text-start" id="modal-image" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">Upload Profile Picture</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form" action="<?php echo base_url() ?>/brand/profileImageUpload" method="post" enctype="multipart/form-data">
                                    <div class="row d-none">
                                        <!--<input type="file" name="file" class="form-control" id="image">-->

                                    </div>
                                    <br>
                                    <!-- <div class="input-group custom-file-button">
                                                                <label class="input-group-text" for="review-image" role="button">Choose_file</label>
                                                                <label for="review-image" class="form-control" id="review-image-label" role="button">Select The File</label>
                                                                <input type="file" class="d-none" id="review-image" name="image" >
                                                                <input type="hidden" name="proide" id="proide" value="<?php echo $o['id']; ?>">
                                                                <input type="hidden" class="custom-file-input" name="old_image" id="old_image">
                                                            </div> -->
                                    <div class="input-group custom-file-button">
                                        <input type="file" class="form-control" id="review-image" name="image" accept="image/*" />
                                        <input type="hidden" name="proide" id="proide" value="<?php echo $o['id']; ?>">
                                        <input type="hidden" class="custom-file-input" name="old_image" id="old_image">
                                    </div>
                                    <p>Upload a PNG, JPG or JPEG file only</p>

                                    <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade text-start" id="modal-proof_indenti" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">Upload Proof of Identity</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form" action="<?php echo base_url() ?>/brand/information2" method="post" enctype="multipart/form-data">
                                    <div class="row d-none">
                                        <!--<input type="file" name="file" class="form-control" id="image">-->

                                    </div>
                                    <br>

                                    <!-- <div class="input-group custom-file-button">
                                                                <label class="input-group-text" for="review-imagee" role="button">Choose_file</label>
                                                                <label for="review-imagee" class="form-control" id="review-imagee-label" role="button">Select The File</label>
                                                                <input type="file" class="d-none" id="review-imagee" name="nameproof" >
                                                                <input type="hidden" name="inid" id="inid" value="<?php echo $o['id']; ?>">
                                                                <input type="hidden" class="custom-file-input" name="old_image" id="old_image">
                                                            </div> -->
                                    <div class="input-group custom-file-button">
                                        <input type="file" class="form-control" id="review-imagee" name="nameproof" accept="image/*" />>
                                        <input type="hidden" name="inid" id="inid" value="<?php echo $o['id']; ?>">
                                        <input type="hidden" class="custom-file-input" name="old_image" id="old_image">
                                    </div>

                                    <p class="pt-1">Upload a PNG, JPG or JPEG file only</p>
                                    <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade text-start" id="modal-proof_address" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">Upload Proof of Address</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form" action="<?php echo base_url() ?>/brand/information2" method="post" enctype="multipart/form-data">
                                    <div class="row d-none">
                                        <!--<input type="file" name="file" class="form-control" id="image">-->

                                    </div>
                                    <br>
                                    <!-- <div class="input-group custom-file-button">
                                                                <label class="input-group-text" for="review-image-ee" role="button">Choose_file</label>
                                                                <label for="review-image-ee" class="form-control" id="review-image-ee-label" role="button">Select The File</label>
                                                                <input type="file" class="d-none" id="review-image-ee" name="addresproof" >
                                                                <input type="hidden" name="inid" id="inid" value="<?php echo $o['id']; ?>">
                                                                
                                                            </div> -->
                                    <div class="input-group custom-file-button">
                                        <input type="file" class="form-control" id="review-image-ee" name="addresproof" accept="image/*" />>
                                        <input type="hidden" name="inid" id="inid" value="<?php echo $o['id']; ?>">

                                    </div>
                                    <p class="pt-1">Upload a PNG, JPG or JPEG file only</p>
                                    <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-12 col-md-9">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="vertical-pill-1" aria-labelledby="stacked-pill-1" aria-expanded="true">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Profile Details</h4>
                                </div>
                                <div class="card-body py-2 my-25">

                                    <!-- header section -->
                                    <!-- <form  action="<?php echo base_url() ?>/brand/profileImageUpload" method="post" enctype="multipart/form-data"> -->
                                    <div class="d-flex">
                                        <a href="#" class="me-25">
                                            <?php if ($image == '') { ?>
                                                <img src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg') ?>" id="account-upload-img" class="round" alt="profile image" height="100" width="100" />
                                            <?php     } else {
                                                echo  "<img src='" . base_url('public/profilimg/' . $image . '') . "' id='account-upload-img' class='round' alt='profile image' height='60' width='60' />";
                                            } ?>
                                        </a>
                                        <!-- upload and reset button -->
                                        <div class="d-flex align-items-end mt-75 ms-1">
                                            <div>

                                                <!-- <input type="file" name="image" id="account-upload"/> -->
                                                <button onclick="ImageShow(this)" for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</button>
                                                <!--  <button type="button" id="account-reset"
                                                                        class="btn btn-sm btn-outline-secondary mb-75">Reset</button> -->
                                                <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                            </div>
                                        </div>
                                        <!--/ upload and reset button -->
                                    </div>
                                    <!-- </form> -->
                                    <!--/ header section -->
                                    <!-- query section -->
                                    <?php

                                    $supplier_model = new SupplierModel();
                                    $session = session();
                                    $sid = session()->supplier_info['supplier_id'];
                                    $ok = $supplier_model->where('id', $sid)->first();

                                    ?>
                                    <!-- end query section -->
                                    <!-- form -->
                                    <form class="validate-form mt-2 pt-50">
                                        <input type="hidden" id="pid" name="id" value="<?php echo $ok['id']; ?>">
                                        <input type="hidden" id="state_id_account" name="id" value="<?php echo $ok['state_id_account']; ?>">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountFirstName">Full Name</label>
                                                <input type="text" class="form-control" id="accountFirstName" name="firstName" placeholder="John" readonly value="<?php echo $ok['supplier_name']; ?>" data-msg="Please enter first name" />
                                            </div>
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountPhoneNumber">Phone Number</label>
                                                <input type="hidden" class="form-control" id="accountLastName" name="lastName" placeholder="Doe" value="<?php echo $ok['last_name']; ?>" data-msg="Please enter last name" />
                                                <input type="text" maxlength="10" required class="form-control" id="accountPhoneNumber" name="phoneNumber" placeholder="Phone Number" value="<?php echo $ok['mobile']; ?>" />
                                            </div>
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountEmail">Email</label>
                                                <input readonly type="email" class="form-control" id="accountEmail" name="email" placeholder="Email" value="<?php echo $ok['email']; ?>" />
                                            </div>
                                            <!-- <div class="col-12 col-sm-3 mb-2">
                                                <button class="btn btn-primary">save</button>
                                            </div> -->
                                            <!-- <div class="col-12 col-sm-6 mb-1">
                                                                        <label class="form-label" for="accountOrganization">Organization</label>
                                                                        <input type="text" class="form-control" id="accountOrganization"
                                                                        name="organization" placeholder="Organization name"
                                                                        value="<?php echo $ok['email']; ?>" />
                                                                    </div> -->
                                            <!--  <div class="col-12 col-sm-6 mb-1">
                                                                        <label class="form-label" for="accountAddress">Address</label>
                                                                        <input type="text" class="form-control" id="accountAddress"
                                                                        name="address" value="<?php echo $ok['address']; ?>"  placeholder="Your Address" />
                                                                    </div> -->
                                            <!-- <div class="col-12 col-sm-6 mb-1">
                                                                        <label class="form-label" for="accountState">State</label>
                                                                        <input type="text" class="form-control" id="accountState" value="<?php echo $ok['state_id']; ?>" name="state"
                                                                        placeholder="State" />
                                                                        <select id="country" name="state"  class="select2 form-select">
                                                                            <option value="">Select state</option>
                                                                            
                                                                            <?php

                                                                            foreach ($state as $count) { ?>
                                                                            <option value="<?php echo $count['id']; ?>" <?= $ok['state_id'] == $count['id'] ? 'selected' : '' ?>><?php echo $count['name']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div> -->
                                            <!--  <div class="col-12 col-sm-6 mb-1">
                                                                        <label class="form-label" for="accountZipCode">Zip Code</label>
                                                                        <input type="text" class="form-control account-zip-code"
                                                                        id="accountZipCode" name="zipCode" value="<?php echo $ok['zipcode']; ?>" placeholder="Code"
                                                                        maxlength="6" />
                                                                    </div> -->
                                            <!-- <div class="col-12 col-sm-6 mb-1">
                                                                        <label class="form-label" for="country">Country</label>
                                                                        <select id="country" disabled class="select2 form-select">
                                                                            <option value="">Select Country</option>
                                                                            
                                                                            <?php

                                                                            foreach ($country as $count) { ?>
                                                                            <option value="<?php echo $count['id']; ?>" <?= $ok['country_id'] == $count['id'] ? 'selected' : '' ?>><?php echo $count['name']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div> -->
                                            <!-- <div class="col-12 col-sm-6 mb-1">
                                                                        <label for="language" class="form-label">Language</label>
                                                                        <select id="language" class="select2 form-select">
                                                                            <option value="">Select Language</option>
                                                                            <?php

                                                                            foreach ($languages as $count) { ?>
                                                                            <option value="<?php echo $count['id']; ?>" <?= $ok['language'] == $count['id'] ? 'selected' : '' ?>><?php echo $count['language']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div> -->
                                            <!-- <div class="col-12 col-sm-6 mb-1">
                                                                        <label for="timeZones" class="form-label">Timezone</label>
                                                                        <select id="timeZones" class="select2 form-select">
                                                                            <option value="">Select Time Zone</option>
                                                                            <option value="-12">(GMT-12:00) International Date Line West
                                                                            </option>
                                                                            <option value="-11">(GMT-11:00) Midway Island, Samoa</option>
                                                                            <option value="-10">(GMT-10:00) Hawaii</option>
                                                                            <option value="-9">(GMT-09:00) Alaska</option>
                                                                            <option value="-8">(GMT-08:00) Pacific Time (US & Canada)</option>
                                                                            <option value="-8">(GMT-08:00) Tijuana, Baja California</option>
                                                                            <option value="-7">(GMT-07:00) Arizona</option>
                                                                            <option value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                                                            <option value="-7">(GMT-07:00) Mountain Time (US & Canada)</option>
                                                                            <option value="-6">(GMT-06:00) Central America</option>
                                                                            <option value="-6">(GMT-06:00) Central Time (US & Canada)</option>
                                                                            <option value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey
                                                                            </option>
                                                                            <option value="-6">(GMT-06:00) Saskatchewan</option>
                                                                            <option value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco
                                                                            </option>
                                                                            <option value="-5">(GMT-05:00) Eastern Time (US & Canada)</option>
                                                                            <option value="-5">(GMT-05:00) Indiana (East)</option>
                                                                            <option value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                                                                            <option value="-4">(GMT-04:00) Caracas, La Paz</option>
                                                                            <option value="-4">(GMT-04:00) Manaus</option>
                                                                            <option value="-4">(GMT-04:00) Santiago</option>
                                                                            <option value="-3.5">(GMT-03:30) Newfoundland</option>
                                                                        </select>
                                                                    </div> -->
                                            <!-- <div class="col-12 col-sm-6 mb-1">
                                                                        <label for="currency" class="form-label">Currency</label>
                                                                        <select id="currency" class="select2 form-select">
                                                                            <option value="">Select currency </option>
                                                                            <?php

                                                                            foreach ($currency as $count) { ?>
                                                                            <option value="<?php echo $count['id']; ?>" <?= $ok['currency'] == $count['id'] ? 'selected' : '' ?>><?php echo $count['name']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div> -->
                                            <div class="col-12">
                                                <a class="btn btn-primary mt-1 me-1 rr">Save
                                                </a>
                                                <!-- <a class="rr">ff</a> -->
                                                <!--    <button type="reset"-->
                                                <!--    class="btn btn-outline-secondary mt-1">Discard</button>-->
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ form -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="vertical-pill-2" role="tabpanel" aria-labelledby="stacked-pill-2" aria-expanded="false">
                            <div class="card">
                                <div class="card-body py-2 my-25">
                                    <!-- form -->
                                    <form class="validate-form pt-50">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountOrganization">Old Password</label>
                                                <input type="password" class="form-control" id="accountOrganization" name="organization" placeholder="Organization name" value="PIXINVENT" />
                                            </div>
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountOrganization">New Password</label>
                                                <input type="password" class="form-control" id="accountOrganization" name="organization" placeholder="Organization name" value="PIXINVENT" />
                                            </div>
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountOrganization">Retype New
                                                    Password</label>
                                                <input type="password" class="form-control" id="accountOrganization" name="organization" placeholder="Organization name" value="PIXINVENT" />
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mt-1 me-1">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ form -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="vertical-pill-3" role="tabpanel" aria-labelledby="stacked-pill-3" aria-expanded="false">
                            <div class="card">
                                <div class="card-body py-2 my-25">
                                    <!-- form -->
                                    <?php

                                    $supplier_model = new SupplierModel();
                                    $session = session();
                                    $sid = session()->supplier_info['supplier_id'];
                                    $o = $supplier_model->where('id', $sid)->first();
                                    $nameproof = $o['nameproof'];
                                    $addressproof = $o['addressproof'];
                                    $date_joining = $o['role'];
                                    ?>
                                    <form class="validate-form pt-50" name="RegForm" action="<?php echo base_url() ?>/brand/information2" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="inid" id="inid" value="<?php echo $o['id']; ?>">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 mb-1">
                                                <label class="form-label" for="accountOrganization">Bio</label>
                                                <input type="text" class="form-control" id="bio" name="bio" value="<?php echo $o['bio']; ?>">
                                            </div>
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountOrganization">Designation</label><span style="color:red;font-weight:bold">*</span>
                                                <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $o['designation']; ?>" required>
                                            </div>
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountOrganization">Date of Birth</label>
                                                <input type="date" class="form-control" id="age" name="age" placeholder="John" value="<?php echo $o['age']; ?>" data-msg="" />
                                            </div>
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountOrganization">Department</label><span style="color:red;font-weight:bold">*</span>
                                                <input type="text" class="form-control" id="department" name="department" value="<?php echo $o['department']; ?>" required>
                                            </div>
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountOrganization">Country</label>
                                                <select id="country" name="country_name" class="select2 form-select" required>
                                                    <option value="">Select Country</option>
                                                    <?php
                                                    foreach ($country as $count) {
                                                    ?>
                                                        <option value="<?php echo $count['id']; ?>" <?= $o['country_account'] == $count['id'] ? 'selected' : '' ?>>
                                                            <?php echo $count['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <!--  <div class="col-12 col-sm-6 mb-1">
                                                                        <label class="form-label" for="accountOrganization">Website</label>
                                                                        <input type="text" class="form-control" id="accountFirstName"
                                                                        name="website" placeholder="John" value="<?php echo $o['website']; ?>" data-msg="" />
                                                                    </div> -->



                                            <?php if ($date_joining == 0) {  ?>
                                                <div class="col-12 col-sm-6 mb-1">
                                                    <label class="form-label" for="accountOrganization">Date of Joining</label>
                                                    <input type="date" class="form-control" id="datejoin" name="datejoin" placeholder="Joining Date" value="<?php echo $o['date_joining']; ?>" data-msg="" />
                                                </div>
                                            <?php   } else { ?>
                                                <div class="col-12 col-sm-6 mb-1">
                                                    <label class="form-label" for="accountOrganization">Date of Joining</label>
                                                    <input type="date" class="form-control" id="datejoin" name="datejoin" placeholder="Joining Date" value="<?php echo $o['date_joining']; ?>" data-msg="" />
                                                </div>
                                            <?php    } ?>
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountState">State/Union Territory</label>


                                                <select id="state" name="state_name" class="select2 form-select">
                                                    <option value="">Select state</option>


                                                </select>
                                            </div>
                                            <?php if ($date_joining == 10) {  ?>
                                                <div class="col-12 col-sm-6 mb-1">
                                                    <label class="form-label" for="accountOrganization">Employee Code</label><span style="color:red;font-weight:bold">*</span>
                                                    <input type="text" class="form-control" id="employeecode" name="employeecode" placeholder="John" value="<?php echo $o['employee_code']; ?>" data-msg="" />
                                                </div>
                                            <?php   } else { ?>
                                                <div class="col-12 col-sm-6 mb-1">
                                                    <label class="form-label" for="accountOrganization">Employee Code</label><span style="color:red;font-weight:bold">*</span>
                                                    <input type="text" class="form-control" id="employeecode" name="employeecode" value="<?php echo $o['employee_code']; ?>" data-msg="" />
                                                </div>
                                            <?php } ?>
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountOrganization">Current address</label>
                                                <input type="text" class="form-control" id="currentadd" name="currentadd" required value="<?php echo $o['current_address']; ?>">
                                            </div>


                                            <div class="col-12 mb-2">
                                                <button class="btn btn-primary mt-1 me-1 information_update">Save
                                                    changes</button>
                                                <!-- <button type="reset"
                                                                        class="btn btn-outline-secondary mt-1">Discard</button> -->
                                            </div>
                                            <!-- name proof -->

                                            <div class=" border-bottom mb-2">
                                                <h4>Document Upload</h4>
                                            </div>
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountOrganization">Proof of identity</label>
                                                <div class="d-flex">
                                                    <a href="#" class="me-25">
                                                        <?php if ($nameproof == '') { ?>
                                                            <img src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg') ?>" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
                                                        <?php     } else {
                                                            echo  "<img src='" . base_url('public/nameproof/' . $nameproof . '') . "' id='account-upload-img' class='uploadedAvatar rounded me-50' alt='profile image' height='100' width='100' />";
                                                        } ?>
                                                    </a>
                                                    <!-- upload and reset button -->
                                                    <div class="d-flex align-items-end mt-75 ms-1">
                                                        <div>

                                                            <!-- <input type="hidden" class="custom-file-input" name="old_image" id="old_image"> -->
                                                            <input type="hidden" class="custom-file-input" value="<?php echo $nameproof; ?>" name="old_imag" id="old_imag">
                                                            <!-- <input type="file" name="nameproof" id="nameproof"/> -->

                                                            <p onclick="proof_inden()" for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</p>
                                                            <!-- <button  id="account-reset"
                                                                                    class="btn btn-sm btn-outline-secondary mb-75">Reset</button> -->
                                                            <!-- <p class="mb-0">Allowed file types: png, jpg, jpeg.</p> -->
                                                        </div>
                                                    </div>
                                                    <!--/ upload and reset button -->
                                                </div>
                                            </div>

                                            <!-- Name proof end -->
                                            <div class="col-12 col-sm-6 mb-1">
                                                <label class="form-label" for="accountOrganization">Proof of Address</label>
                                                <div class="d-flex">
                                                    <a href="#" class="me-25">
                                                        <?php if ($addressproof == '') { ?>
                                                            <img src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg') ?>" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
                                                        <?php     } else {
                                                            echo  "<img src='" . base_url('public/addressproof/' . $addressproof . '') . "' id='account-upload-img' class='uploadedAvatar rounded me-50' alt='profile image' height='100' width='100' />";
                                                        } ?>
                                                    </a>
                                                    <!-- upload and reset button -->
                                                    <div class="d-flex align-items-end mt-75 ms-1">
                                                        <div>

                                                            <!-- <input type="hidden" class="custom-file-input" name="old_image" id="old_image"> -->
                                                            <!-- <input type="file" name="addresproof" id="addresproof"/> -->
                                                            <input type="hidden" class="custom-file-input" value="<?php echo $addressproof; ?>" name="addresproof_old" id="addresproof_old">
                                                            <p onclick="address_proof()" for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</p>
                                                            <!--  <button  id="account-reset"
                                                                                    class="btn btn-sm btn-outline-secondary mb-75">Reset</button> -->
                                                            <!-- <p class="mb-0">Allowed file types: png, jpg, jpeg.</p> -->
                                                        </div>
                                                    </div>
                                                    <!--/ upload and reset button -->
                                                </div>
                                            </div>



                                        </div>
                                    </form>
                                    <!--/ form -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="vertical-pill-4" role="tabpanel" aria-labelledby="stacked-pill-4" aria-expanded="false">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Notification</h4>
                                </div>
                                <div class="card-body py-2 my-25">
                                    <div class="demo-inline-spacing">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="POSITIIVPLUS" checked="">
                                            <label class="form-check-label" for="inlineCheckbox1">POSITIIVPLUS</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="EMAIL">
                                            <label class="form-check-label" for="inlineCheckbox2">EMAIL</label>
                                        </div>
                                        <!-- <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="SMS">
                                                                    <label class="form-check-label" for="inlineCheckbox3">SMS</label>
                                                                </div> -->
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
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>">
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js') ?>">
</script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') ?>">
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    function change() {
        var show = document.getElementById("show");
        var select = event.target.value;
        var newContent = "You selected " + select;
        show.innerHTML = newContent;
    }
</script>
<script>
    $(document).ready(function() {
        $('.information_update').click(function(e) {
            e.preventDefault();

            var id = $("#inid").val();
            var bio = $("#bio").val();
            var age = $("#age").val();

            var currentadd = $("#currentadd").val();
            var designation = $("#designation").val();
            var datejoin = $("#datejoin").val();
            var employeecode = $("#employeecode").val();
            var state = $("#state").val();
            var country = $("#country").val();
            var department = $("#department").val();
            var zipcode = $("#zipcode").val();

            var bio =
                document.forms.RegForm.bio.value;
            // var currentadd =
            // document.forms.RegForm.currentadd.value;


            var regName = /^[A-Z a-z 0-9 _ . \-]+$/;

            if (!regName.test(bio)) {
                $("#updateerror").show();
                $("#updateerror").html('Please Fill Bio Text in correct formate');
                bio.focus();
                return false;
            }
            // if (!regName.test(currentadd)) {
            // $("#updateerror").show();
            // $("#updateerror").html('Please fill Current Address text in correct formate');
            // currentadd.focus();
            // return false;
            // }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "<?php echo base_url() ?>/brand/information",
                data: {
                    id: id,
                    bio: bio,
                    age: age,
                    currentadd: currentadd,
                    designation: designation,

                    datejoin: datejoin,
                    employeecode: employeecode,
                    state: state,
                    country: country,

                    department: department,

                },
                success: function(response) {
                    var success = response.success;
                    var error = response.error;

                    // alert(error);
                    if (!success == "") {
                        toastr.success("👋 information Insert successfully", "Success", {

                            closeButton: !0,

                            tapToDismiss: !1,

                            progressBar: !0,

                        })
                    } else {
                        toastr.error("👋 information not Insert successfully", "error", {

                            closeButton: !0,

                            tapToDismiss: !1,

                            progressBar: !0,

                        })
                    }

                }
            })
        });
    });
</script>
<script type="text/javascript">
    function ImageShow() {
        $("#modal-image").modal('show');
    }
</script>
<script type="text/javascript">
    function proof_inden() {
        $("#modal-proof_indenti").modal('show');
    }
</script>
<script type="text/javascript">
    function address_proof() {
        $("#modal-proof_address").modal('show');
    }
</script>
<script>
    $(document).ready(function() {
        $('.rr').click(function(e) {
            e.preventDefault();
            // alert('ok');
            var id = $("#pid").val();
            var accountPhoneNumber = $("#accountPhoneNumber").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "<?php echo base_url() ?>/Tool/updateProfle",
                data: {
                    id: id,
                    accountPhoneNumber: accountPhoneNumber,

                },
                success: function(response) {
                    $("#updatesuccess").show();
                    $("#updatesuccess").html(response.success);
                    setTimeout(function() {
                        $('#updatesuccess').hide();
                    }, 4000);
                }
            })
        });
    });
</script>

<script type="text/javascript">
    $("document").ready(function() {
        $('select[name="country_name"]').on('change', function() {
            var tId = $(this).val();
            // alert(tId);
            if (tId) {
                $.ajax({
                    url: "<?= base_url('/Supplier/country_city/') ?>/" + tId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_name"]').empty();
                        $('select[name="state_name"]').append(
                            '<option value="">Select the State</option>');
                        $.each(data, function(key, value) {
                            $('select[name="state_name"]').append('<option value="' +
                                value.id + '">' + value.name +
                                '</option>');
                        })
                    }
                })

            }
        });
    });
</script>
<script type="text/javascript">
    <?php if ($session->get('tar') == 'information') {

    ?>
        $('#vertical-pill-1').removeClass('active');
        $('#stacked-pill-1').removeClass('active');
        $('#vertical-pill-3').addClass('active');
        $('#stacked-pill-3').addClass('active');

    <?php } ?>
</script>
<script type="text/javascript">
    var tId = $("#country").val();
    var state_id_account = $("#state_id_account").val();
    // alert(tId);
    if (tId) {
        $.ajax({
            url: "<?= base_url('/Supplier/country_city/') ?>/" + tId,
            type: "GET",
            dataType: "json",
            success: function(data) {
                $('select[id="state"]').empty();
                $('select[id="state"]').append(
                    '<option value="">Select the State</option>');
                $.each(data, function(key, value) {
                    var idd = value.id;
                    // alert(tId);
                    if (idd == state_id_account) {
                        $('select[id="state"]').append('<option selected value="' +
                            value.id + '">' + value.name +
                            '</option>');
                    } else {
                        $('select[id="state"]').append('<option  value="' +
                            value.id + '">' + value.name +
                            '</option>');
                    }
                })

            }
        })

    }
</script>


<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>
<script>
    var input = document.getElementById('company_address');
    var company_address = new google.maps.places.Autocomplete(input);
</script>
<!-- edit profile -->
<!-- end edit profile -->
<script>
    $('.company_pin').keypress(function() {
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

    function editemployee(that) {
        var emp_table_id = $(that).attr("data-emp_table_id");
        var empid = $(that).attr("data-empid");
        var name = $(that).attr("data-name");
        var phone_no = $(that).attr("data-phone_no");
        var email = $(that).attr("data-email");
        $("#emp_table_id").val(emp_table_id);
        $("#employee_emp_id").val(empid);
        $("#employee_name").val(name);
        $("#employee_phone_no").val(phone_no);
        $("#employee_email").val(email);
        $('#docEditePopup').modal('show');
    }

    function deleteemployee_id(that) {
        var id = $(that).attr("data-number");
        // alert(id);
        $("#del_employee_id").val(id);
        $("#docDeletePopup").modal('show');
    }

    function showBoundary(that) {
        var boundary_id = $(that).val();
        // alert(boundary_id);
        if (boundary_id == 30 || boundary_id == 31 || boundary_id == 37) {
            $.ajax({
                url: "<?php echo base_url() ?>/Controlwork/getsubboundaryByBoundary/" +
                    boundary_id,
                type: "POST",
                //dataType: "JSON",
                success: function(data) {
                    $("#subboundary_id").html(data);
                },
                error: function(xhr, status, error) {
                    $('#indicatorDiv').html(
                        '<option value="">No data found </option>');
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url() ?>/Controlwork/getIndicatorByboundary/" +
                boundary_id,
            type: "POST",
            //dataType: "JSON",
            success: function(data) {
                $("#indicator").html(data);
            },
            error: function(xhr, status, error) {
                $('#indicator').html(
                    '<option value="">No data found </option>');
            }
        });
    }
</script>
<?php
$session = session();
if ($session->get('success')) { ?>

    <script type="text/javaScript">
        alert();
        var id = '<?= $session->get('success') ?>';

         toastr.success(id, "Success", {

                        closeButton: !0,
                        
                        tapToDismiss: !1,
                        
                        progressBar: !0,
                        
                        })
         </script>
<?php } ?>
<?php
$session = session();
if ($session->get('error')) { ?>
    <script type="text/javaScript">

        var id = '<?= $session->get('error') ?>';
        toastr.error(id, "Error", {

                        closeButton: !0,
                        
                        tapToDismiss: !1,
                        
                        progressBar: !0,
                        
                        })
        </script>
<?php } ?>