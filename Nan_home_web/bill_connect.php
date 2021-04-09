<?php
   $severname="localhost";
   $username="root";
   $password="";
   $database_name="nanpizza";

   $conn = mysqli_connect($severname,$username,$password,$database_name);
   //check connection
   if(!$conn){
        die('Connection Failed :' . mysqli_connect_error());
    }

    if(isset($_POST['save'])){

        $b_fname = $_POST['b_fname'];
        $b_mail = $_POST['b_mail'];
        $b_adr = $_POST['b_adr'];
        $b_ph_no = $_POST['b_ph_no'];
        $b_pin = $_POST['b_pin'];
        $b_street = $_POST['b_street'];
        $b_house = $_POST['b_house'];
        $pay = $_POST['pay'];

        $sql_query="INSERT INTO billing(b_fname, b_mail, b_adr, b_ph_no, b_pin, b_street, b_house, pay) VALUES('$b_fname', '$b_mail', '$b_adr', '$b_ph_no', '$b_pin', '$b_street', '$b_house', '$pay')";

        if(mysqli_query($conn, $sql_query)){
            echo "checkout successful!";
        }
        else{
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }  
?>