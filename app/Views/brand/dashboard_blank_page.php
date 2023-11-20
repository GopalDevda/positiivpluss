<?php

use App\Models\ActionCenterModel; ?>

<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/vendors.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/forms/select/select2.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/extensions/toastr.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/css/plugins/extensions/ext-component-toastr.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/brand/assets/app-assets/vendors/css/extensions/toastr.min.css'); ?>">

<?= $this->endSection(); ?>

<?= $this->section('content') ?>


<div class="app-content content rohitbluer">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div style="
    padding-top: 225px;
    padding-left: 443px;">
            <div class="card" style="width: 17rem;">

                <div class="card-body">
                    <b style="font-size: 15px;">Profile not created yet</b>


                </div>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>

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
<script src="<?php echo base_url('public/brand/assets/assets/js/echarts.min.js') ?>"></script>

<!--CHART JS-->
<!--<script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>-->
<script src="<?php echo base_url('public/brand/assets/app-assets/vendors/js/charts/apexcharts.min.js') ?>"></script>
<!--<script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/dashboard-ecommerce.min.js') ?>"></script>-->
<!-- <script src="<?php echo base_url('public/brand/assets/app-assets/js/scripts/pages/dashboard-analytics.min.js') ?>"></script>  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#modal-bluer").modal('show');
    });
