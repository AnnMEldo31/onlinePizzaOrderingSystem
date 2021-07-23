<?php
session_start();
require_once('login_reg\config.php');
if (!isset($_SESSION['cust_name'])) {
    die("Failed to load website/log in.<br>Have you logged in? <a href=\"..\login_reg\login_land.php\">Log in</a>");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Build It | Pizzeria</title>
        <link rel="stylesheet" href="homepage.css">
        <link rel="stylesheet" href="BuildIT_1.css">
        <script src="buildIt.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> <!--buttons-->
        <script src="https://kit.fontawesome.com/931749e247.js" crossorigin="anonymous"></script> <!--buttons-->
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
                <li><a href="..\project\offer.php">OFFERS</a></li>
                <li><a href="..\project\about_us.html">ABOUT US</a></li>
                <li><a href="accountpage.php"><?php echo $_SESSION['cust_name']."'s"; ?> ACCOUNT</a></li>
            </ul>
        </nav>
        <!--top nav end-->


        <div style="height: auto;">
            <!--tab start-->
            <div class="tab">
                <button class="tablinks" onclick="ingred(event, 'crust')" id="defaultOpen">CRUST</button>
                <button class="tablinks" onclick="ingred(event, 'sauce')">CHEESE & SAUCE</button>
                <button class="tablinks" onclick="ingred(event, 'toppings')">TOPPINGS</button>
            </div>
            
            <div class="cartfloat">
                <a href="http://localhost/onlinePizzaOrderingSystem/Nan_home_web/Cart.php">
                    <button>
                        <i class="fa fa-shopping-cart" style="font-size: 36px;"></i>
                    </button>
                </a>
            </div>
        
            
            <!--all tabs form starts here-->    
            <form action="BuildIt.php" method="post">
                <!--crust tab--> 
                <div id="crust" class="tabcontent">
                    <div class="card" style="float: left;">
                        <img src="pizza_pics/thincrust.jpg" style="width:100%;">
                        <div class="cardtxt">
                            <h5>Thin Crust</h5>
                            <p class="price">₹50</p>
                        </div>
                        <p>
                            <div class ="radio">
                                <input class="radio__input" type="radio" name="pizza" id="thin" value="thin" checked>
                                <label class="radio__label" for="thin">ADD</label>
                            </div>
                        </p>
                    </div>

                    <div class="card" style="float: left;">
                        <img src="pizza_pics/stuffed.jpg" style="width:100%;">
                        <div class="cardtxt">
                            <h5>Stuffed Crust</h5>
                            <p class="price">₹50</p>
                        </div>
                            <p>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="pizza" id="stuffed" value="stuffed">
                                    <label class="radio__label" for="stuffed">ADD</label>
                                </div>
                            </p>
                    </div>
                
                    <div class="card" style="float: left;">
                        <img src="pizza_pics/vegan.jpg" style="width:100%;">
                        <div class="cardtxt">
                            <h5>Vegan Crust</h5>
                            <p class="price">₹60</p>
                        </div>
                        <p>
                            <div class ="radio">
                                <input class="radio__input" type="radio" name="pizza" id="vegan" value="vegan">
                                <label class="radio__label" for="vegan">ADD</label>
                            </div>
                        </p>
                    </div>

                    <div class="card" style="float: left;">
                        <img src="pizza_pics/thick.jpg" style="width:100%;">
                        <div class="cardtxt">
                            <h5>Thick Crust</h5>
                            <p class="price">₹55</p>
                        </div>
                        <p>
                            <div class ="radio">
                                <input class="radio__input" type="radio" name="pizza" id="thick" value="thick">
                                <label class="radio__label" for="thick">ADD</label>
                            </div>
                        </p>
                    </div>

                    <div class="card" style="float: right;margin-bottom: 12%;">
                        <img src="pizza_pics/pan.jpg" style="width:100%;">
                        <div class="cardtxt">
                            <h5>Pan Crust</h5>
                            <p class="price">₹55</p>
                        </div>
                        <p>
                            <div class ="radio">
                                <input class="radio__input" type="radio" name="pizza" id="pan" value="pan">
                                <label class="radio__label" for="pan">ADD</label>
                            </div>
                        </p>
                    </div>

                    <div class="card" style="float: left; ">
                        <img src="pizza_pics/neapoletan.jpg" style="width:100%;">
                        <div class="cardtxt">
                            <h5>Neapoletan</h5>
                            <p class="price">₹45</p>
                        </div>
                        <p>
                            <div class ="radio">
                                <input class="radio__input" type="radio" name="pizza" id="neo" value="neopolitan">
                                <label class="radio__label" for="neo">ADD</label>
                            </div>
                        </p>
                    </div>

                    <div class="card" style="float: left; ">
                        <img src="pizza_pics/sicilian.jpg" style="width:100%;">
                        <div class="cardtxt">
                            <h5>Sicilian Crust</h5>
                            <p class="price">₹45</p>
                        </div>
                        <p>
                            <div class ="radio">
                                <input class="radio__input" type="radio" name="pizza" id="sicilian" value="siscilian">
                                <label class="radio__label" for="sicilian">ADD</label>
                            </div>
                        </p>
                    </div>

                    <div class="card" style="float: right; ">
                        <img src="pizza_pics/focaccia.jpg" style="width:100%;">
                        <div class="cardtxt">
                            <h5>Focaccia Crust</h5>
                            <p class="price">₹50</p>
                        </div>
                        <p>
                            <div class ="radio">
                                <input class="radio__input" type="radio" name="pizza" id="focassia" value="focassia">
                                <label class="radio__label" for="focassia">ADD</label>
                            </div>
                        </p>
                    </div>
                </div>

                <!--sauces-->
                <div id="sauce" class="tabcontent">

                        <div class="vline"></div>
                        
                        <div class="card" style="float: left;">
                            <img src="pizza_pics/sauce.jpg" style="width:100%;">
                            <div class="cardtxt">
                                <h5>Neapolitan sauce</h5>
                                <p class="price">₹99</p>
                            </div>
                            <p>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="saucerad" id="radio1" value="neopolitan_less">
                                    <label class="radio__label" for="radio1">LESS</label>
                                </div>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="saucerad" id="radio2" value="neopolitan_normal" checked>
                                    <label class="radio__label" for="radio2">NORMAL</label>
                                </div>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="saucerad" id="radio3" value="neopolitan_extra">
                                    <label class="radio__label" for="radio3">EXTRA</label>
                                </div>
                            </p>
                        </div>

                        <div class="card" style="float: left;">
                            <img src="pizza_pics/whites.jpg" style="width:100%;">
                            <div class="cardtxt">
                                <h5>Betchamel Sauce</h5>
                                <p class="price">₹99</p>
                            </div>
                            <p>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="saucerad" id="radio4" value="Betchamel_less">
                                    <label class="radio__label" for="radio4">LESS</label>
                                </div>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="saucerad" id="radio5" value="Betchamel_normal">
                                    <label class="radio__label" for="radio5">NORMAL</label>
                                </div>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="saucerad" id="radio6" value="Betchamel_extra">
                                    <label class="radio__label" for="radio6">EXTRA</label>
                                </div>
                            </p>
                        </div>

                        <div class="card" style="float: left;">
                            <img src="pizza_pics/cheese.jpg" style="width:100%;">
                            <div class="cardtxt">
                                <h5>Motzerella Cheese</h5>
                                <p class="price">₹99</p>
                            </div>
                            <p>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="cheeserad" id="radio7" value="Motzerella_less">
                                    <label class="radio__label" for="radio7">LESS</label>
                                </div>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="cheeserad" id="radio8" value="Motzerella_normal" checked>
                                    <label class="radio__label" for="radio8">NORMAL</label>
                                </div>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="cheeserad" id="radio9" value="Motzerella_extra">
                                    <label class="radio__label" for="radio9">EXTRA</label>
                                </div>
                            </p>
                        </div>

                        <div class="card" style="float: left;">
                            <img src="pizza_pics/cheddar.jpg" style="width:100%;">
                            <div class="cardtxt">
                                <h5>Yellow Cheddar Cheese</h5>
                                <p class="price">₹99</p>
                            </div>
                            <p>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="cheeserad" id="radio10" value="Cheddar_less">
                                    <label class="radio__label" for="radio10">LESS</label>
                                </div>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="cheeserad" id="radio11" value="Cheddar_normal">
                                    <label class="radio__label" for="radio11">NORMAL</label>
                                </div>
                                <div class ="radio">
                                    <input class="radio__input" type="radio" name="cheeserad" id="radio12" value="Cheddar_extra">
                                    <label class="radio__label" for="radio12">EXTRA</label>
                                </div>
                            </p>
                        </div>
                </div>
                
                <!--toppings div-->
                <div id="toppings" class="tabcontent">
                    <div class="back">
                        <div style="float: left; margin-left: 10%; margin-top: 5%;">
                            <h3>NON-VEG OPTIONS</h3>
                            <br>
                            <label class="container_crust">Salami
                                <input type="checkbox" id="salami" name="ingr[]" value="salami">
                                <span class="checkmark_crust"></span>
                            </label>
                            <label class="container_crust">Pepperoni
                                <input type="checkbox" id="pepperoni" name="ingr[]" value="pepperoni">
                                <span class="checkmark_crust"></span>
                            </label>
                            <label class="container_crust">Bacon
                                <input type="checkbox" id="bacon" name="ingr[]" value="bacon">
                                <span class="checkmark_crust"></span>
                            </label>
                            <label class="container_crust">Chicken
                                <input type="checkbox" id="chicken" name="ingr[]" value="chicken">
                                <span class="checkmark_crust"></span>
                            </label>
                            <label class="container_crust">Ham
                                <input type="checkbox" id="ham" name="ingr[]" value="ham">
                                <span class="checkmark_crust"></span>
                            </label>
                            <label class="container_crust">Sausage
                                <input type="checkbox" id="sausage" name="ingr[]" value="sausage">
                                <span class="checkmark_crust"></span>
                            </label>
                        </div>
                       
                        <div style="float: right; margin-right: 15%; margin-top: 5%;">
                            <h3>VEG OPTIONS</h3>
                            <br>
                            <label class="container_crust">Tomato
                                <input type="checkbox" id="tomato" name="ingr[]" value="tomato">
                                <span class="checkmark_veg"></span>
                            </label>
                            <label class="container_crust">Onion
                                <input type="checkbox" id="onion" name="ingr[]" value="onion">
                                <span class="checkmark_veg"></span>
                            </label>
                            <label class="container_crust">Pineapple
                                <input type="checkbox" id="pineapple" name="ingr[]" value="pineapple">
                                <span class="checkmark_veg"></span>
                            </label>
                            <label class="container_crust">Jalapeño
                                <input type="checkbox" id="jalepeno" name="ingr[]" value="jalepeno">
                                <span class="checkmark_veg"></span>
                            </label>
                            <label class="container_crust">Bell Pepper
                                <input type="checkbox" id="bellpepper" name="ingr[]" value="bellpepper">
                                <span class="checkmark_veg"></span>
                            </label>
                            <label class="container_crust">Mushroom
                                <input type="checkbox"id="mushroom" name="ingr[]" value="mushroom">
                                <span class="checkmark_veg"></span>
                            </label>
                        </div>

                        <input type="submit" value="ADD TO CART" class="btn" name="save">
                    </div>
                </div>
                <!--tab end-->
            </form>
            <!--all tabs form ends here-->
        </div> <!--to keep every tab content-->



        <script>
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>

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