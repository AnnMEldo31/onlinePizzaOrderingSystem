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

    $Order_ID = $_SESSION['OrderID_exp'];

    $query1 = "SELECT Bill_Items.Pizza_ID, Bill_Items.B_Price FROM Bill_Items where Order_ID = $Order_ID";
    $querydata = mysqli_query($conn, $query1);        

    $query2 = "SELECT COUNT(*) as total from Bill_Items where Order_ID = $Order_ID";
    $query2data = mysqli_query($conn, $query2);
    while($row = mysqli_fetch_array($query2data)){
        $totalpizza = $row["total"];                   
    }

    $query3 = "SELECT SUM(B_Price) as Price from Bill_Items where Order_ID = $Order_ID";
    $query3data = mysqli_query($conn, $query3);
    while($row = mysqli_fetch_array($query3data)){
        $totalprice = $row["Price"];                   
    }
    $_SESSION['Tot_Price'] = $totalprice;
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BILLING</title>
        <link rel="stylesheet" href="homepage.css">
        <link rel="stylesheet" href="Billing.css">
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
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">BUILD IT</a></li>
                <li><a href="#">OFFERS</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">MY ACCOUNT</a></li>
            </ul>
        </nav>
        <!--top nav end-->
        
        <br>
        <br>
        <div class="row">
            <div class="col-75">
                <div class="bill_container">
                    <form action="bill_connect.php" method="post">
                    
                        <div class="row">
                            <div class="col-50">
                                <h3>Billing Information</h3>
                                <br>
                                <label for="fname"><i class="fa fa-user">&nbsp;Full Name</i></label>
                                <input type="text" id="fname" name="b_fname" placeholder="John M. Done">
                                
                                <label for="email"><i class="fa fa-envelope">&nbsp;Email</i></label>
                                <input type="text" id="email" name="b_mail" placeholder="johnmd@example.com">
                                
                                <label for="adr"><i class="fa fa-address-card-o">&nbsp;Address</i></label>
                                <input type="text" id="adr" name="b_adr" placeholder="452/17 Ichchanagar">
                                
                                <label for="Phone"><i class="fa fa-phone">&nbsp;Phone Number</i></label>
                                <input type="text" id="phone" name="b_ph_no" placeholder="9938264837">
            

                                <div class="row">
                                    <div class="col-25">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" id="pin" name="b_pin" placeholder="395007"> 
                                    </div>

                                    <div class="col-25">
                                        <label for="street">Street No.</label>
                                        <input type="text" id="street" name="b_street" placeholder="3568"> 
                                    </div>

                                    <div class="col-25">
                                        <label for="house">House No.</label>
                                        <input type="text" id="house" name="b_house" placeholder="88A"> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-50">
                                <h3>Payment</h3>
                                <br>
                                <label for="cashonly">Only Payment on delivery.</label>
                                <input type="radio" id="cash" name="pay" value="cash" checked="checked">
                                <i class="fa fa-money" aria-hidden="true" style="color: #2DA94F;"></i>
                                <label for="cash">Cash</label>
                                <input type="radio" id="gpay" name="pay" value="gpay">
                                <i class="fab fa-google-pay" style="color: #3A81F1; font-size: 20px;"></i>
                                <label for="cash">GPay</label>  
                                <br>
                            </div>
                        </div>

                        <label>
                            <input type="checkbox" checked="checked" name="safedel">&nbsp; Safe delivery</label>
                            <input type="submit" value="CHECKOUT" class="btn" name="save">
                    </form>
                </div>
            </div>

            <div class="col-25">
                <div class="bill_container">
                    <h4>Cart<span class="price" style="color: black;"><i class="fa fa-shopping-cart"></i><b>
                    <?php
                         echo $totalpizza;
                    ?>
                    </b></span></h4>
                    <table>
                        <?php
                            $i=1;
                            while($rowpizza = mysqli_fetch_array($querydata)){
                                $rowPizzaID = $rowpizza["Pizza_ID"];                   //Pizza_ID array
                                echo "<tr><td style=\"width:100%\">" . "Pizza " . $i;
                                echo "</td><td style=\"width:100%\"><span class=\"price\">" . "₹" . $rowpizza["B_Price"] . "</span></td></tr>";
                                $i++; 
                            }
                       ?>
                    </table>
                    <hr>
                    <p><b>Total</b> <span class="price" style="color: black;"><b>
                    <?php
                            echo "₹".$totalprice;
                       ?>
                    </b></span></p>
                </div>
            </div>
        </div>
        <br><br>
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
        <div class="social" >
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