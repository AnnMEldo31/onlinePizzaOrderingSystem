<?php
session_start();
require_once('login_reg\config.php');
if (!isset($_SESSION['cust_id'])) {
    die("Failed to load website/log in.<br>Have you logged in? <a href=\"login.php\">Log in</a>");
}
$cid = $_SESSION['cust_id'];
$queryoldcust = "select c_ph_no, c_mail from cust_acct where cust_id=$cid;";
$resultoldcust=mysqli_query($conn, $queryoldcust);
$rowoldcust=mysqli_fetch_assoc($resultoldcust);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headerfootercss.css">
    <script src="https://kit.fontawesome.com/931749e247.js" crossorigin="anonymous"></script>
    <script>
        function openPage(pageName, elmnt, color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";               // Hide all elements with class="tabcontent" by default */
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";             // Remove the background color of all tablinks/buttons
            }
            document.getElementById(pageName).style.display = "block";// Show the specific tab content
            elmnt.style.backgroundColor = color;// Add the specific color to the button used to open the tab content
        }
        document.getElementById("defaultOpen").click();        // Get the element with id="defaultOpen" and click on it
    </script>
    <link rel="stylesheet" href="fullpagetab.css">
    <title>Edit Details | Pizzeria</title>
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
            <li><a href="accountpage.php"><?php echo $_SESSION['cust_name']."'s"; ?> ACCOUNT</a></li>
        </ul>
    </nav>
    <!--top nav end-->

    <main>
        <button class="tablink" onclick="openPage('Contacts', this, 'green')">Contacts</button>
        <button class="tablink" onclick="openPage('Password', this, 'orange')" id="defaultOpen">Password</button>

        <div id="Contacts" class="tabcontent">
            <h3>Edit Contacts</h3>
            <form action="accountpage.php" method="post">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" placeholder="<?php echo $rowoldcust['c_ph_no']; ?>"> <br>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="<?php echo $rowoldcust['c_mail']; ?>"> <br>

                <input type="submit" name="cust_editContacts" value="Save Changes">
            </form>
        </div>

        <div id="Password" class="tabcontent">
            <h3>Edit Password</h3>
            <form action="accountpage.php" method="post">
                <label for="oldpw">Old Password</label>
                <input type="password" name="oldpw" id="oldpw" required> <br>
                <label for="newpw">New Password</label>
                <input type="password" name="newpw" id="newpw" required> <br>
                <label for="retypepw">Retype New Password</label>
                <input type="password" name="retypepw" id="retypepw" required> <br>

                <input type="submit" name="cust_editPassword" value="Save Changes">
            </form>
        </div>
    </main>

</body>
</html>