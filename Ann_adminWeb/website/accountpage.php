<?php
session_start();
require_once('..\login_reg\config.php');
if (!isset($_SESSION['username'])) {
    die("Failed to load website/log in.<br>Have you logged in? <a href=\"..\login_reg\login_land.php\">Log in</a>");
} else {
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Account | Pizzeria Admins</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">    
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}

        .chg_pw {
            width: 100%; 
            text-align: right;
        }
        
        /* Button used to open the contact form - fixed at the bottom of the page */
        #chg_pw_btn, .open-button {
            background-color: #004e68;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: relative;
            width: 280px;
        }

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text], .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus, .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
            opacity: 1;
        }
    </style>
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
                    <a href="accountpage.php" class="weblink active">
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
                
                Account
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
            <!-- employee details -->
            <div class="card-single" style="margin:20px">
                <!-- employee Name -->
                <h1>
                <?php
                    echo $_SESSION['username'];
                ?>
                </h1> 
                <div class="chg_pw_div">
                    <button id="chg_pw_btn" class="open-button" onclick="openForm()"><h3>Edit Password</h3></button>
                    <div class="form-popup" id="myForm">
                        <form action="accountpage2.php" method="post" class="form-container">
                            <h1>Change Password</h1>

                            <label for="oldpw"><b>Current Password</b></label>
                            <input type="password" placeholder="Enter current password" name="oldpw" required>

                            <label for="newpw"><b>New Password</b></label>
                            <input type="password" placeholder="Enter new password" name="newpw" required>

                            <label for="retypepw"><b>Retype Password</b></label>
                            <input type="password" placeholder="Retype new password" name="retypepw" required>

                            <button type="submit" class="btn" name='chg_pw'>Save Changes</button>
                            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                        </form>
                    </div>
                </div>

                <script>
                    function openForm() {
                        document.getElementById("myForm").style.display = "block";
                        document.getElementById("chg_pw_btn").style.display = "none";
                    }

                    function closeForm() {
                        document.getElementById("myForm").style.display = "none";
                        document.getElementById("chg_pw_btn").style.display = "inline";
                    }
                </script>
            </div> <!-- .card-single -->

            <a href="../login_reg/login_land.php">
                <div class="card-single small">
                    <div>
                        <h3>Sign Out</h3> 
                    </div> <!-- text sign out -->
                    <div>
                        <span class="las la-sign-out-alt"></span>
                    </div> <!-- icon sign out -->
                </div> <!-- .card-single sign out -->
            </a>
        </main> <!-- main -->
    </div> <!-- .main-content -->

</body>
</html>