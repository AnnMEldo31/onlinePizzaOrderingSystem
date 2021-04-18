<?php
session_start();
require_once('..\login_reg\config.php');

if(isset($_POST['adm_login'])) {
    $log_username = $_POST['log_username'];
    $log_pw = $_POST['log_pw'];

    $log_sqlStmt = "select a_username, a_password from adm_acct where a_username='$log_username' and a_password='$log_pw';";
    $log_sqlQuery = mysqli_query($conn, $log_sqlStmt);
    $row = mysqli_fetch_assoc($log_sqlQuery);
    if (!$row) {
        die("The username or password provided is incorrect.<br><a href=\"..\login_reg\login_land.php\">Try again</a>");
    } else {
        $_SESSION['username'] = $log_username;
    }
} else {
    die("Failed to load website/log in.<br>Have you logged in? <a href=\"..\login_reg\login_land.php\">Log in</a>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Dashboard | Pizzeria Admins</title>
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
                    <a href="index.php" class="weblink active">
                        <span class="las la-home"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="datapage.php" class="weblink">
                        <span class="las la-server"></span>
                        <span>Database</span>
                    </a>
                </li>
                <li>
                    <a href="reportspage.php" class="weblink">
                        <span class="las la-chart-area"></span>
                        <span>Reports</span>
                    </a>
                </li>
                <li>
                    <a href="editspage.php" class="weblink">
                        <span class="las la-edit"></span>
                        <span>Edit Inventory</span>
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
                
                Dashboard
            </h2> <!-- sidebar view toggle button, page title -->

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search Here" />
            </div> <!-- .search-wrapper -->

            <div class="user-wrapper">
                <div>
                    <small>Current User</small>
                    <h4>
                        <?php
                        echo $log_username;
                        ?>
                    </h4>
                </div> <!-- current account -->
            </div> <!-- .user-wrapper -->
        </header> <!-- page title, sidebar view toggle button, search, current account -->

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            $query="SELECT * from cust_acct";
                            $result=mysqli_query($conn, $query);
                            
                            echo mysqli_num_rows($result);
                            ?>
                        </h1> <!-- data customers -->
                        <span>Customers</span>
                    </div> <!-- text customers -->
                    <div>
                        <span class="las la-users"></span>
                    </div> <!-- icon customers -->
                </div> <!-- .card-single customers -->

                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            $query="SELECT * from orders";
                            $result=mysqli_query($conn, $query);
                            
                            echo mysqli_num_rows($result);
                            ?>
                        </h1> <!-- data orders -->
                        <span>Orders</span>
                    </div> <!-- text orders -->
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div> <!-- icon orders -->
                </div> <!-- .card-single orders -->

                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            $query="SELECT * from cust_acct";
                            $result=mysqli_query($conn, $query);
                            
                            echo mysqli_num_rows($result);
                            ?>
                        </h1> <!-- data offers -->
                        <span>Today's Offers</span>
                    </div> <!-- text offers -->
                    <div>
                        <span class="lar la-star"></span>
                    </div> <!-- icon offers -->
                </div> <!-- .card-single offers -->

                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            $query="SELECT SUM(Total_Price) as tot from orders";
                            $result=mysqli_query($conn, $query);
                            $income=mysqli_fetch_assoc($result);
                            
                            echo "₹".$income["tot"];
                            ?>
                        </h1> <!-- income data -->
                        <span>Today's Income</span>
                    </div> <!-- text income -->
                    <div>
                        <span class="las la-money-bill"></span>
                    </div> <!-- icon income -->
                </div> <!-- .card-single income -->
            </div> <!-- cards quickoverview -->

            <div class="recent-grid">
                <div class="recentorders">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Orders</h3>
                            <a href="datapage.php"><button>See all <span class="las la-arrow-right"></span></button></a>
                        </div> <!-- .recentorders .card-header -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="width:100%">
                                    <thead id="table header">
                                        <tr>
                                            <th id="o_id"><strong>Order ID</strong></th>
                                            <th id="c_id"><strong>Customer</strong></th>
                                            <th id="date"><strong>Date Time</strong></th>
                                            <th id="price"><strong>Total Price</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql_orders="select Order_ID, Cust_ID, O_Date_Time, Total_Price from orders order by o_date_time desc";
                                        $result_orders=mysqli_query($conn, $sql_orders);
                                        $num_orders = mysqli_num_rows($result_orders);
                                        if ($num_orders > 0) {
                                            $count_order = 0;
                                            while($row_5order=mysqli_fetch_assoc($result_orders) and $count_order!=5) {
                                                //use row to fetch the element of each column
                                                echo "<tr>
                                                    <td>".$row_5order["Order_ID"]."</td>
                                                    <td>".$row_5order["Cust_ID"]."</td>
                                                    <td>".$row_5order["O_Date_Time"]."</td>
                                                    <td>".$row_5order["Total_Price"]."</td>
                                                </tr>";
                                                $count_order+=1;
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        ?>
                                    </tbody>
                                </table> <!-- table for last 5 orders -->
                            </div> <!-- .table-responsive -->
                        </div> <!-- .recentorders .card-body -->
                    </div> <!-- .recentorders.card -->
                </div> <!-- .recentorders -->

                <div class="recentcustomers">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Customers</h3>
                            <a href="datapage.php"><button>See all <span class="las la-arrow-right"></span></button></a>
                        </div> <!-- .recentcustomers .card-header -->

                        <div class="card-body">
                            <?php
                                $sql_cust = mysqli_query($conn, "select Cust_ID, C_Name, C_Ph_No from cust_acct order by cust_id desc");
                                $num_cust = mysqli_num_rows($sql_cust);
                                if ($num_cust > 0) {
                                    $count_cust = 0;
                                    while(($row_cust = mysqli_fetch_assoc($sql_cust)) and $count_cust!=5) {
                                        echo 
                            "<div class='customer'>
                                <div class='info'>
                                    <small>".$row_cust["Cust_ID"]."</small>
                                    <h4>".$row_cust["C_Name"]."</h4>
                                    <div class='contact'>
                                        <span class='las la-phone'></span>
                                        <span class='phonenum'><small>".$row_cust["C_Ph_No"]."</small></span>
                                    </div> <!-- .customer.info.contact -->
                                </div> <!-- .customer.info -->
                            </div> <!-- .customer -->";
                                        $count_cust+=1;
                                    } //endwhile loop for creating the divs with the customer data
                                } //endif condition for finding if customers actually exist 
                                //and creating divs with customer data if they exist ||$row_cust["C_Name"] ||$row_cust["C_ID"]
                            ?> <!-- php script to create customer card-body -->
                        </div> <!-- .recentcustomers .card-body -->
                    </div> <!-- .recentcustomers.card -->
                </div> <!-- .recentcustomers -->
            </div> <!-- .recent-grid -->
        </main> <!-- quick overview, recent orders, recent customers -->
    </div> <!-- not the sidebar -->

</body>
</html>