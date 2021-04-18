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
    echo $pizza_ID;
    $querydel = "DELETE FROM Bill_Items where Pizza_ID = $pizza_ID";
    $result = mysqli_query($conn, $querydel);

    if($result){
        echo "record deleted";
    }
    else{
        echo "delete failed";
    }
    ?>