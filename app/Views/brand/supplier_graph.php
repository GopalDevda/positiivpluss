<!-- <div class="row"> -->
<!-- <div class="col-md-5"> -->
<div class="row mt-1 mb-2">
    <div class="col-md-4">
        <label>
            <h4> Filter by supplier uniq</h4>
        </label>
        <?= $uniq_spl ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="shadow">
                <div class="card-header d-flex flex-md-row flex-column justify-content-md-between justify-content-start align-items-md-center align-items-start">
                    <b>individual Score</b>
                </div>
                <div class="card-body">
                    <div id="column-chart-kips"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="shadow">
                <div class="card-header d-flex flex-md-row flex-column justify-content-md-between justify-content-start align-items-md-center align-items-start">
                    <b> Average Percentage</b>
                </div>
                <div class="card-body">
                    <div id="column-chart-kips1"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
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

        var l = document.querySelector("#column-chart-kips"),
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
                        columnWidth: "10%",
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
                colors: [a.series1, o.series2],
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
                    name: "Percentage",
                    data: [<?= $individual["indi_Environment"] . ',' . $individual["indi_Governance"] . ',' . $individual["indi_Social"] ?>],
                }],
                xaxis: {
                    categories: ["Environment", "Governance",
                        "Social"
                    ]
                },
                fill: {
                    opacity: 1
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();

        var l = document.querySelector("#column-chart-kips1"),
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
                        columnWidth: "10%",
                        colors: {
                            // backgroundBarColors: [a.bg, a.bg, a.bg, a.bg, a.bg],
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
                // colors: [a.series1],
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
                    name: "Avg Percentage",
                    data: [<?= $graph_val['Environment'] . ',' . $graph_val['Governance'] . ',' . $graph_val['Social'] ?>]
                }],
                xaxis: {
                    categories: ["Environment", "Governance", "Social"]
                },
                fill: {
                    opacity: 1
                },
                yaxis: {
                    opposite: t
                }
            };
        void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
    })
</script>