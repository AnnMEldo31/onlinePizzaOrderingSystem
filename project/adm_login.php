<?php
     $conn = mysqli_connect('localhost','root','');
     mysqli_select_db($con,'dbms_project');
         $A_Username = $_POST['A_Username'];
         $A_Password = $_POST['A_Password'];
 
         $s = "select * from admin_login_table where name = '$name'";
         $result = mysqli_query($con,$s);
         $num = mysqli_num_rows($result);
         if($sum == 1){
             echo"username Already Taken";
         }else{
         $log="INSERT INTO admin_login_table (A_Username,A_Password) VALUES('$A_Username','$A_Password')";
         mysqli_query($con,$log);
         echo"Login successfull";
         }
?>