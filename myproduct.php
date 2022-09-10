<?php include 'head.php';?>
<?php 
$conn = oci_connect('TestSchema', '12345', '//localhost/xe') or die(oci_error()); 
$stid = oci_parse($conn,"SELECT * FROM PRODUCT,SHOP, TRADER WHERE SHOP.TRADER_ID_FK = TRADER.TRADER_ID AND PRODUCT.SHOP_ID_FK= SHOP.SHOP_ID AND TRADER_ID= 'TRD1'");
oci_execute($stid);
echo '<div class="container content-section">';   
echo '<h2 class="section-header">My Products</h2>';
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