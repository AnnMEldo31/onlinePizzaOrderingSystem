<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headerfootercss.css">
    <link rel="stylesheet" href="offer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> <!--buttons-->
    <script src="https://kit.fontawesome.com/931749e247.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <!--top nav start-->
    <nav>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fa fa-bars" id="btn"></i>
            <i class="fa fa-times" id="cancel"></i>
        </label>
        <img src="logo.png">
        <div class="pizzaName">
            PIZZERIA
        </div>
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">BUILD IT</a></li>
            <li><a href="#">OFFERS</a></li>
            <li><a href="#">ABOUT US</a></li>
            <li><a href="#">MY ACCOUNT</a></li>
        </ul>
    </nav>
    <!--top nav end-->
          
          <table >
          <tr>
            <th id="Offer_ID"></th>
            <th id="OffeR_Discount"></th>
            <th id="Offer_Desc"></th>
            <th id="Day"></th>
          </tr>
          <?php
          $conn = mysqli_connect("localhost","root","","dbms_project");
          if ($conn-> connect_error){
            die("connection failed:". $conn-> connect_error);
          }
          $sql="select Offer_ID, Offer_Discount, Offer_Desc, Day from Offer_table ";
          $result=$conn-> query($sql);

          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()) {
              echo "<tr>
              <td>".$row["Offer_ID"]."</td>
              <td>".$row["Offer_Discount"]."</td>
              <td>".$row["Offer_Desc"]."</td>
              <td>".$row["Day"]."</td>
               </tr>";
            }
            echo "</table>";
          } else {
            echo "0 result";
          } 
          $conn-> close();
          ?>
          </table>
         <!--footer start-->
    <div class="social" style="position: fixed;bottom: 0px;">
        <a href="#"><i class="fab fa-twitter" style="color: lightgrey; font-size: 30px;"></i>
        </a> &nbsp;
        <a href="#"><i class="fab fa-instagram" style="color: lightgrey; font-size: 30px;"></i>
        </a> &nbsp;
        <a href="#"><i class="fab fa-facebook" style="color: lightgrey; font-size: 30px;"></i>
        </a>      
    </div>
    <!--footer end-->   
    
</body>
</html>
