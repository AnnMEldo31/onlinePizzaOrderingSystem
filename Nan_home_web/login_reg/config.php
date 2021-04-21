<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name="dbms_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (!$conn) {
  die("MySQL Connection failed: " . mysqli_connect_error());
}
?>