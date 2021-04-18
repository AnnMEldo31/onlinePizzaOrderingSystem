<?php
session_start();
require_once('..\login_reg\config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Reports | Pizzeria Admins</title>
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
                        <span>Reports</span>
                    </a>
                </li>
                <li>
                    <a href="datapage.php" class="weblink">
                        <span class="las la-server"></span>
                        <span>Database</span>
                    </a>
                </li>
                <li>
                    <a href="reportspage.php" class="weblink active">
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
                
                Reports
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
                        echo $_SESSION['username'];
                        ?>
                    </h4>
                </div> <!-- current account -->
            </div> <!-- .user-wrapper -->
        </header> <!-- page title, sidebar view toggle button, search, current account -->

        <main>
            
        </main> <!-- quick overview, recent orders, recent customers -->
    </div> <!-- not the sidebar -->

</body>
</html>