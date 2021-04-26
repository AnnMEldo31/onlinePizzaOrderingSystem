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
    #if coming from the registration page
    if (isset($_POST['cust_register'])) {
		$cust_name = $_POST['name'];
        $cust_uname = $_POST['username'];
        $cust_phno = $_POST['phone'];
		$cust_mail = $_POST['email'];
		$cust_pw = $_POST['pw'];
    
        $reg_sqlStmt = "insert into cust_acct(c_username, c_name, c_mail, c_ph_no, c_password) values('$cust_uname', '$cust_name', '$cust_mail', '$cust_phno', '$cust_pw')";
        $reg_sqlQuery = mysqli_query($conn, $reg_sqlStmt);
        if ($reg_sqlQuery == false) {
            echo "Error during account creation<br>";
            echo "<a href=\"registration.html\">Register Again</a>";
        }
	} else { #if coming from elsewhere, that is from a signout or new session
		unset($_SESSION['cust_uname']);
        unset($_SESSION['cust_name']);
        unset($_SESSION['cust_id']);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="headerfootercss.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> <!--buttons-->
    <style>
        body {
            position: relative;
            background-image: url('pizza_pics/login_bg4.jfif');
            background-size: cover;
            opacity: 1;
            z-index: -1;
        }
        .back {
            position: absolute;
            top: 40%;
            left: 8%;
            height: auto;
            background: rgba(0,0,0,0.8);
            color: white;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
        }
        h1, input {
            opacity: 1;
            margin: 5px;
        }
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
    <title>Log in | Pizzeria </title>
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
            <li><a href="../project/offer.php">OFFERS</a></li>
            <li><a href="../project/about_us.php">ABOUT US</a></li>
            <li><a href="login_reg/registration.html">REGISTER</a></li>
        </ul>
    </nav>
    <!--top nav end-->
    <div class="back">
        <form action="Homepage.php" method="post">
        <div class="container">
            <h1>LOG IN</h1>
            
            <input type="text" name="log_username" id="username" placeholder="Username" required> <br>
            <input type="password" name="log_pw" id="pw" placeholder="Password" required> <br>
            <input class="btns" type="submit" name="cust_login" value="Log In">
        </div>
        </form>
    </div>
</body>
</html>