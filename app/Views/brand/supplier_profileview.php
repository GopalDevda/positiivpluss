<?php

use App\Models\UserNotification;
use App\Models\SupplierModel;
?>
<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/pages/page-profile.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-validation.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/forms/form-wizard.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/maps/leaflet.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/maps/map-leaflet.min.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/toastr.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css'); ?>">

<style type="text/css">
    .container {
        height: 450px;
    }

    #map {
        width: 100%;
        height: 100%;
        border: 1px solid blue;
    }

    #data,
    #allData {
        display: none;
    }

    .apexcharts-legend.apexcharts-align-center.position-right {
        display: none;
    }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content') ?>
<!-- BEGIN: Content-->
<?php
$session = session();

if ($session->get('success')) { ?>
    <script type="text/javascript">
        var id = '<?php echo $session->get('success'); ?>';

        toastr.success(id, "Success", {
            closeButton: !0,
            tapToDismiss: !1,
            progressBar: !0,
        })
    </script>
<?php } ?>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <?php
        $supplier_model = new SupplierModel();
        $session = session();
        $sid = session()->supplier_info['supplier_id'];
        $okk = $supplier_model->where('id', $sid)->first();
        $image = $okk['image'];
        $banner = $okk['bannerImage'];
        ?>
        <!-- top -->

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item me-3">
                <a class="nav-link active" id="home-tab1" data-bs-toggle="tab" href="#home1" aria-controls="home1" role="tab" aria-selected="true">Standard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab1" data-bs-toggle="tab" href="#profile1" aria-controls="profile1" role="tab" aria-selected="false">Specific</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home1" aria-labelledby="home-tab1" role="tabpanel">
                <section class="card">
                    <div class=" card-body row">
                        <div class="col-md-2">
                            <h5 class="mb-1">Company Name</h5>
                            <!--<h5 class="mb-1">Country</h5>-->
                            <h5 class="mb-1">Industry Category</h5>
                            <h5 class="mb-1">Industry</h5>
                            <h5 class="mb-1">Website</h5>
                        </div>
                        <div class="col-md-4">
                            <h6 class="mb-1 fw-normal"><?= $supplier['brand_name'] ?></h6>
                            <!--<h6 class="mb-1 fw-normal">Algeria</h6>-->
                            <h6 class="mb-1 fw-normal"> <?= $industry_cate['industry_category_name'] ?></h6>
                            <h6 class="mb-1 fw-normal"> <?= $industry['industry_name'] ?></h6>
                            <h6 class="mb-1 fw-normal"><?= $supplier['website'] ?></h6>
                            <!--  <a href="<?= $supplier['website'] ?>" target="_blank"><button type="button" class="btn btn-icon btn btn-primary btn-sm">
                          <i class="fa-solid fa-link"></i>
                        </button></a> -->
                            <?php $socials = json_decode($company_profile['socials']);
                            ?>

                            <?php if ($socials) {
                                foreach ($socials as $key => $value) { ?>

                                    <?php if ($key == 0) { ?>
                                        <a href="http://<?= $value; ?>" target="_blank"><button type="button" class="btn btn-icon btn-sm btn btn-primary ">
                                                <i class="fa-brands fa-facebook" style="font-size:17px"></i>
                                            </button></a><?php
                                                        } ?>

                                <?php
                                } ?>
                                <?php if ($company_profile['twiter']) { ?>
                                    <a href="http://<?= $company_profile['twiter']; ?>" target="_blank"><button type="button" class="btn btn-icon btn-sm btn btn-primary">
                                            <i class="fa-brands fa-twitter" style="font-size:17px"></i>
                                        </button></a>
                                <?php
                                } ?>
                                <?php if ($company_profile['link']) { ?>
                                    <a href="http://<?= $company_profile['link']; ?>" target="_blank"><button type="button" class="btn btn-icon btn-sm btn btn-primary ">
                                            <i class="fa-brands fa-linkedin" style="font-size:17px"></i>
                                        </button></a>
                                <?php
                                } ?>
                                <?php if ($company_profile['website']) { ?>
                                    <a href="http://<?= $company_profile['website']; ?>" target="_blank"><button type="button" class="btn btn-icon btn-sm btn btn-primary ">
                                            <i class="fa-solid fa-globe" style="font-size:17px"></i>
                                        </button></a>
                                <?php
                                } ?>
                                <?php if ($company_profile['company_mobile']) { ?>
                                    <a href="tel://<?= $company_profile['company_mobile']; ?>" target="_blank"><button type="button" class="btn btn-icon btn-sm btn btn-primary ">
                                            <i class="fa-solid fa-phone" style="font-size:17px"></i>
                                        </button></a>
                                <?php
                                } ?> <?php if ($company_profile['company_email']) { ?>
                                    <a href="mailto:<?= $company_profile['company_email']; ?>" target="_blank"><button type="button" class="btn btn-icon btn-sm btn btn-primary ">
                                            <i class="fa-solid fa-envelope" style="font-size:17px"></i>
                                        </button></a>
                            <?php
                                        }
                                    } ?>

                        </div>
                        <div class="col-md-6 text-end">
                            <!-- <a type="button" class="btn btn-primary waves-effect waves-float waves-light" href="<?php echo base_url('/supplier/quickStart') ?>">Edit</a>
                    <button type="button" class="btn btn-primary waves-effect waves-float waves-light">Share</button> -->
                            <div class="mt-2">

                                <!--  <?php if ($image == '') { ?>
                          <img src="<?php echo base_url('public/brand/assets/app-assets/images/portrait/small/avatar-s-11.jpg') ?>"
                          id="account-upload-img" class="round" alt="profile image" height="100" width="100" />
                          <?php     } else {
                                            echo  "<img src='" . base_url('public/profilimg/' . $image . '') . "' id='account-upload-img' class='' alt='profile image' height='110' width='110' />";
                                        } ?>
                          -->

                                <!-- <img src=" https://img.freepik.com/premium-vector/abstract-logo-company-made-with-color_341269-925.jpg?w=360"
                          id="account-upload-img" class="round" alt="profile image" height="100" width="100" /> -->

                            </div>
                        </div>
                </section>

                <!-- end top  -->
                <!-- description -->
                <section class="card">
                    <div class="card-body">
                        <h4>Description</h4>
                        <p><?= $operationsInfo['description'] ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <?php if (!empty($operationsInfo['activity_activities'])) {
                                        $activity_industry = json_decode($operationsInfo['activity_industry']);
                                        $activity_activities = json_decode($operationsInfo['activity_activities']);
                                        foreach ($activity_industry as $key => $row) {
                                            foreach ($activities as $row2) :
                                                if ($row2['id'] == $activity_activities[$key]) : ?>
                                                    <li><?= ucwords($row2['subsubindustry']) ?></li>
                                            <?php
                                                endif;
                                            endforeach; ?>
                                    <?php }
                                    }  ?>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <?php
                                    if (!empty($operationsInfo['product_servicesss'])) {
                                        $product_servicesss = json_decode($operationsInfo['product_servicesss']);
                                        foreach ($product_servicesss as $key => $row) {
                                    ?>
                                            <li><?= ucwords($row) ?></li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- end descripton -->
                <!-- description -->
                <section class="card">
                    <div class="card-body">
                        <h4>Mission Statement</h4>
                        <p><?= $operationsInfo['mission'] ?></p>

                    </div>
                </section>
                <!-- end descripton -->
                <!-- location and workforce -->

                <section>
                    <div class="row">
                        <!-- static location  -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-2">Location</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="bold mb-1">Plants</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h5 class="bold mb-1"><?php echo $plan_total; ?></h5>
                                        </div>
                                    </div>
                                    <div class="progress progress-bar-primary mb-2" style="height: 10px">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="50" aria-valuemax="100" style="width: <?php echo $pla_per_na; ?>%" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="
                                    <?php if ($location) {
                                        foreach ($location as $key => $row) {
                                            if ($row == 1) {
                                                if ($plants[$key]) {
                                                    echo $plants[$key];
                                                }
                                            }
                                        }
                                    }
                                    ?>  National"></div>
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="50" aria-valuemax="100" style="width: <?php echo $pla_per_in; ?>%" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="
                                    <?php if ($location) {
                                        foreach ($location as $key => $row) {
                                            if ($row == 2) {
                                                if ($plants[$key]) {
                                                    echo $plants[$key];
                                                }
                                            }
                                        }
                                    }
                                    ?> International"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="bold mb-1">Offices</h5>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h5 class="bold mb-1"><?php echo $office_total; ?></h5>
                                        </div>
                                    </div>
                                    <div class="progress progress-bar-primary mb-2" style="height: 10px">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="50" aria-valuemax="100" style="width: <?php echo $off_per_in; ?>%" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="
                                    <?php if ($location) {
                                        foreach ($location as $key => $row) {
                                            if ($row == 2) {
                                                if ($offices[$key]) {
                                                    echo $offices[$key];
                                                }
                                            }
                                        }
                                    }
                                    ?> International"></div>
                                        <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="50" aria-valuemax="100" style="width: <?php echo $off_per_na; ?>%" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="
                                    <?php if ($location) {
                                        foreach ($location as $key => $row) {
                                            if ($row == 1) {
                                                if ($offices[$key]) {
                                                    echo $offices[$key];
                                                }
                                            }
                                        }
                                    }
                                    ?> National"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- pie chart  -->
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="myChart" height="219"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- end location  -->
                        <!-- dynamic location  -->
                        <!-- <div class="col-md-4">
                          <div class="card">
                            <div class="card-body">
                              
                              <h4 class="mb-1">Location</h4>
                              <?php if (!empty($operationsInfo['location'])) { ?>
                              <?php
                                    $location = json_decode($operationsInfo['location']);
                                    $plants = json_decode($operationsInfo['plants']);
                                    $offices = json_decode($operationsInfo['offices']);
                                    if (empty($location)) {
                                        $location = array();
                                    }
                                    foreach ($location as $key => $row) {
                                ?>
                              <?php if ($row == 1) { ?>
                              <h5 class="bold">National</h5>
                              <div class="col-md-8">
                                <p>No. Of Plants : <b><span><?= $plants[$key]; ?></span></b></p>
                                <p>No. Of Offices : <b><span><?= $offices[$key] ?></span></b></p>
                              </div>
                              <?php } ?>
                              <?php if ($row == 2) { ?>
                              <h5 class="bold mb-1">International</h5>
                              <div class="col-md-8">
                                <p>No. Of Plants : <b><span><?= $plants[$key]; ?></span></b></p>
                                <p>No. Of Offices : <b><span><?= $offices[$key] ?></span></b></p>
                              </div>
                              <?php }
                                    }
                                } ?>
                            </div>
                          </div>
                        </div> -->
                        <!-- end dynamic location  -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="
                              card-header
                              d-flex
                              flex-md-row flex-column
                              justify-content-md-between justify-content-start
                              align-items-md-center align-items-start
                              ">
                                    <h4 class="card-title">Workforce</h4>
                                </div>
                                <div class="card-body">
                                    <div id="column-charts"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="
                              card-header
                              d-flex
                              flex-md-row flex-column
                              justify-content-md-between justify-content-start
                              align-items-md-center align-items-start
                              ">
                                    <h4 class="card-title">Stake Holder</h4>
                                </div>
                                <div class="card-body">
                                    <div id="column-charts-two"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- end location and workforce -->
                <!-- maps  -->
                <section class="card">
                    <div class="card-body">
                        <h4 class="card-title">Operations</h4>
                        <div class="container">
                            <!-- <center><h1>Access Google Maps API in PHP</h1></center> -->
                            <?php
                            $coll = json_encode($country_lat_long, true);
                            echo '<div id="data">' . $coll . '</div>'; ?>

                            <?php $allData = json_encode($countryRohit, true);
                            echo '<div id="allData">' . $allData . '</div>'; ?>
                            <div id="map"></div>
                        </div>
                    </div>
                </section>

            </div>
            <div class="tab-pane" id="profile1" aria-labelledby="profile-tab1" role="tabpanel">
                <?php if (isset($data_show)) if ($data_show == 1) { ?>
                    <div id="suppliergraph"></div>
                <?php
                } ?>
            </div>
        </div>
    </div>
    <!-- END: Content-->
    <?= $this->endSection() ?>
    <?= $this->section('script') ?>
    <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/page-profile.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/wizard/bs-stepper.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/select/select2.full.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-wizard.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/forms/form-repeater.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/extensions/ext-component-toastr.min.js'); ?>"></script>
    <!-- maps  custom -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url('public/brand/js/googlemap.js?v=10'); ?>"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8hP5KbOAG4oguBSpDuCMjEKdBuY3X2Sc&callback=loadMap">
    </script>
    <script type="text/javascript">
        // alert('dghfh');
        var id = <?= $id; ?>;
        $.ajax({
            type: "get",
            url: "<?= site_url('Suppliers_Model/test_view') ?>",
            data: {
                id: id
            },
            // dataType: "dataType",
            success: function(response) {
                // console.log(response);
                $('#suppliergraph').html(response);
            }
        });
    </script>
    <!-- pie-charts -->
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Permanent", "Non Permanent"],
                datasets: [{
                    label: '# of Votes',
                    data: [<?php echo $p_per; ?>, <?php echo $n_per; ?>],
                    data1: ["Total:<?php echo $difable; ?>", "Total:<?php echo $difableNo; ?>"],
                    data2: ["Differently Abled:<?php echo $parmanent; ?>", "Differently Abled:<?php echo $Nonparmanent; ?>"],
                    backgroundColor: [
                        'rgb(219, 252, 106)',
                        'rgb(0, 0, 0)',
                        'rgb(0, 0, 0)'
                    ],
                    borderColor: [
                        'rgb(219, 252, 106)',
                        'rgb(0, 0, 0)',
                        'rgb(0, 0, 0)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        title: function(tooltipItem, data) {
                            return data['labels'][tooltipItem[0]['index']];
                        },
                        label: function(tooltipItem, data1) {
                            return data1['datasets'][0]['data1'][tooltipItem['index']];
                        },

                        afterLabel: function(tooltipItem, data2) {
                            return data2['datasets'][0]['data2'][tooltipItem['index']];
                        },

                    },
                    backgroundColor: '#000000c9',
                    titleFontSize: 14,
                    titleFontColor: '#fff',
                    bodyFontColor: '#fff',
                    bodyFontSize: 14,
                    displayColors: false
                }
            }
        });
    </script>
    <!-- end pie-charts -->
    <!-- chart  -->
    <script>
        $((function() {
            "use strict";
            var e = $(".flat-picker"),
                t = "rtl" === $("html").attr("data-textdirection"),
                a = {
                    series1: "#ebcf34",
                    series2: "#5ceb34",
                    series3: "#346beb",
                    bg: "#ffffff00"
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
                        data: [100, 120, 90, 170, 130, 160, 140, 240, 220, 180, 270, 280, 375]
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
            var l = document.querySelector("#column-charts-two"),
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
                            columnWidth: "45%",
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
                    colors: [a.series1, a.series2, a.series3],
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
                            name: "Male",
                            data: [<?= $male_total_bod[0]; ?>, <?= $male_total_key[0]; ?>]
                        }, {
                            name: "Female",
                            data: [<?= $femal_total_bod[0]; ?>, <?= $femal_total_key[0]; ?>]
                        },
                        {
                            name: "Others",
                            data: [<?= $other_total_bod[0]; ?>, <?= $other_total_key[0]; ?>]
                        },
                    ],
                    xaxis: {
                        categories: ["BOD", "KMP"]
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
            var h = document.querySelector("#line-chart"),
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
                        data: [280, 200, 220, 180, 270, 250, 70, 90, 200, 150, 160, 100, 150, 100, 50]
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
                            return '<div class="px-1 py-50"><span>' + e.series[e.seriesIndex][e.dataPointIndex] + "%</span></div>"
                        }
                    },
                    xaxis: {
                        categories: ["7/12", "8/12", "9/12", "10/12", "11/12", "12/12", "13/12", "14/12", "15/12", "16/12", "17/12", "18/12", "19/12", "20/12", "21/12"]
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
                    labels: ["dtdfgy", "Networking", "Hiring", "R&D"],
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
        $((function() {
            "use strict";
            var e = $(".flat-picker"),
                t = "rtl" === $("html").attr("data-textdirection"),
                a = {
                    series1: "#4de2eb",
                    series2: "#ffb6c1",
                    series3: "#e8b99b",
                    bg: "#ffffff00"
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
                        data: [100, 120, 90, 170, 130, 160, 140, 240, 220, 180, 270, 280, 375]
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
            var l = document.querySelector("#column-charts"),
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
                            columnWidth: "45%",
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
                    colors: [a.series1, a.series2, a.series3],
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
                            name: "Male",
                            data: [<?= $emp_male_total; ?>, <?= $wor_male_total; ?>]
                        }, {
                            name: "Female",
                            data: [<?= $emp_femal_total; ?>, <?= $wor_femal_total; ?>]
                        },
                        {
                            name: "Others",
                            data: [<?= $emp_other_total; ?>, <?= $wor_other_total; ?>]
                        },
                    ],
                    xaxis: {
                        categories: ["Employees", "Workers"]
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
            var h = document.querySelector("#line-chart"),
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
                        data: [280, 200, 220, 180, 270, 250, 70, 90, 200, 150, 160, 100, 150, 100, 50]
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
                            return '<div class="px-1 py-50"><span>' + e.series[e.seriesIndex][e.dataPointIndex] + "%</span></div>"
                        }
                    },
                    xaxis: {
                        categories: ["7/12", "8/12", "9/12", "10/12", "11/12", "12/12", "13/12", "14/12", "15/12", "16/12", "17/12", "18/12", "19/12", "20/12", "21/12"]
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
                    labels: ["dtdfgy", "Networking", "Hiring", "R&D"],
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
    <!-- end chart  -->
    <!--world map start-->
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/maps.js"></script>
    <script src="https://www.amcharts.com/lib/4/geodata/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/brand/assets/assets/js/worldmap.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/maps/leaflet.min.js') ?>"></script>
    <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/maps/map-leaflet.min.js') ?>"></script>

    <!--world map end-->
    <script type="text/javascript">
        $(document).ready(function() {
            var max = 10;
            var cnt = 1;
            $(".add-textbox").on("click", function(e) {
                e.preventDefault();
                if (cnt < max) {
                    cnt++;
                    $(".textbox-wrapper").append('<div class="input-group mt-1"><input type="text" class="form-control" placeholder="Button on right" aria-describedby="button-addon2"><button type="button" class="btn btn-danger remove-textbox waves-effect"><i class="fa fa-trash"></i></button></div>');
                }
            });
            $(".textbox-wrapper").on("click", ".remove-textbox", function(e) {
                e.preventDefault();
                $(this).parents(".input-group").remove();
                cnt--;
            });
        });
    </script>
    <?= $this->endSection() ?>
    <script>
        var input = document.getElementById('company_address');
        var company_address = new google.maps.places.Autocomplete(input);
    </script>
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

        function deleteCompany(that) {
            var id = $(that).attr("data-number");
            $("#del_company_id").val(id);
            $("#docDeletePopup").modal('show');
        }
    </script>

    <script>
        function setAssessment(assessment_id, date_from, date_to) {
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
                url: "<?php echo base_url() ?>/brand/compareWorkplace",
                data: ({
                    workplaces: workplaces
                }),
                success: function(data) {
                    rs = JSON.parse(data);
                    var color_arr = ["#C39A4A", "#828282", "blue", "brown", "orange"];
                    var workplace_name = "";
                    var building = "";
                    var building_rh_bar_value = "";
                    var company_vehicle = "";
                    var company_vehicle_rh_bar_value = "";
                    var flight = "";
                    var flight_rh_bar_value = "";
                    var mobile_fuel = "";
                    var mobile_fuel_rh_bar_value = "";
                    if (rs.workplace_name) {
                        for (var i = 0; i < rs.workplace_name.length; i++) {
                            if (rs.workplace_name[i]) {
                                workplace_name += "<span><span style='background:" + color_arr[i] + "'></span>" + rs.workplace_name[i] + "</span>";
                            }
                        }
                    }
                    if (rs.building) {
                        for (var i = 0; i < rs.building.length; i++) {
                            var building_per = 0;
                            if (rs.total_building_footprint && rs.total_building_footprint != 0.00) {
                                building_per = Math.round((rs.building[i] * 100) / rs.total_building_footprint);
                            }
                            if (rs.building[i]) {
                                building += '<div class="progress-bar" role="progressbar" style="width: ' + building_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                                building_rh_bar_value += '<span>' + rs.building[i] + ' tonne CO2e</span><br>';
                            } else {
                                building += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
                                building_rh_bar_value += '<span>0 tonne CO2e</span><br>';
                            }
                        }
                    }
                    if (rs.company_vehicle) {
                        for (var i = 0; i < rs.company_vehicle.length; i++) {
                            var company_vehicle_per = 0;
                            if (rs.total_company_vehicle_footprint && rs.total_company_vehicle_footprint != 0.00) {
                                company_vehicle_per = Math.floor((rs.company_vehicle[i] * 100) / rs.total_company_vehicle_footprint);
                            }
                            if (rs.company_vehicle[i]) {
                                company_vehicle += '<div class="progress-bar" role="progressbar" style="width: ' + company_vehicle_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                                company_vehicle_rh_bar_value += '<span>' + rs.company_vehicle[i] + ' tonne CO2e</span><br>';
                            } else {
                                company_vehicle += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
                                company_vehicle_rh_bar_value += '<span>0 tonne CO2e</span><br>';
                            }
                        }
                    }
                    if (rs.flight) {
                        for (var i = 0; i < rs.flight.length; i++) {
                            var flight_per = 0;
                            if (rs.total_flight_footprint && rs.total_flight_footprint != 0.00) {
                                flight_per = Math.floor((rs.flight[i] * 100) / rs.total_flight_footprint);
                            }
                            if (rs.flight[i]) {
                                flight += '<div class="progress-bar" role="progressbar" style="width: ' + flight_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                                flight_rh_bar_value += '<span>' + rs.flight[i] + ' tonne CO2e</span><br>';
                            } else {
                                flight += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
                                flight_rh_bar_value += '<span>0 tonne CO2e</span><br>';
                            }
                        }
                    }
                    if (rs.mobile_fuel) {
                        for (var i = 0; i < rs.mobile_fuel.length; i++) {
                            var mobile_fuel_per = 0;
                            if (rs.total_mobile_fuel_footprint && rs.total_mobile_fuel_footprint != 0.00) {
                                mobile_fuel_per = Math.floor((rs.mobile_fuel[i] * 100) / rs.total_mobile_fuel_footprint);
                            }
                            if (rs.mobile_fuel[i]) {
                                mobile_fuel += '<div class="progress-bar" role="progressbar" style="width: ' + mobile_fuel_per + '%;background:' + color_arr[i] + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                                mobile_fuel_rh_bar_value += '<span>' + rs.mobile_fuel[i] + ' tonne CO2e</span><br>';
                            } else {
                                mobile_fuel += '<div class="progress-bar" role="progressbar" style="width: 0%;background:' + color_arr[i] + '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>';
                                mobile_fuel_rh_bar_value += '<span>0 tonne CO2e</span><br>';
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
        $(".selector").datepicker({
            duration: "slow"
        }); // Getter
        var duration = $(".selector").datepicker("option", "duration");
        // Setter
        $(".selector").datepicker("option", "duration", "slow");
    </script>