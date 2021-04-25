<?php
session_start();
require_once('login_reg\config.php');
if (!isset($_SESSION['cust_id'])) {
    die("Failed to load website/log in.<br>Have you logged in? <a href=\"login.php\">Log in</a>");
}
$cid = $_SESSION['cust_id'];
    
if(isset($_POST['cust_editContacts'])) {
    $newphno = $_POST['phone'];
    $newemail = $_POST['email'];
    
    $query_contacts = "update cust_acct set c_ph_no='$newphno', c_mail='$newemail' where cust_id=$cid;";
    if(mysqli_query($conn, $query_contacts)){
        $msg = "successful updation";
    } else {
        $msg = "Error: Unsuccessful updation. " . $query_contacts . " " . mysqli_error($conn);
    }
    echo "<script>window.alert('$msg')</script>";
}

if(isset($_POST['cust_editPassword'])) {
    $oldpw = $_POST['oldpw'];
    $newpw = $_POST['newpw'];
    $retypepw = $_POST['retypepw'];
    
    $query_pw = "select cust_id from cust_acct where cust_id=$cid and c_password='$oldpw';";
    if(mysqli_query($conn, $query_pw)){
        if(strcmp($newpw,$retypepw)==0) {
            $query_updatepw = "update cust_acct set c_password='$newpw' where cust_id=$cid;";
            if(mysqli_query($conn, $query_updatepw)){
                $msg = "successful updation";        
            } else {
                $msg = "Error: Unsuccessful updation. " . $query_updatepw . " " . mysqli_error($conn);
            }
        } else {
            $msg = "New(".$newpw.") and Retyped(".$retypepw.") passwords mismatch.";
        }
    } else {
        $msg = "Error: Wrong Old Password";
    }
    echo "<script>window.alert('$msg')</script>";
}

if(isset($_POST['cust_addAddress'])) {
    $newhno = $_POST['houseno'];
    $newstrno = $_POST['streetno'];
    $newpincode = $_POST['pincode'];

    $query_addrnew = "";
    $result_addrnew=mysqli_query($conn, $query_addrnew);
    $row_addrnew=mysqli_fetch_assoc($result_addrnew);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accountstyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> <!--buttons-->
    <script src="https://kit.fontawesome.com/931749e247.js" crossorigin="anonymous"></script>
    <title>Account | Pizzeria</title>
</head>
<body>
    <!--top nav start-->
    <nav>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fa fa-bars" id="btn"></i>
            <i class="fa fa-times" id="cancel"></i>
        </label>
        <img src="pizza_pics/logo.png">
        <div class="pizzaName">
            PIZZERIA
        </div>
        <ul>
            <li><a href="Homepage.php">HOME</a></li>
            <li><a href="BuildIT_1.php">BUILD IT</a></li>
            <li><a href="#">OFFERS</a></li>
            <li><a href="#">ABOUT US</a></li>
            <li><a href=""><?php echo $_SESSION['cust_name']."'s"; ?> ACCOUNT</a></li>
        </ul>
    </nav>
    <!--top nav end-->

    <!-- Customer profile, Addresses, signout -->
    <main>

        <!-- customer query -->
        <?php
            $querycust="SELECT c_name, c_username, c_ph_no, c_mail from cust_acct where cust_id='$cid'";
            $resultcust=mysqli_query($conn, $querycust);
            $rowcust=mysqli_fetch_assoc($resultcust);
        ?>
        
        <!-- customer details -->
        <div class="card-single">
            <!-- customer Name -->
            <h1>
            <?php
                echo $rowcust['c_name'];
            ?>
            </h1> 
            <!-- customer Username -->
            <p class="username"><?php echo $rowcust['c_username']; ?></p> <!-- customer Username -->
            <!-- customer Phone,Mail -->
            <a href="#"><i class="far fa-envelope"></i><?php echo " ".$rowcust['c_mail']; ?></a>
            <a href="#"><i class="fas fa-phone-alt"></i><?php echo " ".$rowcust['c_ph_no']; ?></a>
            <a href="editprofilepage.php"><button id="editcontacts">Edit Profile</button></a>
        </div> <!-- .card-single -->
    
        <!-- customer addresses -->
        <div class="cust_addr">
            <div class="card-header">
                <h3>Saved Addresses</h3>
                <a href="addaddrpage.php"><button>Add More</button></a>
            </div> <!-- .addr_table .card-header -->

            <div class="card-body">
                <table style="width:100%">
                    <thead id="table header">
                        <tr>
                            <th id="sno"><strong>S.No.</strong></th>
                            <th id="pincode"><strong>Pin Code</strong></th>
                            <th id="street"><strong>Street No.</strong></th>
                            <th id="house"><strong>House No.</strong></th>
                            <th id="edit"></th>
                            <th id="delete"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $queryaddr="select c_pin_code, c_street_no, c_house_no from c_address where cust_id = '$cid'";
                        $resultaddr=mysqli_query($conn, $queryaddr);
                        $numaddr = mysqli_num_rows($resultaddr);
                        if ($numaddr > 0) {
                            $count = 1;
                            while($rowaddr=mysqli_fetch_assoc($resultaddr)) {
                                //use row to fetch the element of each column
                                echo "<tr>
                                    <td>".$count."</td>
                                    <td>".$rowaddr["c_pin_code"]."</td>
                                    <td>".$rowaddr["c_street_no"]."</td>
                                    <td>".$rowaddr["c_house_no"]."</td>
                                    <td id=\"edit\"><button>Edit</button></td>
                                    <td id=\"delete\"><button>Delete</button></td>
                                </tr>";
                                $count += 1;
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </tbody>
                </table> <!-- table for addresses -->
            </div> <!-- .addr_table .card-body -->
        </div> <!-- .cust_addr -->
    
        <!-- sign out -->
        <a href="login.php">
            <div class="signout">
                <div>
                    <h3>Sign Out</h3> 
                </div> <!-- text sign out -->
                <div>
                    <span class="las la-sign-out-alt"></span>
                </div> <!-- icon sign out -->
            </div> <!-- .card-single sign out -->
        </a>
        
    </main> <!-- Customer profile, Addresses, signout -->

</body>
</html>