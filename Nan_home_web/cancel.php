<?php 
    $severname="localhost";
    $username="root";
    $password="";
    $database_name="dbms_project";

    $conn = mysqli_connect($severname,$username,$password,$database_name);
    //check connection
    if(!$conn){
        die('Connection Failed :' . mysqli_connect_error());
    }

    $Order_ID = $_GET['id'];-
    $querydel = "DELETE FROM Orders where Order_ID = $Order_ID and O_Date_Time is NULL";
    $result = mysqli_query($conn, $querydel);
    $conn->close();

    header("Location: http://localhost/onlinePizzaOrderingSystem/Nan_home_web/Homepage.php");
    exit();

    ?>