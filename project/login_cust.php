<?php
     $conn = mysqli_connect('localhost','root','');
     mysqli_select_db($con,'dbms_project');
         $C_Username = $_POST['C_Username'];
         $C_Password = $_POST['C_Password'];
 
         $s = "select * from Cust_login_table where name = '$name'";
         $result = mysqli_query($con,$s);
         $num = mysqli_num_rows($result);
         if($sum == 1){
             echo"username Already Taken";
         }else{
         $cust_login="INSERT INTO Cust_login_table (C_Username,C_Password) VALUES('$C_Username','$C_Password')";
         mysqli_query($con,$cust_login);
         echo"Login successfull";
         }
?>