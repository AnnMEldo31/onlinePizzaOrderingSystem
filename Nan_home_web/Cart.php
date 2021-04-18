<?php
    session_start();

    $severname="localhost";
    $username="root";
    $password="";
    $database_name="dbms_project";

    $conn = mysqli_connect($severname,$username,$password,$database_name);
    //check connection
    if(!$conn){
        die('Connection Failed :' . mysqli_connect_error());
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
        <link rel="stylesheet" href="homepage.css">
        <link rel="stylesheet" href="cart.css">
        <script src="buildIt.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> <!--buttons-->
        <script src="https://kit.fontawesome.com/931749e247.js" crossorigin="anonymous"></script> <!--buttons-->
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
                <li><a href="#">HOME</a></li>
                <li><a href="#">BUILD IT</a></li>
                <li><a href="#">OFFERS</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">MY ACCOUNT</a></li>
            </ul>
        </nav>
        <!--top nav end-->

        <!--cart table starts here-->
        <h3 class="heading">YOUR CART</h3><br>
        <table class="center">

           

            <?php
            // echo $_SESSION['topping_exp'];
            $Crust_ID = $_SESSION['CrustID_exp'];
            $Cheese_ID = $_SESSION['CheeseID_exp'];
            $Sauce_ID = $_SESSION['SauceID_exp'];
            // $Pizza_ID = $_SESSION['PizzaID_exp'];
            $Order_ID = $_SESSION['OrderID_exp'];
            $Cust_ID = 1;
            // echo $_SESSION['OrderID_exp'];

            $PizzaIDArr ="SELECT Pizza_ID, B_Price FROM Bill_Items where Order_ID = $Order_ID";
            
            $data = mysqli_query($conn,$PizzaIDArr);
            $total = mysqli_num_rows($data);

            //inserting crust, sauce, cheese

            $i = 1;
            while($rowpizza = mysqli_fetch_array($data)){
                $rowPizzaID = $rowpizza['Pizza_ID'];                   //Pizza_ID array
                
                echo "<tr><td>" . "Pizza " . $i; 
                echo "</td><td>" . "₹" . $rowpizza["B_Price"] . "</td><td>" . "<a href = \"Cart.php?id=$rowpizzaID;?>\">" . "<i class=\"fas fa-minus-circle\"></i></a</tr>";
                $i++;
                
            }

            echo "</table>";

            if (isset($_GET['remove'])){
                $P_ID = $_GET['id'];
                $querydel = mysqli_query($conn,"DELETE from Bill_Items where Pizza_ID = '$P_ID'");
            }

            $conn->close();
            ?>
          </table>
        <!--cart table ends here-->








        <!--covid sticky start-->
        <div id="overlay" onclick="off()">
            COVID STUFF HERE
        </div>
        <div class="fixed-btn">
            <button onclick="on()">
                <i class="fas fa-head-side-mask" style="font-size: 36px;"></i>
            </button>
        </div>
        <!--covid sticky end-->


  

        <!--footer start-->
        <div class="social" style = "position = absolute; margin-bottom = 0%;">
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