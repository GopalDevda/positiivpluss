<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<!-- <link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
<link rel="stylesheet" type="text/css" href="public/brand/assets/app-assets/css/plugins/forms/form-wizard.min.css"> -->
<style>
.row div {
    margin-bottom: 30px;
}

.input-group:not(.bootstrap-touchspin):focus-within {
    box-shadow: none !important;
    border-radius: 0.357rem;
}

.pac-container {
    z-index: 100000;
}
.abc {
        background-color: rgb(0 91 169) !important;
        color: rgb(241 246 250) !important;
    }
.mb-0 div {
    margin-bottom: 0px !important;
}

/* Custom styles for the dropdown menu */
.custom-dropdown-menu-wide {
    width: 300px;
    /* Adjust the width as needed */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    /* Add shadow */
    margin-top: 10px !important;
}

table.dataTable>thead .sorting:before,
table.dataTable>thead .sorting_asc:before,
table.dataTable>thead .sorting_desc:before,
table.dataTable>thead .sorting_asc_disabled:before,
table.dataTable>thead .sorting_desc_disabled:before {
    right: 6px !important;
    content: " " !important;
}

table.dataTable>thead .sorting:after,
table.dataTable>thead .sorting_asc:after,
table.dataTable>thead .sorting_desc:after,
table.dataTable>thead .sorting_asc_disabled:after,
table.dataTable>thead .sorting_desc_disabled:after {
    right: 0.5em;
    content: " " !important;
}

.selected {
    background-color: #000000 !important;
    border-color: #000000 !important;
    color: #defe73;
    padding: 2px 6px;
    border: 1px solid #aaa;
    border-radius: 4px;
    float: left;
    margin-right: 5px;
}

span.choice-remove {
    font-size: 8px;
    padding-left: 5px;
    cursor: pointer;
}

.border-new {
    border: 1px solid #ccc;
    padding: 12px 0px 0px 0px;
    border-radius: 10px;
    overflow-y: auto;
}
</style>

<style>
.dropstart .dropdown-toggle::before {
    display: none;
}

.dropdown-menu.custom-width {
    min-width: 20rem !important;
}

#myInput {
    background-image: url('searchicon.png');
    /* Add your search icon image URL */
    background-position: 10px center;
    /* Center the search icon vertically */
    background-repeat: no-repeat;
    width: 100%;
    font-size: 14px;
    /* Adjust font size */
    padding: 10px 20px 10px 40px;
    /* Adjust padding */
    border: none;
    /* Remove the border */
    margin-bottom: 6px;
    /* Reduce margin-bottom for a smaller input box */
    border-radius: 4px;
    /* Add rounded corners */
    background-color: white;
    /* Set background color to white */
    color: black;
    /* Set text color to black */
}

/* 
    #myContainer {
        padding: 0;
        margin: 0;
        font-size: 12px;
    }

    .myItem {
        padding: 10px;
        font-size: 13px;
    } */
</style>
<style>
.card {
    /* Add styles for your card here */
    width: 100%;
    /* Example width */
    /* min-height: 500px; */
    /* Example height */
    border: 1px solid #ccc;
    /* overflow: hidden; */
    /* This will hide any content that overflows the card */
}

.scrollable-list {
    /* Add styles for your list here */
    list-style-type: none;
    padding: 0;
    margin: 0;
    height: 100%;
    /* Make sure the list takes up 100% of the card's height */
    overflow-y: auto;
    /* This enables vertical scroll if the content exceeds the height */
}

.scrollable-list a {
    /* Add styles for your list items here */
    padding: 10px;
}
</style>
<style>
.text-yellow {
    color: rgb(240 135 52);
}

.mab-none,
.mab-none>div {
    margin-bottom: 0px !important;
}

.mab-none>.card-body {
    padding-top: 20px !important;
}

.bg-header {
    margin-bottom: 0px !important;
    background-color: rgb(225 241 253) !important;
}

.body-2 {
    background-color: rgb(237 247 249) !important;
}

.line-break {
    background-color: rgb(199 223 228) !important;
    padding-top: 3px;
}

.credit-input {
    margin-left: 10px;
    height: 26px;
    border-radius: 5px;
    width: 95px !important;
}

.pay-btn {
    margin-top: 24px;
    min-width: 110px !important;
    padding: 5px !important;
    border-radius: 30px !important;
}

.inp-between {
    right: 25px;
    position: absolute;
}
</style>
<?= $this->endSection(); ?><?= $this->section('content') ?>



