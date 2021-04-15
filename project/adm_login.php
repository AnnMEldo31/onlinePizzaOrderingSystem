<?php
    $Username=$_POST['Username'];
    $password=$_POST['password'];
    //database connection
    $con = new mysqli('localhost','root','','test');
    if($con->connect_error){
        die("failed to connect :" .$con->connect_error);
    }else{
        $stmt = $con->prepare("insert into Admin_acct(a_user,a_pass)values(?,?)");
        $stmt->bind_param("ss",$username,$password);
        $stmt->execute();
        echo "login successfull...";
        $stmt->close();
        $con->close();
    }
?>