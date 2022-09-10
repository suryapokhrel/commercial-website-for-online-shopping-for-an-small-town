<!DOCTYPE html>
<html>
<head>
    <div style="Color:black;">
            <?php
    if(isset($_SESSION['cid']) && !empty($_SESSION['cid'])){
        echo 'WELCOMEEEE!!!';
    }
?>
</div>

    <?php include "head.php"; ?>
    <link rel="stylesheet" href="static/CSS/home.css">
    <script src="js/style.js" async></script>
    <title>Home</title>
</head>
<body>
    <?php include "header.php"; ?>
    <div class="feature-categories">
        <!-- slider -->
        <div id="feature" class="divPadding">
            <!-- slide-track -->
            <div class="feature-box">
                <!-- slide -->
                <img src="static/images/PROD9Bananas.jpg" alt="">
                <a href="fruits.php">
                    <h6>Fruits</h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/PROD1Chicken Wings.jpg" alt="">
                <a href="meat.php">
                    <h6>Meat Products </h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/PROD22Halibut.jpg" alt="">
                <a href="seafood.php">
                    <h6>Sea Food </h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/PROD11Cauliflower.jpg" alt="">
                <a href="vegetable.php">
                    <h6>Vegetables</h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/dry.png" alt="">
                <a href="#">
                    <h6>Dry fruits </h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/PROD16Chocolate Cake.jpg" alt="">
                <a href="dairy.php">
                    <h6>Dairy Products </h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/bakery.png" alt="">
                <a href="bakery.php">
                    <h6>Bakery Products </h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/drink.png" alt="">
                <a href="drink.php">
                    <h6>Drinks</h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/cere.png" alt="">
                <a href="cereal.php">
                    <h6>Cereals</h6>
                </a>
            </div>

            <!-- same all slides(Double) -->
            <div class="feature-box">
                <!-- slide -->
                <img src="static/images/PROD9Bananas.jpg" alt="">
                <a href="#">
                    <h6>fruits.php</h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/PROD1Chicken Wings.jpg" alt="">
                <a href="meat.php">
                    <h6>Meat Products </h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/PROD22Halibut.jpg" alt="">
                <a href="seafood.php">
                    <h6>Sea Food </h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/PROD11Cauliflower.jpg" alt="">
                <a href="vegetables.php">
                    <h6>Vegetables</h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/dry.png" alt="">
                <a href="#">
                    <h6>Dry fruits </h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/PROD16Chocolate Cake.jpg" alt="">
                <a href="dairy.php">
                    <h6>Dairy Products </h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/bakery.png" alt="">
                <a href="bakery.php">
                    <h6>Bakery Products </h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/drink.png" alt="">
                <a href="drinks.php">
                    <h6>Drinks</h6>
                </a>
            </div>
            <div class="feature-box">
                <img src="static/images/cere.png" alt="">
                <a href="cereal.php">
                    <h6>Cereals</h6>
                </a>
            </div>
        </div>
    </div>
    <?php
