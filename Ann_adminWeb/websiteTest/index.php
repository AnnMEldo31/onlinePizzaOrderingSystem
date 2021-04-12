<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name="pizzeriadb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (!$conn) {
  die("MySQL Connection failed: " . mysqli_connect_error());
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
                    <a href="" class="weblink active">
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
                </label>
                
                Dashboard
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search Here" />
            </div>

            <div class="user-wrapper">
                <div>
                    <small>Current User</small>
                    <h4>Jane Doe</h4>
                </div>
            </div>
        </header>

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
                        </h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            $query="SELECT * from cust_acct";
                            $result=mysqli_query($conn, $query);
                            
                            echo mysqli_num_rows($result);
                            ?>
                        </h1>
                        <span>Orders</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            $query="SELECT * from cust_acct";
                            $result=mysqli_query($conn, $query);
                            
                            echo mysqli_num_rows($result);
                            ?>
                        </h1>
                        <span>Today's Offers</span>
                    </div>
                    <div>
                        <span class="lar la-star"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            $query="SELECT * from cust_acct";
                            $result=mysqli_query($conn, $query);
                            
                            echo "₹".mysqli_num_rows($result);
                            ?>
                        </h1>
                        <span>Today's Income</span>
                    </div>
                    <div>
                        <span class="las la-money-bill"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="recentorders">
                    <div class="card">
                        <div class="card-header">
                            <h3>Today's Orders</h3>
                            <a href="datapage.php"><button>See all <span class="las la-arrow-right"></span></button></a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="width:100%">
                                    <thead id="table header">
                                        <tr>
                                            <th id="id"><strong>Order ID</strong></th>
                                            <th id="date"><strong>Date</strong></th>
                                            <th id="num"><strong>No of Items</strong></th>
                                            <th id="price"><strong>Total Price</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql_orders = "select Cust_ID, C_Name, C_Username, C_Ph_No from cust_acct";
                                        $result=mysqli_query($conn, $sql_orders);
                                        $num = mysqli_num_rows($result);
                                        if ($num > 0) {
                                            $counter = 0;
                                            while($row=mysqli_fetch_assoc($result) and $counter!=5) {
                                                //use row to fetch the element of each column
                                                echo("<tr><td>".$row["Cust_ID"]."</td><td>".$row["C_Name"]."</td><td>".$row["C_Username"]."</td><td>".$row["C_Ph_No"]."</td></tr>");
                                                $counter+=1;
                                            }
                                        } else {
                                            echo("0 results");
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="recentcustomers">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Customers</h3>
                            <a href="datapage.php"><button>See all <span class="las la-arrow-right"></span></button></a>
                        </div>

                        <div class="card-body">
                            <?php
                            $sql_cust = "select C_Name, C_Username, C_Ph_No from cust_acct";
                            $result=mysqli_query($conn, $sql_cust);
                            $num = mysqli_num_rows($result);
                            if ($num > 0) {
                                $counter = 0;
                                while($row=mysqli_fetch_assoc($result) and $counter!=5) {
                                    //use row to fetch the element of each column
                                    
                            echo "<div class='customer'>
                                <div class='info'>
                                    <div>
                                        <h4>"."Lewis H. Cunningham"."</h4>                                      <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class='contact'>
                                    <span class='las la-user-circle'></span>
                                    <span class='las la-comment'></span>
                                    <span class='las la-phone'></span>
                                </div>
                            </div>"
                            ?>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/2.jpg" width="40px" height="40px" alt="customer image">
                                    <div>
                                        <h4>Lewis H. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/2.jpg" width="40px" height="40px" alt="customer image">
                                    <div>
                                        <h4>Lewis H. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/2.jpg" width="40px" height="40px" alt="customer image">
                                    <div>
                                        <h4>Lewis H. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/2.jpg" width="40px" height="40px" alt="customer image">
                                    <div>
                                        <h4>Lewis H. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/2.jpg" width="40px" height="40px" alt="customer image">
                                    <div>
                                        <h4>Lewis H. Cunningham</h4>
                                        <small>CEO Excerpt</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>
</html>