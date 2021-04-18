<?php
   session_start();

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
        $_SESSION['topping_exp'] = implode(', ',$toppingarray);
        // echo $_SESSION['topping_exp'];
    
        $Cust_ID=1;
        //cust_ID get from importings from login thingy..... Require 'login.php';

        //making sure there is no pending cart.....time_stamp is not null
        $timeobj = mysqli_query($conn, "SELECT Order_ID from orders where Cust_ID = $Cust_ID and O_Date_Time is NULL");
        while($row = mysqli_fetch_array($timeobj)){
            $time = $row["Order_ID"];                     //new time
        }
        if(empty($time)){
            $sql_query1 = mysqli_query($conn,"INSERT INTO Orders (Cust_ID) VALUES('$Cust_ID')"); //initiating order_ID when time stamp is not null for the cust_ID
        }

        $orderIDobj = mysqli_query($conn,"SELECT Order_ID FROM Orders where order_id IN(SELECT max(order_ID) from orders where Cust_ID = $Cust_ID);");//getting order_ID
        while($row = mysqli_fetch_array($orderIDobj)){
            $rowOrderID = $row["Order_ID"];                     //new Order_ID
        }
        $_SESSION['OrderID_exp'] = $rowOrderID;
        // echo $_SESSION['OrderID_exp'];

        //calculating b_Price.....price of each pizza
            //get sum of all selected ingredients ka price from ingredients table
            $pizza_B_price= mysqli_query($conn,"SELECT SUM(In_Price) as sum1 from ingredients where In_Name IN('$topping','$crust','$sauce','$cheese');");
            while($row = mysqli_fetch_array($pizza_B_price)){
                    $rowPrice = $row["sum1"];                   //new B_Price
                }

        $sql_query2 = mysqli_query($conn,"INSERT INTO Bill_Items (Cust_ID, Order_ID, B_Price) VALUES('$Cust_ID', '$rowOrderID', '$rowPrice');");

        //getting Pizza_ID from Bill_Items
        $PizzaIDobj = mysqli_query($conn, "SELECT Pizza_ID FROM Bill_Items where Order_ID = $rowOrderID;");
        while($row = mysqli_fetch_array($PizzaIDobj)){
            $PizzaIDvar = $row["Pizza_ID"];                     //new Pizza_ID
        }
        $_SESSION['PizzaID_exp'] = $PizzaIDvar;
        // echo $_SESSION['PizzaID_exp'];
        
        //getting crust_ID, Sauce_ID, Cheese_ID
        $crust_query = (mysqli_query($conn,"SELECT Ingr_ID from ingredients where In_Name = '$crust'"));
        while($row = mysqli_fetch_array($crust_query)){
            $Crust_ID = $row["Ingr_ID"];                     //new Crust_ID
        }
        $_SESSION['CrustID_exp'] = $Crust_ID;
        // echo $_SESSION['CrustID_exp'];

        $cheese_query = (mysqli_query($conn,"SELECT Ingr_ID from ingredients where In_Name = '$cheese'"));
        while($row = mysqli_fetch_array($cheese_query)){
            $Cheese_ID = $row["Ingr_ID"];                     //new Cheese_ID
        }
        $_SESSION['CheeseID_exp'] = $Cheese_ID;
        // echo $_SESSION['CheeseID_exp'];

        $sauce_query = (mysqli_query($conn,"SELECT Ingr_ID from ingredients where In_Name = '$sauce'"));
        while($row = mysqli_fetch_array($sauce_query)){
            $Sauce_ID = $row["Ingr_ID"];                     //new Sauce_ID
        }
        $_SESSION['SauceID_exp'] = $Sauce_ID;
        // echo $_SESSION['SauceID_exp'];

        //inserting crust, sauce, cheese
        $sql_query3 = mysqli_query($conn,"INSERT INTO needs (Pizza_ID, Ingr_ID) VALUES('$PizzaIDvar', '$Crust_ID')");

        $sql_query4 = "INSERT INTO needs (Pizza_ID, Ingr_ID) VALUES('$PizzaIDvar', '$Sauce_ID')";
        mysqli_query($conn, $sql_query4);
        $sql_query5 = "INSERT INTO needs (Pizza_ID, Ingr_ID) VALUES('$PizzaIDvar', '$Cheese_ID')";
        mysqli_query($conn, $sql_query5);

        //inserting all selected toppings
        if(!empty($toppingarray)) {
            $i=0;
            $arrayLength = count($toppingarray);
            while($i<$arrayLength)
            {
                $topping = $toppingarray[$i];
                $toppingIDobj = mysqli_query($conn,"SELECT Ingr_ID from ingredients where In_Name='$topping';");
                while($row = mysqli_fetch_array($toppingIDobj)){
                    $topping_ID = $row["Ingr_ID"];                     //new topping_ID
                }
                $i+=1;
                $sql_queryn = mysqli_query($conn,"INSERT into needs(Pizza_ID,Ingr_ID) values('$PizzaIDvar','$topping_ID')");
            }
            echo "Pizza Successfully Added to Cart!<a href=\"http://localhost/onlinePizzaOrderingSystem/Nan_home_web/billing.php\"><button>go to cart</button></a>";
             }


        mysqli_close($conn);
    }
?>