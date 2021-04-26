<?php
session_start();
require_once('login_reg\config.php');
if (!isset($_SESSION['cust_id'])) {
    die("Failed to load website/log in.<br>Have you logged in? <a href=\"login.php\">Log in</a>");
}
$cid = $_SESSION['cust_id'];

$query_1 = "SELECT Order_ID, Total_Price from orders WHERE Cust_ID=$cid AND O_Date_Time IS NULL;";
$result_1 = mysqli_query($conn, $query_1);
$row_1 = mysqli_fetch_assoc($result_1);
$oid = $row_1['Order_ID'];
$totpr = $row_1['Total_Price'];

if(isset($_POST['applyoffer'])) {
    $offerid = $_POST['radio_offer'];

    $query_discins = "UPDATE orders SET offer_id = $offerid WHERE Cust_ID=$cid AND Order_ID = $oid;";
    $result_discins = mysqli_query($conn, $query_discins);
    
    $query_discount = "SELECT `calc_disc`($totpr,$offerid) as disc"; //`total` INT(10), `dsc_id` INT(5)
    $result_discount = mysqli_query($conn, $query_discount);
    $row_discount = mysqli_fetch_assoc($result_discount);
    $discount = $row_discount['disc'];

    $finalpr = $totpr - $discount;
    $_SESSION['finalpr'] = $finalpr;

    $query_2 = "UPDATE orders SET Final_Price = $finalpr WHERE Cust_ID=$cid AND Order_ID = $oid;";
    if (!$result_2 = mysqli_query($conn, $query_2)) {
        $msg_finalpr = "Error: Unable to apply discount;" . $query_2 . " " . mysqli_error($conn);
        echo "<script>window.alert('$msg_finalpr')</script>";
    }
    
}

echo '<a href="http://localhost/onlinePizzaOrderingSystem/Nan_home_web/Cart.php">Go To Cart</a>';

?>