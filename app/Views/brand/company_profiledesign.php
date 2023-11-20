<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<?php $db = \Config\Database::connect();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Authorization, X-CSRF-Token");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>">

<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/toastr.min.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css') ?>">

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB5u7MvYBi9uXF9ncpvJZbrW55a58QQMU&libraries=places"></script>

<style>
    /* Custom CSS class for index items */
    .custom-index-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #a3a2a278;
        /* Add a bottom border */
        padding: 10px 0;
        /* Add padding for spacing */
    }

    .materiality {
        border: 1px solid #dddddd;
        height: 20rem;
        padding: 10px;
    }

    .header-cell {
        text-align: center;
        padding: 10px;
        white-space: nowrap;
        /* Prevent text from wrapping */
        overflow: hidden;
        /* Hide overflowing text */
        text-overflow: ellipsis;
        /* Show ellipsis (...) for overflow */
    }

    .colors {
        background-color: #808080 !important;
        /* Dark grey */
        border: 1px solid #808080 !important;
        /* Dark grey border */
    }

    .colors_2 {
        width: 10%;
        padding: 20px;
        background-color: #f2f2f2 !important;
        /* Light grey */
    }

    .heading {
        background-color: #f2f2f2 !important;
        /* Dark grey */
    }

    .note {
        background-color: #808080 !important;
        /* Dark grey */
        border: 1px solid #808080 !important;
        /* Dark grey border */
        width: 150px;
        /* Set a fixed width for the "Note" cell */
    }

    .empty-cell {
        min-height: 25px;
        /* Adjust as needed */
        width: 50px;
        /* Set a fixed width for empty cells */
        width: 1%;
        background-color: #808080 !important;
        /* Dark grey */
        border: 1px solid #808080 !important;
        /* Dark grey border */
    }

    .light-blue-column {
        background-color: lightblue !important;
        color: #000;
    }

    .text-right {
        text-align: right !important;
    }

    /* Style for the "Principle" boxes */
    .box.header {
        text-align: center;
        font-size: 12px;
        background-color: #f0f0f0;
        padding: 6px;
        border: 1px solid #ccc;
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">





        <div class="content-body">
            <div class="card">
                <div class="image-logo text-center mb-3 pt-2">
                    <img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png" class="img-fluid">
                    <img src="https://res.cloudinary.com/dg8puryar/image/upload/v1689240956/Utopiic/insights/insight-images/industrial-decarbonization_pgdljw.jpg" class="img-fluid pt-2" alt="">
                </div>
                <div class="text-center ">
                    <h1 class="fw-bolder pb-2">Business Responsibility and <br>Sustainability Report<br> 2022 - 2023</h1>
                </div>
                <!-- divider  -->
                <div class="divider m-2 mt-0">
                    <div class="divider-text"><img src="https://positiivplus.com/public/utopiic/assets/app-assets/images/logo/logo.png" class="img-fluid"></div>
                </div>
                <!-- empty space  -->
                <div class="mb-2">
                    <h3 class="card-header fw-bold">Foreword</h3>
                    <p style="height: 200px;" class="pb-5"></p>
                </div>
            </div>

            <!-- index  -->
            <div class="card bg-light-secondary">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h1 class="card-header">Index</h1>
                </div>
                <div class="card-body">
                    <!-- Index Items -->
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">Section A: GENERAL DISCLOSURE</h4>
                        <h4 class="index-number pe-2">01</h4>
                    </div>
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">Section B: MANAGEMENT AND PROCESS DISCLOSURES</h4>
                        <h4 class="index-number pe-2">09</h4>
                    </div>
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">Section C: PRINCIPLE WISE PERFORMANCE DISCLOSURES</h4>
                        <h4 class="index-number pe-2">13</h4>
                    </div>
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">Principle 1</h4>
                        <h4 class="index-number pe-2">13</h4>
                    </div>
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">Principle 2</h4>
                        <h4 class="index-number pe-2">17</h4>
                    </div>
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">Principle 3</h4>
                        <h4 class="index-number pe-2">20</h4>
                    </div>
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">Principle 4</h4>
                        <h4 class="index-number pe-2">29</h4>
                    </div>
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">Principle 5</h4>
                        <h4 class="index-number pe-2">31</h4>
                    </div>
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">Principle 6</h4>
                        <h4 class="index-number pe-2">37</h4>
                    </div>
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">Principle 7</h4>
                        <h4 class="index-number pe-2">50</h4>
                    </div>
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">Principle 8</h4>
                        <h4 class="index-number pe-2">51</h4>
                    </div>
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">Principle 9</h4>
                        <h4 class="index-number pe-2">55</h4>
                    </div>
                    <div class="index-item custom-index-item">
                        <h4 class="index-title ps-1">ALIGNMENT OF BRSR PRINCIPLES WITH THE SDGS</h4>
                        <h4 class="index-number pe-2">60</h4>
                    </div>
                </div>
            </div>
            <!-- section a -->
            <div class="card">
                <div class="card-header pb-0">
                    <h2 class="text-dark">Section A: GENERAL DISCLOSURES</h2>
                </div>
                <div class="card-body pt-0">
                    <!-- section a table 1 -->
                    <div class="table mt-1 mb-3">
                        <h3 class="card-title">II. Products/ Services</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="table-active">1</td>
                                        <td class="table-active">Corporate Identity Number (CIN) of the Listed Entity</td>
                                        <td>L24231TN1936PLC000017</td>
                                    </tr>
                                    <tr>
                                        <td class="table-active">2</td>
                                        <td class="table-active">Name of the Listed Entity</td>
                                        <td>Amrutanjan Health Care Limited</td>
                                    </tr>
                                    <tr>
                                        <td class="table-active">3</td>
                                        <td class="table-active">Year of incorporation</td>
                                        <td>1893</td>
                                    </tr>
                                    <tr>
                                        <td class="table-active">4</td>
                                        <td class="table-active">Registered office address</td>
                                        <td>No.103, (Old No..42-45) LUZ CHURCH ROAD, MYLAPORE CHENNAI TN 600004</td>
                                    </tr>
                                    <tr>
                                        <td class="table-active">5</td>
                                        <td class="table-active">Corporate address</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="table-active">6</td>
                                        <td class="table-active">E-mail</td>
                                        <td>shares@amrutanjan.com</td>
                                    </tr>
                                    <tr>
                                        <td class="table-active">7</td>
                                        <td class="table-active">Telephone</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="table-active">8</td>
                                        <td class="table-active">Website</td>
                                        <td>www.amrutanjan.com</td>
                                    </tr>
                                    <tr>
                                        <td class="table-active">9</td>
                                        <td class="table-active">Financial year for which reporting is being done</td>
                                        <td>2022-23</td>
                                    </tr>
                                    <tr>
                                        <td class="table-active">10</td>
                                        <td class="table-active">Name of the Stock Exchange(s) where shares are listed</td>
                                        <td>1. National Stock Exchange of India Limited (NSE)
                                            2. The Bombay Stock Exchange (BSE) Limited
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-active">11</td>
                                        <td class="table-active">Paid-up Capital</td>
                                        <td>29230630</td>
                                    </tr>
                                    <tr>
                                        <td class="table-active">12</td>
                                        <td class="table-active">Name and contact details (telephone, email address) of the person who may be contacted in case of any queries on the BRSR report</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="table-active">13</td>
                                        <td class="table-active">Reporting boundary - Are the disclosures under this report made on a standalone basis (i.e. only for the entity) or on a consolidated basis (i.e. for the entity and all the entities which form a part of its consolidated financial statements, taken together).</td>
                                        <td>Standalone Basis</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- section a table 2 -->
                    <div class="table mt-3 mb-2">
                        <h3 class="card-title">II. Products/ Services</h3>
                        <h5 class="card-subtitle text-secondary pb-2 fw-normal">14. Details of business activities (accounting for 90% of the turnover):
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Description of Main Activity</th>
                                        <th scope="col">Description of Business Activity</th>
                                        <th scope="col">% of the Turnover of the entity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- section a table 3 -->
                    <div class="table mt-3 mb-2">
                        <h5 class="card-subtitle text-secondary pb-2 fw-normal">15. Products/Services sold by the entity (accounting for 90% of the entity’s Turnover):
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Product/Service</th>
                                        <th scope="col">NIC Code</th>
                                        <th scope="col">% of the total Turnover contributed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- section a table 4 -->
                    <div class="table mt-3 mb-3">
                        <h3 class="card-title">III. Operations</h3>
                        <h5 class="card-subtitle text-secondary pb-2 fw-normal">16. Number of locations where plants and/or operations/offices of the entity are situated:
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th>Number of Plants</th>
                                        <th>Number of Offices</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>National</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>International</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- section a table 5 -->
                    <div class="table mt-3 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-normal">17. Markets served by the entity:</h5>
                        <p class="fw-normal">a).Number of Locations</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th>Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>National (Number of States)</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>International (Number of Countries)</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- empty space  -->
                    <div class="sub-heading fw-bolder mt-3 mb-3">
                        <p class="fw-normal">b). What is the contribution of exports as a percentage of the total turnover of the entity?</p>
                        <p>&nbsp;</p>
                    </div>
                    <div class="sub-heading fw-bolder mt-3 mb-3">
                        <p class="fw-normal">c). A brief on types of customers</p>
                        <p>&nbsp;</p>
                    </div>
                    <!-- section a table 6 -->
                    <div class="table mt-3 mb-3">
                        <h3 class="card-title">IV. Employees</h3>
                        <h5 class="card-subtitle text-secondary pb-1 fw-normal">18. Details as at the end of Financial year:</h5>
                        <p class="fw-normal">a). Employees and workers (including differently abled):</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th rowspan="2" colspan="2" class="align-middle">Particulars</th>
                                        <th rowspan="2" colspan="2" class="align-middle">Total(A)</th>
                                        <th rowspan="1" colspan="2">Male</th>
                                        <th rowspan="1" colspan="2">Female</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th rowspan="2">No. (B)</th>
                                        <th rowspan="2">% (B/A)</th>
                                        <th rowspan="2">No. (C)</th>
                                        <th rowspan="2">% (C/A)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- New row with "Employees" -->
                                    <tr>
                                        <th colspan="8" class="text-center">Employees</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Permanent</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Other than Permanent</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Total Employees</th>
                                        <td colspan="2"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- section a table 7 -->
                    <div class="table mt-3 mb-3">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" colspan="2" class="align-middle">Particulars</th>
                                        <th rowspan="2" colspan="2" class="align-middle">Total(A)</th>
                                        <th rowspan="1" colspan="2">Male</th>
                                        <th rowspan="1" colspan="2">Female</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">No. (B)</th>
                                        <th rowspan="2">% (B/A)</th>
                                        <th rowspan="2">No. (C)</th>
                                        <th rowspan="2">% (C/A)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- New row with "Employees" -->
                                    <tr>
                                        <th colspan="8" class="text-center">Workers</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Permanent</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Other than Permanent</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Total Workers</th>
                                        <td colspan="2"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- section a table 8 -->
                    <div class="table mt-3 mb-3">
                        <p class="fw-normal">b). Differently abled Employees and workers:</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" colspan="2" class="align-middle">Particulars</th>
                                        <th rowspan="2" colspan="2" class="align-middle">Total(A)</th>
                                        <th rowspan="1" colspan="2">Male</th>
                                        <th rowspan="1" colspan="2">Female</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">No. (B)</th>
                                        <th rowspan="2">% (B/A)</th>
                                        <th rowspan="2">No. (C)</th>
                                        <th rowspan="2">% (C/A)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- New row with "Employees" -->
                                    <tr>
                                        <th colspan="8" class="text-center">Differently abled Employees</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Permanent</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Other than Permanent</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Total differently abled employees</th>
                                        <td colspan="2"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <!-- New row with "Worker" -->
                                    <tr>
                                        <th colspan="8" class="text-center">Differently abled Workers</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Permanent</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Other than Permanent</td>
                                        <td colspan="2"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Total differently abled workers</th>
                                        <td colspan="2"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- section a table 9 -->
                    <div class="table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-normal">19. Participation/Inclusion/Representation of women
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th rowspan="2" colspan="3"></th>
                                        <th rowspan="2" colspan="3" class="align-middle">Total(A)</th>
                                        <th rowspan="1" colspan="2">Male</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th rowspan="2">No. (B)</th>
                                        <th rowspan="2">% (B/A)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3">Board of Directors</td>
                                        <td colspan="3"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Key Management Personnel</td>
                                        <td colspan="3"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- section a table 10 -->
                    <div class="table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-normal">20. Turnover rate for permanent employees and workers
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" colspan="3"></th>
                                        <th rowspan="1" colspan="3">FY 2022 - 23</th>
                                        <th rowspan="1" colspan="3">FY 2021 - 22</th>
                                        <th rowspan="1" colspan="3">FY 2020 - 21</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="3">Male</th>
                                        <th rowspan="3">Female</th>
                                        <th rowspan="3">Total</th>
                                        <th rowspan="3">Male</th>
                                        <th rowspan="3">Female</th>
                                        <th rowspan="3">Total</th>
                                        <th rowspan="3">Male</th>
                                        <th rowspan="3">Female</th>
                                        <th rowspan="3">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3">Permanent Employees</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Permanent Workers</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- section a table 11 -->
                    <div class="table mt-3 mb-3">
                        <h3 class="card-title">V. Holding, Subsidiary and Associate Companies (including joint ventures)</h3>
                        <h5 class="card-subtitle text-secondary pb-1 fw-normal">21. (a) Names of holding / subsidiary / associate companies / joint ventures</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="align-middle">S No</th>
                                        <th class="align-middle">Name of the holding / subsidiary / associate companies / joint ventures</th>
                                        <th class="align-middle">Indicate whether holding/ Subsidiary/ Associate/ Joint Venture</th>
                                        <th class="align-middle">% of shares held by listed entity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- empty space  -->
                    <div class="sub-heading fw-bolder mt-3 mb-3">
                        <p class="fw-normal">Does the entities indicated in the above table participate in the Business Responsibility initiatives of the listed entity? (Yes/No)</p>
                        <p>&nbsp;</p>
                    </div>
                    <!-- content yes/no types -->
                    <div class="yes-no mt-3">
                        <h3 class="card-title">VI. CSR Details</h3>
                        <h5 class="card-subtitle text-secondary pb-1 fw-normal">22.</h5>
                        <ol style="list-style-type: none;" class="fw-normal p-0 mb-0">
                            <li class="pb-2">(i) Whether CSR is applicable as per section 135 of Companies Act, 2013: (Yes/No)</li>
                            <li class="pb-2">(ii) Turnover (in Rs/INR):</li>
                            <li class="pb-2">(iii) Net worth (in Rs/INR):</li>
                        </ol>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- section a table 12 -->
                    <div class="table mt-3 mb-3">
                        <h3 class="card-title">VII. Transparency and Disclosures Compliances</h3>
                        <h5 class="card-subtitle text-secondary pb-1 fw-normal">23. Complaints/Grievances on any of the principles (Principles 1 to 9) under the National Guidelines on Responsible Business Conduct:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" colspan="3" class="align-middle">Stakeholder group from whom complaint is received</th>
                                        <th rowspan="2" colspan="3" class="align-middle">Grievance Redressal Mechanism in Place(Yes/No) (If Yes, then provide web-link for grievance redress policy</th>
                                        <th rowspan="1" colspan="3">FY 2022 - 23</th>
                                        <th rowspan="1" colspan="3">FY 2021 - 22</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="3">Number of complaints filed during the year</th>
                                        <th rowspan="3">Number of complaints pending resolution at close of the year</th>
                                        <th rowspan="3">Remarks</th>
                                        <th rowspan="3">Number of complaints filed during the year</th>
                                        <th rowspan="3">Number of complaints pending resolution at close of the year</th>
                                        <th rowspan="3">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3">Communities</td>
                                        <td colspan="3"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Inventors (Other than shareholders)</td>
                                        <td colspan="3"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Shareholders</td>
                                        <td colspan="3"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Employees & Workers</td>
                                        <td colspan="3"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Customers</td>
                                        <td colspan="3"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Value chain partners</td>
                                        <td colspan="3"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Others</td>
                                        <td colspan="3"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- section a table 13 -->
                    <div class="table mt-4 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-normal">24. Overview of the entity’s material responsible business conduct issues</h5>
                        <p class="fw-normal">Please indicate material responsible business conduct and sustainability issues pertaining to environmental and social matters that present a risk or an opportunity to your business, rationale for identifying the same, approach to adapt or mitigate the risk along-with its financial implications, as per the following format.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="align-middle">S No</th>
                                        <th class="align-middle">Material issue identified</th>
                                        <th class="align-middle">Indicate whether risk or opportunity</th>
                                        <th class="align-middle">Rationale for identifying the risk / opportunity</th>
                                        <th class="align-middle">In case of risk,approach to adapt or mitigate</th>
                                        <th class="align-middle">Financial implications of the risk or opportunity (Indicate positive or negative implications)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Materiality Index  -->
                    <div class="materiality mt-5 bordered-layout">
                        <h5>Materiality Index </h5>
                    </div>
                </div>
            </div>
            <!-- section b -->
            <div class="card">
                <div class="card-header pb-0">
                    <h2 class="text-dark">Section B: MANAGEMENT AND PROCESS DISCLOSURES</h2>
                </div>
                <div class="card-body pb-0">
                    <!-- section b table 1 -->
                    <div class="section-b-tables mt-1 mb-3">
                        <p class="fw-normal">The National Guidelines for Responsible Business Conduct (NGRBC) as prescribed by the Ministry of Corporate Affairs advocates nine principles referred as P1-P9 as given below:</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>P1</th>
                                        <td>Businesses should conduct and govern themselves with integrity, and in a
                                            manner that is Ethical, Transparent and Accountable.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>P2</th>
                                        <td>Businesses should provide goods and services in a manner that is
                                            sustainable and safe.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>P3</th>
                                        <td>Businesses should respect and promote the well-being of all employees,
                                            including those in their value chains.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>P4</th>
                                        <td>Businesses should respect the interests of and be responsive to all its
                                            stakeholders.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>P5</th>
                                        <td>Businesses should respect and promote human rights.</td>
                                    </tr>
                                    <tr>
                                        <th>P6</th>
                                        <td>Businesses should respect and make efforts to protect and restore the
                                            environment.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>P7</th>
                                        <td>Businesses, when engaging in influencing public and regulatory policy,
                                            should do so in a manner that is responsible and transparent.
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>P8</th>
                                        <td>Businesses should promote inclusive growth and equitable development.</td>
                                    </tr>
                                    <tr>
                                        <th>P9</th>
                                        <td>Businesses should engage with and provide value to their consumers in a
                                            responsible manner.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- section b table 2 -->
                    <div class="section-b-tables mt-4 mb-2">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>P1</th>
                                        <th>P2</th>
                                        <th>P3</th>
                                        <th>P4</th>
                                        <th>P5</th>
                                        <th>P6</th>
                                        <th>P7</th>
                                        <th>P8</th>
                                        <th>P9</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="10">Policy and management processes</th>
                                    </tr>
                                    <tr>
                                        <td>1. a. Whether your entity’s policy/policies cover each
                                            principle and its core elements of the NGRBCs.
                                            (Yes/No)
                                        </td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                    </tr>
                                    <tr>
                                        <td>b. Has the policy been approved by the Board?
                                            (Yes/No)
                                        </td>
                                        <td>Y</td>
                                        <td>N</td>
                                        <td>N</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>N</td>
                                        <td>Y</td>
                                        <td>N</td>
                                    </tr>
                                    <tr>
                                        <td>c. Web Link of the Policies, if available</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2. Whether the entity has translated the policy into
                                            procedures. (Yes / No)
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3. Do the enlisted policies extend to your value
                                            chain partners? (Yes/No)
                                        </td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                        <td>Y</td>
                                    </tr>
                                    <tr>
                                        <td>4. Name of the national and international
                                            codes/certifications/labels/ standards (e.g. Forest
                                            Stewardship Council, Fairtrade, Rainforest Alliance,
                                            Trustea) standards (e.g. SA 8000, OHSAS, ISO, BIS)
                                            adopted by your entity and mapped to each
                                            principle.
                                        </td>
                                        <th colspan="10"></th>
                                    </tr>
                                    <tr>
                                        <td>5. Specific commitments, goals and targets set by
                                            the entity with defined timelines, if any.
                                        </td>
                                        <th colspan="10"></th>
                                    </tr>
                                    <tr>
                                        <td>6. Performance of the entity against the specific
                                            commitments, goals and targets along-with
                                            reasons in case the same are not met.
                                        </td>
                                        <th colspan="10"></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- empty space questions -->
                    <div class="section-b-tables mt-4 mb-2">
                        <h3 class="card-title">Governance, leadership and oversight</h3>
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">7. Statement by director responsible for the business responsibility report, highlighting ESG related challenges, targets and achievements</h5>
                        <p>&nbsp;</p>
                    </div>
                    <!-- qestions -->
                    <div class="section-b-tables mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">8. Details of the highest authority responsible for implementation and oversight of the Business Responsibility policy (ies).</h5>
                        <p class="fw-normal">S. Sambhu Prasad</p>
                        <p class="fw-normal">(Chairman & Managing Director)</p>
                    </div>
                    <!-- qestions -->
                    <div class="section-b-tables mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">9. Does the entity have a specified Committee of the Board/ Director responsible for decision making on sustainability related issues? (Yes / No). If yes, provide details.</h5>
                        <p class="fw-normal">S. Jeyakanth</p>
                        <p class="fw-normal">Chief Operating Officer (Supply Chain & Product Delivery)</p>
                        <p class="fw-normal">Telephone number: 98418 29493</p>
                        <p class="fw-normal">E-mail: Jeyakanths@amrutanjan.com</p>
                    </div>
                    <!-- section b table 3  -->
                    <div class="section-b-tables mt-4 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">10. Details of Review of NGRBCs by the Company:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" colspan="3" class="align-middle">Subject for review</th>
                                        <th rowspan="1" colspan="9">Indicates whether review was undertaken by
                                            Director/ Committee of the board/ Any other
                                            committee
                                        </th>
                                    </tr>
                                    <tr>
                                        <th rowspan="9">P1</th>
                                        <th rowspan="9">P2</th>
                                        <th rowspan="9">P3</th>
                                        <th rowspan="9">P4</th>
                                        <th rowspan="9">P5</th>
                                        <th rowspan="9">P6</th>
                                        <th rowspan="9">P7</th>
                                        <th rowspan="9">P8</th>
                                        <th rowspan="9">P9</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3">Performance against above policies and follow
                                            up action
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Compliance with statutory requirements of
                                            relevance to the principles, and, rectification of
                                            any non-compliances
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- section b table 4  -->
                    <div class="section-b-tables mt-4 mb-3">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" colspan="3" class="align-middle">Subject for review</th>
                                        <th rowspan="1" colspan="9">Frequency (Annually/ Half yearly/ Quarterly/
                                            Any other)
                                        </th>
                                    </tr>
                                    <tr>
                                        <th rowspan="9">P1</th>
                                        <th rowspan="9">P2</th>
                                        <th rowspan="9">P3</th>
                                        <th rowspan="9">P4</th>
                                        <th rowspan="9">P5</th>
                                        <th rowspan="9">P6</th>
                                        <th rowspan="9">P7</th>
                                        <th rowspan="9">P8</th>
                                        <th rowspan="9">P9</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3">Performance against above policies and follow
                                            up action
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Compliance with statutory requirements of
                                            relevance to the principles, and, rectification of
                                            any non-compliances
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- section b table 5  -->
                    <div class="section-b-tables mt-4 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">11. Details of Review of NGRBCs by the Company:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" colspan="3">Has the entity carried out independent
                                            assessment/ evaluation of the working of its
                                            policies by an external agency? (Yes/No) If
                                            Yes, provide the name of the agency.
                                        </th>
                                        <th rowspan="1" colspan="1">P1</th>
                                        <th rowspan="1" colspan="1">P2</th>
                                        <th rowspan="1" colspan="1">P3</th>
                                        <th rowspan="1" colspan="1">P4</th>
                                        <th rowspan="1" colspan="1">P5</th>
                                        <th rowspan="1" colspan="1">P6</th>
                                        <th rowspan="1" colspan="1">P7</th>
                                        <th rowspan="1" colspan="1">P8</th>
                                        <th rowspan="1" colspan="1">P9</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- New row with "Employees" -->
                                    <tr>
                                        <th colspan="12">
                                            &nbsp;
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- section b table 6  -->
                    <div class="section-b-tables mt-4 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">12. If answer to question (1) above is “No” i.e. not all Principles are covered by a policy, reasons to be stated:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Questions</th>
                                        <th>P1</th>
                                        <th>P2</th>
                                        <th>P3</th>
                                        <th>P4</th>
                                        <th>P5</th>
                                        <th>P6</th>
                                        <th>P7</th>
                                        <th>P8</th>
                                        <th>P9</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>The entity does not consider the Principles
                                            material to its business (Yes/No)
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>The entity is not at a stage where it is in a
                                            position to formulate and implement the
                                            policies on specified principles (Yes/No)
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>The entity does not have the financial
                                            or/human and technical resources available for
                                            the task (Yes/No)
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>It is planned to be done in the next financial
                                            year (Yes/No)
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Any other reason</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- section b table 7 -->
                    <div class="section-b-tables mt-4 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">12. If answer to question (1) above is “No” i.e. not all Principles are covered by a policy, reasons to be stated:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="border-bottom-none">
                                        <th colspan="5" class="note text-light">Note</th>
                                    </tr>
                                    <tr>
                                        <td class="empty-cell"></td>
                                        <th class="text-center heading" colspan="5">Principle-wise company policies</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- <td style="width: 1%!important; border-width: -1px!important; display: ;" colspan="2"></td>
                           <td class="text-center" ></td> -->
                                    </tr>
                                    <tr>
                                        <td class="colors text-light">P1</td>
                                        <td class="colors_2">Ethic & transparency</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="colors text-light">P2</td>
                                        <td class="colors_2">Product responsiblity</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="colors text-light">P3</td>
                                        <td class="colors_2">Human resources</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="colors text-light">P4</td>
                                        <td class="colors_2">Responsive to stakeholders, praticularly the marginalized</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="colors text-light">P5</td>
                                        <td class="colors_2">Respect for human rights </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="colors text-light">P6</td>
                                        <td class="colors_2">Responsible landing</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="colors text-light">P7</td>
                                        <td class="colors_2">Public policy advocacy</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="colors text-light">P8</td>
                                        <td class="colors_2">Inclusive growth</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="colors text-light">P9</td>
                                        <td class="colors_2">Customer engagement</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- section c -->
            <div class="card">
                <div class="card-header pb-0">
                    <h2 class="text-dark">Section C: PRINCIPLE WISE PERFORMANCE DISCLOSURE</h2>
                </div>
                <div class="card-body pb-0">
                    <!-- section c principle 1 -->
                    <div class="section-c-tables mt-2">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="header-cell pt-2">PRINCIPLE 1</th>
                                        <td>Businesses should conduct and govern themselves with integrity, and in a manner that is Ethical, Transparent and Accountable.</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <span class="badge badge-light-success mt-2 fs-4">Essential Indicator</span>
                    </div>
                    <!-- section c table 1 -->
                    <div class="section-c-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Percentage coverage by training and awareness programmes on any of the Principles during the financial year: </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th class="align-middle">Segment</th>
                                        <th class="align-middle">Total number of training and awareness programmes held</th>
                                        <th class="align-middle">Topics/ Principles covered under the training and its impact</th>
                                        <th class="align-middle">% of persons in respective category covered by the awareness programmes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Board of Directors</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Key Management Personne</td>
                                        <td>11</td>
                                        <td>Hygiene, Code of Conduct, Brand Management, PoSH, Goal Alignment, Master Class on world class organsation, Phishing Awareness, TN Draft rules on wages, IR, OSH & NC & Data Protection</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Employees other than BoD and KMPs</td>
                                        <td>174</td>
                                        <td>Fire safety, Code of Conduct, CSE Sales training, QMS Internal Auditor, Labour law, SOP, Training policy, Hygiene, Sales force management - ABM, Handling of Accidental Cases & 5s</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Workers</td>
                                        <td>2</td>
                                        <td>Female Hygiene</td>
                                        <td>100%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- section c table 1 -->
                    <div class="section-c-tables mt-4 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. Details of fines / penalties /punishment/ award/ compounding fees/ settlement amount paid in proceedings with regulators/ law enforcement agencies/ judicial institutions in FY23</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <!-- New row with "Employees" -->
                                    <tr>
                                        <th colspan="8" class="text-center">Monetary</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th class="align-middle">NGRBC Principle</th>
                                        <th class="align-middle">Name of the regulatory/enforcement agencies/judicial institutions</th>
                                        <th class="align-middle">Amount (in INR)</th>
                                        <th class="align-middle">Brief of the case</th>
                                        <th class="align-middle">Has an appeal been preferred ? (Yes/ No)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Penalty/ Fine</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Settlement</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Compound ing fee</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- section c table 2 -->
                    <div class="section-c-tables mt-4 mb-3">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <!-- New row with "Employees" -->
                                    <tr>
                                        <th colspan="8" class="text-center">Non-Monetary</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th class="align-middle">NGRBC Principle</th>
                                        <th class="align-middle">Name of the regulatory/enforcement agencies/judicial institutions</th>
                                        <th class="align-middle">Brief of the case</th>
                                        <th class="align-middle">Has an appeal been preferred ? (Yes/ No)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Imprisonment</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Punishment</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- section c table 3 -->
                    <div class="section-c-tables mt-4 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">3. Of the instances disclosed in Question 2 above, details of the Appeal/ Revision preferred in cases where monetary or non-monetary action has been appealed. </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Case Details</th>
                                        <th>Name of the regulatory/ enforcement agencies/ judicial institutions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>NIL</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- question -->
                    <div class="section-b-tables mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary fw-bold">4. Does the entity have an anti-corruption or anti-bribery policy? If yes, provide details in brief and if available, provide a web-link to the policy.</h5>
                        <p class="fw-normal p-1">Amrutanjan is committed itself to honesty and accountability. The commitment is
                            reflected in all business activities of the Company besides reflecting in its relations with the
                            customers, suppliers, investors, government, etc. The Directors, the Senior Management
                            Personnel and the employees are expected to conduct themselves in line with the
                            standards observed in the Company's code of conduct both in letter and spirit. The
                            Company recognizes that all the decisions and actions will be taken in accordance with the
                            code of conduct and to enhance long-term shareholder value. Considerable emphasis is
                            placed on accountability in decision making and ethics in implementing them.
                        </p>
                    </div>
                    <!-- section c table 4 -->
                    <div class="section-c-tables mt-4 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">5. Number of Directors/KMPs/employees/workers against whom disciplinary action was taken by any law enforcement agency for the charges of bribery/ corruption: </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th></th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Board of Directors</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                    <tr>
                                        <td>Key Management Personnel</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                    <tr>
                                        <td>Employees other than BoD and KMPs</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                    <tr>
                                        <td>Workers</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- section c table 5 -->
                    <div class="section-c-tables mt-4 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">6. Details of complaints with regard to conflict of interest.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" colspan="2"></th>
                                        <th rowspan="1" colspan="2">FY 2022 - 23</th>
                                        <th rowspan="1" colspan="2">FY 2021 - 22</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">Number</th>
                                        <th rowspan="2">Remarks</th>
                                        <th rowspan="2">Number</th>
                                        <th rowspan="2">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2">Number of complaints received in relation to issues of Conflict of Interest of the Directors</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td>NIL</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Number of complaints received in relation to issues of Conflict of Interest of the KMPs</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td>NIL</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- question -->
                    <div class="section-b-tables mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">7. Provide details of any corrective action taken or underway on issues related to fines / penalties / action taken by regulators/ law enforcement agencies/ judicial institutions, on cases of corruption and conflicts of interest</h5>
                        <p class="fw-normal p-1">NIL</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- badge -->
                    <span class="badge badge-light-primary mt-2 fs-4">Leadership Indicator</span>
                    <!-- section c table 4 -->
                    <div class="section-c-tables mt-4 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Awareness programmes conducted for value chain partners on any of the Principles during the financial year:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Total number of training and awareness programmes held</th>
                                        <th>Topics/ Principles covered under the training and its impact</th>
                                        <th>% of the value chain partners covered under the awareness programmes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0</td>
                                        <td>NIL</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="section-b-tables mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary fw-bold">2. Does the entity have processes in place to avoid/ manage conflict of interests involving members of the Board? (Yes/No) If Yes, provide details of the same.</h5>
                        <p class="fw-normal p-1">Amrutanjan has a Code of Conduct for Board members, Senior Management and
                            Executives which underpins our professional and ethical standards. Board members,
                            executives, and staff must follow this Code. All transanctions with related parties require
                            prior approval of the Audit Committee of the Board. Our Independent Directors have
                            additional duties. A declaration of independence must be submitted to verify that the
                            individual meets the independence criteria and has no knowledge of any circumstances
                            that may impair their ability to perform their duties impartially and without external
                            influences. No interested Director should participate in the Board's deliberations or vote
                            without authorisation.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Principle 2 -->
            <div class="card">
                <div class="card-header pb-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="header-cell pt-2">PRINCIPLE 2</th>
                                    <td>Businesses should provide goods and services in a manner that is sustainable and safe.</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <span class="badge badge-light-success mt-2 fs-4">Essential Indicator</span>
                    <!-- principle 2 table 1-->
                    <div class="principle-2-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Percentage of R&D and capital expenditure (capex) investments in specific technologies
                            to improve the environmental and social impacts of product and processes to total R&D and capex investments made by the entity, respectively.
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th></th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                        <th>Details of improvements in environmental and social impacts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>R&D</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Capex</td>
                                        <td>0%</td>
                                        <td>0%</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-2 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary fw-bold">2. a. Does the entity have procedures in place for sustainable sourcing? (Yes/No)</h5>
                        <h5 class="card-subtitle text-secondary fw-bold p-2">b. If yes, what percentage of inputs were sourced sustainably?</h5>
                        <p class="fw-normal ps-3">No</p>
                    </div>
                    <!-- question -->
                    <div class="principle-2 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary fw-bold">3. Describe the processes in place to safely reclaim your products for reusing, recycling and disposing at the end of life, for (a) Plastics (including packaging) (b) E-waste (c) Hazardous waste and (d) other waste.</h5>
                        <p class="fw-normal ps-3 pt-2">Till distributer level we are collecting back to us for expiry stock and safely
                            disposing through authorised agency but end consumer no such process
                        </p>
                    </div>
                    <!-- question -->
                    <div class="principle-2 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary fw-bold">4. Whether Extended Producer Responsibility (EPR) is applicable to the entity’s activities
                            (Yes / No). If yes, whether the waste collection plan is in line with the Extended Producer Responsibility (EPR) plan submitted to Pollution Control Boards? If not, provide steps taken to address the same.
                        </h5>
                        <p class="fw-normal ps-3 pt-2">No.<br> We are in process of identifying the vendor and registration process and will implement the same this year.</p>
                    </div>
                    <!-- empty space  -->
                    <div class="principle-2 mt-4 mb-2">
                        <p class="fw-normal p-5 m-5">&nbsp;</p>
                    </div>
                    <!-- divide  -->
                    <hr>
                    <span class="badge badge-light-primary mt-2 fs-4">Essential Indicator</span>
                    <!-- principle 2 table 2-->
                    <div class="principle-2-tables table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Has the entity conducted Life Cycle Perspective / Assessments (LCA) for any of its
                            products (for manufacturing industry) or for its services (for service industry)? If yes, provide details in the following format?
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th class="align-middle">NIC Code</th>
                                        <th class="align-middle">Name of the Product/Service</th>
                                        <th class="align-middle">% of the total turnover contributed</th>
                                        <th class="align-middle">Boundary for which the Life Cycle Perspective/ Assessment was conducted</th>
                                        <th class="align-middle">Whether conducted by independent external agency (Yes/ No)</th>
                                        <th class="align-middle">Result communicated in public domain (Yes/ No)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>NA</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- principle 2 table 3-->
                    <div class="principle-2-tables mt-tables-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. If there are any significant social or environmental concerns and/or risks arising from
                            production or disposal of your products / services, as identified in the Life Cycle Perspective / Assessments (LCA) or through any other means, briefly describe the same along-with action taken to mitigate the same.
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Name of the Product/ Service</th>
                                        <th>Description of the risk/concern</th>
                                        <th>Action taken</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>NA</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- principle 2 table 4-->
                    <div class="principle-2-tables table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">3. Percentage of recycled or reused input material to total material (by value) used in
                            production (for manufacturing industry) or providing services (for service industry).
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2"></th>
                                        <th rowspan="1" colspan="2">Recycled or Re-used input material to total material</th>
                                    </tr>
                                    <tr>
                                        <th colspan="1">FY 2022 - 23</th>
                                        <th colspan="1">FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>NA</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- principle 2 table 5-->
                    <div class="principle-2-tables table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">4. Of the products and packaging reclaimed at end of life of products, amount (in metric
                            tonnes) reused, recycled, and safely disposed, as per the following format:
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2"></th>
                                        <th rowspan="1" colspan="3">FY 2022 - 23</th>
                                        <th rowspan="1" colspan="3">FY 2021 - 22</th>
                                    </tr>
                                    <tr>
                                        <th colspan="1">Re-Used</th>
                                        <th colspan="1">Recycled</th>
                                        <th colspan="1">Safely Disposed</th>
                                        <th colspan="1">Re-Used</th>
                                        <th colspan="1">Recycled</th>
                                        <th colspan="1">Safely Disposed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Plastics (Including packaging)</td>
                                        <td>NA</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>E-waste</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Hazardous waste</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Other waste</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- principle 2 table 6-->
                    <div class="principle-2-tables table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">5. Reclaimed products and their packaging materials (as percentage of products sold) for
                            each product category.
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Indicate product category</th>
                                        <th>Reclaimed products and their packaging materials as % of total products sold in respective category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>NA</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Principle 3 -->
            <div class="card">
                <div class="card-header pb-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="header-cell pt-2">PRINCIPLE 3</th>
                                    <td>Businesses should respect and promote the well-being of all employees, including those in their value chains.</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <span class="badge badge-light-success mt-2 fs-4">Essential Indicator</span>
                    <!-- principle 3 table 1-->
                    <div class="principle-3-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. a. Details of measures for the well-being of employees:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="3" class="text-center align-middle">Category</th>
                                        <th class="text-center" colspan="11">% of employees covered by</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" class="text-center align-middle">Total(A)</th>
                                        <th colspan="2">Health Insurance</th>
                                        <th colspan="2">Accident Insurance</th>
                                        <th colspan="2">Maternity Benefits</th>
                                        <th colspan="2">Paternity Benefits</th>
                                        <th colspan="2">Day Care Facilities</th>
                                    </tr>
                                    <tr>
                                        <th>No.(B)</th>
                                        <th>%(B/A)</th>
                                        <th>No.(C)</th>
                                        <th>%(C/A)</th>
                                        <th>No.(D)</th>
                                        <th>%(D/A)</th>
                                        <th>No.(E)</th>
                                        <th>%(E/A)</th>
                                        <th>No.(F)</th>
                                        <th>%(F/A)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-center" colspan="12">Permanent Employees</th>
                                    </tr>
                                    <tr>
                                        <td>Male</td>
                                        <td>507</td>
                                        <td>505</td>
                                        <td>99.61%</td>
                                        <td>506</td>
                                        <td>99.80%</td>
                                        <td>NA</td>
                                        <td>NA</td>
                                        <td>0</td>
                                        <td>0%</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Female</td>
                                        <td>30</td>
                                        <td>30</td>
                                        <td>100.0%</td>
                                        <td>30</td>
                                        <td>100.0%</td>
                                        <td>30</td>
                                        <td>100.0</td>
                                        <td>NA</td>
                                        <td>NA</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>537</td>
                                        <td>535</td>
                                        <td>99.63%</td>
                                        <td>536</td>
                                        <td>99.81%</td>
                                        <td>30</td>
                                        <td>100%</td>
                                        <td>0</td>
                                        <td>0%</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" colspan="12">Other Than Permanent Employees</th>
                                    </tr>
                                    <tr>
                                        <td>Male</td>
                                        <td>Nil</td>
                                        <td>Nil </td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                    </tr>
                                    <tr>
                                        <td>Female</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- principle 3 table 2-->
                    <div class="principle-3-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">b. Details of measures for the well-being of workers:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="3" class="text-center align-middle">Category</th>
                                        <th class="text-center" colspan="11">% of employees covered by</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" class="text-center align-middle">Total (A)</th>
                                        <th colspan="2">Health Insurance</th>
                                        <th colspan="2">Accident Insurance</th>
                                        <th colspan="2">Maternity Benefits</th>
                                        <th colspan="2">Paternity Benefits</th>
                                        <th colspan="2">Day Care Facilities</th>
                                    </tr>
                                    <tr>
                                        <th>No (B)</th>
                                        <th>%(B/A)</th>
                                        <th>No (C)</th>
                                        <th>%(C/A)</th>
                                        <th>No (D)</th>
                                        <th>%(D/A)</th>
                                        <th>No (E)</th>
                                        <th>%(E/A)</th>
                                        <th>No (F)</th>
                                        <th>%(F/A)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-center" colspan="12">Permanent Employees</th>
                                    </tr>
                                    <tr>
                                        <th>Male</th>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100%</td>
                                        <td>100</td>
                                        <td>100%</td>
                                        <td>NA</td>
                                        <td>NA</td>
                                        <td>NA</td>
                                        <td></td>
                                        <td>NA</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Female</th>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>100%</td>
                                        <td>1</td>
                                        <td>100%</td>
                                        <td>1</td>
                                        <td>100%</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>101</td>
                                        <td>101</td>
                                        <td>100%</td>
                                        <td>101</td>
                                        <td>100>%</td>
                                        <td>1</td>
                                        <td>100%</td>
                                        <td>0</td>
                                        <td></td>
                                        <td>0</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" colspan="12">Other Than Permanent Employees</th>
                                    </tr>
                                    <tr>
                                        <th>Male</th>
                                        <td>Nil</td>
                                        <td>Nil </td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                    </tr>
                                    <tr>
                                        <th>Female</th>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                        <td>Nil</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 3 table 3 -->
                    <div class="principle-3-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. Details of retirement benefits for current and previous financial year.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center align-middle">Benefits</th>
                                        <th colspan="3">FY 2022 - 23</th>
                                        <th colspan="3">FY 2021 - 22</th>
                                    </tr>
                                    <tr>
                                        <th colspan="1">No. of employees covered as a % of total employees</th>
                                        <th colspan="1">No. of workers covered as a % of total workers</th>
                                        <th colspan="1">Deducted and deposited with the authority (Yes/ No/ N.A.)</th>
                                        <th colspan="1">No. of employees covered as a % of total employees</th>
                                        <th colspan="1">No. of workers covered as a % of total workers</th>
                                        <th colspan="1">Deducted and deposited with the authority (Yes/ No/ N.A.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PF</td>
                                        <td>100%</td>
                                        <td>100%</td>
                                        <td>Yes</td>
                                        <td>100%</td>
                                        <td>100%</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Gratuity</td>
                                        <td>100%</td>
                                        <td>100%</td>
                                        <td>Yes</td>
                                        <td>100%</td>
                                        <td>100%</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>ESI</td>
                                        <td>3.33%</td>
                                        <td>12.50%</td>
                                        <td>Yes</td>
                                        <td>6.72%</td>
                                        <td>10.20%</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Other</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-3 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary fw-bolder">3. Accessibility of workplaces</h5>
                        <h5 class="card-subtitle text-secondary fw-bold pt-2">Are the premises / offices of the entity accessible to differently abled employees and workers,as per the requirements of the Rights of Persons with Disabilities Act, 2016? If not, whether any steps are being taken by the entity in this regard.</h5>
                        <p class="fw-normal ps-2 pt-2">Currently we have only staircase for accessibility. We are going to renovate our second
                            floor and we have planned elevators/lifts at that point of time
                        </p>
                    </div>
                    <!-- question -->
                    <div class="principle-3 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary fw-bolder">4. Does the entity have an equal opportunity policy as per the Rights of Persons with Disabilities Act, 2016? If so, provide a web-link to the policy.</h5>
                        <p class="fw-normal ps-2 pt-2">We do not have any specific policy for equal opportunity with disabilities. In future
                            will add this criteria in job postings and our policy for select positions
                        </p>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 3 table 4 -->
                    <div class="principle-3-tablesmt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. Details of retirement benefits for current and previous financial year.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="1"></th>
                                        <th colspan="2">Permanent Employees</th>
                                        <th colspan="2">Permanent Workers</th>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <th>Return to Work Rate</th>
                                        <th>Retention Rate</th>
                                        <th>Return to Work Rate</th>
                                        <th>Retention Rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Male</td>
                                        <td>NA</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Female</td>
                                        <td>No employee took parental leave in 2022-23</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- principle 3 table 5 -->
                    <div class="principle-3-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">7. Membership of employees and worker in association(s) or Unions recognised by the listed
                            entity:
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" class="text-center align-middle">Category</th>
                                        <th colspan="3">FY 2022 - 23</th>
                                        <th colspan="3">FY 2021 - 22</th>
                                    </tr>
                                    <tr>
                                        <th>Total employees/workers in respective category (A)</th>
                                        <th>No. of employees/workers in respective category, who are part of association(s) or union (B)</th>
                                        <th>%(B/A)</th>
                                        <th>Total employees/workers in respective category (A)</th>
                                        <th>No. of employees/workers in respective category, who are part of association(s) or union (B)</th>
                                        <th>%(B/A)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Total Permanent Employees</th>
                                        <td>449</td>
                                        <td>0</td>
                                        <td>0%</td>
                                        <td>460</td>
                                        <td>0</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <td>- Male</td>
                                        <td>426</td>
                                        <td>0</td>
                                        <td>0%</td>
                                        <td>43`</td>
                                        <td>0</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <td>- Female</td>
                                        <td>23</td>
                                        <td>0</td>
                                        <td>0%</td>
                                        <td>29</td>
                                        <td>0</td>
                                        <td>0%</td>
                                    </tr>
                                    <tr>
                                        <th>Total Permanent Workers</th>
                                        <td>88</td>
                                        <td>88</td>
                                        <td>100%</td>
                                        <td>88</td>
                                        <td>88</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>- Male</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>100%</td>
                                        <td>87</td>
                                        <td>87</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>- Female</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>100%</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>100%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- principle 3 table 6 -->
                    <div class="principle-3-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">8. Details of training given to employees and workers:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th rowspan="3" class="align-middle">Category</th>
                                        <th colspan="5">FY 2022-2023</th>
                                        <th colspan="5">FY 2021-2022</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" class="text-center align-middle">Total (A)</th>
                                        <th colspan="2">On Health and Safety measures</th>
                                        <th colspan="2">On skill Upgradation</th>
                                        <th rowspan="2" class="text-center align-middle">Total (D)</th>
                                        <th colspan="2">On Health and Safety measures</th>
                                        <th colspan="2">On skill Upgradation</th>
                                    </tr>
                                    <tr>
                                        <th>No. (B)</th>
                                        <th>% (B/A)</th>
                                        <th>No. (C)</th>
                                        <th>% (C/A)</th>
                                        <th>No. (E)</th>
                                        <th>% (E/A)</th>
                                        <th>No. (F)</th>
                                        <th>% (F/A)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="11" class="text-center">Employees</th>
                                    </tr>
                                    <tr>
                                        <td>Male</td>
                                        <td>549</td>
                                        <td>62</td>
                                        <td>11</td>
                                        <td>527</td>
                                        <td>96</td>
                                        <td>617</td>
                                        <td>43</td>
                                        <td>7</td>
                                        <td>588</td>
                                        <td>95</td>
                                    </tr>
                                    <tr>
                                        <td>Female</td>
                                        <td>26</td>
                                        <td>22</td>
                                        <td>85</td>
                                        <td>15</td>
                                        <td>58</td>
                                        <td>30</td>
                                        <td>24</td>
                                        <td>80</td>
                                        <td>12</td>
                                        <td>40</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th>575</th>
                                        <th>84</th>
                                        <th>96</th>
                                        <th>542</th>
                                        <th>154</th>
                                        <th>647</th>
                                        <th>67</th>
                                        <th>87</th>
                                        <th>600</th>
                                        <th>135</th>
                                    </tr>
                                    <tr>
                                        <th colspan="11" class="text-center">Workers</th>
                                    </tr>
                                    <tr>
                                        <td>Male</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Female</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 3 table 5 -->
                    <div class="principle-3-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">9. Details of performance and career development reviews of employees and worker:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" class="text-center align-middle">Category</th>
                                        <th colspan="3">FY 2022 - 23</th>
                                        <th colspan="3">FY 2021 - 22</th>
                                    </tr>
                                    <tr>
                                        <th>Total(A)</th>
                                        <th>No.(B)</th>
                                        <th>%(B/A)</th>
                                        <th>Total(C)</th>
                                        <th>No.(D)</th>
                                        <th>%(D/C)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <th class="text-center" colspan="12">Employees</th>
                                    <tr>
                                        <td>Male</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Female</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <th class="text-center" colspan="12">Workers</th>
                                    <tr>
                                        <td>Male</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Female</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-3 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary fw-bold pb-3">10. Health and safety management system:</h5>
                        <h5 class="card-subtitle text-secondary fw-bold">a). Whether an occupational health and safety management system has been implemented
                            by the entity? (Yes/ No). If yes, the coverage such system?
                        </h5>
                        <p class="fw-normal ps-2 pt-2 mb-0">Yes</p>
                        <p class="fw-normal ps-2 pb-2">Safety Committee formed and safety regulations followed as per the committee recommendations.</p>
                        <!-- b -->
                        <h5 class="card-subtitle text-secondary fw-bold">b). What are the processes used to identify work-related hazards and assess risks on a
                            routine and non-routine basis by the entity?
                        </h5>
                        <p class="fw-normal ps-2 pt-2 pb-2">Safety audit conducted by the safety committee members once in 3 months and committee will find out risk and rectify the same.</p>
                        <!-- c -->
                        <h5 class="card-subtitle text-secondary fw-bold">c). Whether you have processes for workers to report the work related hazards and to
                            remove themselves from such risks. (Y/N).
                        </h5>
                        <p class="fw-normal ps-2 pt-2 mb-0">Yes</p>
                        <p class="fw-normal ps-2 pb-2">Workers will discuss the risk with committee and Safety committee will rectify the major risk immediately as advice of management.</p>
                        <!-- d -->
                        <h5 class="card-subtitle text-secondary fw-bold">d). Do the employees/ worker of the entity have access to non-occupational medical and
                            healthcare services? (Yes/ No).
                        </h5>
                        <p class="fw-normal ps-2 pt-2 mb-0">Yes</p>
                        <p class="fw-normal ps-2 pb-2">Company has tie up with the third party insurance for all the employees.</p>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 3 table 6 -->
                    <div class="principle-3-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">11. Details of safety related incidents.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>Safety incident/ Number</th>
                                        <th>Category</th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="2">Lost Time Injury Frequency Rate (LTIFR)(per one million-person hours worked)</td>
                                        <td>Employees</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                    <tr>
                                        <td>Employees</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">Total recordable work-related injuries</td>
                                        <td>Employees</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                    <tr>
                                        <td>Employees</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">Number of fatalities</td>
                                        <td>Employees</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                    <tr>
                                        <td>Employees</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">High consequence work-related injury or ill-health (excluding fatalities)</td>
                                        <td>Employees</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                    <tr>
                                        <td>Employees</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-3 mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary fw-bold">12. Describe the measures taken by the entity to ensure a safe and healthy work place.
                        </h5>
                        <p class="fw-normal ps-2 pt-1 pb-2">Safety audit conducted by the safety committee members and necessary action taken within timeline to ensure the safety of the employees. All the hazard risk are taken to management notice and the action taken in priority.</p>
                        <p>&nbsp;</p>
                    </div>
                    <!-- principle 3 table 7 -->
                    <div class="principle-3-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">13. Number of Complaints on the following made by employees and workers:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2"></th>
                                        <th colspan="3">FY 2022 - 23</th>
                                        <th colspan="3">FY 2021 - 22</th>
                                    </tr>
                                    <tr>
                                        <th>Filled during the year</th>
                                        <th>Pending resolution at the end of year</th>
                                        <th class="text-center align-middle">Remarks</th>
                                        <th>Filled during the year</th>
                                        <th>Pending resolution at the end of year</th>
                                        <th class="text-center align-middle">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Working Conditions</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Health & Safety</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 3 table 8 -->
                    <div class="principle-3-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">14. Assessments for the year</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th></th>
                                        <th>% of your plants and offices that were assessed (by entity or statutory authorities or third parties)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Health and safety practices</td>
                                        <td>100%. Once in 6 months</td>
                                    </tr>
                                    <tr>
                                        <td>Working conditions</td>
                                        <td>100%. Once in a year and whenever new machines are brought into the workplace</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-3 mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary fw-bold">15. Provide details of any corrective action taken or underway to address safety-related incidents (if any) and on significant risks / concerns arising from assessments of health & safety practices and working conditions.</h5>
                        <p class="fw-normal ps-2 pt-1">1. Weak & Damages in compound wall premises replaced and strengthened.</p>
                        <p class="fw-normal ps-2">2. Concrete manhole replaced inside the premises around the drainage area. </p>
                    </div>
                    <span class="badge badge-light-primary mt-2 fs-4">Leadership Indicator</span>
                    <!-- principle 3 table 7 -->
                    <div class="principle-3 mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Does the entity extend any life insurance or any compensatory package in the event of
                            death of (A) Employees (Y/N) (B) Workers (Y/N).
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>(a)</td>
                                        <td>Employees</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>(b)</td>
                                        <td>Workers</td>
                                        <td>Yes</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- question -->
                    <div class="principle-3 mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary fw-bold">2. Provide the measures undertaken by the entity to ensure that statutory dues have been
                            deducted and deposited by the value chain partners.
                        </h5>
                        <p class="fw-normal ps-2 pt-1">We have an application for statutory payment which triggers complied status and that shall ensure the dues has been deducted by the value chain partners</p>
                        <p class="fw-normal ps-2 pt-5 pb-5">&nbsp;</p>
                    </div>
                    <!-- principle 3 table 7 -->
                    <div class="principle-3-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">3. Provide the number of employees / workers having suffered high consequence workrelated injury / ill-health / fatalities (as reported in Q11 of Essential Indicators above), who have been are rehabilitated and placed in suitable employment or whose family members have been placed in suitable employment:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th colspan="2">Total number of affected employees/ workers</th>
                                        <th colspan="2">No. of employees/workers that are rehabilitated and placed in suitable employment or whose family members have been placed in suitable employment</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Employees</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                    <tr>
                                        <td>Workers</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                        <td>NIL</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-3 mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary fw-bold">4. Does the entity provide transition assistance programs to facilitate continued employability and the management of career endings resulting from retirement or termination of employment? (Yes/ No)</h5>
                        <p class="fw-normal ps-2 pt-1">No</p>
                        <p class="fw-normal ps-2 pt-5 pb-5">&nbsp;</p>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 3 table 7 -->
                    <div class="principle-3-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">5. Details on assessment of value chain partners:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>% of value chain partners that were assessed (by value of business done with such partners)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Health and safety practices </td>
                                        <td>NIL</td>
                                    </tr>
                                    <tr>
                                        <td>Working conditions</td>
                                        <td>NIL</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-3 mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary fw-bold">6. Provide details of any corrective actions taken or underway to address significant risks /concerns arising from assessments of health and safety practices and working conditions of value chain partners.</h5>
                        <p class="fw-normal ps-2 pt-1 mb-0">1. Weak & Damages in compound wall premises replaced and strengthened. </p>
                        <p class="fw-normal ps-2 pb-2">2. Concrete manhole replaced inside the premises around the drainage area.</p>
                    </div>
                </div>
            </div>
            <!-- Principle 4 -->
            <div class="card">
                <div class="card-header pb-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="header-cell pt-1">PRINCIPLE 4</th>
                                    <td>Businesses should respect the interests of and be responsive to all its stakeholders.</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <span class="badge badge-light-success mt-2 fs-4">Essential Indicator</span>
                    <!-- question -->
                    <div class="principle-4 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary fw-bold">1. Describe the processes for identifying key stakeholder groups of the entity.</h5>
                        <p class="fw-normal mb-0 pt-2 pe-3 ps-3">At Amrutanjan, a stakeholder is any person, organisation, community, or institution that either impact its operations/brand perception or getting impacted by its business. To understand stakeholders' needs and expectations and establish sustainable short-, medium-, and long-term strategies, Amrutanjan collaborates with a wide range of stakeholders. Amrutanjan believes that business risks and opportunities can be managed only through continuous involvement with all its stakeholders.The company's management, business, and functional heads identify the key stakeholders with respect to their level and area of operations, which include investors, shareholders, customers, business partners (including suppliers, service providers, and distributors), employees and workers, regulatory bodies, trade bodies, and other organisations, as well as the local community. </p>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 4 table 1 -->
                    <div class="principle-4-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. List stakeholder groups identified as key for your entity and the frequency of
                            engagement with each stakeholder group.
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Stakeholder Group</th>
                                        <th>Whether identified as Vulnerable & Marginalized Group (Yes/ No)</th>
                                        <th>Channels of communication
                                            <span style="font-weight: normal;">
                                                (Email, SMS, Newspaper, Pamphlets, Advertisement, Community Meetings, Notice Board, Website, Other)
                                            </span>
                                        </th>
                                        <th>Frequency of engagement
                                            <span style="font-weight: normal;">
                                                (Annually/Half-yearly/Quarterly/ Other)
                                            </span>
                                        </th>
                                        <th>Purpose and scope of engagement including key topics and concern raised during such engagement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Investor</td>
                                        <td>No</td>
                                        <td>Newspapers/ Email/Advertisement / Website</td>
                                        <td>Quarterly, Half yearly and Annually</td>
                                        <td>To explain business highlights & performance</td>
                                    </tr>
                                    <tr>
                                        <td>Shareholders</td>
                                        <td>No</td>
                                        <td>Newspapers/ Email/Advertisement / Website</td>
                                        <td>Quarterly, Half yearly and Annually</td>
                                        <td>To explain business highlights & performance</td>
                                    </tr>
                                    <tr>
                                        <td>Customers</td>
                                        <td>No</td>
                                        <td>Newspapers,Advertisement,Website,Pamphlets</td>
                                        <td>Throughout the year</td>
                                        <td>To create customer awareness of brand and product ranges</td>
                                    </tr>
                                    <tr>
                                        <td>Business partners(including suppliers, service providers, and distributors)</td>
                                        <td>No</td>
                                        <td>Email, SMS, Pamphlet</td>
                                        <td>Throughout the year</td>
                                        <td>To address their concerns, grievances and to get feedback</td>
                                    </tr>
                                    <tr>
                                        <td>Employees and workers</td>
                                        <td>No</td>
                                        <td>Email, Meetings, Notice Board</td>
                                        <td>Throughout the year</td>
                                        <td>To achieve employee engagement, train and motivate to attain organisational goals</td>
                                    </tr>
                                    <tr>
                                        <td>Regulatory bodies</td>
                                        <td>No</td>
                                        <td>Email, Disclosures through Filings, Returns</td>
                                        <td>As required from time to time</td>
                                        <td>To provide information & disclosures as required under the Regulations and to respond to their queries</td>
                                    </tr>
                                    <tr>
                                        <td>Trade bodies and other organisation</td>
                                        <td>No</td>
                                        <td>Email, Notice Board,Meetings</td>
                                        <td>As required from time to time</td>
                                        <td>To maintain cordial relationships and to discuss on labour welfare</td>
                                    </tr>
                                    <tr>
                                        <td>Local community</td>
                                        <td>No</td>
                                        <td>Community Meetings, Notice Board</td>
                                        <td>As required from time to time</td>
                                        <td>To engage them in our operations or support them on their basic needs</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <span class="badge badge-light-primary mt-2 fs-4">Leadership Indicator</span>
                    <!-- question -->
                    <div class="principle-4 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary fw-bold">1. Provide the processes for consultation between stakeholders and the Board on economic, environmental, and social topics or if consultation is delegated, how is feedback from such consultations provided to the Board.</h5>
                        <p class="fw-normal mb-0 pt-2 pe-2 ps-2">The management has formed a core group of top executives of the Company (ESG Committee) which meets as frequently as necessary to discuss the environment, health and safety matters impacting our business operations and provide recommendations to the management. Basis the recommendations, the management takes decisions to make investment or improvement in the process which would support maintaining the environmental and safety standards within the organisation.</p>
                    </div>
                    <!-- question -->
                    <div class="principle-4 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary fw-bold">2. Whether stakeholder consultation is used to support the identification and management of environmental, and social topics (Yes / No). If so, provide details of instances as to how the inputs received from stakeholders on these topics were incorporated into policies and activities of the entity.</h5>
                        <p class="fw-normal mb-0 pt-2 ps-2">No</p>
                        <p class="fw-normal mb-0 ps-2">Based on the recommendations of ESG Committee, more processes have been automated that has resulted in less paper work. Installation of solar panels have been completed at the Corporate Office in Chennai. </p>
                    </div>
                    <!-- question -->
                    <div class="principle-4 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary fw-bold">3. Provide details of instances of engagement with, and actions taken to, address the concerns of vulnerable/ marginalized stakeholder groups.</h5>
                        <p class="fw-normal mb-0 pt-2 ps-2">No such major concerns have been received during the year</p>
                    </div>
                </div>
            </div>
            <!-- Principle 5 -->
            <div class="card">
                <div class="card-header pb-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="header-cell pt-1">PRINCIPLE 5</th>
                                    <td>Businesses should respect and promote human rights.</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <span class="badge badge-light-success mt-2 fs-4">Essential Indicator</span>
                    <!-- principle 5 table 1 -->
                    <div class="principle-5-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Employees and workers who have been provided training on human rights issues and
                            policy(ies) of the entity, in the following format:
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2" class="text-center align-middle">Category</th>
                                        <th colspan="3">FY 2022 - 23</th>
                                        <th colspan="3">FY 2021 - 22</th>
                                    </tr>
                                    <tr>
                                        <th>Total(A)</th>
                                        <th>No. of employees/workers (B)</th>
                                        <th>%(B/A)</th>
                                        <th>No. of employees/workers (D)</th>
                                        <th>No.(D)</th>
                                        <th>%(D/C)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-center" colspan="12">Employees</th>
                                    </tr>
                                    <tr>
                                        <td>Permanent</td>
                                        <td>575</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>647</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Other than Permanent</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total Employees</th>
                                        <th>575</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>647</th>
                                        <th>0</th>
                                        <th>0</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center" colspan="12">Workers</th>
                                    </tr>
                                    <tr>
                                        <td>Permanent</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Other than Permanent</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total Workers</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>0</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- principle 5 table 2 -->
                    <div class="principle-5-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. Details of minimum wages paid to employees and workers.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th rowspan="3" class="align-middle">Category</th>
                                        <th colspan="5">FY 2022-2023</th>
                                        <th colspan="5">FY 2021-2022</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" class="text-center align-middle">Total (A)</th>
                                        <th colspan="2">Equal to minimum wage</th>
                                        <th colspan="2">More than minimum wage </th>
                                        <th rowspan="2" class="text-center align-middle">Total (D)</th>
                                        <th colspan="2">Equal to minimum wage</th>
                                        <th colspan="2">More than minimum wage </th>
                                    </tr>
                                    <tr>
                                        <th>No. (B)</th>
                                        <th>% (B/A)</th>
                                        <th>No. (C)</th>
                                        <th>% (C/A)</th>
                                        <th>No. (E)</th>
                                        <th>% (E/A)</th>
                                        <th>No. (F)</th>
                                        <th>% (F/A)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="11" class="text-center">Employees</th>
                                    </tr>
                                    <tr>
                                        <td>Male</td>
                                        <td>426</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>426</td>
                                        <td>100%</td>
                                        <td>43`</td>
                                        <td>0</td>
                                        <td>0%</td>
                                        <td>43`</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Female</td>
                                        <td>23</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>23</td>
                                        <td>100%</td>
                                        <td>29</td>
                                        <td>0</td>
                                        <td>0%</td>
                                        <td>29</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th>449</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>449</h>
                                        <th>100%</th>
                                        <th>460</th>
                                        <th>0</th>
                                        <th>0%</th>
                                        <th>460</th>
                                        <th>100%</th>
                                    </tr>
                                    <tr>
                                        <th colspan="11" class="text-center">Workers</th>
                                    </tr>
                                    <tr>
                                        <td>Male</td>
                                        <td>87</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>87</td>
                                        <td>100%</td>
                                        <td>87</td>
                                        <td>0</td>
                                        <td>0%</td>
                                        <td>87</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Female</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>1</td>
                                        <td>100%</td>
                                        <td>29</td>
                                        <td>0</td>
                                        <td>0%</td>
                                        <td>1</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th>88</th>
                                        <th>0</th>
                                        <th>0</th>
                                        <th>88</h>
                                        <th>100%</th>
                                        <th>88</th>
                                        <th>0</th>
                                        <th>0%</th>
                                        <th>88</th>
                                        <th>100%</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 5 table 2 -->
                    <div class="principle-5-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">3. Details of remuneration/salary/wages, in the following format:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th rowspan="2" class="align-middle">Category</th>
                                        <th colspan="2">Male</th>
                                        <th colspan="2">Female</th>
                                    </tr>
                                    <tr>
                                        <th>Number</th>
                                        <th>Median remuneration/ salary/wages of respective category</th>
                                        <th>Number</th>
                                        <th>Median remuneration/ salary/wages of respective category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Board of Directors</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Key Management Personnel</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Employees other than BoD and KMPs</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Workers</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-5 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">4. Do you have a focal point (Individual/ Committee) responsible for addressing human
                            rights impacts or issues caused or contributed to by the business? (Yes/No)
                        </h5>
                        <p class="fw-normal p-3 pt-1">No</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-5 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">5. Describe the internal mechanisms in place to redress grievances related to human rights
                            issues.
                        </h5>
                        <p class="fw-normal p-3 pt-1">No internal mechanism is in place as of now. However, the company is in the process of implementing a human rights redressal mechanism.</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 5 table 1 -->
                    <div class="principle-5-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">6. Number of complaints on the following made by employees and workers.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="2"></th>
                                        <th colspan="3">FY 2022 - 23</th>
                                        <th colspan="3">FY 2021 - 22</th>
                                    </tr>
                                    <tr>
                                        <th>Filled during the year</th>
                                        <th>Pending resolution at the end of year</th>
                                        <th>Remarks</th>
                                        <th>Filled during the year</th>
                                        <th>Pending resolution at the end of year</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sexual Harassment</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>No complaints</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>No complaints</td>
                                    </tr>
                                    <tr>
                                        <td>Discrimination at workplace </td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>No complaints</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>No complaints</td>
                                    </tr>
                                    <tr>
                                        <td>Child Labour</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>No complaints</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>No complaints</td>
                                    </tr>
                                    <tr>
                                        <td>Forced Labour/Involuntary Labour</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>No complaints</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>No complaints</td>
                                    </tr>
                                    <tr>
                                        <td>Wages</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>No complaints</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>No complaints</td>
                                    </tr>
                                    <tr>
                                        <td>Other human rights related issues</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>No complaints</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>No complaints</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-5 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">7. Mechanisms to prevent adverse consequences to the complainant in discrimination and
                            harassment cases.
                        </h5>
                        <p class="fw-normal ps-3 pt-1">We have been conducting sexual harassment trainings for creating awareness and we also have
                            Internal committee for redressing any complaints on sexual harassement
                        </p>
                        <p class="fw-normal pb-5">&nbsp;</p>
                    </div>
                    <!-- divider -->
                    <hr>
                    <!-- question -->
                    <div class="principle-5 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">8. Do human rights requirements form part of your business agreements and contracts?
                            (Yes/No)
                        </h5>
                        <p class="fw-normal ps-3 pt-1 pb-0 mb-0">No</p>
                        <p class="fw-normal ps-3 pb-5">We have human rights requirements as part of the man-power supply contracts. We are also in process of including human rights requirements as part of all business agreements and contracts</p>
                    </div>
                    <!-- principle 5 table 1 -->
                    <div class="principle-5-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">9 Assessment of the year.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th></th>
                                        <th>% of your plant and offices that were assessed (by entity or statutory authorities or third parties)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sexual Harassment</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Discrimination at workplace </td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Child Labour</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Forced Labour/Involuntary Labour</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Wages</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Other human rights related issues</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-5 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">10. Provide details of any corrective actions taken or underway to address significant risks /
                            concerns arising from the assessments at Question 9 above.
                        </h5>
                        <p class="fw-normal ps-3 pt-1 pb-5">No significant risks were identified in any of our plants and offices that required corrective actions.</p>
                    </div>
                    <span class="badge badge-light-success mt-2 fs-4">Leadership Indicator</span>
                    <!-- question -->
                    <div class="principle-5 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Details of a business process being modified / introduced as a result of addressing human rights grievances/complaints.</h5>
                        <p class="fw-normal ps-3 pt-1 pb-5">Not applicable. No such situation had arised</p>
                    </div>
                    <!-- question -->
                    <div class="principle-5 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. Details of the scope and coverage of any Human rights due-diligence conducted.</h5>
                        <p class="fw-normal ps-3 pt-1 pb-5">We have not received any human rights related complaints either from employees or visitors and in future if we receive any complaints it will be dealt with as per the Laws of the land.</p>
                    </div>
                    <!-- question -->
                    <div class="principle-5 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">3. Is the premise/office of the entity accessible to differently abled visitors, as per the requirements of the Rights of Persons with Disabilities Act, 2016?</h5>
                        <p class="fw-normal ps-3 pt-1 pb-5">Currently we have only staircase for accessibility. We are going to renovate our second floor and we have planned elevators/lifts at that point of time</p>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 5 table 2-->
                    <div class="principle-5-tables mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">4. Details on assessment of value chain partners:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th></th>
                                        <th>% of value chain partners that were assessed (by value of business done with such partners)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sexual Harassment</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Discrimination at workplace </td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Child Labour</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Forced Labour/Involuntary Labour</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Wages</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Other human rights related issues</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-5 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">5. Provide details of any corrective actions taken or underway to address significant risks /concerns arising from the assessments at Question 4 above.</h5>
                        <p class="fw-normal ps-3 pt-1 pb-5">For sexual harassment we have an Internal committee and we have been giving the mandatory trainings related to POSH to create awarenes among all employees. We have our code of conduct which gives insights on discrimiation at workplace. We do not engage any employee/traines who are less than 18 years.</p>
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
            <!-- Principle 6 -->
            <div class="card">
                <div class="card-header pb-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="header-cell pt-1">PRINCIPLE 6</th>
                                    <td>Businesses should respect and make effort to protect and restore the environment</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <span class="badge badge-light-success mt-2 fs-4">Essential Indicator</span>
                    <!-- principle 6 table 1 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Employees and workers who have been provided training on human rights issues and
                            policy(ies) of the entity, in the following format:
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Unit</th>
                                        <th class="light-blue-column">FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Total electricity consumption(Grid + DG Set) (A) </td>
                                        <td>MJ</td>
                                        <td class="light-blue-column text-right pe-1">5096768.4</td>
                                        <td class="text-right pe-1">4750642.8</td>
                                    </tr>
                                    <tr>
                                        <td>Total fuel consumption (B)</td>
                                        <td>MJ</td>
                                        <td class="light-blue-column text-right pe-1">4779564.24</td>
                                        <td class="text-right pe-1">4779564.24</td>
                                    </tr>
                                    <tr>
                                        <td>Energy consumption through other sources (C)</td>
                                        <td>MJ</td>
                                        <td class="light-blue-column text-right pe-1">86,07,335.73</td>
                                        <td class="text-right pe-1">7321666.53</td>
                                    </tr>
                                    <tr>
                                        <th>Total energy consumption (A + B + C)</th>
                                        <td>MJ</td>
                                        <td class="light-blue-column text-right pe-1">1,84,83,668.37</td>
                                        <td class="text-right pe-1">1,68,51,873.57</td>
                                    </tr>
                                    <tr>
                                        <th>Energy intensity per rupee of turnover
                                            <span style="font-weight: normal;">
                                                (Total energy consumption/ Turnover in rupees)
                                            </span>
                                        </th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Energy intensity (Optional) -
                                            <span style="font-weight: normal;">
                                                the relevant metric may be selected by the entity
                                            </span>
                                        </th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">Indicate if any independent assessment/ evaluation/assurance has been carried out by an external agency? (Y/N) If yes, name of the external agency.</h5>
                        <p class="fw-normal pb-5 pt-1">No</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. Does the entity have any sites / facilities identified as designated consumers (DCs) under the Performance, Achieve and Trade (PAT) Scheme of the Government of India? (Y/N) If yes, disclose whether targets set under the PAT scheme have been achieved. In case targets have not been achieved, provide the remedial action taken, if any.</h5>
                        <p class="fw-normal pb-5 pt-1">No</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 6 table 2 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">3. Provide details of the following disclosures related to water.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Parameter</th>
                                        <th></th>
                                        <th class="align-middle">Unit</th>
                                        <th class="light-blue-column">FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="10">Water Withdrawal by source</th>
                                    </tr>
                                    <tr>
                                        <td>(i) Surface Water</td>
                                        <td></td>
                                        <td>KL</td>
                                        <td class="light-blue-column text-right"></td>
                                        <td class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <td>(ii) GroundWater</td>
                                        <td></td>
                                        <td>KL</td>
                                        <td class="light-blue-column text-right">24,075.00</td>
                                        <td class="text-right">20650</td>
                                    </tr>
                                    <tr>
                                        <td>(iii) Third party Water</td>
                                        <td></td>
                                        <td>KL</td>
                                        <td class="light-blue-column text-right">7,742.00</td>
                                        <td class="text-right">7424</td>
                                    </tr>
                                    <tr>
                                        <td>(iv) Sea Water/ Desalinated Water</td>
                                        <td></td>
                                        <td>KL</td>
                                        <td class="light-blue-column text-right"></td>
                                        <td class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <td>(v) Others</td>
                                        <td></td>
                                        <td>KL</td>
                                        <td class="light-blue-column text-right"></td>
                                        <td class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <th>Total volume of water withdrawal(i + ii + iii + iv + v) </th>
                                        <td></td>
                                        <td>KL</td>
                                        <td class="light-blue-column text-right">31,817.00</td>
                                        <th class="text-right">28,074.00</th>
                                    </tr>
                                    <tr>
                                        <th>Total volume of water consumption</th>
                                        <td></td>
                                        <td>KL</td>
                                        <td class="light-blue-column text-right">31,817.00</td>
                                        <th class="text-right">28074</th>
                                    </tr>
                                    <tr>
                                        <th>Water intensity per rupee of turnover
                                            <span style="font-weight: normal;">
                                                (Total water consumption/ Turnover in rupees)
                                            </span>
                                        </th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Water intensity (Optional) -
                                            <span style="font-weight: normal;">
                                                the relevant metric may be selected by the entity
                                            </span>
                                        </th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">Indicate if any independent assessment/ evaluation/assurance has been carried out by an external agency? (Y/N) If yes, name of the external agency.</h5>
                        <p class="fw-normal pb-5 pt-1">No</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">4. Has the entity implemented a mechanism for Zero Liquid Discharge? If yes, provide details of its coverage and implementation.</h5>
                        <p class="fw-normal pb-5 pt-1">No</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 6 table 3 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">5. Please provide details of air emissions (other than GHG emissions) by the entity, in the
                            following format:
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Unit</th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>NOx</td>
                                        <td>ppm</td>
                                        <td>13</td>
                                        <td>14</td>
                                    </tr>
                                    <tr>
                                        <td>SOx</td>
                                        <td>ppm</td>
                                        <td>9</td>
                                        <td>8</td>
                                    </tr>
                                    <tr>
                                        <td>Particulate matter (PM) </td>
                                        <td>mg/Nm3</td>
                                        <td>61</td>
                                        <td>57</td>
                                    </tr>
                                    <tr>
                                        <td>Persistent organic pollutants (POP)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Volatile organic compounds (VOC)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Hazardous air pollutants (HAP)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Others</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">Indicate if any independent assessment/ evaluation/assurance has been carried out by an external agency? (Y/N) If yes, name of the external agency.</h5>
                        <p class="fw-normal pb-5 pt-1">No</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- principle 6 table 4 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">6. Provide details of greenhouse gas emissions (Scope 1 and Scope 2 emissions) & its intensity.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Unit</th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Total Scope 1 emissions -<br>
                                            <span style="font-weight: normal;">
                                                (Break-up of the GHG into CO2, CH₄,N₂O, HFCs, PFCs, SF6, NF3, if available)
                                            </span>
                                        </th>
                                        <td>Mt CO2e</td>
                                        <td>1084</td>
                                        <td>939</td>
                                    </tr>
                                    <tr>
                                        <th>Total Scope 1 emissions -<br>
                                            <span style="font-weight: normal;">
                                                (Break-up of the GHG into CO2, CH₄,N₂O, HFCs, PFCs, SF6, NF3, if available)
                                            </span>
                                        </th>
                                        <td>Mt CO2e</td>
                                        <td>958</td>
                                        <td>899</td>
                                    </tr>
                                    <tr>
                                        <th>Total Scope 1 and Scope 2 emissions per rupee turnover
                                            <span style="font-weight: normal;">
                                                (Total Scope 1 and Scope 2 emissions / Turnover in rupees)
                                            </span>
                                        </th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total Scope 1 and Scope 2 emissions intensity (Optional) -
                                            <span style="font-weight: normal;">
                                                the relevant metric may be selected by the entity
                                            </span>
                                        </th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">Indicate if any independent assessment/ evaluation/assurance has been carried out by an external agency? (Y/N) If yes, name of the external agency.</h5>
                        <p class="fw-normal pb-5 pt-1">No</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- divider -->
                    <hr>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">7. Does the entity have any project related to reducing Green House Gas emission? If Yes, then
                            provide details.
                        </h5>
                        <p class="fw-normal pb-0 mb-0 pt-1">Yes</p>
                        <p class="fw-normal pb-5" style="height: 200px;">Retrofit emission control device to be fixed in our DG Genset (Work in Progress).</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- divider -->
                    <hr>
                    <!-- principle 6 table 5 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">8. Provide details related to waste management by the entity.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Unit</th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="10">Total waste generated</th>
                                    </tr>
                                    <tr>
                                        <td>Plastic waste (A) </td>
                                        <td>Mt</td>
                                        <td>269</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>E-waste (B)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Bio-medical waste (C)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Construction and demolition waste (D)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Battery waste (E)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Radioactive waste (F)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Other Hazardous waste (G)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Other Non-Hazardous waste (H)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total<br>(A + B + C + D + E + F + G + H)</th>
                                        <th>Mt</th>
                                        <th>269</th>
                                        <th>50</th>
                                    </tr>
                                    <tr>
                                        <th colspan="10">For each category of waste generated, total waste recovered through recycling, re-using or other recovery operations</th>
                                    </tr>
                                    <tr>
                                        <th colspan="10">Category of waste</th>
                                    </tr>
                                    <tr>
                                        <td>(i) Recycled</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(ii) Re-used</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(iii) Other recovery operations</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total (i + ii + iii)</th>
                                        <th></th>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <th colspan="10">For each category of waste generated, total waste disposed by nature of disposal method</th>
                                    </tr>
                                    <tr>
                                        <th colspan="10">Category of waste</th>
                                    </tr>
                                    <tr>
                                        <td>(i) Incineration</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(ii) Landfilling</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(iii) Other disposal operations</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total (i + ii + iii)</th>
                                        <th></th>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">Indicate if any independent assessment/ evaluation/assurance has been carried out by an external agency? (Y/N) If yes, name of the external agency.</h5>
                        <p class="fw-normal pb-5">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">9. Briefly describe the waste management practices adopted in your establishments. Describe the strategy adopted by your company to reduce usage of hazardous and toxic chemicals in your products and processes and the practices adopted to manage such wastes.</h5>
                        <p class="fw-normal pb-5 ps-3">No hazardous and toxic chemicals used in our processes. Plastic wastes given to authorized Pollution control board vendor for recycling. EPR registration is under process.</p>
                        <p class="fw-normal pb-5">&nbsp;</p>
                    </div>
                    <!-- principle 6 table 6 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">10. If the entity has operations/offices in/around ecologically sensitive areas (such as national parks, wildlife sanctuaries, biosphere reserves, wetlands, biodiversity hotspots, forests, coastal regulation zones etc.) where environmental approvals / clearances are required, please specify details in the following format:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No </th>
                                        <th>Location of operations/ offices</th>
                                        <th>Types of operations</th>
                                        <th>Whether the conditions of environmental approval / clearance are being complied with? (Y/N) If no, the reasons thereof and corrective action taken, if any</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>SIDCO Industrial Estate</td>
                                        <td>Pharmaceuticals</td>
                                        <td>Yes.<br> Once in two years air monitoring test is done through Pollution Control Board.ETP plant treated water used for gardening purpose</td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>Corporate office is at Mylapore</td>
                                        <td>Office</td>
                                        <td>No.<br>RECD to be fixed in the Genset.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider -->
                    <hr>
                    <!-- principle 6 table 7 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">11. Details of Environmental Impact Assessments (EIA) of projects undertaken by the entity based on applicable laws, in the current financial year:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name and brief details of project</th>
                                        <th>EIA notification number</th>
                                        <th>Date of notification</th>
                                        <th>Whether conducted by independent external agency(Yes/ No)</th>
                                        <th>Results communicated in public domain(Yes/ No)</th>
                                        <th>Relevant Web link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>No new project undertaken in the current year</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- principle 6 table 8 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">12. Is the entity compliant with the applicable environmental law/ regulations/ guidelines in India; such as the Water (Prevention and Control of Pollution) Act, Air (Prevention and Control of Pollution) Act, Environment protection act and rules thereunder (Y/N). If not, provide details of all such non-compliances.</h5>
                        <p class="fw-normal pb-5 ps-3">Yes.</p>
                        <p class="fw-normal pb-5">Amrutanjan complies with all applicable laws, regulations and guidelines.</p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="align-middle">S.No</th>
                                        <th class="align-middle">Specify the law/ regulation/guidelines which was not compiled with</th>
                                        <th class="align-middle">Provide details of the non-compliance</th>
                                        <th class="align-middle">Any fines / penalties / action taken by regulatory agencies such as pollution control boards or by courts</th>
                                        <th class="align-middle">Corrective action taken</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>NA</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider -->
                    <hr>
                    <span class="badge badge-light-primary mt-2 fs-4">Leadership Indicator</span>
                    <!-- principle 6 table 9 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Provide break-up of the total energy consumed from renewable and non-renewable sources.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Unit</th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="10">From renewable sources</th>
                                    </tr>
                                    <tr>
                                        <td>Total electricity consumption (A)</td>
                                        <td>MJ</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Total fuel consumption (B)</td>
                                        <td>MJ</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Energy consumption through other sources (C) </td>
                                        <td>MJ</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <th>Total energy consumed from renewable sources (A + B + C)</th>
                                        <th>Mt</th>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <th colspan="10">From non-renewable sources</th>
                                    </tr>
                                    <tr>
                                        <td>Total electricity consumption (D)</td>
                                        <td>MJ</td>
                                        <td>5096768.4</td>
                                        <td>4750642.8</td>
                                    </tr>
                                    <tr>
                                        <td>Total fuel consumption (E)</td>
                                        <td>MJ</td>
                                        <td>4779564.24</td>
                                        <td>4779564.24</td>
                                    </tr>
                                    <tr>
                                        <td>Energy consumption through other sources (F) </td>
                                        <td>MJ</td>
                                        <td>86,07,335.73</td>
                                        <td>7321666.53</td>
                                    </tr>
                                    <tr>
                                        <th>Total energy consumed from non-renewable sources (D + E + F)</th>
                                        <th>Mt</th>
                                        <th>18483668.37</th>
                                        <th>16851873.57</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">Indicate if any independent assessment/ evaluation/assurance has been carried out by an external agency? (Y/N) If yes, name of the external agency.</h5>
                        <p class="fw-normal pb-5 ps-3">No</p>
                        <p class="fw-normal pb-5">&nbsp;</p>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 6 table 10 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. Provide the following details related to water discharge.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Unit</th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="10">Water discharge by destination and level of treatment</th>
                                    </tr>
                                    <tr>
                                        <td>(i) To Surface Water</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; No treatment</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; With treatment (Specify level of treatment)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(ii) To Groundwater</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; No treatment</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; With treatment (Specify level of treatment)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(iii) To Sea Water</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; No treatment</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; With treatment (Specify level of treatment)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(iv) Sent to third-parties</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; No treatment</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; With treatment (Specify level of treatment)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(v) Other</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; No treatment</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; With treatment (Specify level of treatment)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total water discharged</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">3. Water withdrawal, consumption and discharge in areas of water stress</h5>
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">For each facility/ plant located in areas of water stress:</h5>
                        <ol style="list-style-type: none;" class="fw-normal p-0 mb-0">
                            <li class="pb-2 fw-bold">(i) Name of the area:</li>
                            <li class="pb-2 fw-bold">(ii) Nature of operations:</li>
                            <li class="pb-2 fw-bold">(iii) Water withdrawal, consumption and discharge:</li>
                        </ol>
                    </div>
                    <!-- principle 6 table 11 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Unit</th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="10">Water withdrawal by source</th>
                                    </tr>
                                    <tr>
                                        <td>(i) To Surface Water</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(ii) To Groundwater</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(iii) Third party Water</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(iv) Sea Water/ Desalinated Water</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(v) Other</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total volume of water withdrawal(i + ii + iii + iv + v)</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total volume of water consumption</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Water intensity per rupee of turnover
                                            <span style="font-weight: normal;">
                                                (Total water consumption/ Turnover in rupees)
                                            </span>
                                        </th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Water intensity (Optional) -&nbsp;&nbsp;
                                            <span style="font-weight: normal;">
                                                the relevant metric may be selected by the entity
                                            </span>
                                        </th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider -->
                    <hr>
                    <!-- principle 6 table 12 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Unit</th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="10">Water discharge by destination and level of treatment</th>
                                    </tr>
                                    <tr>
                                        <td>(i) Intoo Surface Water</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; No treatment</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; With treatment (Specify level of treatment)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(ii) To Groundwater</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; No treatment</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; With treatment (Specify level of treatment)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(iii) To Sea Water</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; No treatment</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; With treatment (Specify level of treatment)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(iv) Sent to third-parties</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; No treatment</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; With treatment (Specify level of treatment)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>(v) Other</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; No treatment</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5"> -&nbsp;&nbsp; With treatment (Specify level of treatment)</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total water discharged</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">Indicate if any independent assessment/ evaluation/assurance has been carried out by an external agency? (Y/N) If yes, name of the external agency</h5>
                        <p>&nbsp;</p>
                    </div>
                    <!-- divider -->
                    <hr>
                    <!-- principle 6 table 13 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">4. Provide details of total Scope 3 emissions & its intensity.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Unit</th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Total Scope 3 emissions - <br>
                                            <span style="font-weight: normal;">
                                                (Break-up of the GHG into CO2, CH₄, N₂O, HFCs, PFCs, SF6 , NF3, if available)
                                            </span>
                                        </th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total Scope 3 emissions per rupee turnover
                                            <span style="font-weight: normal;">
                                                (Total Scope 3 emissions /Turnover in rupees)
                                            </span>
                                        </th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Total Scope 3 emissions intensity (Optional) -
                                            <span style="font-weight: normal;">
                                                - the relevant metric may be selected by the entity
                                            </span>
                                        </th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">Indicate if any independent assessment/ evaluation/assurance has been carried out by an external agency? (Y/N) If yes, name of the external agency.</h5>
                        <p class="fw-normal pb-5 ps-3"></p>
                        <p class="fw-normal pb-5">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">5. With respect to the ecologically sensitive areas reported at Question 10 of Essential Indicators above, provide details of significant direct & indirect impact of the entity on biodiversity in such areas along-with prevention and remediation activities.</h5>
                        <p class="fw-normal pb-5 ps-3"></p>
                        <p class="fw-normal pb-5">&nbsp;</p>
                    </div>
                    <!-- principle 6 table 14 -->
                    <div class="principle-6-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">6. If the entity has undertaken any specific initiatives or used innovative technology or solutions to improve resource efficiency, or reduce impact due to emissions / effluent discharge / waste generated, please provide details of the same as well as outcome of such initiatives.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Initiative undertake</th>
                                        <th>Details of initiative <br>(Web link if any, may be provided alongwith summary)</th>
                                        <th>Outcome of the initiative</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">7. Does the entity have a business continuity and disaster management plan? Give details in 100 words/ web link.</h5>
                        <p class="fw-normal pb-5 ps-3"></p>
                        <p class="fw-normal pb-5">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">8. Disclose any significant adverse impact to the environment, arising from the value chain of the entity. What mitigation or adaptation measures have been taken by the entity in this regard.</h5>
                        <p class="fw-normal pb-5 ps-3"></p>
                        <p class="fw-normal pb-5">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-6 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">9. Percentage of value chain partners (by value of business done with such partners) that were assessed for environmental impacts.</h5>
                        <p class="fw-normal pb-5 ps-3"></p>
                        <p class="fw-normal pb-5">&nbsp;</p>
                    </div>
                </div>
            </div>
            <!-- Principle 7 -->
            <div class="card">
                <div class="card-header pb-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="header-cell pt-2">PRINCIPLE 7</th>
                                    <td>Businesses, when engaging in influencing public and regulatory policy, should do so in a manner that is responsible and
                                        transparent.
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <span class="badge badge-light-success mt-2 fs-4">Essential Indicator</span>
                    <!-- question -->
                    <div class="principle-7 mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1.&nbsp;&nbsp; a. Number of affiliations with trade and industry chambers/ associations.</h5>
                        <p class="fw-normal pb-0 mb-0">Amrutanjan has affiliations with six (6) trade and industry chambers / associations. They are:</p>
                        <p>(a) Association of Manufacturers of Ayurvedic Medicines (AMAM)<br>
                            (b) Madras Chamber of Commerce & Industry<br>
                            (C) All India Manufacturers' Organisation (AIMO)<br>
                            (d) Employers' Federation Of South India<br>
                            (e) Madras Management Association<br>
                            (f) Confederation of Indian Industry (CII)
                        </p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- principle 7 table 1 -->
                    <div class="principle-7-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">b. List the top 10 trade and industry chambers/ associations (determined based on the total
                            members of such body) the entity is a member of/ affiliated to:
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name of the trade and industry chambers/ associations</th>
                                        <th>Reach of trade and industry chambers/associations(State/ National)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Association of Manufacturers of Ayurvedic Medicines (AMAM)</td>
                                        <td>National</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Madras Chamber of Commerce & Industry</td>
                                        <td>State</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>All India Manufacturer's Organisation (AIMO)</td>
                                        <td>National</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Employers' Federation Of South India</td>
                                        <td>National</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Madras Management Association</td>
                                        <td>State</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Confederation of Indian Industry (CII) </td>
                                        <td>National</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- question -->
                    <div class="principle-7 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. Provide details of corrective action taken or underway on any issues related to anti- competitive conduct by the entity, based on adverse orders from regulatory authorities.</h5>
                        <p class="fw-normal pb-5 pt-2">NA</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <span class="badge badge-light-primary mt-2 fs-4">Leadership Indicator</span>
                    <!-- principle 7 table 2 -->
                    <div class="principle-7-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Details of public policy positions advocated by the entity:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Public policy advocated</th>
                                        <th>Method restored for such advocacy</th>
                                        <th>Whether information available in public domain?(Yes/ No)</th>
                                        <th>Frequency of review by board
                                            <span style="font-weight: normal;">
                                                (Annually/Half-yearly/Quarterly/Other)
                                            </span>
                                        </th>
                                        <th>Web link, if available</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>NA</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Principle 8 -->
            <div class="card">
                <div class="card-header pb-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="header-cell pt-1">PRINCIPLE 8</th>
                                    <td>Businesses should promote inclusive growth and equitable development</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <span class="badge badge-light-success mt-2 fs-4">Essential Indicator</span>
                    <!-- principle 8 table 1 -->
                    <div class="principle-8-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Details of Social Impact Assessments (SIA) of projects undertaken by the entity based on applicablelaws, in the current financial year</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name and brief details of project</th>
                                        <th>SIA notification number</th>
                                        <th>Date of notification</th>
                                        <th>Whether conducted by independent external agency(Yes/ No)</th>
                                        <th>Results communicated in public domain (Yes/ No)</th>
                                        <th>Relevant Web link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Not applicable as no new projects have been undertaken in 2022-23</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--  principle 8 table 2-->
                    <div class="principle-8-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. Provide information on project(s) for which ongoing Rehabilitation and Resettlement (R&R) is being undertaken by your entity.</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name of project for which R&R is ongoing</th>
                                        <th>State</th>
                                        <th>District</th>
                                        <th>No. of project affected families (PAFs)</th>
                                        <th>% of PAFs covered by R&R</th>
                                        <th>Amounts paid to PAFs in the FY (in INR)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>Not applicable as no new projects have been undertaken in 2022-23</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- question -->
                    <div class="principle-8 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">3. Describe the mechanisms to receive and redress grievances of the community</h5>
                        <p class="fw-normal pt-2 ps-3">Amrutanjan encourages local communities to come forward and report grievances associated with our operations.In the absence of the factory manager, members of the local community can file complaints with the factory administrator. Following the company's policies and legal requirements, grievances are addressed according to the nature of the incident. If grievances cannot be resolved or addressed at the factory level,they are escalated to the Head Office, where the general manager of Human Resources handles the situation</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!--  principle 8 table 3-->
                    <div class="principle-8-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">4. Percentage of input material (inputs to total inputs by value) sourced from suppliers:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>FY 2022 - 23</th>
                                        <th>FY 2021 - 22</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Directly sourced from MSMEs/ Small producers</td>
                                        <td></td>
                                        <td>438748461</td>
                                    </tr>
                                    <tr>
                                        <td>Sourced directly from within the district and neighbouring districts</td>
                                        <td></td>
                                        <td>215536283</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <span class="badge badge-light-primary mt-2 fs-4">Leadership Indicator</span>
                    <!--  principle 8 table 4 -->
                    <div class="principle-8-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Provide details of actions taken to mitigate any negative social impacts identified in the
                            Social Impact Assessments (Reference: Question 1 of Essential Indicators above):
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Details of negative social impact identified</th>
                                        <th>Corrective action taken</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Not applicable as no new projects have been undertaken in 2022-23</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--  principle 8 table 5 -->
                    <div class="principle-8-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. Provide the following information on CSR projects undertaken by your entity in
                            designated aspirational districts as identified by government bodies:
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>State</th>
                                        <th>Aspirational Districts</th>
                                        <th>Amount Spent(in INR)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tamil Nadu</td>
                                        <td></td>
                                        <td>1,23,06,802</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Uttar Pradesh</td>
                                        <td></td>
                                        <td>5,75,000</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Telangana</td>
                                        <td></td>
                                        <td>7,00,000</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Andhra Pradesh</td>
                                        <td></td>
                                        <td>2,62,500</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- question -->
                    <div class="principle-8 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">3.&nbsp;&nbsp; a. Do you have a preferential procurement policy where you give preference to
                            purchase from suppliers comprising marginalized /vulnerable groups? (Yes/No)
                        </h5>
                        <p class="fw-normal pt-2">No</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-8 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">(b) From which marginalized /vulnerable groups do you procure?</h5>
                        <p class="fw-normal pt-2">NA</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-8 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">(c) What percentage of total procurement (by value) does it constitute?</h5>
                        <p class="fw-normal pt-2">NA</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!--  principle 8 table 6 -->
                    <div class="principle-8-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">4. Details of the benefits derived and shared from the intellectual properties owned or
                            acquired by your entity (in the current financial year), based on traditional knowledge:
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Intellectual property based on traditional knowledge</th>
                                        <th>Owned/ Acquired(Yes/ No)</th>
                                        <th>Benefits shared(Yes/ No)</th>
                                        <th>Basis of calculating benefits share</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>NA</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--  principle 8 table 7 -->
                    <div class="principle-8-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">5. Details of corrective actions taken or underway, based on any adverse order in intellectual
                            property related disputes wherein usage of traditional knowledge is involved.
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name of authority</th>
                                        <th>Brief of the case</th>
                                        <th>Corrective action taken</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>NA</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!--  principle 8 table 8 -->
                    <div class="principle-8-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">6. Details of beneficiaries of CSR projects:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>CSR Project</th>
                                        <th>Number of person benefited from CSR projects</th>
                                        <th>% of beneficiaries from vulnerable and marginalized groups</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>People for Animals</td>
                                        <td>All animals in the shelter</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>IIMPACT</td>
                                        <td>120 girls</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sevalaya</td>
                                        <td>1300 young girls</td>
                                        <td>Mixed population</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Single teacher School</td>
                                        <td>274</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Single teacher School</td>
                                        <td>10</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Hand in Hand</td>
                                        <td>1796 students</td>
                                        <td>Mixed population</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Children garden school </td>
                                        <td>1000+</td>
                                        <td>Mixed population</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Digital class solution(Mylapore/Aranavoyal/Thirupporur) by Next Education</td>
                                        <td>300 students</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Avvai Home & Orphanage for Girls</td>
                                        <td>200</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Aranvoyal Panchayat Union</td>
                                        <td>Village residents</td>
                                        <td>Mixed population</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Panchayat Union Primary School,Melsembedu</td>
                                        <td>74 students</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Panchayat Union Middle School, Ayalacheri</td>
                                        <td>91 students</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>The Akshaya Patra Foundation</td>
                                        <td>350 students</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Aishwarya Trust </td>
                                        <td>8 children </td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>India Vision Institute</td>
                                        <td>4030 children</td>
                                        <td>Mixed population</td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>GMR Varalakshmi Foundation</td>
                                        <td>200 students</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>Inspector of Police,Tiruvanmiyur PS</td>
                                        <td>General Public</td>
                                        <td>Mixed population</td>
                                    </tr>
                                    <tr>
                                        <td>18</td>
                                        <td>Madras Christian College</td>
                                        <td>23 students</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>Aid India</td>
                                        <td>218 students</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>Government Boys High School, Tirupporur</td>
                                        <td>100 students</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>21</td>
                                        <td>Social Service Trust, Chennai</td>
                                        <td>General Public</td>
                                        <td>Mixed population</td>
                                    </tr>
                                    <tr>
                                        <td>22</td>
                                        <td>Deena Bandu Ashram</td>
                                        <td>275 students & staffs</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>22</td>
                                        <td>Sevalaya</td>
                                        <td>360 students</td>
                                        <td>100%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Principle 9 -->
            <div class="card">
                <div class="card-header pb-0">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="header-cell pt-1">PRINCIPLE 9</th>
                                    <td>Businesses should engage with and provide value to their consumers in a responsible manner.</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card-body pb-0">
                    <span class="badge badge-light-success mt-2 fs-4">Essential Indicator</span>
                    <!-- question -->
                    <div class="principle-9 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Describe the mechanisms in place to receive and respond to consumer complaints and feedback.</h5>
                        <p class="fw-normal pt-2 pb-5 ps-3">Customer complaints are received through Toll-free telephone, Customer care mail ID and through sales force. All product labels are printed with the above customer contact information. The complaints will be registered by marketing department and sent to QA for investigation. After investigation, the root cause will be identified and appropriate CAPA will be taken and communicated to the complainant for the genuine complaints with replacement of product. (SOP : QA/SOP/016)</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 9 table 1 -->
                    <div class="principle-9-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. Turnover of products and/ services as a percentage of turnover from all products/service that carry information about:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>As a percentage to total turnover</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Environmental and social parameters relevant to the product.</td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <td>Safe and responsible usage</td>
                                        <td>100%</td>
                                    </tr>
                                    <tr>
                                        <td>Recycling and/or safe disposal</td>
                                        <td>80%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- principle 9 table 2 -->
                    <div class="principle-9-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">3. Number of consumer complaints in respect of the following:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2"></th>
                                        <th colspan="3" class="text-center">FY 2022 - 23</th>
                                        <th colspan="3" class="text-center">FY 2021 - 22</th>
                                    </tr>
                                    <tr>
                                        <th>Received during the year</th>
                                        <th>Pending resolution at the end of year</th>
                                        <th>Remarks</th>
                                        <th>Received during the year</th>
                                        <th>Pending resolution at the end of year</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Data Privacy</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Advertising</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Cyber-security</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Delivery of essential services</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Restrictive trade practices</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Unfair trade practices</td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                        <td>NIL</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Other</td>
                                        <td>2</td>
                                        <td>0</td>
                                        <td></td>
                                        <td>18</td>
                                        <td>0</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- principle 9 table 3 -->
                    <div class="principle-9-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">4. Details of instances of product recalls on account of safety issues:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Number</th>
                                        <th>Reasons for recall</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Voluntary recalls</td>
                                        <td>NIL</td>
                                        <td>NA</td>
                                    </tr>
                                    <tr>
                                        <td>Forced recalls</td>
                                        <td>NIL</td>
                                        <td>NA</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- question -->
                    <div class="principle-9 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">5. Does the entity have a framework/ policy on cyber security and risks related to data privacy?(Yes/No) If available, provide a web-link of the policy.</h5>
                        <p class="fw-normal pt-2">Yes. Web-link <a href="https://www.worldofamrutanjan.com/privacy_policy" class="text-dark text-decoration-underline">https://www.worldofamrutanjan.com/privacy_policy</a></p>
                        <p class="fw-normal">Information & Cyber Security Standard Operating Procedures(SOPs) are already available in the company's website. The IT Policy is currently getting updated with the Cyber Security SOPs and Cyber Security Assessment is also going to be undertaken during FY 23-24.</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-9 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">6. Provide details of any corrective actions taken or underway on issues relating to advertising, and delivery of essential services; cyber security and data privacy of customers; re-occurrence of instances of product recalls; penalty / action taken by regulatory authorities on safety of products / services.</h5>
                        <p class="fw-normal pt-2 ps-3">NIL</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <span class="badge badge-light-primary mt-2 fs-4">Leadership Indicator</span>
                    <!-- question -->
                    <div class="principle-9 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">1. Channels / platforms where information on products and services of the entity can be accessed (provide web link, if available).</h5>
                        <p class="fw-normal pt-2">Web-link:<a href="https://www.amrutanjan.com/" class="text-dark text-decoration-underline">https://www.amrutanjan.com</a></p>
                        <p class="fw-normal">Amrutanjan website covers all our products & its uses and the services which we provide.</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- question -->
                    <div class="principle-9 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">2. Steps taken to inform and educate consumers about safe and responsible usage of products
                            and/or services.
                        </h5>
                        <p class="fw-normal pt-2 ps-3">All our products primary packing (labels) and secondary packing (unit carton)having the usage and safety informations namely: Directions (for use), Indication,Caution and Storage.</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-9 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">3. Mechanisms in place to inform consumers of any risk of disruption/discontinuation of essential services</h5>
                        <p class="fw-normal pt-2 ps-3">We will inform all the stakeholders through proper medium / channel, if any disruption / discontinuation of services.</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-9 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">4. Does the entity display product information on the product over and above what is mandated as per local laws? (Yes/No/Not Applicable)</h5>
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">If yes, provide details in brief.</h5>
                        <p class="fw-normal pt-2 ps-3">Yes.<br>Licence No. 368 as per Certificate of Licence to Manufacture for Sale of Ayurvedic Drugs(Form 25D)</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- question -->
                    <div class="principle-9 mt-4 mb-2">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">Did your entity carry out any survey with regard to consumer satisfaction relating to the major products / services of the entity, significant locations of operation of the entity or the entity as a whole? (Yes/No)</h5>
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">If yes, provide details in brief.</h5>
                        <p class="fw-normal pt-2 ps-3">Yes.<br>Through external service providing agencies annual survey on customer satisfaction of our products has been conducted.</p>
                        <p class="fw-normal">&nbsp;</p>
                    </div>
                    <!-- principle 9 table 3 -->
                    <div class="principle-9-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">5. Provide the following information relating to data breaches:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>a</td>
                                        <td>Number of instances of data breaches along-with impact</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>b</td>
                                        <td>Percentage of data breaches involving personally identifiable information of customers</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p class="fw-normal pt-2 ps-3">No breaches were reported in 2022-23</p>
                    </div>
                    <!-- divider  -->
                    <hr>
                    <!-- principle 9 table 4-->
                    <div class="principle-9-table mt-3 mb-3">
                        <h5 class="card-subtitle text-secondary pb-1 fw-bold">Alignment of BRSR principles with the SDGs</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center align-middle">
                                    <tr>
                                        <th>Principle <br> SDG<sub>s</sub></th>
                                        <th>Principle 1</th>
                                        <th>Principle 2</th>
                                        <th>Principle 3</th>
                                        <th>Principle 4</th>
                                        <th>Principle 5</th>
                                        <th>Principle 6</th>
                                        <th>Principle 7</th>
                                        <th>Principle 8</th>
                                        <th>Principle 9</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- 1 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625655953_968aaaf238046f0d8ecd.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <!-- 2 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625655977_8ace2cc67b85c2142fd2.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 3 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625655991_0f92dc78068860d02824.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <!-- 4 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656010_3a183e92c65c76c0319a.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 5 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656059_cbe838549bb139c28046.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <!-- 6 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656088_4d7c44826c3453e1f955.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <!-- 7 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656128_d4cd87957eaac066935d.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <!-- 8 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656184_d1286ed5f2740b96b144.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <!-- 9 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656226_7c37d0480146af528b2d.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <!-- 10 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656260_7c42ce75f1551bfe9545.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <!-- 11 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656303_a4ed32741b611555b598.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <!-- 12 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656376_af7f43ed5413234ed906.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 13 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656399_9f65666655313d9487cb.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <!-- 14 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656416_3745110ba85f34b3143b.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 15 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656456_f1d7ae37b3157c1c3362.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- 16 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656487_f1f241e3102a387999b5.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <!-- 17 -->
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('public/uploads/sdgimages/images/1625656508_ab2833b402d0044afe82.png') ?>" class="w-100" alt="">
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td class="bg-light-success text-center">
                                            <div class="form-check form-check-success ps-5">
                                                <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-check form-check-success ps-5 pt-2">
                            <input type="uncheckbox" class="form-check-input" id="colorCheck3" checked="">
                            <p class="fw-bold">Alignment of BRSR principles with the Sustainable Development Goals</p>
                        </div>
                        <div class="form-check form-check-success ps-5">
                            <input type="checkbox" class="form-check-input" id="colorCheck3" checked="">
                            <p class="fw-bold">Sustainable Development Goals adopted by Amrutanjan Limited</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Brsr Index -->
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-subtitle text-secondary pb-1 fw-bold">BRSR INDEX</h5>
                </div>
                <div class="card-body pb-0">
                    <!-- Brsr Index-->
                    <div class="principle-9-table mt-3 mb-3">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Section A</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Section B</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Section C</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Principle 1:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Essential</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Leadership</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Principle 2:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Essential</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Leadership</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Principle 3:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Essential</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Leadership</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Principle 4:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Essential</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Leadership</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Principle 5:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Essential</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Leadership</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Principle 6:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Essential</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Leadership</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Principle 7:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Essential</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Leadership</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Principle 8:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Essential</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Leadership</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Principle 9:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Essential</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-5">Leadership</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>


<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/cleave.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') ?>"></script>
<!-- select2 -->
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-select2.min.js') ?>"></script>



<?= $this->endSection() ?>