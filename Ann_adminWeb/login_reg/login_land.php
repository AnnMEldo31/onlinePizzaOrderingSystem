<?php
require_once('config.php');
?>

<?php
	session_start();
?>

<?php
    #if coming from the registration page
    if (isset($_POST['adm_register'])) {
		$username = $_POST['username'];
		$password = $_POST['pw'];

        $reg_sqlStmt = "insert into adm_acct(a_username, a_password) values('$username', '$password')";
        $reg_sqlQuery = mysqli_query($conn, $reg_sqlStmt);
        if ($reg_sqlQuery == false) {
            echo "Error during account creation<br>";
            echo "<a href=\"registration.html\">Register Again</a>";
        }
	} else { #if coming from elsewhere, that is from a signout or new session
		unset($_SESSION['username']);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../website/style.css">
    <style>
		input {
			margin: 5px;
		}
	</style>
	<title>Log in | Pizzeria Admins</title>
</head>
<body>
	<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="../website/img/logo_BW.png" alt="pizzeria logo in black and white">
            <h2>PIZZERIA Admins</h2>
        </div>

        <div class="sidebar-menu">
			<ul>
				<li style="color:white;">Please Log In<br> to view admin pages</li>
			</ul>
        </div>
    </div>

	<div class="main-content">
		<header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> <!-- toggle bar icon -->
                
                Log In
            </h2> <!-- sidebar view toggle button, page title -->

        </header> <!-- page title, sidebar view toggle button, search, current account -->

		<main>
			<form action="..\website\index.php" method="post">
			<div class="container">
				<input type="text" name="log_username" id="username" placeholder="Username" required> <br>
				<input type="password" name="log_pw" id="pw" placeholder="Password" required> <br>

				<input type="submit" name="adm_login" value="Log In">
			</div>
			</form>
		</main>
	</div>
</body>
</html>