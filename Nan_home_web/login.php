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
	<link rel="stylesheet" href="forms.css">
    <title>Log in | Pizzeria </title>
</head>
<body>
    <form action="Homepage.php" method="post">
	<div class="container">
		<h1>Log in</h1><h3> or <a href="login_reg/registration.html">Register</a></h3>
		
		<input type="text" name="log_username" id="username" placeholder="Username" required>
		<input type="password" name="log_pw" id="pw" placeholder="Password" required>
		<input type="submit" name="cust_login" value="Log In">
	</div>
    Go to <a href="Homepage.php">HOME</a>
	</form>
</body>
</html>