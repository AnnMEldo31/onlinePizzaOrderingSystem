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

        $toppingarray = $_POST['ingr'];
        $crust = $_POST['pizza'];
        $cheese = $_POST['cheeserad'];
        $sauce = $_POST['saucerad'];

        $topping = implode('\',\'', $toppingarray);
    
        //cust_ID get from importings from login thingy..... include 'login.php';
        $sql_query1 = "INSERT INTO Orders (Cust_ID) VALUES('1')"; //initiating order_ID
        if(mysqli_query($conn, $sql_query1)){
            echo "successful checkout1";
        }
        else{
            echo "Error: " . $sql_query1 . "" . mysqli_error($conn);
        }

        $orderIDobj = mysqli_query($conn,"SELECT max(Order_ID) FROM Orders where Cust_ID=1 and Total_Price=0.00;");//getting order_ID
        echo serialize($orderIDobj);

        //calculating b_Price.....price of each pizza
            //get sum of all selected ingredient ka price from ingredients table
            $pizza_B_price= mysqli_query($conn,"SELECT SUM(In_Price) from ingredients where In_Name IN('$topping')");
            

        $sql_query2 = "INSERT INTO Bill_Items (Cust_ID, Order_ID, B_Price) VALUES('1', $orderIDvar, (string)$pizza_B_price)";
        if(mysqli_query($conn, $sql_query2)){
            echo "successful checkout4";
        }
        else{
            echo "Error: " . $sql_query2 . "" . mysqli_error($conn);
        }

        //getting Pizza_ID from Bill_Items
        $PizzaIDvar = "SELECT Pizza_ID FROM Bill_Items where Order_ID = $orderIDvar";
        mysqli_query($conn, $PizzaIDvar);

        //inserting crust, sauce, cheese
        $sql_query3 = "INSERT INTO needs (Pizza_ID, Ingr_ID) VALUES('$PizzaIDvar', '$crust')";
        mysqli_query($conn, $sql_query3);
        $sql_query4 = "INSERT INTO needs (Pizza_ID, Ingr_ID) VALUES('$PizzaIDvar', '$sauce')";
        mysqli_query($conn, $sql_query4);
        $sql_query5 = "INSERT INTO needs (Pizza_ID, Ingr_ID) VALUES('$PizzaIDvar', '$cheese')";
        mysqli_query($conn, $sql_query5);

        //inserting all selected toppings
        if(!empty($topping)) {
            $i=0;
            while($topping[$i]) {
                $sql_queryn = "INSERT into needs(Pizza_ID,Ingr_ID) values";
                $sql_queryn .= "(".$PizzaIDvar.",";
                $toppingIDvar = "SELECT Ingr_ID from ingredients where Ingr_ID=\'".$topping[$i]."\.";
                $sql_queryn.= $toppingIDvar.")";
                mysqli_query($conn, $sql_queryn);
                $i += 1;
            }
        }



        if(mysqli_query($conn, $sql_queryn)){
            echo "successful checkout";
        }
        else{
            echo "Error: " . $sql_queryn . "" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }  
?>