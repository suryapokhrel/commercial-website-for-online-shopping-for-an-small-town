
<?php
    include "Backend/includes/connection.php";
    include 'head.php';
    $getProducts = oci_parse($conn, "SELECT * FROM PRODUCT");
    oci_execute($getProducts);

    while($row = oci_fetch_array($getProducts, OCI_BOTH)){
        $id = $row['PRODUCT_ID'];
        $name = $row['PRODUCT_NAME'];
        $description = $row['PRODUCT_DESCRIPTION'];
        $category = $row['PRODUCT_CATEGORY'];
        $prie = $row['PRODUCT_PRICE'];
        $quantity = $row['PRODUCT_QUANTITY'];
        $availability = $row['PRODUCT_AVAILABILITY'];
        $allergyinfo = $row['ALLERGIC_INFORMATION'];
        $maxorder = $row['MAX_ORDER'];
        $minorder = $row['MIN_ORDER'];
        if(!empty($row['IMAGES'])){
            $image = 'static/images/'.$row['IMAGES'];
        }
        $shopid = $row['SHOP_ID_FK'];
    }
?>
<?php
if(isset($_POST['search'])){
    $category = $_POST['q'];
    $product = oci_parse($conn,"Select * from product where PRODUCT_CATEGORY=lower('$category')");
    oci_execute($product);
    if(($row = oci_fetch_array($product, OCI_BOTH)) == false) { 
        echo '<h2 class="section-header" style="text-align:center;">The Product is not available at the moment</h2>';
    }
}?>
<?php
if(isset($_POST['search'])){
    $category = $_POST['q'];
    $product = oci_parse($conn,"Select * from product where PRODUCT_CATEGORY=lower('$category')");
    
    oci_execute($product);
    echo '<div class="container content-section">';   
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
    echo ' <span class="shop-item-price">' .'$'. $row[3] . '</span>';
    echo '<button class="btn btn-primary shop-item-button" type="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>';
    echo '&nbsp; &nbsp;';
    echo '<button class="btn btn-primary shop-item-button2" type="button"><i class="fas fa-heart "></i></button>'; 
    echo '</div>';          
    echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}?>
<?php
if(isset($_POST['search'])){
    $category = $_POST['q'];
    $product = oci_parse($conn,"Select * from product where PRODUCT_NAME=lower('$category')");
    
    oci_execute($product);
    echo '<div class="container content-section">';   
    echo '<div class="shop-items">';
    while(($row = oci_fetch_array($product, OCI_BOTH)) != false) { 
    echo '<div class="shop-item">';
    echo '<span class="shop-item-title">'. $row[1] . '</span>';
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
    echo ' <span class="shop-item-price">' .'$'. $row[3] . '</span>';
    echo '<button class="btn btn-primary shop-item-button" type="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>';
    echo '&nbsp; &nbsp;';
    echo '<button class="btn btn-primary shop-item-button2" type="button"><i class="fas fa-heart "></i></button>'; 
    echo '</div>';          
    echo '</div>';
    }
    echo '</div>';
    echo '</div>';
}?>