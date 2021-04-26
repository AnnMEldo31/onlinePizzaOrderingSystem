<?php
session_start();
require_once('login_reg\config.php');
if (!isset($_SESSION['cust_id'])) {
    die("Failed to load website/log in.<br>Have you logged in? <a href=\"login.php\">Log in</a>");
}
$cid = $_SESSION['cust_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headerfootercss.css">
    <script src="https://kit.fontawesome.com/931749e247.js" crossorigin="anonymous"></script>
    <title>Edit Details | Pizzeria</title>
</head>
<body>
        <!--top nav start-->
        <nav>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fa fa-bars" id="btn"></i>
            <i class="fa fa-times" id="cancel"></i>
        </label>
        <img src="pizza_pics/logo.png">
        <div class="pizzaName">
            PIZZERIA
        </div>
        <ul>
            <li><a href="Homepage.php">HOME</a></li>
            <li><a href="BuildIT_1.php">BUILD IT</a></li>
            <li><a href="..\project\offer.php">OFFERS</a></li>
            <li><a href="..\project\about_us.html">ABOUT US</a></li>
            <li><a href="accountpage.php"><?php echo $_SESSION['cust_name']."'s"; ?> ACCOUNT</a></li>
        </ul>
    </nav>
    <!--top nav end-->

    <main>
        <h3>Add New Address</h3>
        <form action="accountpage.php" method="post">
            <label for="houseno">House Number</label>
            <input type="text" name="houseno" id="houseno" placeholder="eg: 88A" required> <br>
            <label for="streetno">Street Number</label>
            <input type="number" name="streetno" id="streetno" placeholder="eg: 1088" required> <br>
            <label for="pincode">Pin Code</label>
            <input type="number" name="pincode" id="pincode" placeholder="eg: 200675" required> <br>

            <input type="submit" name="cust_addAddress" value="Save Changes">
        </form>
    </main>

</body>
</html>