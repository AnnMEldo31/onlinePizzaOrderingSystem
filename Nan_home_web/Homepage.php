<?php
session_start();
require_once('login_reg/config.php');
if(isset($_POST['cust_login'])) {
    $log_username = $_POST['log_username'];
    $log_pw = $_POST['log_pw'];
    
    $log_sqlStmt = "select cust_id, c_name from cust_acct where c_username='$log_username' and c_password='$log_pw';";
    $log_sqlQuery = mysqli_query($conn, $log_sqlStmt);
    $row = mysqli_fetch_assoc($log_sqlQuery);
    if (!$row) {
        die("The username or password provided is incorrect.<br><a href=\"login.php\">Try again</a>");
    } else {
        $_SESSION['cust_uname'] = $log_username;
        $_SESSION['cust_name'] = $row['c_name'];
        $_SESSION['cust_id'] = $row['cust_id'];
    }
} 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home | Pizzeria</title>
        <link rel="stylesheet" href="../project/covid.css">
        <link rel="stylesheet" href="homepage.css">
        <script src="homepage.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/931749e247.js" crossorigin="anonymous"></script>
        <!--for phone icon--><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <script>
                function loginalert() {
                    window.alert("To order, you must first login");
                }
            </script>
            <ul>
                <li><a href="Homepage.php">HOME</a></li>
                <li><?php
                if (isset($_SESSION['cust_id'])) {
                    echo "<a href=\"BuildIT_1.php\">BUILD IT</a>";
                } else {
                    echo "<a href=\"login.php\" onclick=\"loginalert()\">BUILD IT</a>";
                }
                ?></li>
                <li><a href="..\project\offer.php">OFFERS</a></li>
                <li><a href="http://localhost/onlinePizzaOrderingSystem/project/about_us.php">ABOUT US</a></li> 
                <?php 
                if (isset($_SESSION['cust_name'])) {
                    echo "<li><a href=\"accountpage.php\">".$_SESSION['cust_name']."'s ACCOUNT</a></li>";
                } else {
                    echo "<li><a href=\"login_reg/registration.html\">REGISTER</a> <:) </style> <a href=\"login.php\"> LOGIN</a></li>";
                }
                ?> 
            </ul>
        </nav>
        <!--top nav end-->


        <!--img slider start-->
        <div class="slider">
            <div class="slides">
                <!--radio button start--> 
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <!--radio button end-->   
                <!--slide img start-->
                <div class="slide first">
                    <img src="pizza_pics/slide1.jpg" alt="">
                    <div class="slidetext">
                        BUILD YOUR OWN PIZZA
                    </div>
                </div>
                <div class="slide">
                    <img src="pizza_pics/slide2.jpg" alt="">
                    <div class="slidetext">
                        BUY ONE GET ONE FREE
                    </div>
                </div>
                <div class="slide">
                    <img src="pizza_pics/slide3.jpg" alt="">
                    <div class="slidetext">
                        CHECK OUT OUR NEW CHEESY STUFFED CRUST
                    </div>
                </div>
                <div class="slide">
                    <img src="pizza_pics/slide4.jpg" alt="">
                    <div class="slidetext">
                        WE HANDLE YOUR ORDERS WITH THE UTMOST SAFETY
                    </div>
                </div>
                <!--slide img end-->
                <!--automatic nav start-->
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
                <!--automatic nav end-->
                <!--manual nav start-->
                <div class="navigation-manual">
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                    <label for="radio4" class="manual-btn"></label>
                </div>
                <!--manual nav end-->
            </div>  
        </div>
        <!--img slider end-->

        <!--address bar starts-->
        <div class="commaddress">
            <div class="address" style="float: left; width: 50%;">
                <i class="fa fa-phone" style="font-size:24px;color:#459698"></i>
                <h4 style="color: gray">000 (123) 456 7890</h4>
            </div>

            <div class="address" style="float: left; width: 50%;">
                <i class="fa fa-clock-o" style="font-size:24px;color:#459698"></i>
                <h4 style="color: gray">8:00am - 1:30am</h4>
            </div>
        </div>
        <!--address bar ends-->

        <!--intro start-->
        <div class="intro">
            <div class="introimg">
                <img src="pizza_pics/intro.jpg" width="640" height=auto>
            </div>

            <div class="introimg" style="padding-left: 5%; padding-top: 5%; padding-right: 5%;">
                <p>
                    <b> Make-Your-Own-Pizza</b>
                    <br>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                    It has survived not only five centuries, but also the leap into electronic typesetting, 
                    remaining essentially unchanged.
                </p>
            </div>
        </div>
        <!--intro end-->

        <!--service start-->
        <div class="service">
            <div class="column">
                <div class="card" style="float: left; width: 20%;">
                    <img src="pizza_pics/service1.jpg" alt="Avatar" style="width:100%;">
                    <div class="container">
                    <h5><b>YOU DECIDE</b></h5><br>
                    <p>Your wish is our command. With the various ingredients available, you design your own pizza.</p>  
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card" style="float: left; width: 20%;">
                    <img src="pizza_pics/service2.jpg" alt="Avatar" style="width:100%;">
                    <div class="container">
                    <h5><b>SAFE DELIVERY</b></h5><br> 
                    <p>Maximum precautions are being taken for a covid safe delivery, including checking the temperature of the driver.</p> 
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card" style="float: left; width: 20%;">
                    <img src="pizza_pics/service3.jpg" alt="Avatar" style="width:100%;">
                    <div class="container">
                    <h5><b>FRESH INGREDIENTS</b></h5><br>
                    <p>We guarantee you that only the freshest ingredients are being used to create your dream pizza.</p> 
                    </div>
                </div>
            </div>
            <!--covid sticky start-->
            <div id="overlay" onclick="off()">
                <div class="container">
                    <img src="../project/corona.jpg" class="image">
                <div class="overlay">Coronavirus disease(COVID-19)is an infection disease caused by a newly discovered coronavirus.The coronavirus can be spread from person to person.so prevent ourselves by wearing mask,hand hygiene ,and physical distancing.To learn more ,visit the website <a href="https://covid19.india.gov.in">visit covid19.india.gov.in</a></div>
            </div>
            </div>
            <div class="fixed-btn">
                <button onclick="on()">
                    <i class="fas fa-head-side-mask" style="font-size: 36px;"></i>
                </button>
                </div>
            <!--covid sticky end-->
        </div>
        <!--footer start-->
        <div class="social">
            <a href="#"><i class="fab fa-twitter" style="color: lightgrey; font-size: 30px;"></i>
            </a> &nbsp;
            <a href="#"><i class="fab fa-instagram" style="color: lightgrey; font-size: 30px;"></i>
            </a> &nbsp;
            <a href="#"><i class="fab fa-facebook" style="color: lightgrey; font-size: 30px;"></i>
            </a> 
        </div>
        <!--footer end-->
        </body>
    </body>
</html>