<div class="app-content content">
    <div class="content-body">
        <!-- Bootstrap Select start -->
        <!-- <div class="modal fade" id="buymodal" tabindex="-1" aria-labelledby="twoFactorAuthSmsTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg two-factor-auth-sms">
                <div class="modal-content">
                  
                    <section class="modern-horizontal-wizard card">
                        <div class="bs-stepper wizard-modern modern-wizard-example">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                       
                            <div class="modal-body pb-1 px-sm-1 mx-50 mb-0">
                                <form action="<?= site_url('MarketPlace/update_credit') ?>" method="post">
                                    <div class="row h3">
                                        <div class="col-md-4">
                                            <input type="radio" name="credit" value="100" id="100"><label class="ms-1" for="100">100 Credits</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" name="credit" value="500" id="500"><label class="ms-1" for="500">500 Credits</label>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-secondary form-control mb-2" type="button" id="custom-credits">Custom Credits</button>
                                        </div>
                                        <div class="col-12">
                                            <div id="costum-input-div"></div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success form-control" type="submit">Buy</button>
                                </form>
                            </div>
                        </div>
                    </section>
                    
                </div>
            </div>
        </div> -->
        
        <div class="modal fade" id="buymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <span class="mx-2 mt-2">Buy Credits</span>
                    <div class="modal-body">
                        <div class="row">
                            <?php if ($creditpacage) {
                                foreach ($creditpacage as $cpv) { ?>
                            
                            <div class="col-md-3">
                                <form action="<?= site_url('MarketPlace/update_credit') ?>" method="post">
                                <div class="card mab-none">
                                    <div class="card-header bg-header ps-5" style="text-align: center;">
                                        <b> Buy <?= $cpv['min_credit']; ?> - <?= $cpv['max_credit']; ?> credits <br>@
                                            <span class="text-yellow">₹<?= $cpv['price']; ?> </span> per company</b>
                                    </div>
                                    <div class="card-body body-2">
                                        Number of Credits<input type="number" name="credit"
                                            onkeyup="credit($(this),'#credit<?= $cpv['id']; ?>',<?= $cpv['price']; ?>,<?= $cpv['id']; ?>)"
                                            value="<?= $cpv['min_credit']; ?>" min="<?= $cpv['min_credit']; ?>"
                                            max="<?= $cpv['max_credit']; ?>" class="credit-input">
                                        <div class="mb-4">
                                            <p class="small inp-between"><b
                                                    id="credit<?= $cpv['id']; ?>_<?= $cpv['id']; ?>">(Between
                                                    <?= $cpv['min_credit']; ?> and <?= $cpv['max_credit']; ?>)</b></p>
                                        </div>
                                    </div>
                                    <div class="line-break"></div>
                                    <div class="card-body body-2">
                                        <div class="row">
                                            <div class="col-7">Price</div>
                                            <div class="col-5" id="credit<?= $cpv['id']; ?>">₹
                                                <?= $cpv['min_credit'] * $cpv['price'] ?></div>
                                        </div>
                                        <button class="btn btn-primary ms-4 pay-btn"
                                            id="credit<?= $cpv['id']; ?>_<?= $cpv['id']; ?>_<?= $cpv['id']; ?>">Pay₹<?= $cpv['min_credit'] * $cpv['price'] ?></button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <?php }
                            } ?>
                            <!-- <div class="col-md-3">
                                <div class="card mab-none">
                                    <div class="card-header bg-header ps-5" style="text-align: center;">
                                        <b> Buy 10 - 99 credits <br>@ <span class="text-yellow">₹359</span> per company</b>
                                    </div>
                                    <div class="card-body body-2">
                                        Number of Credits<input type="number" value="10" min="10" max="99" class="credit-input">
                                        <div class="mb-4">
                                            <p class="small inp-between"><b>(Between 10 and 99)</b></p>
                                        </div>
                                    </div>
                                    <div class="line-break"></div>
                                    <div class="card-body body-2">
                                        <div class="row">
                                            <div class="col-7">Price</div>
                                            <div class="col-5">₹7898</div>
                                        </div>
                                        <button class="btn btn-primary ms-4 pay-btn"><small> Pay₹7898</small></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mab-none">
                                    <div class="card-header bg-header ps-5" style="text-align: center;">
                                        <b> Buy 100 - 999 credits <br>@ <span class="text-yellow">₹329</span> per company</b>
                                    </div>
                                    <div class="card-body body-2">
                                        Number of Credits<input type="number" value="100" min="100" max="999" class="credit-input">
                                        <div class="mb-4">
                                            <p class="small inp-between"><b>(Between 100 and 999)</b></p>
                                        </div>
                                    </div>
                                    <div class="line-break"></div>
                                    <div class="card-body body-2">
                                        <div class="row">
                                            <div class="col-7">Price</div>
                                            <div class="col-5">₹898</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6"></div>
                                            <div class="col-3"></div>
                                            <div class="col-3"></div>
                                        </div>
                                        <button class="btn btn-primary ms-4 pay-btn"><small> Pay₹898</small></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mab-none">
                                    <div class="card-header bg-header ps-5" style="text-align: center;">
                                        <b> Buy 1000 or more <br> @ <span class="text-yellow">₹309</span> per company</b>
                                    </div>
                                    <div class="card-body body-2">
                                        Number of Credits<input type="number" value="1000" min="1000" class="credit-input">
                                        <div class="mb-4">
                                            <p class="small inp-between"><b>(1000 or more)</b></p>
                                        </div>
                                    </div>
                                    <div class="line-break"></div>
                                    <div class="card-body body-2">
                                        <div class="row">
                                            <div class="col-7">Price</div>
                                            <div class="col-5">₹898</div>
                                        </div>
                                        <div class="row small">
                                            <div class="col-6">Deduct TDS?</div>
                                            <div class="col-3"><input name="checkbox2" type="radio" id="1"><label for="1"><small> None</small></label></div>
                                            <div class="col-3"><input name="checkbox2" type="radio" id="2"><label for="2">2%</label></div>
                                        </div>
                                        <button class="btn btn-primary ms-4 pay-btn"><small> Pay₹898</small></button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="modal fade" id="historymodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color:rgb(66 110 186)">Credits Purchase History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="abc"><b>Purchase Date</b></th>
                                <th class="abc"><b>Credits</b></th>
                                <th class="abc"><b>Used</b></th>
                                <th class="abc"><b>Expiring in 30 days</b></th>
                                <th class="abc"><b>Expired</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>19 Sep, 2023<br><b>Expiring on: </b>18 Sep, 2023</td>
                                <td><i class="fa fa-gift me-2"></i>2</td>
                                <td>1</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <i class="fa fa-gift me-1"></i>Incentives
            </div>
        </div>
    </div>
