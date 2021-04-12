<?php
    $Username=$_POST['Username'];
    $password=$_POST['password'];
    //database connection
    $con = new mysqli('localhost','root','','dbms_project');
    if($con->connect_error){
        die("failed to connect :" .$con->connect_error);
    }else{
        $stmt = $con->prepare("insert into Admin_acct(a_user,a_pass)values(?,?)");
        $stmt->bind_para("ss",$username,$password);
        $stmt->execute();
        echo "login successfull...";
        $stmt->close();
        $con->close();
    }
?>