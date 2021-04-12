<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name="pizzeriadb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
</head>
<body>
    <a href="index.php">home</a>
</body>
</html>
<?php
$query="SELECT * from cust_acct";
$result=mysqli_query($conn, $query);

if (mysqli_num_rows($result)> 0) {
    // output data of each row
    while($row=mysqli_fetch_array($result)) {
        $ph_h = number_format(($row["C_Ph_No"]/10000),0,'','');
        $ph_l = number_format((($row["C_Ph_No"]-$ph_h)/10000),0,'','');
        echo "Name: ". $row["C_Name"].", Username: ".$row["C_Username"].", Perks: ".$row["C_Perks"].", Contacts: +91 ".$ph_h." ".$ph_l." ".$row["C_Mail"]."<br>";
    }
} else {
    echo "0 results";
}

?>

<?php
mysqli_close($conn);
?>