</div>

        <section id="dropdown-with-outline-btn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <!-- Search box takes 6 columns (half of the available space) -->
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text rounded-start">
                                            <i class="fas fa-search text-muted"></i> <!-- Font Awesome search icon -->
                                        </span>
                                        <!-- <input type="search" class="form-control rounded-end" id="filter" onkeyup="searchNames(1, 'input')" placeholder=" Search" aria-label="Search..." aria-describedby="chat-search"> -->
                                        <input type="search" class="form-control rounded-end" id="company_name"
                                            placeholder="Search Company name and CIN No" aria-label="Search..."
                                            aria-describedby="chat-search">
                                    </div>
                                </div>
                                <div class="col-md-1 pt-0"><a href="<?= site_url('MarketPlace/view_bookmarks') ?>"><img
                                            src="<?= base_url() ?>/public/utopiic/favourite-2765.png.svg"
                                            style="width: 21px;"></a></div>
                                <div class="col-md-1" onclick="filtermodel()"><img
                                        src="<?= base_url('/') ?>/public/utopiic/filtering-6573.svg" alt=""
                                        style="width: 21px;"></div>
                                <div class="col-md-1"><img src="<?= base_url('/') ?>/public/utopiic/text-message-4653.svg" alt="" style="width: 21px;">
                                <button class="btn btn-primary mt-2" type="button" onclick="$('#buymodal').modal('show');">Buy</button></div>
                                <div class="col-md-2"><b>Credits: <span id="credit"><?= (isset($credits)) ? $credits : '0' ?></span></b>
                                    <button type="button" class="btn btn-secondary mt-2" onclick="$('#historymodal').modal('show');">Credit Hisory</button>
                                </div>



                                <!-- <div class="col-md-3">
                                    <div class="nav-item dropdown dropdown-cart me-25">
                                        <button type="button" class="btn btn-outline-dark dropdown-toggle waves-effect" id="dfoglk" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-regular fa-filter me-1"></i>Company Name
                                        </button>
                                        <div class="dropdown-menu custom-dropdown-menu custom-dropdown-menu-wide">
                                            <h6 class="dropdown-header custom-dropdown-header pb-1">Company Name</h6> -->
                                <!-- Search box  -->
                                <!-- <div class="input-group input-group-merge w-100 p-1 pt-0">
                                                <span class="input-group-text rounded-start">
                                                    <i class="fas fa-search text-muted"></i> -->
                                <!-- Font Awesome search icon -->
                                <!-- </span>
                                                <input type="text" class="form-control rounded-end" id="chat-search" placeholder="Search for Company Name" aria-label="Search..." aria-describedby="chat-search">
                                            </div>
                                            <button class="btn text-primary float-md-end" industries>Clear All</button> -->
                                <!-- Multiple -->
                                <!-- <div class="mb-1 p-1 pt-0">
                                                <select class="select2 form-select" multiple>
                                                    <option value="AK">Utopiic</option>
                                                    <option value="HI">Manal Softeach</option>
                                                </select>
                                            </div>
                                            <hr class="mt-5">
                                            <button type="button" class="btn btn-dark waves-effect waves-float waves-light float-md-end m-1 mt-0">Apply</button>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="modal fade" id="filtermodel" tabindex="-1" aria-labelledby="twoFactorAuthSmsTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg two-factor-auth-sms">
                                        <div class="modal-content">
                                            
                                            <section class="modern-horizontal-wizard">
                                                <div class="bs-stepper wizard-modern modern-wizard-example">
                                                    <div class="modal-header bg-transparent">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                   
                                                    <div class="modal-body pb-1 px-sm-1 mx-50">
                                                        <div class="bs-stepper-content shadow-none p-0">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="nav-item dropdown dropdown-cart me-25">
                                                                        <button type="button" class="btn btn-outline-dark dropdown-toggle waves-effect" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="fa-regular fa-filter me-1"></i> Location
                                                                        </button>
                                                                        <div class="dropdown-menu custom-dropdown-menu custom-dropdown-menu-wide">
                                                                            <h6 class="dropdown-header custom-dropdown-header pb-1">Country, State or
                                                                                City</h6>
                                                                         
                                                                            <div class="input-group input-group-merge w-100 p-1 pt-0">
                                                                                <span class="input-group-text rounded-start">
                                                                                    <i class="fas fa-search text-muted"></i>
                                                                                
                                                                                </span>
                                                                                <input type="text" class="form-control rounded-end" id="chat-searchs" placeholder="Search Country, State or City" aria-label="Search..." aria-describedby="chat-search">
                                                                            </div>
                                                                            <button class="btn text-primary float-md-end" onclick="$('#location').val(null).trigger('change');">Clear All</button>
                                                                          
                                                                            <div class="mb-1 p-1 pt-0">
                                                                                <select class="select2 form-select" id="location" multiple>
                                                                                </select>
                                                                            </div>
                                                                            <div id="autocompleteResults"></div>
                                                                            <hr class="mt-5">
                                                                            <button type="button" onclick="locationdata()" class="btn btn-dark waves-effect waves-float waves-light float-md-end m-1 mt-0">Apply</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="nav-item dropdown dropdown-cart me-25">
                                                                        <button type="button" class="btn btn-outline-dark dropdown-toggle waves-effect" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="fa-regular fa-filter me-1"></i> Industry
                                                                        </button>
                                                                        <div class="dropdown-menu custom-dropdown-menu custom-dropdown-menu-wide">
                                                                            <h6 class="dropdown-header custom-dropdown-header pb-1">Industry,
                                                                                Sub-Industry</h6>
                                                                         
                                                                            <div class="input-group input-group-merge w-100 p-1 pt-0">
                                                                                <span class="input-group-text rounded-start">
                                                                                    <i class="fas fa-search text-muted"></i>
                                                                                   
                                                                                </span>
                                                                                <input type="text" class="form-control rounded-end" id="industries-search" placeholder="Search Industry, Sub-Industry" aria-label="Search..." aria-describedby="chat-search">
                                                                            </div>
                                                                            <button class="btn text-primary float-md-end" onclick="$('#industries').val(null).trigger('change');">Clear
                                                                                All</button>
                                                                           
                                                                            <div class="mb-1 p-1 pt-0">
                                                                                <select class=" form-select" id="industries" multiple>

                                                                                </select>
                                                                            </div>
                                                                            <hr class="mt-5">
                                                                            <button type="button" class="btn btn-dark waves-effect waves-float waves-light float-md-end m-1 mt-0" id="industry_filter">Apply</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                          
                                        </div>
                                    </div>
                                </div> -->
                                <div class="modal fade" id="filtermodel" tabindex="-1"
                                    aria-labelledby="twoFactorAuthSmsTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg two-factor-auth-sms">
                                        <div class="modal-content">
                                            <!-- Modern Horizontal Wizard -->
                                            <section class="modern-horizontal-wizard card">
                                                <div class="bs-stepper wizard-modern modern-wizard-example">
                                                    <div class="modal-header bg-transparent">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <!-- <h5>Add OnSite</h5> -->
                                                    <div class="modal-body pb-1 px-sm-1 mx-50 mb-0"
                                                        id="custom-unique-modal-body">
                                                        <div class="bs-stepper-content shadow-none p-0">
                                                            <div class="row text-center">
                                                                <div class="col-md-6">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="headingTwo">
                                                                            <button
                                                                                class="btn btn-outline-dark waves-effect accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#accordionTwo"
                                                                                aria-expanded="false"
                                                                                aria-controls="accordionTwo">
                                                                                <i
                                                                                    class="fa-solid fa-filter me-1"></i>Location
                                                                            </button>
                                                                        </h2>
                                                                        <div id="accordionTwo"
                                                                            class="accordion-collapse collapse shadow"
                                                                            aria-labelledby="headingTwo"
                                                                            data-bs-parent="#accordionExample">
                                                                            <div class="accordion-body pb-5">
                                                                                <h6
                                                                                    class="dropdown-header custom-dropdown-header pb-1 text-start">
                                                                                    Country, State or
                                                                                    City
                                                                                </h6>
                                                                                <!-- Search box  -->
                                                                                <div
                                                                                    class="input-group input-group-merge w-100 p-1 pt-0">
                                                                                    <span
                                                                                        class="input-group-text rounded-start">
                                                                                        <i
                                                                                            class="fas fa-search text-muted"></i>
                                                                                        <!-- Font Awesome search icon -->
                                                                                    </span>
                                                                                    <input type="text"
                                                                                        class="form-control rounded-end"
                                                                                        id="chat-searchs"
                                                                                        placeholder="Search Country, State or City"
                                                                                        aria-label="Search..."
                                                                                        aria-describedby="chat-search">
                                                                                </div>
                                                                                <button
                                                                                    class="btn text-primary float-md-end"
                                                                                    onclick="$('#location').val(null).trigger('change');">Clear
                                                                                    All</button>
                                                                                <!-- Multiple -->
                                                                                <div class="mb-1 p-1 pt-0">
                                                                                    <select class="select2 form-select"
                                                                                        id="location" multiple>
                                                                                    </select>
                                                                                </div>
                                                                                <hr class="mt-5">
                                                                                <button type="button"
                                                                                    onclick="locationdata()"
                                                                                    class="btn btn-dark waves-effect waves-float waves-light float-md-end m-1 mt-0">Apply</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="headingThree">
                                                                            <button
                                                                                class="btn btn-outline-dark waves-effect accordion-button collapsed"
                                                                                type="button" data-bs-toggle="collapse"
                                                                                data-bs-target="#accordionThree"
                                                                                aria-expanded="false"
                                                                                aria-controls="accordionThree">
                                                                                <i class="fa-solid fa-filter me-1"></i>
                                                                                Industry
                                                                            </button>
                                                                        </h2>
                                                                        <div id="accordionThree"
                                                                            class="accordion-collapse collapse shadow"
                                                                            aria-labelledby="headingThree"
                                                                            data-bs-parent="#accordionExample">
                                                                            <div class="accordion-body pb-5">
                                                                                <h6
                                                                                    class="dropdown-header custom-dropdown-header pb-1 text-start">
                                                                                    Industry,
                                                                                    Sub-Industry
                                                                                </h6>
                                                                                <!-- Search box  -->
                                                                                <div
                                                                                    class="input-group input-group-merge w-100 p-1 pt-0">
                                                                                    <span
                                                                                        class="input-group-text rounded-start">
                                                                                        <i
                                                                                            class="fas fa-search text-muted"></i>
                                                                                        <!-- Font Awesome search icon -->
                                                                                    </span>
                                                                                    <input type="text"
                                                                                        class="form-control rounded-end"
                                                                                        id="industries-search"
                                                                                        placeholder="Search Industry, Sub-Industry"
                                                                                        aria-label="Search..."
                                                                                        aria-describedby="chat-search">
                                                                                </div>
                                                                                <button
                                                                                    class="btn text-primary float-md-end"
                                                                                    onclick="$('#industries').val(null).trigger('change');">Clear
                                                                                    All</button>
                                                                                <!-- Multiple -->
                                                                                <div class="mb-1 p-1 pt-0">
                                                                                    <select class=" form-select"
                                                                                        id="industries" multiple>
                                                                                    </select>
                                                                                </div>
                                                                                <hr class="mt-5">
                                                                                <button type="button"
                                                                                    class="btn btn-dark waves-effect waves-float waves-light float-md-end m-1 mt-0"
                                                                                    id="industry_filter">Apply</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- /Modern Horizontal Wizard -->
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">

                                </div>

                                <!-- Multilingual -->
                                <section id="multilingual-datatable">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-datatable" id="gopal">
                                                    <table class="datatable table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>PPP Id</th>
                                                                <th>Icon</th>
                                                                <th>Company Name</th>
                                                                <th>Location</th>
                                                                <th>Industry</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody"></tbody>
                                                    </table>
                                                    <!-- <table class="dt-multilingual table">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>Company Name</th>
                                                                <th>Contact Info</th>
                                                                <th>Admin</th>
                                                                <th>Address</th>
                                                                <th>Website</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center" id="table-data">
                                                            <span id="kk"></span>



                                                        </tbody>
                                                    </table> -->
                                                </div>
                                                <!-- <nav aria-label="Page navigation example">
                                                    <ul class="pagination">
                                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                    </ul>
                                                </nav> -->
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!--/ Multilingual -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<script src="public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8hP5KbOAG4oguBSpDuCMjEKdBuY3X2Sc&callback=initMap&v=weekly&libraries=places"
    defer></script>

