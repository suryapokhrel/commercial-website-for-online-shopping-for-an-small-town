<?php include 'header.php';?>
<?php include 'head.php';?>
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
  echo '<button class="btn btn-primary shop-item-button2" type="button"><i class="fas fa-heart "></i></button>'; 
  echo '</div>';          
  echo '</div>';
}
echo '</div>';
echo '</div>';
?>
<?php include 'footer.php';?>