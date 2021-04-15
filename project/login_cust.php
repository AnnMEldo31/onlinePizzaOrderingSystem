<?php
    $Username=$_POST['Username'];
    $password=$_POST['password'];
    //database connection
    $con = new mysqli('localhost','root','','test');
    if($con->connect_error){
        die("failed to connect :" .$con->connect_error);
    }else{
        $stmt = $con->prepare("insert into customer_account(username,password)values(?,?)");
        $stmt->bind_param("ss",$username,$password);
        $stmt->execute();
        echo "login successfull...";
        $stmt->close();
        $con->close();
    }
?>