<?php
$session = session();
if ($session->get('success')) { ?>
<script type="text/javaScript">
    toastr.success('<?= session('success') ?>', "Success", {
   closeButton: !0,
   tapToDismiss: !1,
   progressBar: !0,
   })
   </script>
<?php } ?>
<!-- <script>
    document.getElementById('myInput').addEventListener('keyup', function() {
        $.ajax({
            type: "post",
            url: "MarketPlace/industry_search",
            data: {
                industry: $('#myInput').val(),
            },
            dataType: "JSON",
            success: function(response) {
                console.log(response.length)
                if (response) {
                    $('#myContainer').html('');
                    response.forEach(element => {
                        $('#myContainer').append(`<div class="myItem" data-filter="Technology">
        <div class="d-flex align-items-center">
        <input class="form-check-input me-1" type="checkbox" id="technologyCheckbox` + element["id"] + `" value="Technology">
        <label class="form-check-label me-2" for="technologyCheckbox` + element["id"] + `">` + element['principal_bussiness_activity_as_per_cin'] + `</label>
        <div class="flex-grow-1"></div>
        <a class="submenu-toggle" href="#" role="button" data-bs-toggle="collapse" data-bs-target="#sub1-dropdown` + element["id"] + `" aria-expanded="false">
        <i class="fa-solid fa-plus text-primary fw-bolder" id="technologySubmenuToggle` + element["id"] + `"></i>
        </a></div>
        <div id="sub1-dropdown` + element["id"] + `" class="collapse">
        <a class="dropdown-item" href="#">Option B1</a>
        <a class="dropdown-item" href="#">Option B2</a>
        <a class="dropdown-item" href="#">Option B3</a>
        </div>
        </div>`);
                    });
                }
            }

        });
    });
