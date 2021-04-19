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
	<link rel="stylesheet" href="forms.css">
    <title>Log in | Pizzeria Admins</title>
</head>
<body>
    <form action="..\website\index.php" method="post">
	<div class="container">
		<h1>Log in</h1>
		
		<input type="text" name="log_username" id="username" placeholder="Username" required>
		<input type="password" name="log_pw" id="pw" placeholder="Password" required>

		<input type="submit" name="adm_login" value="Log In">
	</div>
	</form>
</body>
</html>