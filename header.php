<?php ob_start(); session_start(); ?>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
    <div class="containerHeader fixed-top">
        <div class="grid-container">
            <div class="grid-item">
                <h5>We give the best deals at the best price hurry UP!! and order</h5>
            </div>
            <div class="grid-item2">
                <a href="#"><img class="logoimg" src="./static/images/background/logo.png" alt="logo img"></a>
                <h3>CHFFreshSales</h3>
                <div class="search-container">
                    <form method="post" action="index.php">
                        <input class="search" style="color:black;" type="text" placeholder="   Search.." name="q">
                        <button type="submit" name ="search">Submit</button>
                        <a class="pageName" href="login.php"><i class="fa fa-sign-in" ></i></a>
                        <a href="cart.php" class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                        <a href="wishlist.php" class="wishlist"><i class="fas fa-heart "></i></a>
                        <a class="link" href="backend/logout.php" style="text-decoration:none; color:black;"><i class="fa fa-sign-out" ></i></a>
                    </form>
                </div>
                <a class="pageName2" href="login.php"><i class="fa fa-sign-in" aria-hidden="true"> </i></a>
                <a href="cart.php" class="cart2"><i class="fa fa-shopping-cart" aria-hidden="true"> </i></a>
                <a href="wishlist.php" class="wishlist2"><i class="fas fa-heart "></i></a>
                <a href="backend/logout.php" class="link2" style="text-decoration:none;"><i class="fa fa-sign-out" ></i></a>
            </div>
            <div class="grid-item3">
                <div class="search-container2">
                    <form action="index.php">
                        <input class="search" style="color:black;" type="text" placeholder="   Search..">
                        <button type="submit">Submit</button>
                    </form>
                </div>
                <div class="topnav" id="myTopnav">
                    <a href="index.php">Home</a>
                    <?php if(isset($_SESSION["cid"])){echo "<a href='customerSetting.php'>Profile</a>";}elseif(isset($_SESSION["tid"])){echo "<a href='traderSetting.php'>Profile</a>";} ?>
                    <!-- <a href="#">Profile</a> -->
                    <a href="aboutus.php">About Us </a>
                    <a href="fruits.php">Fruits </a>
                    <a href="vegetable.php">Vegetables </a>
                    <a href="productdisplay.php">Products </a>
                    <div class="dropdown">
                        <button class="dropbtn">Other Categories</a>
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="meat.php">Meat</a>
                            <a href="seafood.php">Seafood</a>
                            <a href="dairy.php">Dairy products</a>
                            <a href="bakery.php">Bakery products</a>
                            <a href="fastfood.php">Fast Food</a>
                            <a href="cereal.php">Cereals</a>
                        </div>
                        
                    </a>
                    </div>
                    <a href="contactus.php">Contact Us </a>
                        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                </div>
            </div>
        </div>
    </div>
    