if(isset($_POST['search'])){
    include "Backend/includes/connection.php";
    $category = $_POST['q'];
    $product = oci_parse($conn,"Select * from product where PRODUCT_CATEGORY=lower('$category')");
    oci_execute($product);
    if(($row = oci_fetch_array($product, OCI_BOTH)) == false) { 
        echo '<h2 class="section-header" style="text-align:center; background-color:yellow;">'. $category.' is not available at the moment</h2>';
    }
}?>
<?php
if(isset($_POST['search'])){
    $category = $_POST['q'];
    $product = oci_parse($conn,"Select * from product where PRODUCT_CATEGORY=lower('$category')");
    
    oci_execute($product);
    echo '<div class="container content-section" style="background-color:antiquewhite;" id=fruits>';   
    echo '<div class="shop-items">';
    while(($row = oci_fetch_array($product, OCI_BOTH)) != false) { 
    echo '<div class="shop-item">';
    echo '<span class="shop-item-title">'. ucfirst($row[1]) . '</span>';
    echo "<img class='shop-item-image' src='static/images/" . $row[10] . "'>";
    echo '<br>';
    echo '<span class="shop-item-sdesc">' .$row[2] . '</span>';
    echo '<div class="star">';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '</div>';
    echo '<div class="shop-item-details">';
    echo ' <span class="shop-item-price">' .'$'. $row[4] . '</span>';
    echo '<a href="Backend/addToCart.php?id='.$row['PRODUCT_ID'].'"><button class="btn btn-primary shop-item-button" type="button" onclick="addToCart();"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button></a>';
    echo '<button class="btn btn-primary shop-item-button2" type="button"><i class="fas fa-heart "></i></button>'; 
    echo '</div>';          
    echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    
}?>
    <div class="banner" style="background-image: url('./static/images/background/heritage.jpg'); width: 100%; background-repeat: no-repeat;  background-size: cover;">
        <h4>Offer-Offer</h4>
        <h1>On trade with <big>CHFFreshSales</big></h1>
        <h2>Big 25% off <br></h2>
        <p>Shop with <big>CHFFreshSales</big> <br> Ease your Household!</p><br>
        <button>Shop Now</button>
    </div>
<?php 
$conn = oci_connect('TestSchema', '12345', '//localhost/xe') or die(oci_error()); 
$stid = oci_parse($conn,"Select * from product where PRODUCT_CATEGORY='fruits'");
oci_execute($stid);
echo '<div class="container content-section">';   
echo '<h2 class="section-header">Fruits</h2>';
echo '<h3 class="h3">';
echo 'Enjoy the best fruits from all over Checkhhuderfax';
echo '</h3>';
echo '<div class="shop-items">';
while(($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    echo '<div class="shop-item">';
    echo '<span class="shop-item-title">'. ucfirst($row[1]) . '</span>';
    echo "<a href='productDetail.php?id=".$row["PRODUCT_ID"]."'><img class='shop-item-image' src='static/images/" . $row[10] . "'></a>";
    echo '<br>';
    echo '<span class="shop-item-sdesc">' .$row[2] . '</span>';
    echo '<div class="star">';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '</div>';
    echo '<div class="shop-item-details">';
    echo ' <span class="shop-item-price">'. "$" . $row[4] . '</span>';
    echo '<a href="Backend/addToCart.php?id='.$row['PRODUCT_ID'].'"><button class="btn btn-primary shop-item-button" type="button" onclick="addToCart();"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button></a>';
    echo '&nbsp; &nbsp;';
    echo '<a href="Backend/wishlist.php?id='.$row['PRODUCT_ID'].'"><button class="btn btn-primary shop-item-button2" type="button"><i class="fas fa-heart "></i></button></a>';
    echo '</div>';          
    echo '</div>';
    }
    echo '</div>';
    echo '</div>';
?>
<?php 
$conn = oci_connect('TestSchema', '12345', '//localhost/xe') or die(oci_error()); 
$stid7 = oci_parse($conn,"Select * from product where PRODUCT_CATEGORY='fast food'");
oci_execute($stid7);
echo '<div class="container content-section">';   
echo '<h2 class="section-header">Fast Food</h2>';
echo '<h3 class="h3">';
echo 'Fast Food to enjoy';
echo '</h3>';
echo '<div class="shop-items">';
while(($row = oci_fetch_array($stid7, OCI_BOTH)) != false) {
    echo '<div class="shop-item">';
    echo '<span class="shop-item-title">'. ucfirst($row[1]) . '</span>';
    echo "<a href='productDetail.php?id=".$row["PRODUCT_ID"]."'><img class='shop-item-image' src='static/images/" . $row[10] . "'></a>";
    echo '<br>';
    echo '<span class="shop-item-sdesc">' .$row[2] . '</span>';
    echo '<div class="star">';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '</div>';
    echo '<div class="shop-item-details">';
    echo ' <span class="shop-item-price">'.'$' . $row[4] . '</span>';
    echo '<a href="Backend/addToCart.php?id='.$row['PRODUCT_ID'].'"><button class="btn btn-primary shop-item-button" type="button" onclick="addToCart();"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button></a>';
    echo '&nbsp; &nbsp;';
    echo '<a href="Backend/wishlist.php?id='.$row['PRODUCT_ID'].'"><button class="btn btn-primary shop-item-button2" type="button"><i class="fas fa-heart "></i></button></a>'; 
    echo '</div>';          
    echo '</div>';
}
echo '</div>';
echo '</div>';
?>

<?php 
$conn = oci_connect('TestSchema', '12345', '//localhost/xe') or die(oci_error()); 
$stidio = oci_parse($conn,"SELECT * from Product where PRODUCT_PRICE <= 5");
oci_execute($stidio);
echo '<div class="container content-section">';   
echo '<h2 class="section-header">Affordable Food Products</h2>';
echo '<h3 class="h3">';
echo 'Effective  food under 5 dollar';
echo '</h3>';
echo '<div class="shop-items">';
while(($row = oci_fetch_array($stidio, OCI_BOTH)) != false) {
    echo '<div class="shop-item">';
    echo '<span class="shop-item-title">'. ucfirst($row[1]) . '</span>';
    echo "<a href='productDetail.php?id=".$row["PRODUCT_ID"]."'><img class='shop-item-image' src='static/images/" . $row[10] . "'></a>";
    echo '<br>';
    echo '<span class="shop-item-sdesc">' .$row[2] . '</span>';
    echo '<div class="star">';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '    <i class="fas fa-star"></i>';
    echo '</div>';
    echo '<div class="shop-item-details">';
    echo ' <span class="shop-item-price">' .'$'. $row[4] . '</span>';
    echo '<a href="Backend/addToCart.php?id='.$row['PRODUCT_ID'].'"><button class="btn btn-primary shop-item-button" type="button" onclick="addToCart();"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button></a>';
    echo '&nbsp; &nbsp;';
    echo '<a href="Backend/wishlist.php?id='.$row['PRODUCT_ID'].'"><button class="btn btn-primary shop-item-button2" type="button"><i class="fas fa-heart "></i></button></a>'; 
    echo '</div>';          
    echo '</div>';
}
echo '</div>';
echo '</div>';
?> 

    
    <?php include "footer.php"; ?>
    <script>
    function addToCart(){
        // window.location='Backend/addToCart.php?id=<?php // $id; ?>';
    }
    </script>
</body>
</html>