</script> -->
<script>
function credit(that, display_box, multiplier, id) {
    if (isNaN(parseInt(that.val()))) var that_val = 0;
    else var that_val = parseInt(that.val());
    // console.log(that_val, ', ', parseInt(that.attr('min')), ', ', that.attr('max'));
    let display_value = 0;
    if (parseInt(that.attr('max')) < that_val) {
        $(display_box + '_' + id).css('color', 'red');
        console.log('in if')
        $(display_box + '_' + id + '_' + id).addClass('disabled');
        // return false
        // display_value = parseInt(that.attr('max'));
    } else if (parseInt(that.attr('min')) > that_val) {
        $(display_box + '_' + id).css('color', 'red');
        console.log('in elseif')
        $(display_box + '_' + id + '_' + id).addClass('disabled');
        // return false
        // display_value = parseInt(that.attr('min'));
    } else {
        $(display_box + '_' + id + '_' + id).removeClass('disabled');
        $(display_box + '_' + id).css('color', 'black');
        console.log('in else')
        display_value = that_val * multiplier;
        console.log(display_value);
        $(display_box).text('₹' + display_value);
        $(display_box + '_' + id + '_' + id).text('Pay₹' + display_value);
        // return false
    }
}
$('#custom-credits').click(function() {
    $('#100').prop('checked', false);
    $('#500').prop('checked', false);
    $('#costum-input-div').html(
        `<input type="number" name="credit" id="costum-input" class="form-control mb-1 mt-1">`);
})
$('#100,#500').click(function() {
    $('#costum-input-div').html(``);
})

