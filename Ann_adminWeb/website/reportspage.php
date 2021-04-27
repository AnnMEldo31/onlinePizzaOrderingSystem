<?php
session_start();
require_once('..\login_reg\config.php');
if (!isset($_SESSION['username'])) {
    die("Failed to load website/log in.<br>Have you logged in? <a href=\"..\login_reg\login_land.php\">Log in</a>");
}

$revData = array();
$ordData = array();

$today=date('Y-m-d');
$date=date_create($today);

for ($i=0; $i<7; $i++) {
    $datevar = date_format($date,"Y-m-d"); 
    $conn->query("SET @date = '$datevar'");
    
    $conn->query("CALL `daily_revenue`(@d_rev, @date);");
    $resultrev = $conn->query("SELECT ifnull(@d_rev, 0) as drev, @date as d");
    $revData[] = $resultrev->fetch_assoc();

    $conn->query("CALL `daily_orders`(@d_ord, @date);");
    $resultord = $conn->query("SELECT ifnull(@d_ord, 0) as dord, @date as d");
    $ordData[] = $resultord->fetch_assoc();

    date_add($date,date_interval_create_from_date_string("-1 day"));
}

 $dataRevenue = array(
     array("y" => $revData[6]["drev"], "label" => $revData[6]["d"]),
     array("y" => $revData[5]["drev"], "label" => $revData[5]["d"]),
     array("y" => $revData[4]["drev"], "label" => $revData[4]["d"]),
     array("y" => $revData[3]["drev"], "label" => $revData[3]["d"]),
     array("y" => $revData[2]["drev"], "label" => $revData[2]["d"]),
     array("y" => $revData[1]["drev"], "label" => $revData[1]["d"]),
     array("y" => $revData[0]["drev"], "label" => $revData[0]["d"])
 );

 $dataOrders = array(
    array("y" => $ordData[6]["dord"], "label" => $ordData[6]["d"]),
    array("y" => $ordData[5]["dord"], "label" => $ordData[5]["d"]),
    array("y" => $ordData[4]["dord"], "label" => $ordData[4]["d"]),
    array("y" => $ordData[3]["dord"], "label" => $ordData[3]["d"]),
    array("y" => $ordData[2]["dord"], "label" => $ordData[2]["d"]),
    array("y" => $ordData[1]["dord"], "label" => $ordData[1]["d"]),
    array("y" => $ordData[0]["dord"], "label" => $ordData[0]["d"])
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Reports | Pizzeria Admins</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">    
    <script>
    window.onload = function () {
    
    var chart1 = new CanvasJS.Chart("weeklyRevenue", {
        title: {
            text: "Weekly Revenue",
            fontFamily: "tahoma"
        },
        axisY: {
            title: "Revenue generated"
        },
        data: [{
            type: "line",
            dataPoints: <?php echo json_encode($dataRevenue, JSON_NUMERIC_CHECK); ?>,
            markerColor: "#5f08a7",
            markerType: "square",
            markerSize: 7,
            lineColor: "#1D2231"
        }]
    });
    var chart2 = new CanvasJS.Chart("weeklyOrders", {
        title: {
            text: "Weekly Orders",
            fontFamily: "tahoma"
        },
        axisY: {
            title: "Orders confirmed"
        },
        data: [{
            type: "line",
            dataPoints: <?php echo json_encode($dataOrders, JSON_NUMERIC_CHECK); ?>,
            markerColor: "#ff9204",
            markerType: "circle",
            markerSize: 9,
            lineColor: "#1D2231"
        }]
    });
    chart1.render();
    chart2.render();
    
    }
    </script>
    <style>
        .chartContainer {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="img/logo_BW.png" alt="pizzeria logo in black and white">
            <h2>PIZZERIA Admins</h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" class="weblink">
                        <span class="las la-home"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="customerspage.php" class="weblink">
                        <span class="las la-users"></span>
                        <span>Customers</span>
                    </a>
                </li>
                <li>
                    <a href="orderspage.php" class="weblink">
                        <span class="las la-file-invoice-dollar"></span>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="offerspage.php" class="weblink">
                        <span class="lar la-star"></span>
                        <span>Offers</span>
                    </a>
                </li>
                <li>
                    <a href="inventorypage.php" class="weblink">
                        <span class="las la-pizza-slice"></span>
                        <span>Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="reportspage.php" class="weblink active">
                        <span class="las la-chart-area"></span>
                        <span>Reports</span>
                    </a>
                </li>
                <li>
                    <a href="accountpage.php" class="weblink">
                        <span class="las la-user-circle"></span>
                        <span>Account</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> <!-- toggle bar icon -->
                
                Reports
            </h2> <!-- sidebar view toggle button, page title -->

            <div class="user-wrapper">
                <div>
                    <small>Current User</small>
                    <h4>
                        <?php
                        echo $_SESSION['username'];
                        ?>
                    </h4>
                </div> <!-- current account -->
            </div> <!-- .user-wrapper -->
        </header> <!-- page title, sidebar view toggle button, search, current account -->

        <main>
            <div class="chartContainer" id="weeklyRevenue" style="height: 350px; width: 100%;"></div>
            
            <div class="chartContainer" id="weeklyOrders" style="height: 350px; width: 100%;"></div>

            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </main> <!-- quick overview, recent orders, recent customers -->
    </div> <!-- not the sidebar -->

</body>
</html>