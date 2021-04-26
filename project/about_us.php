<?php
session_start();
require_once('login_reg/config.php');

if(isset($_SESSION['cust_name'])) {
    $cname=$_SESSION['cust_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headerfootercss.css">
    <link rel="stylesheet" href="about_us.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> <!--buttons-->
    <script src="https://kit.fontawesome.com/931749e247.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <!--top nav start-->
    <nav>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fa fa-bars" id="btn"></i>
            <i class="fa fa-times" id="cancel"></i>
        </label>
        <img src="logo.png">
        <div class="pizzaName">
            PIZZERIA
        </div>
        <ul>
            <li><a href="..\Nan_home_web\Homepage.php">HOME</a></li>
            <li><a href="..\Nan_home_web\BuildIT_1">BUILD IT</a></li>
            <li><a href="offer.php">OFFERS</a></li>
            <li><a href="about_us.php">ABOUT US</a></li>
            <li><a href="..\Nan_home_web\accountpage.php"><?php echo $cname."'s "; ?> ACCOUNT</a></li>
        </ul>
    </nav>
    <!--top nav end-->
    <div class="imgcontainer">
        <img src="pizza1.jpg" style="width: 100%;" >
        <div class="top-left">
            <h1> ABOUT US </h1>
            <h2>We all crave for the delicious food,when we think about delicious food "PIZZA" comes to mind.<br>We are here to serve you high-quality,great-tasting,and affordable food.<br>We pride ourselves in offering you the very best pizza,and we value your patronage.<br>
            <br>
            We started our online pizza delivery since 2019,and we have developed many<br> branches in the Surat city.Our food is certified by "Food Organization".<br>We provide you safe deliveries by contactless food handling,safe assurance bag,<br>rider sanitization,and sanitizer with ever order.  </h2>
        </div>
    </div>

         <!--footer start-->
    <div class="social" style="position: fixed;bottom: 0px;">
        <a href="#"><i class="fab fa-twitter" style="color: lightgrey; font-size: 30px;"></i>
        </a> &nbsp;
        <a href="#"><i class="fab fa-instagram" style="color: lightgrey; font-size: 30px;"></i>
        </a> &nbsp;
        <a href="#"><i class="fab fa-facebook" style="color: lightgrey; font-size: 30px;"></i>
        </a>      
    </div>
    <!--footer end-->   
    
</body>
</html>

