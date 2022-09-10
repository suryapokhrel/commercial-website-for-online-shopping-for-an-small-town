<?php
    include "Backend/includes/connection.php";
    INCLUDE 'head.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'head.php'; ?>
    <title>Display Products</title>

    <style>
      .buttonse{
        background-color:lightblue;
        font-size:30px;
        border-radius:4px;
        padding:5px;
        color:black;
      }
    </style>
</head>
<body>
<?php include "header.php"; ?>
<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<div style="font-size:40px; text-align:center;" >
    <input type="radio" id="name" name="order" value="name">
    <label for="name" style="font-family: 'Dancing Script', cursive;" for="sortn">Sort by Product Category</label>
   <input type="radio" id="price" name="order" value="price">
  <label for="price" style="font-family: 'Dancing Script', cursive;" for="sortp">Sort by Shop Type</label>
  <button class="buttonse" type="submit" name="submit">Submit</button>
</div>
</form>
<?php
$conn = oci_connect('TestSchema', '12345', '//localhost/xe') or die(oci_error()); 
if(isset($_POST['submit'])){
    @$radio=$_POST['order'];
        if($radio=="name"){
        $product = oci_parse($conn,"SELECT * from product ORDER BY PRODUCT_CATEGORY ASC");
        oci_execute($product);
        echo '<div class="container content-section" style="background-color:antiquewhite;">';   
        echo '<div class="shop-items">';
        while(($row = oci_fetch_array($product, OCI_BOTH)) != false) { 
        echo '<div class="shop-item">';
        echo '<span class="shop-item-title" style="background-color:lightpink;">'. $row[3] . '</span>';
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
        }
        elseif($radio=="price"){
            $product = oci_parse($conn,"SELECT * FROM product, shop where product.SHOP_ID_FK= shop.SHOP_ID ORDER BY SHOP_TYPE ASC");  
            oci_execute($product);
            echo '<div class="container content-section" style="background-color:antiquewhite;">';   
            echo '<div class="shop-items">';
            while(($row = oci_fetch_array($product, OCI_BOTH)) != false) { 
            echo '<div class="shop-item">';
            echo '<span class="shop-item-title" style="background-color:lightblue;">'. $row[15] . '</span>';
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
        }  
}?>

<!-- for the fruit category -->
<?php 
$conn = oci_connect('TestSchema', '12345', '//localhost/xe') or die(oci_error()); 
$stid = oci_parse($conn,"Select * from product");
oci_execute($stid);
echo '<div class="container content-section">';   
echo '<h2 class="section-header">Products</h2>';
echo '<h3 class="h3">';
echo 'Enjoy the best foods from all over Checkhhuderfax';
echo '</h3>';
echo '<div class="shop-items">';
while(($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
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
    echo ' <span class="shop-item-price">'. "$" . $row[4] . '</span>';
    echo '<a href="Backend/addToCart.php?id='.$row['PRODUCT_ID'].'"><button class="btn btn-primary shop-item-button" type="button" onclick="addToCart();"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button></a>';
    echo '&nbsp; &nbsp;';
    echo '<button class="btn btn-primary shop-item-button2" type="button"><i class="fas fa-heart "></i></button>';
    echo '</div>';          
    echo '</div>';
  }
  echo '</div>';
  echo '</div>';
?>
</body>
</html>
<?php include "footer.php"; ?>