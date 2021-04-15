<?php
    $conn = mysqli_connect('localhost','root','');
    mysqli_select_db($con,'dbms_project');
    //open the database..
    require('mysql_signup_cust.php');
    //customer details
        $C_Name = $_POST['C_Name'];
        $C_Mail = $_POST['C_Mail'];
        $C_Username = $_POST['C_Username'];
        $C_Password = $_POST['C_Password'];
        $C_Phone_No = $_POST['C_Ph_No'];
    //address
        $C_House_No = $_POST['C_House_No'];
        $C_Street_No = $_POST['C_Street_No'];
        $C_Pin_Code=$_POST['C_Pin_Code'];

        $s = "select * from cust_signup_table where name = '$name'";
        $result = mysqli_query($con,$s);
        $num = mysqli_num_rows($result);
        if($sum == 1){
            echo"username Already Taken";
        }else{
        $sqli_query1="INSERT INTO cust_signup_table (C_Id,C_Name, C_Mail,C_Username,C_Password,C_Ph_No) VALUES('1','$C_Name','$C_Mail','$C_Username','$C_Password','$C_Ph_No')";
        //execute query
        mysqli_query($con,$sql_query1);
        $sqli_query2="INSERT INTO address_table(C_House_No,C_Street_No,C_Pin_Code) VALUES('$C_House_No','$C_Street_No','$C_Pin_Code')";
        //execute query
        mysqli_query($con,$sql_query2);
        echo"signup successfull";
        }

?>