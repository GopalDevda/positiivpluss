$((function () {
   "use strict";
   var e = $(".flat-picker"),
      t = "rtl" === $("html").attr("data-textdirection"),
      a = {
         series1: "#867df2",
         series2: "#d2b0ff",
         series3: "#e2e2f2",
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
      

   var i = document.querySelector("#line-area-chart"),
      n = {
         grid: {
            show: !1,
            padding: {
               top: -20,
               bottom: 0,
               left: -10,
               right: -10
            }
         }, 
       
      };
   
   void 0 !== typeof i && null !== i && new ApexCharts(i, n).render();
   var l = document.querySelector("#column-chart3"),
      d = {
          chart: {
            height: 258,
            parentHeightOffset: 0,
            type: "bar",
            toolbar: {
               show: !1
            }
         },
          plotOptions: {
            bar: {
               columnWidth: "32%",
               startingShape: "rounded",
               borderRadius: 7,
               distributed: !0,
               dataLabels: {
                  position: "top"
               }
            }
         },
          stroke: {
            show: !1,
            width: 0
         },
         grid: {
            show: !1,
            padding: {
               top: 0,
               bottom: 0,
               left: -10,
               right: -10
            }
         },
         dataLabels: {
            enabled: !0,
            formatter: function (o) {
               return o + "k"
            },
            offsetX: !1,
            style: {
               fontSize: "10px",
               colors: [n],
               fontWeight: "600",
               fontFamily: "Public Sans"
            }
         },
         series: [{
            data: t
         }],
         colors: [a.series3,a.series3,a.series3,a.series3,a.series3,a.series2,a.series3,a.series3,a.series3,a.series3,a.series3,a.series3],
         dataLabels: {
            enabled: !0,
            formatter: function (o) {
               return o + "k"
            },
            offsetY: !1,
            style: {
               fontSize: "15px",
               colors: [n],
               fontWeight: "600",
               fontFamily: "Public Sans"
            }
         },
         series: [{
            name: "Sales",
            data:  [28,10,45,38,15,50,35,30,8,45,10,28],
         }],
         legend: {
            show: !1
         },
         tooltip: {
            enabled: !1
         },
          xaxis: {
            categories: ["Apr","May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar"],
            axisBorder: {
               show: !0,
               color: l
            },
            axisTicks: {
               show: !1
            },
             labels: {
               style: {
                  colors: i,
                  fontSize: "13px",
                  fontFamily: "Public Sans"
               }
            }
         },
         fill: {
            opacity: [1, .85]
         },
        yaxis: {
            labels: {
               offsetX: -15,
               formatter: function (o) {
                  return "$" + parseInt(+o) + "k"
               },
               style: {
                  fontSize: "13px",
                  colors: i,
                  fontFamily: "Public Sans"
               },
               min: 0,
               max: 6e4,
               tickAmount: 6
            }
         },
         responsive: [{
            breakpoint: 1441,
            options: {
               plotOptions: {
                  bar: {
                     columnWidth: "41%"
                  }
               }
            }
         }, {
            breakpoint: 590,
            options: {
               plotOptions: {
                  bar: {
                     columnWidth: "61%",
                     borderRadius: 5
                  }
               },
               yaxis: {
                  labels: {
                     show: !1
                  }
               },
               grid: {
                  padding: {
                     right: 0,
                     left: -20
                  }
               },
               dataLabels: {
                  style: {
                     fontSize: "12px",
                     fontWeight: "400"
                  }
               }
            }
         }]
      };
   void 0 !== typeof l && null !== l && new ApexCharts(l, d).render();
  
}));