function buy() {
    $('#buymodal').modal('show');
}function history() {
    $('#historymodal').modal('show');
}

function AddBookmark(that, id) {
    $.ajax({
        type: "get",
        url: "<?= site_url('MarketPlace/AddBookmark') ?>",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function(res) {
            console.log(res)
            if (that.hasClass('fa-regular')) {
                that.removeClass('fa-regular')
                that.addClass('fa');
            } else {
                that.removeClass('fa')
                that.addClass('fa-regular');
            }
        }
    });
}

function filtermodel() {
    $("#filtermodel").modal('show');
}
</script>
<script>
function initMap() {
    // var location = $("#location").val();
    var autocomplete = new google.maps.places.Autocomplete(document.getElementById('chat-searchs'));
    var resultsDiv = document.getElementById('location');
    // alert(resultsDiv);
    // var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        if ($('#location option[value="' + place.name + '"]').length == 0)
            $("#location").append(`<option value="${place.name}" Selected>${place.name}</option>`);
        // resultsDiv.innerHTML = 'Name: ' + place.name + '<br>Address: ' + place.formatted_address;
    });
}
window.initMap = initMap;
// if ($('#tbody').length) alert('yes')
// if (!$('#tbody').length) alert('NO')
// console.log($('#tbody'));
const datatable = $('.datatable').DataTable({
    searching: false
});

function locationdata() {
    datatable.clear();
    const locations = $("#location").val();
    var a = 0,
        arr = {};
    locations.forEach(location => {
        console.log(location);
        arr['location'] = location
        arr['append'] = a;
        if (!a) a = 1;
        $.ajax({
            type: "get",
            url: "MarketPlace/get_data_api",
            data: arr,
            dataType: "JSON",
            success: function(response) {
                // console.log(response);
                datatable.rows.add(response.data).draw();
            }
        });


    });
}
</script>
<script>
$('#industries-search').keyup(function() {
    $.ajax({
        type: "post",
        url: "MarketPlace/industry_search",
        data: {
            industry: $('#industries-search').val()
        },
        dataType: "JSON",
        success: function(response) {
            // let data = '<option value="0" >Select from list</option>';
            let data = '',
                ab = 0,
                old_selected = $('#industries option:selected');
            let len = old_selected.length;
            response.forEach(element => {
                if (len > 0) {
                    for (let i = 0; i < len; i++) {
                        if (element == old_selected[i]['value']) ab = 1;
                    }
                }
                if (!ab) data += `<option value="${element}" >${element}</option>`;
                ab = 0;
            });
            $('#industries option:not(:selected)').remove();
            $('#industries').append(data);
        }
    });
})
var typing_time;
$('#company_name').keyup(function() {
    if ($('#company_name').val().length > 3) {
        clearTimeout(typing_time);
        typing_time = setTimeout(function() {

            $.ajax({
                type: "get",
                url: "MarketPlace/get_data_api",
                data: {
                    filter: $('#company_name').val(),
                },
                dataType: "JSON",
                success: function(response) {
                    // $('#gopal').html(response);
                    datatable.clear();
                    datatable.rows.add(response.data).draw();

                    // $('.datatable').DataTable({
                    //     searching: false
                    // });
                }

            });
        }, 200)
    }
});
$('#industry_filter').click(function() {
    var industry = $('#industries option:selected');
    datatable.clear();
    for (let i = 0; i < industry.length; i++) {
        $.ajax({
            type: "get",
            url: "MarketPlace/get_data_api",
            dataType: "JSON",
            data: {
                // industry: $('#industries').val(),
                industry: industry[i]['value'],
                // state: $('#location').val(),
                filter: $('#company_name').val(),
            },
            success: function(response) {
                datatable.rows.add(response.data).draw();

            }

        });
    }
});





