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
    <title>Customers | Pizzeria Admins</title>
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
                    <a href="customerspage.php" class="weblink active">
                        <span class="las la-users"></span>
                        <span>Customers</span>
                    </a>
                </li>
                <li>
                    <a href="orderspage.php" class="weblink">
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
                
                Customers
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
                <div class="card-header">
                    <h3>General Customer Data</h3>
                </div> <!-- .card-header -->

                <div class="card-body">
                    <div class="table-responsive">
                        <table style="width:100%">
                            <thead id="table header">
                                <tr>
                                    <th id="id"><strong>ID</strong></th>
                                    <th id="name"><strong>Name</strong></th>
                                    <th id="uname"><strong>Username</strong></th>
                                    <th id="mail"><strong>e-Mail</strong></th>
                                    <th id="phno"><strong>Phone</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql="select cust_id, c_name, c_username, c_mail, c_ph_no from disp_cust order by cust_id asc";
                                $result=mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                if ($num > 0) {
                                    while($row=mysqli_fetch_assoc($result)) {
                                        echo "<tr>
                                            <td>".$row["cust_id"]."</td>
                                            <td>".$row["c_name"]."</td>
                                            <td>".$row["c_username"]."</td>
                                            <td>".$row["c_mail"]."</td>
                                            <td>".$row["c_ph_no"]."</td>
                                        </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </tbody>
                        </table> <!-- table for all customers with details -->
                    </div> <!-- .table-responsive -->
                </div> <!-- .card-body -->
            </div> <!--.card -->
        </main> <!-- customers -->
    </div> <!-- .main not the sidebar -->

</body>
</html>