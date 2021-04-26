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

    $addr_id = $_GET['id'];
    $querydel = "DELETE FROM c_address where add_id = $addr_id";
    $result = mysqli_query($conn, $querydel);
    $conn->close();

    header("Location: http://localhost/onlinePizzaOrderingSystem/Nan_home_web/accountpage.php");
    exit();

?>