</script>
<script>
    $(window).on("load", (function() {
        "use strict";
        var o, e, r, t, a, s, i, l, n, d, h, c = "#f3f3f3",
            w = "#EBEBEB",
            p = "#b9b9c3",
            u = document.querySelector("#statistics-order-chart"),
            g = document.querySelector("#statistics-profit-chart"),
            b = document.querySelector("#earnings-chart"),
            y = document.querySelector("#revenue-report-chart"),
            m = document.querySelector("#budget-chart"),
            f = document.querySelector("#browser-state-chart-primary"),
            k = document.querySelector("#browser-state-chart-warning"),
            x = document.querySelector("#browser-state-chart-secondary"),
            C = document.querySelector("#browser-state-chart-info"),
            A = document.querySelector("#browser-state-chart-danger"),
            B = document.querySelector("#goal-overview-radial-bar-chart"),
            S = "rtl" === $("html").attr("data-textdirection");
        setTimeout((function() {
                toasr.success("", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    rtl: S
                })
            }), 2e3), o = {
                chart: {
                    height: 70,
                    type: "bar",
                    stacked: !0,
                    toolbar: {
                        show: !1
                    }
                },
                grid: {
                    show: !1,
                    padding: {
                        left: 0,
                        right: 0,
                        top: -15,
                        bottom: -15
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: !1,
                        columnWidth: "20%",
                        startingShape: "rounded",
                        colors: {
                            backgroundBarColors: [c, c, c, c, c],
                            backgroundBarRadius: 5
                        }
                    }
                },
                legend: {
                    show: !1
                },
                dataLabels: {
                    enabled: !1
                },
                colors: [window.colors.solid.warning],
                series: [{
                    name: "2020",
                    data: [45, 85, 65, 45, 65]
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
                },
                yaxis: {
                    show: !1
                },
                tooltip: {
                    x: {
                        show: !1
                    }
                }
            },
            new ApexCharts(u, o).render(), e = {
                chart: {
                    height: 70,
                    type: "line",
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !1
                    }
                },
                grid: {
                    borderColor: w,
                    strokeDashArray: 5,
                    xaxis: {
                        lines: {
                            show: !0
                        }
                    },
                    yaxis: {
                        lines: {
                            show: !1
                        }
                    },
                    padding: {
                        top: -30,
                        bottom: -10
                    }
                },
                stroke: {
                    width: 3
                },
                colors: [window.colors.solid.danger],
                series: [{
                    data: [0, 20, 5, 30, 15, 45]
                }],
                markers: {
                    size: 2,
                    colors: window.colors.solid.info,
                    strokeColors: window.colors.solid.info,
                    strokeWidth: 2,
                    strokeOpacity: 1,
                    strokeDashArray: 0,
                    fillOpacity: 1,
                    discrete: [{
                        seriesIndex: 0,
                        dataPointIndex: 5,
                        fillColor: "#ffffff",
                        strokeColor: window.colors.solid.info,
                        size: 5
                    }],
                    shape: "circle",
                    radius: 2,
                    hover: {
                        size: 3
                    }
                },
                xaxis: {
                    labels: {
                        show: !0,
                        style: {
                            fontSize: "0px"
                        }
                    },
                    axisBorder: {
                        show: !1
                    },
                    axisTicks: {
                        show: !1
                    }
                },
                yaxis: {
                    show: !1
                },
                tooltip: {
                    x: {
                        show: !1
                    }
                }
            },
            new ApexCharts(g, e).render(), r = {
                chart: {
                    type: "donut",
                    height: 120,
                    toolbar: {
                        show: !1
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                series: [12, 16, <?php echo $emision_aa; ?>],
                legend: {
                    show: !1
                },
                comparedResult: [2, -3, 8],
                labels: ["App", "Service", "Product"],
                stroke: {
                    width: 0
                },
                colors: ["#28c76f66", "#28c76f33", window.colors.solid.success],
                grid: {
                    padding: {
                        right: -20,
                        bottom: -8,
                        left: -20
                    }
                },
                plotOptions: {
                    pie: {
                        startAngle: -10,
                        donut: {
                            labels: {
                                show: !0,
                                name: {
                                    offsetY: 15
                                },
                                value: {
                                    offsetY: -15,
                                    formatter: function(o) {
                                        return parseInt(o) + "%"
                                    }
                                },
                                total: {
                                    show: !0,
                                    offsetY: 15,
                                    label: "App",
                                    formatter: function(o) {
                                        return "53%"
                                    }
                                }
                            }
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1325,
                    options: {
                        chart: {
                            height: 100
                        }
                    }
                }, {
                    breakpoint: 1200,
                    options: {
                        chart: {
                            height: 120
                        }
                    }
                }, {
                    breakpoint: 1045,
                    options: {
                        chart: {
                            height: 100
                        }
                    }
                }, {
                    breakpoint: 992,
                    options: {
                        chart: {
                            height: 120
                        }
                    }
                }]
            }, new ApexCharts(b, r).render(), t = {
                chart: {
                    height: 230,
                    stacked: !0,
                    type: "bar",
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "17%",
                        endingShape: "rounded"
                    },
                    distributed: !0
                },
                colors: [window.colors.solid.primary, window.colors.solid.warning],
                series: [{
                    name: "Earning",
                    // data: [95, 177, 284, 256, 105, 63, 168, 218, 72],
                    data: [6, 177, 284, 256, 105, 63, 168, 218, 72]
                }, {
                    name: "Expense",
                    data: [-145, -80, -60, -180, -100, -60, -85, -75, -100],
                    data: [-145, -80, -60, -180, -100, -60, -85, -75, -100]
                }],
                dataLabels: {
                    enabled: !1
                },
                legend: {
                    show: !1
                },
                grid: {
                    padding: {
                        top: -20,
                        bottom: -10
                    },
                    yaxis: {
                        lines: {
                            show: !1
                        }
                    }
                },
                xaxis: {

                    categories: [
                        "jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"
                    ],
                    labels: {
                        style: {
                            colors: p,
                            fontSize: "0.86rem"
                        }
                    },
                    axisTicks: {
                        show: !1
                    },
                    axisBorder: {
                        show: !1
                    }
                },

                yaxis: {
                    labels: {
                        style: {
                            colors: p,
                            fontSize: "0.86rem"
                        }
                    }
                }
            },
            new ApexCharts(y, t).render(), a = {
                chart: {
                    height: 80,
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !1
                    },
                    type: "line",
                    sparkline: {
                        enabled: !0
                    }
                },
                stroke: {
                    curve: "smooth",
                    dashArray: [0, 5],
                    width: [2]
                },
                colors: [window.colors.solid.primary, "#dcdae3"],
                series: [{
                    data: [61, 48, 69, 52, 60, 40, 79, 60, 59, 43, 62]
                }, {
                    data: [20, 10, 30, 15, 23, 0, 25, 15, 20, 5, 27]
                }],
                tooltip: {
                    enabled: !1
                }
            },
            new ApexCharts(m, a).render(), s = {
                chart: {
                    height: 30,
                    width: 30,
                    type: "radialBar"
                },
                grid: {
                    show: !1,
                    padding: {
                        left: -15,
                        right: -15,
                        top: -12,
                        bottom: -15
                    }
                },
                colors: [window.colors.solid.primary],
                series: [54.4],
                plotOptions: {
                    radialBar: {
                        hollow: {
                            size: "22%"
                        },
                        track: {
                            background: w
                        },
                        dataLabels: {
                            showOn: "always",
                            name: {
                                show: !1
                            },
                            value: {
                                show: !1
                            }
                        }
                    }
                },
                stroke: {
                    lineCap: "round"
                }
            },
            new ApexCharts(f, s).render(), i = {
                chart: {
                    height: 30,
                    width: 30,
                    type: "radialBar"
                },
                grid: {
                    show: !1,
                    padding: {
                        left: -15,
                        right: -15,
                        top: -12,
                        bottom: -15
                    }
                },
                colors: [window.colors.solid.warning],
                series: [6.1],
                plotOptions: {
                    radialBar: {
                        hollow: {
                            size: "22%"
                        },
                        track: {
                            background: w
                        },
                        dataLabels: {
                            showOn: "always",
                            name: {
                                show: !1
                            },
                            value: {
                                show: !1
                            }
                        }
                    }
                },
                stroke: {
                    lineCap: "round"
                }
            },
            new ApexCharts(k, i).render(), l = {
                chart: {
                    height: 30,
                    width: 30,
                    type: "radialBar"
                },
                grid: {
                    show: !1,
                    padding: {
                        left: -15,
                        right: -15,
                        top: -12,
                        bottom: -15
                    }
                },
                colors: [window.colors.solid.secondary],
                series: [14.6],
                plotOptions: {
                    radialBar: {
                        hollow: {
                            size: "22%"
                        },
                        track: {
                            background: w
                        },
                        dataLabels: {
                            showOn: "always",
                            name: {
                                show: !1
                            },
                            value: {
                                show: !1
                            }
                        }
                    }
                },
                stroke: {
                    lineCap: "round"
                }
            }, new ApexCharts(x, l).render(), n = {
                chart: {
                    height: 30,
                    width: 30,
                    type: "radialBar"
                },
                grid: {
                    show: !1,
                    padding: {
                        left: -15,
                        right: -15,
                        top: -12,
                        bottom: -15
                    }
                },
                colors: [window.colors.solid.info],
                series: [4.2],
                plotOptions: {
                    radialBar: {
                        hollow: {
                            size: "22%"
                        },
                        track: {
                            background: w
                        },
                        dataLabels: {
                            showOn: "always",
                            name: {
                                show: !1
                            },
                            value: {
                                show: !1
                            }
                        }
                    }
                },
                stroke: {
                    lineCap: "round"
                }
            }, new ApexCharts(C, n).render(), d = {
                chart: {
                    height: 30,
                    width: 30,
                    type: "radialBar"
                },
                grid: {
                    show: !1,
                    padding: {
                        left: -15,
                        right: -15,
                        top: -12,
                        bottom: -15
                    }
                },
                colors: [window.colors.solid.danger],
                series: [8.4],
                plotOptions: {
                    radialBar: {
                        hollow: {
                            size: "22%"
                        },
                        track: {
                            background: w
                        },
                        dataLabels: {
                            showOn: "always",
                            name: {
                                show: !1
                            },
                            value: {
                                show: !1
                            }
                        }
                    }
                },
                stroke: {
                    lineCap: "round"
                }
            },
            new ApexCharts(A, d).render(), h = {
                chart: {
                    height: 245,
                    type: "radialBar",
                    sparkline: {
                        enabled: !0
                    },
                    dropShadow: {
                        enabled: !0,
                        blur: 3,
                        left: 1,
                        top: 1,
                        opacity: .1
                    }
                },
                colors: ["#51e5a8"],
                plotOptions: {
                    radialBar: {
                        offsetY: -10,
                        startAngle: -150,
                        endAngle: 150,
                        hollow: {
                            size: "77%"
                        },
                        track: {
                            background: "#ebe9f1",
                            strokeWidth: "50%"
                        },
                        dataLabels: {
                            name: {
                                show: !1
                            },
                            value: {
                                color: "#5e5873",
                                fontSize: "2.86rem",
                                fontWeight: "600"
                            }
                        }
                    }
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: "dark",
                        type: "horizontal",
                        shadeIntensity: .5,
                        gradientToColors: [window.colors.solid.success],
                        inverseColors: !0,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100]
                    }
                },
                series: [83],
                stroke: {
                    lineCap: "round"
                },
                grid: {
                    padding: {
                        bottom: 30
                    }
                }
            }, new ApexCharts(B, h).render()
    }));
