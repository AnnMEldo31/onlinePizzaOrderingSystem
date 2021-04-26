<?php
session_start();
require_once('login_reg\config.php');

$data = array();

$today=date('Y-m-d');
$date=date_create($today);

for ($i=0; $i<7; $i++) {
    $datevar = date_format($date,"Y-m-d"); 
    $conn->query("SET @date = '$datevar'");
    $conn->query("CALL `daily_revenue`(@d_rev, @date);");
    $result = $conn->query("SELECT @d_rev as drev, @date as d");
    $data[] = $result->fetch_assoc();
    date_add($date,date_interval_create_from_date_string("-1 day"));
}

 $dataPoints = array(
     array("y" => $data[6]["drev"], "label" => $data[6]["d"]),
     array("y" => $data[5]["drev"], "label" => $data[5]["d"]),
     array("y" => $data[4]["drev"], "label" => $data[4]["d"]),
     array("y" => $data[3]["drev"], "label" => $data[3]["d"]),
     array("y" => $data[2]["drev"], "label" => $data[2]["d"]),
     array("y" => $data[1]["drev"], "label" => $data[1]["d"]),
     array("y" => $data[0]["drev"], "label" => $data[0]["d"])
 );
  
 ?>
 <!DOCTYPE HTML>
 <html>
 <head>
 <script>
 window.onload = function () {
  
 var chart = new CanvasJS.Chart("chartContainer", {
     title: {
         text: " "
     },
     axisY: {
         title: "Revenue generated"
     },
     data: [{
         type: "line",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
 </script>
 </head>
 <body>
 <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 </body>
 </html> 