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

    session_start();
    if(isset($_POST['save'])){

        $O_House_No = $_POST['b_house'];
        $O_Street_No = $_POST['b_street'];
        $O_Pin_Code = $_POST['b_pin'];
        $O_Mail = $_POST['b_mail'];
        $Contact_No = $_POST['b_ph_no'];
        $Pay = $_POST['pay'];
        $price = $_SESSION['Tot_Price'];
        $Order_ID = $_SESSION['OrderID_exp'];
        // $num_pizzas = $_SESSION['pizzanum'];

        $query1 = "UPDATE orders SET O_Date_Time = CURRENT_TIMESTAMP, 
        O_House_No = '$O_House_No', 
        O_Street_No = '$O_Street_No', 
        O_Pin_Code = '$O_Pin_Code', 
        O_Mail = '$O_Mail', 
        Contact_No = '$Contact_No', 
        Pay = '$Pay', 
        Total_Price = '$price' 
        where Order_ID = $Order_ID";
        
        if(mysqli_query($conn, $query1)){
            echo "successful checkout";
        }
        else{
            echo "Error: " . $query1 . "" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }  
?>