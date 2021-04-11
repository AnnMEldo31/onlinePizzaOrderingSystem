<?php
    $Username=$_POST['Username'];
    $password=$_POST['password'];
    //database connection
    $con = new mysqli('localhost','root','','test');
    if($con->connect_error){
        die("failed to connect :" .$con->connect_error);
    }else{
        $stmt = $con->prepare("insert into admin account(username,password)values(?,?)");
        $stmt->bind_para("ss",$username,$password);
        $stmt->execute();
        echo "admin account successfully...";
        $stmt->close();
        $con->close();
    }
?>