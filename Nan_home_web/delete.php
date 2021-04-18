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

    $pizza_ID = $_GET['id'];
    $querydel = "DELETE FROM Bill_Items where Pizza_ID = $pizza_ID";
    $result = mysqli_query($conn, $querydel);
    $conn->close();

    header("Location: http://localhost/onlinePizzaOrderingSystem/Nan_home_web/Cart.php");
    exit();

    ?>