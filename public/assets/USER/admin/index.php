<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>GiGi</title>

    <?php include 'layouts/head.php'; ?>

    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        
        <?php if($_SESSION['role'] == "admin"){ ?>
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Merchant Data</h4>
                            </div>
                            <div class="card-body">
                                <div id="line_chart_datalabel" data-colors='["#5156be", "#2ab57d", "#aab57d", "#fab57d"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Top Categories</h4>
                            </div>
                            <div class="card-body">
                                <div id="bar_chart" data-colors='["#7a7fdc"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?php } ?>

        <?php if($_SESSION['role'] == "merchant"){ ?>
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Discount Data</h4>
                            </div>
                            <div class="card-body">
                                <div id="line_chart_datalabel" data-colors='["#5156be", "#2ab57d", "#aab57d", "#fab57d"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Top Categories</h4>
                            </div>
                            <div class="card-body">
                                <div id="bar_chart" data-colors='["#7a7fdc"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?php } ?>
        
        <?php if($_SESSION['role'] == "customer"){header('location: ../customer.php');} ?>

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

<!-- dashboard init -->
<script>
    
function getChartColorsArray(chartId) {
    var colors = $(chartId).attr('data-colors');
    var colors = JSON.parse(colors);
    return colors.map(function(value){
        var newValue = value.replace(' ', '');
        if(newValue.indexOf('--') != -1) {
            var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
            if(color) return color;
        } else {
            return newValue;
        }
    })
}

<?php if($_SESSION['role'] == "admin"){ ?>

var lineDatalabelColors = getChartColorsArray("#line_chart_datalabel");
var options = {
    chart: {
      height: 380,
      type: 'bar',
      zoom: {
        enabled: false
      },
      toolbar: {
        show: false
      }
    },
    colors: lineDatalabelColors,
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: [3, 3, 3, 3],
      curve: 'smooth'
    },
    series: [{
      name: "Active Merchants",
      data: [26, 24, 32, 36, 33, 31, 33]
    },
    {
      name: "QR Scanned",
      data: [14, 11, 16, 22, 47, 33, 22]
    },
    {
      name: "Total Deals",
      data: [34, 19, 36, 12, 13, 7, 37]
    },
    {
      name: "Active Users",
      data: [8, 18, 20, 30, 35, 38, 48]
    }
    ],
    title: {
      text: 'Statistics',
      align: 'left',
      style: {
        fontWeight:  '500',
      },
    },
    grid: {
      row: {
        colors: ['transparent', 'transparent', 'transparent', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.2
      },
      borderColor: '#222'
    },
    markers: {
      style: 'inverted',
      size: 0
    },
    xaxis: {
      categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      title: {
        text: 'Day'
      }
    },
    yaxis: {
      title: {
        text: 'Amount'
      },
      min: 5,
      max: 50
    },
    legend: {
      position: 'top',
      horizontalAlign: 'right',
      floating: true,
      offsetY: -25,
      offsetX: -5
    },
    responsive: [{
      breakpoint: 600,
      options: {
        chart: {
          toolbar: {
            show: false
          }
        },
        legend: {
          show: false
        },
      }
    }]
}
  
var chart = new ApexCharts(
    document.querySelector("#line_chart_datalabel"),
    options
);
  
chart.render();

<?php } ?>
<?php if($_SESSION['role'] == "merchant"){ ?>

var lineDatalabelColors = getChartColorsArray("#line_chart_datalabel");
var options = {
    chart: {
      height: 380,
      type: 'bar',
      zoom: {
        enabled: false
      },
      toolbar: {
        show: false
      }
    },
    colors: lineDatalabelColors,
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: [3, 3, 3, 3],
      curve: 'smooth'
    },
    series: [{
      name: "Active Services",
      data: [26, 24, 32, 36, 33, 31, 33]
    },
    {
      name: "QR Scanned",
      data: [14, 11, 16, 22, 47, 33, 22]
    },
    {
      name: "Total Deals",
      data: [34, 19, 36, 12, 13, 7, 37]
    },
    {
      name: "Active Users",
      data: [8, 18, 20, 30, 35, 38, 48]
    }
    ],
    title: {
      text: 'Statistics',
      align: 'left',
      style: {
        fontWeight:  '500',
      },
    },
    grid: {
      row: {
        colors: ['transparent', 'transparent', 'transparent', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.2
      },
      borderColor: '#222'
    },
    markers: {
      style: 'inverted',
      size: 0
    },
    xaxis: {
      categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      title: {
        text: 'Day'
      }
    },
    yaxis: {
      title: {
        text: 'Amount'
      },
      min: 5,
      max: 50
    },
    legend: {
      position: 'top',
      horizontalAlign: 'right',
      floating: true,
      offsetY: -25,
      offsetX: -5
    },
    responsive: [{
      breakpoint: 600,
      options: {
        chart: {
          toolbar: {
            show: false
          }
        },
        legend: {
          show: false
        },
      }
    }]
}
  
var chart = new ApexCharts(
    document.querySelector("#line_chart_datalabel"),
    options
);
  
chart.render();

<?php } ?>

var barColors = getChartColorsArray("#bar_chart");
var options = {
    chart: {
        height: 380,
        type: 'bar',
        toolbar: {
            show: false,
        }
    },
    plotOptions: {
        bar: {
            horizontal: true,
        }
    },
    dataLabels: {
        enabled: false
    },
    series: [{
        name: "Availed Amount",
        data: [380, 430, 450, 375, 550, 384, 780, 800, 420, 1165, 600, 1400]
    }],
    colors: barColors,
    grid: {
        borderColor: '#222',
    },
    xaxis: {
        categories: ['Hotels', 'Prowash', 'Tuning', 'Service', 'Medical', 'Healthy Food', 'Diet', 'Kindergardens', 'Schools', 'Courses', 'Tours', 'Pets'],
    }
}

var chart = new ApexCharts(
    document.querySelector("#bar_chart"),
    options
);

chart.render();

</script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>