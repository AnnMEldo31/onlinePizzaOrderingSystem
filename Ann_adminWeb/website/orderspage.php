<?php
session_start();
require_once('..\login_reg\config.php');
if (!isset($_SESSION['username'])) {
    die("Failed to load website/log in.<br>Have you logged in? <a href=\"..\login_reg\login_land.php\">Log in</a>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Orders | Pizzeria Admins</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">    
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
                    <a href="orderspage.php" class="weblink active">
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
                    <a href="reportspage.php" class="weblink">
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
                
                Orders
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
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width:100%">
                            <tr style="border-bottom: 2px solid #77aacc;">
                                <th id="o_id"><strong>Order ID</strong></th>
                                <th id="c_id"><strong>Customer ID</strong></th>
                                <th id="c_name"><strong>Customer Name</strong></th>
                                <th id="chkout"><strong>Checkout Time</strong></th>
                                <th id="amt"><strong>Bill Amount</strong></th>
                                <th id="addr"><strong>Address</strong></th>
                                <th id="contacts"><strong>Contacts</strong></th>
                                <th id="paytype"><strong>Payment Type</strong></th>
                                <th id="totalitems"><strong>Total items</strong></th>
                            </tr>
                            <?php 
                            $sql="select Order_ID, orders.Cust_ID, C.C_Name, O_Date_Time, Total_Price, O_House_No, O_Street_No, O_Pin_Code, O_Mail, Contact_No, Pay, Total_Orders from cust_acct as C natural join orders where O_Date_Time is not null order by O_Date_Time desc";
                            $result=mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);
                            if ($num > 0) {
                                while($row=mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                        <td>".$row["Order_ID"]."</td>
                                        <td>".$row["Cust_ID"]."</td>
                                        <td>".$row["C_Name"]."</td>
                                        <td>".$row["O_Date_Time"]."</td>
                                        <td>".$row["Total_Price"]."</td>
                                        <td>House No. ".$row["O_House_No"].", Street No. ".$row["O_Street_No"].", PinCode ".$row["O_Pin_Code"]."</td>
                                        <td>".$row["O_Mail"]." ".$row["Contact_No"]."</td>
                                        <td>".$row["Pay"]."</td>
                                        <td>".$row["Total_Orders"]."</td>
                                    </tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </table> <!-- table for all customers with details -->
                    </div> <!-- .table-responsive -->
                </div> <!-- .card-body -->
            </div> <!--.card -->
        </main> <!-- quick overview, recent orders, recent customers -->
    </div> <!-- not the sidebar -->

</body>
</html>