</script>


<script>
    $(window).on("load", (function() {
        "use strict";
        var e, o, t, r, a, s = "#ebf0f7",
            i = "#5e5873",
            n = "#ebe9f1",
            d = document.querySelector("#gained-chart"),
            l = document.querySelector("#order-chart"),
            h = document.querySelector("#avg-sessions-chart"),
            p = document.querySelector("#support-trackers-chart"),
            c = document.querySelector("#sales-visit-chart"),
            w = "rtl" === $("html").attr("data-textdirection");
        setTimeout((function() {
                toatr.success("You have successfully logged in to Vuexy. Now you can start to explore!", "ðŸ‘‹ Welcome John Doe!", {
                    closeButton: !0,
                    tapToDismiss: !1,
                    rtl: w
                })
            }), 2e3), e = {
                chart: {
                    height: 100,
                    type: "area",
                    toolbar: {
                        show: !1
                    },
                    sparkline: {
                        enabled: !0
                    },
                    grid: {
                        show: !1,
                        padding: {
                            left: 0,
                            right: 0
                        }
                    }
                },
                colors: [window.colors.solid.primary],
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    curve: "smooth",
                    width: 2.5
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: .9,
                        opacityFrom: .7,
                        opacityTo: .5,
                        stops: [0, 80, 100]
                    }
                },
                series: [{
                    name: "Subscribers",
                    data: [28, 40, 36, 52, 38, 60, 55]
                }],
                xaxis: {
                    labels: {
                        show: !1
                    },
                    axisBorder: {
                        show: !1
                    }
                },
                yaxis: [{
                    y: 0,
                    offsetX: 0,
                    offsetY: 0,
                    padding: {
                        left: 0,
                        right: 0
                    }
                }],
                tooltip: {
                    x: {
                        show: !1
                    }
                }
            }, new ApexCharts(d, e).render(), o = {
                chart: {
                    height: 100,
                    type: "area",
                    toolbar: {
                        show: !1
                    },
                    sparkline: {
                        enabled: !0
                    },
                    grid: {
                        show: !1,
                        padding: {
                            left: 0,
                            right: 0
                        }
                    }
                },
                colors: [window.colors.solid.warning],
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    curve: "smooth",
                    width: 2.5
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: .9,
                        opacityFrom: .7,
                        opacityTo: .5,
                        stops: [0, 80, 100]
                    }
                },
                series: [{
                    name: "Orders",
                    data: [10, 15, 8, 15, 7, 12, 8]
                }],
                xaxis: {
                    labels: {
                        show: !1
                    },
                    axisBorder: {
                        show: !1
                    }
                },
                yaxis: [{
                    y: 0,
                    offsetX: 0,
                    offsetY: 0,
                    padding: {
                        left: 0,
                        right: 0
                    }
                }],
                tooltip: {
                    x: {
                        show: !1
                    }
                }
            },
            new ApexCharts(l, o).render(), t = {
                chart: {
                    type: "bar",
                    height: 200,
                    sparkline: {
                        enabled: !0
                    },
                    toolbar: {
                        show: !1
                    }
                },
                states: {
                    hover: {
                        filter: "none"
                    }
                },
                colors: [window.colors.solid.warning, window.colors.solid.danger, window.colors.solid.primary, window.colors.solid.danger, window.colors.solid.primary, window.colors.solid.danger],
                series: [{
                    name: "Sessions",
                    data: [<?php echo $ov * 10 ?>, <?php echo $mv * 10 ?>, <?php echo $iv * 10 ?>, <?php echo $nv * 10 ?>, <?php echo $hv * 10 ?>, <?php echo $ovv * 10 ?>]
                }],
                grid: {
                    show: !1,
                    padding: {
                        left: 0,
                        right: 0
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: "45%",
                        distributed: !0,
                        endingShape: "rounded"
                    }
                },
                tooltip: {
                    x: {
                        show: !1
                    }
                },
                xaxis: {
                    type: "numeric"
                }
            }, new ApexCharts(h, t).render(), r = {
                chart: {
                    height: 270,
                    type: "radialBar"
                },
                plotOptions: {
                    radialBar: {
                        size: 150,
                        offsetY: 20,
                        startAngle: -150,
                        endAngle: 150,
                        hollow: {
                            size: "65%"
                        },
                        track: {
                            background: "#fff",
                            strokeWidth: "100%"
                        },
                        dataLabels: {
                            name: {
                                offsetY: -5,
                                color: i,
                                fontSize: "1rem"
                            },
                            value: {
                                offsetY: 15,
                                color: i,
                                fontSize: "1.714rem"
                            }
                        }
                    }
                },
                colors: [window.colors.solid.danger],
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: "dark",
                        type: "horizontal",
                        shadeIntensity: .5,
                        gradientToColors: [window.colors.solid.primary],
                        inverseColors: !0,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100]
                    }
                },
                stroke: {
                    dashArray: 8
                },
                series: [<?php if ($allaction == 0) {
                                $allaction = 1;
                            }
                            echo number_format(($complete / $allaction) * 100, 2); ?>],
                labels: ["Complete Actions"]
            }, new ApexCharts(p, r).render(), a = {
                chart: {
                    height: 300,
                    type: "radar",
                    dropShadow: {
                        enabled: !0,
                        blur: 8,
                        left: 1,
                        top: 1,
                        opacity: .2
                    },
                    toolbar: {
                        show: !1
                    },
                    offsetY: 5
                },
                series: [{
                    name: "Sales",
                    data: [90, 50, 86, 40, 100, 20]
                }, {
                    name: "Visit",
                    data: [70, 75, 70, 76, 20, 85]
                }],
                stroke: {
                    width: 0
                },
                colors: [window.colors.solid.primary, window.colors.solid.info],
                plotOptions: {
                    radar: {
                        polygons: {
                            strokeColors: [n, "transparent", "transparent", "transparent", "transparent", "transparent"],
                            connectorColors: "transparent"
                        }
                    }
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: "dark",
                        gradientToColors: [window.colors.solid.primary, window.colors.solid.info],
                        shadeIntensity: 1,
                        type: "horizontal",
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100, 100, 100]
                    }
                },
                markers: {
                    size: 0
                },
                legend: {
                    show: !1
                },
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                dataLabels: {
                    background: {
                        foreColor: [n, n, n, n, n, n]
                    }
                },
                yaxis: {
                    show: !1
                },
                grid: {
                    show: !1,
                    padding: {
                        bottom: -27
                    }
                }
            }, new ApexCharts(c, a).render()
    }));
</script>
<script>
    $(document).ready(function() {
        $("#fromtobtn").on('click', function(e) {
            e.preventDefault();


            var g = $('input[name="from_date"]').val();
            var catId = $('input[name="to_date"]').val();

            // alert(catId); 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "<?php echo base_url() ?>/Graph/actiontracker",
                data: {
                    catId: catId,
                    g: g,


                },
                success: function(response) {

                }

            })
        });
    });
</script>
<!-- END: Page Vendor JS-->
<!-- END: Page Vendor JS-->
<?= $this->endSection() ?>
<script>
    var input = document.getElementById('company_address');

    var company_address = new google.maps.places.Autocomplete(input);
</script>