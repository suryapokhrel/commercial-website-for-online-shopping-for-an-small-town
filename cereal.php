<?php include 'header.php';?>
<?php include 'head.php';?>
<?php 
$conn = oci_connect('TestSchema', '12345', '//localhost/xe') or die(oci_error()); 
$stid9 = oci_parse($conn,"Select * from product where PRODUCT_CATEGORY='cereals'");
oci_execute($stid9);
echo '<div class="container content-section">';   
echo '<h2 class="section-header">Cereals</h2>';
echo '<h3 class="h3">';
echo 'Be healthy and eat quality cereals';
echo '</h3>';
echo '<div class="shop-items">';
while(($row = oci_fetch_array($stid9, OCI_BOTH)) != false) {
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
  echo '<button class="btn btn-primary shop-item-button2" type="button"><i class="fas fa-heart "></i></button>'; 
  echo '</div>';          
  echo '</div>';
}
echo '</div>';
echo '</div>';
?> 

<?php include 'footer.php';?>