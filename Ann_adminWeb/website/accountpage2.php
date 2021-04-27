<?php
session_start();
require_once('..\login_reg\config.php');
if (!isset($_SESSION['username'])) {
    die("Failed to load website/log in.<br>Have you logged in? <a href=\"..\login_reg\login_land.php\">Log in</a>");
} else {
    $username = $_SESSION['username'];
}

if(isset($_POST['chg_pw'])) {
    $oldpw = $_POST['oldpw'];
    $newpw = $_POST['newpw'];
    $repw = $_POST['retypepw'];
    echo $oldpw."<br>";
    echo $newpw."<br>";
    echo $repw."<br>";
    $query = "SELECT a_username, a_password FROM adm_acct WHERE a_password='$oldpw' AND a_username='$username'";
    if ($result = mysqli_query($conn, $query)) {
        echo "entered";
        if (strcmp($newpw,$repw)==0) {
            echo "entered2";
            $query2 = "UPDATE adm_acct SET a_password = '$newpw' WHERE a_username = '$username';";
            if ($result2 = mysqli_query($conn, $query2)) {
                echo "successful";
            } else {
                echo "unsuccessful";
            }
        } else {
            echo "ERROR: New and Retyped Passwords mismatch";
        }
    } else {
        echo "ERROR: Wrong Password";
    }
}

header("Location: http://localhost/onlinePizzaOrderingSystem/Ann_adminWeb/website/accountpage.php");
exit();
?>