<?php
    $conn = mysqli_connect('localhost','root','');
    mysqli_select_db($con,'dbms_project');
        $C_Name = $_POST['C_Name'];
        $C_Mail = $_POST['C_Mail'];
        $C_Username = $_POST['C_Username'];
        $C_Password = $_POST['C_Password'];
        $C_Phone_No = $_POST['C_Ph_No'];
        $C_House_No = $_POST['C_House_No'];
        $C_Street_No = $_POST['C_Street_No'];
        $C_Pin_Code=$_POST['C_Pin_Code'];

        $s = "select * from cust_signup_table where name = '$name'";
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);
        if($sum == 1){
            echo"username Already Taken";
        }else{
        $sql_query1="INSERT INTO cust_signup_table (C_Name, C_Mail,C_Username,C_Password,C_Ph_No)";
        mysqli_query($con,$sql_query1);
        echo"signup successfull";
        }
?>