$('select:not(.no-select2)').select2();
// $('.select2').click(function() {
//     console.log($(this).attr('data-parent'));
//     $('#'+$(this).data('parent')).click();
// })
// $(function() {
// dropdownParent: $("#select2")
// $('.select2').select2({
//     dropdownParent: $("#select2-1")
// })
// })
</script>

<script>
function creditbuy(val, id) {

}
// reloadData();
// $(document).ready(function() {
//     function reloadData() {
//         $.ajax({
//             url: '<?= base_url('MarketPlace/pppidinsert') ?>',
//             type: 'GET',
//             success: function(data) {
//                 // $('#data-container').html(data);
//             },
//             // complete: function() {
//             //     setTimeout(reloadData, 5000);
//             // }
//         });
//     }

//     reloadData(); // Initial call
// });
</script>

<!-- <script>$(document).ready(function() {
    $('select:not(.no-select2)').select2();

    $('#industries,#state_filter').change(function() {
    callFunction({
    industry: $('#industries').val(),
    state: $('#state_filter').val(),
    filter: $('#filter').val(),
    });
    }) let typingTimer; // Timer identifier

    function callFunction(arr) {
    $.ajax({

    type: "post",
    url: "MarketPlace/get_data_api",
    data: arr,
    success: function(response) {
    $('#gopal').html(response);
    }

    });
    }

    document.getElementById('filter').addEventListener('keyup', function() {
    clearTimeout(typingTimer); // Clear the previous timer

    // Set a new timer
    typingTimer=setTimeout(function() {
    callFunction({
    industry: $('#industries').val(),
    state: $('#state_filter').val(),
    filter: $('#filter').val(),
    }); // Call your function after the typing pause
    }

    , 800);
    });

    }) </script>-->
<!-- <script>
    function searchNames(page, type) {
        var input = document.getElementById("filter").value;
        var resultsDiv = document.getElementById("kk");

        if (input.length >= 3) {
            var xmlhttp = new XMLHttpRequest();
            $("#jj").addClass('card');
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (type == 'input') {

                        resultsDiv.innerHTML = this.responseText;
                    } else {
                        $('#kk').append(this.responseText);
                    }

                }
            };

            xmlhttp.open("GET", "MarketPlace/get_data_api?search=" + input + "&page=" + page, true);
            xmlhttp.send();
        } else {
            resultsDiv.innerHTML = "";
            $("#jj").removeClass('card');

        }
    }

    function company_redirect(that) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/admin/edit', true);
        xhr.onload = function() {
            console.log(this);
            console.log(this.getAllResponseHeaders());
        }

        xhr.send();
    }

    function view_more(that) {
        var e = $(that).attr('data-va');
        var page = $(that).attr('data-val');
        searchNames(page, 'more');
        $(that).remove();
    }
</script> -->
<script>
document.querySelectorAll('.dropdown-menu .dropdown-toggle[href="#"]')
    .forEach(function(element) {
        element.addEventListener("click", function(event) {
            event.stopPropagation();
        });
    });
</script>
<script>
function removeListItem(element) {
    // Check if the clicked item is the last list item
    if (element.parentNode.parentNode.children.length === 1) {
        // If it's the last item, remove the entire box
        element.parentNode.parentNode.parentNode.remove();
    } else {
        // Otherwise, remove only the clicked list item
        element.parentNode.remove();
    }
}
</script>

<!-- technology 1 -->
<!-- <script>
    function setupToggle(toggleBtn, targetDropdown, submenuToggle) {
        const toggleIcon = toggleBtn.querySelector('i.fas');
        let isOpen = false; // Track the state of the dropdown
        toggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const icon = toggleBtn.querySelector('i.fas');
            if (isOpen) {
                icon.classList.remove('fa-minus');
                icon.classList.add('fa-plus');
                if (submenuToggle) {
                    submenuToggle.querySelector('i.fas').classList.remove('fa-minus');
                    submenuToggle.querySelector('i.fas').classList.add('fa-plus');
                }
            } else {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
            }
            isOpen = !isOpen; // Toggle the state
            targetDropdown.classList.toggle('show'); // Toggle the submenu
        });
    }

    // Setup toggle for Technology
    const technologyToggle = document.getElementById('technologyToggle');
    const technologyDropdown = document.getElementById('technologyDropdown');
    const technologySubmenuToggle = document.getElementById('technologySubmenuToggle');
    setupToggle(technologySubmenuToggle, technologyDropdown);
