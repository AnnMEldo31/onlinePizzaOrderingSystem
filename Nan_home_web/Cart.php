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

    if (!isset($_SESSION['cust_name'])) {
        die("Failed to load website/log in.<br>Have you logged in? <a href=\"login_reg\login_land.php\">Log in</a>");
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart | PIZZERIA</title>
        <link rel="stylesheet" href="homepage.css">
        <link rel="stylesheet" href="cart.css">
        <script src="cart.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> <!--buttons-->
        <script src="https://kit.fontawesome.com/931749e247.js" crossorigin="anonymous"></script> <!--buttons-->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            .btns {
            background-color: #ED820E;
            border: none;
            color: white;
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            display: flex;
        }
        </style>
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

        <!--cart table starts here-->
        <h3 class="heading">YOUR CART</h3><br>
        <table class="center">
        
            <?php
            if (!isset($_SESSION['OrderID_exp'])) {
                 echo "You have not placed an order.";
            } else {
                $Order_ID = $_SESSION['OrderID_exp'];
                
                $PizzaIDArr ="SELECT Pizza_ID, Ingrs, Price FROM pizzaingr_disp where Pizza_ID IN (SELECT Pizza_ID FROM bill_items WHERE Order_ID = $Order_ID)";
                
                $data = mysqli_query($conn,$PizzaIDArr);
                
                $i = 1;
                while($rowpizza = mysqli_fetch_array($data)){
                    $rowPizzaID = $rowpizza['Pizza_ID'];
                    
                    echo "<tr><td>Pizza " . $i;echo "<br>".$rowpizza['Ingrs'];
                    echo "</td><td>" . "₹" . $rowpizza["Price"] . "</td><td>";
            ?>
            <a href = "delete.php?id= <?php echo $rowPizzaID?>"><i class="fas fa-minus-circle" style="color: red;"></i></a></td></tr>
            <?php
                    $i++;
                }
            
                //show discount details
                $query_offerapplied = "SELECT offer_id, total_price, final_price FROM orders WHERE Order_ID=$Order_ID";
                $result_offerapplied = mysqli_query($conn, $query_offerapplied);
                $row_offerapplied = mysqli_fetch_array($result_offerapplied);
                $a = $row_offerapplied['offer_id'];
                $b = $row_offerapplied['total_price'];
                $c = $row_offerapplied['final_price'];
                if ($row_offerapplied['offer_id'] == 0) {
                    echo '<tr><td><b>Final Price</b></td><td><b> ₹'.$c.'</b></td></tr>';
                } else {
                    $query_offerapplied2 = "SELECT offer_desc FROM offer_table WHERE offer_id=$a";
                    $result_offerapplied2 = mysqli_query($conn, $query_offerapplied2);
                    $row_offerapplied2 = mysqli_fetch_array($result_offerapplied2);
                    echo '<tr><td><b>Total Price before Discount</b></td><td><b> ₹'.$b.'</b></td></tr>';
                    echo '<tr><td><b>Discount Applied ('.$row_offerapplied2['offer_desc'].')</b></td><td><b> − ₹'.$b-$c.'</b></td></tr>';
                    echo '<tr><td><b>Final Price after Discount</b></td><td><b> ₹'.$c.'</b></td></tr>';
                }
            }
            ?>
        </table>

        <!--cart table ends here-->
        <div style="padding-left:25%;padding-top:2%">
        <?php
            if (isset($_SESSION['OrderID_exp'])) {
                echo '<a href="BILLING.php" class="button">GO TO CHECKOUT</a>
                <a href="#" class="button" onclick="document.getElementById(\'id01\').style.display=\'block\'">APPLY DISCOUNT</a>
                <a href="BuildIT_1.php" class="button">CONTINUE SHOPPING</a>';
            } else {
                echo '<a href="BuildIT_1.php" class="button">ORDER NOW</a>';
            }
        ?>
    
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content">
                    <header class="w3-container w3-black"> 
                        <span onclick="document.getElementById('id01').style.display='none'" 
                        class="w3-button w3-display-topright">&times;</span>
                        <h2>DISCOUNTS</h2>
                    </header>
                    <div class="w3-container">
                        <form action="applyoffer.php" method="post"> <!-- applyoffer.php -->
                            <?php 
                            $query_availoffer = "SELECT offer_desc, offer_id FROM offer_table WHERE offer_day = dayname(curdate());";
                            $result_availoffer = mysqli_query($conn, $query_availoffer);
                            while($row_availoffer = mysqli_fetch_array($result_availoffer)) {
                                echo '<input type="radio" name="radio_offer" value="'.$row_availoffer['offer_id'].'"> '.$row_availoffer['offer_desc'].'<br>';
                            }
                            ?>
                            <input type="radio" name="radio_offer" value="0"> None

                            <br>
                            <input class="btns" type="submit" value="APPLY" class="btn" name="applyoffer">
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
<?php
mysqli_close($conn);
?>

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
</html>