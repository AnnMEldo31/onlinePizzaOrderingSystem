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

    if(isset($_POST['save'])){

        $O_House_No = $_POST['b_house'];
        $O_Street_No = $_POST['b_street'];
        $O_Pin_Code = $_POST['b_pin'];
        $O_Mail = $_POST['b_mail'];
        $Contact_No = $_POST['b_ph_no'];
        $Pay = $_POST['pay'];

        $sql_query="INSERT INTO orders (Cust_ID, O_House_No, O_Street_No, O_Pin_Code, O_Mail, Contact_No, Pay) VALUES('1', '$O_House_No', '$O_Street_No', '$O_Pin_Code', '$O_Mail', '$Contact_No', '$Pay')";

        if(mysqli_query($conn, $sql_query)){
            echo "successful checkout";
        }
        else{
            echo "Error: " . $sql_query . "" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }  
?>