</script> -->
<!-- business -->
<!-- <script>
    function setupToggle(toggleBtn, targetDropdown, submenuToggle) {
        toggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const icon = toggleBtn.querySelector('i.fas');
            if (targetDropdown.classList.contains('show')) {
                icon.classList.remove('fa-minus');
                targetDropdown.classList.remove('show');
                if (submenuToggle) {
                    submenuToggle.querySelector('i.fas').classList.remove('fa-minus');
                }
            } else {
                icon.classList.add('fa-minus');
                targetDropdown.classList.add('show');
            }
        });
    }

    // Setup toggle for Business Services
    const businessToggle = document.getElementById('businessToggle');
    const businessDropdown = document.getElementById('businessDropdown');
    const businessSubmenuToggle = document.getElementById('businessSubmenuToggle');
    setupToggle(businessSubmenuToggle, businessDropdown);
</script> -->
<!-- Construction -->
<!-- <script>
    function setupToggle(toggleBtn, targetDropdown, submenuToggle) {
        toggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const icon = toggleBtn.querySelector('i.fas');
            if (targetDropdown.classList.contains('show')) {
                icon.classList.remove('fa-minus');
                targetDropdown.classList.remove('show');
                if (submenuToggle) {
                    submenuToggle.querySelector('i.fas').classList.remove('fa-minus');
                }
            } else {
                icon.classList.add('fa-minus');
                targetDropdown.classList.add('show');
            }
        });
    }

    // Setup toggle for Construction
    const constructionToggle = document.getElementById('constructionToggle');
    const constructionDropdown = document.getElementById('constructionDropdown');
    const constructionSubmenuToggle = document.getElementById('constructionSubmenuToggle');
    setupToggle(constructionSubmenuToggle, constructionDropdown);
</script> -->
<!-- Consumer  -->
<!-- <script>
    function setupToggle(toggleBtn, targetDropdown, submenuToggle) {
        toggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const icon = toggleBtn.querySelector('i.fas');
            if (targetDropdown.classList.contains('show')) {
                icon.classList.remove('fa-minus');
                targetDropdown.classList.remove('show');
                if (submenuToggle) {
                    submenuToggle.querySelector('i.fas').classList.remove('fa-minus');
                }
            } else {
                icon.classList.add('fa-minus');
                targetDropdown.classList.add('show');
            }
        });
    }

    // Setup toggle for Consumer Services
    const consumerToggle = document.getElementById('consumerToggle');
    const consumerDropdown = document.getElementById('consumerDropdown');
    const consumerSubmenuToggle = document.getElementById('consumerSubmenuToggle');
    setupToggle(consumerSubmenuToggle, consumerDropdown);
</script> -->
<!-- <script>
    let typingTimer; // Timer identifier

    function callFunction(arr) {
        $.ajax({
            type: "post",
            url: "MarketPlace/industry_search",
            data: arr,
            dataType: "JSON",
            success: function(response) {
                console.log(response.length)
                if (response) {
                    $('#myContainer').html('');
                    response.forEach(element => {
                        $('#myContainer').append(`<div class="myItem" data-filter="Technology">
        <div class="d-flex align-items-center">
        <input class="form-check-input me-1" type="checkbox" id="technologyCheckbox` + element["id"] + `" value="Technology">
        <label class="form-check-label me-2" for="technologyCheckbox` + element["id"] + `">` + element['principal_bussiness_activity_as_per_cin'] + `</label>
        <div class="flex-grow-1"></div>
        <a class="submenu-toggle" href="#" role="button" data-bs-toggle="collapse" data-bs-target="#sub1-dropdown` + element["id"] + `" aria-expanded="false">
        <i class="fa-solid fa-plus text-primary fw-bolder" id="technologySubmenuToggle` + element["id"] + `"></i>
        </a></div>
        <div id="sub1-dropdown` + element["id"] + `" class="collapse">
        <a class="dropdown-item" href="#">Option B1</a>
        <a class="dropdown-item" href="#">Option B2</a>
        <a class="dropdown-item" href="#">Option B3</a>
        </div>
        </div>`);
                    });
                }
            }

        });
    }

    document.getElementById('myInput').addEventListener('keyup', function() {
        clearTimeout(typingTimer); // Clear the previous timer

        // Set a new timer
        typingTimer = setTimeout(function() {
            callFunction({
                industry: $('#myInput').val(),
                // state: $('#state_filter').val(),
                // filter: $('#filter').val(),
            }); // Call your function after the typing pause
        }, 800);
    });
</script> -->
<?= $this->endSection() ?>