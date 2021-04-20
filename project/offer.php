<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name="dbms_project 1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (!$conn) {
  die("MySQL Connection failed: " . mysqli_connect_error());
}

session_start();
$Offer_ID = $_POST['Offer_ID'];
$Offer_Discount = $_POST['Offer_Discount'];
$Offer_Desc = $_POST['Offer_Desc'];
$Day = $_POST['Day'];

$query="INSERT INTO Offer_table (Offer_ID,Offer_discount,Offer_Desc,Day) VALUES('Offer_ID','Offer_discount','Offer_Desc','Day')";

if(mysqli_query($conn,$query)){
    echo "successful checkout";
}
else{
    echo "Error:" .$query ."" .mysqli_error($conn);
}
mysqli_close($conn);
?>
