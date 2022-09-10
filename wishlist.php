<?php
    include "header.php";
    // session_start();
    if(isset($_SESSION['cid']) && !empty($_SESSION['cid'])){
        include "Backend/includes/connection.php";

        empty($_SESSION['cid']) ? $ID = $_SESSION['tid'] : $ID = $_SESSION['cid'];

        $getWishlistID = oci_parse($conn, "SELECT WISHLIST_ID FROM WISHLIST WHERE CUSTOMER_ID_FK='$ID'");
        oci_execute($getWishlistID);

        $id = oci_fetch_array($getWishlistID, OCI_BOTH);

        $getWishlistItems = oci_parse($conn, "SELECT PRODUCT_NAME, PRODUCT_PRICE FROM PRODUCT P, WISHLIST_PRODUCT WP WHERE WP.PRODUCT_ID_FK=P.PRODUCT_ID AND WP.WISHLIST_ID_FK='$id[0]'");
        oci_execute($getWishlistItems);

        while($row = oci_fetch_array($getWishlistItems, OCI_BOTH)){
            $productName = $row['PRODUCT_NAME'];
            $productPrice = $row['PRODUCT_PRICE'];
        }
    }
    else{
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php"; ?>
    <link rel="stylesheet" href="static/CSS/wishlist.css">
    <title>Wishlist</title>
</head>
<body>
    <section class="container content-section">
        <h2 class="section-header">Wishlist</h2>
        <div class="whishlist-row">
            <span class="whishlist-item whishlist-header whishlist-column">ITEM</span>
            <span class="whishlist-price whishlist-header whishlist-column">PRICE($)</span>
        </div>
        <?php
            include "Backend/includes/connection.php";

            empty($_SESSION['cid']) ? $ID = $_SESSION['tid'] : $ID = $_SESSION['cid'];

            $getWishlistID = oci_parse($conn, "SELECT WISHLIST_ID FROM WISHLIST WHERE CUSTOMER_ID_FK='$ID'");
            oci_execute($getWishlistID);

            $id = oci_fetch_array($getWishlistID, OCI_BOTH);

            $getWishlistItems = oci_parse($conn, "SELECT PRODUCT_NAME, PRODUCT_PRICE, IMAGES FROM PRODUCT P, WISHLIST_PRODUCT WP WHERE WP.PRODUCT_ID_FK=P.PRODUCT_ID AND WP.WISHLIST_ID_FK='$id[0]'");
            oci_execute($getWishlistItems);

            while($row = oci_fetch_array($getWishlistItems, OCI_BOTH)){
                echo "<div class='whishlist-row'>";
                    echo "<div class='whishlist-item whishlist-column'>";
                        echo "<img class='whishlist-item-image' src='static/images/".$row["IMAGES"]."' width='100' height='100'>";
                        echo "<span class='whishlist-item-title'>".$row["PRODUCT_NAME"]."</span>";
                    echo "</div>";
                    echo "<span class='whishlist-price cart-column'>".$row["PRODUCT_PRICE"]."</span>";
                echo "</div>";

            }
        ?>
    </section>
    <!-- Footer -->
    <?php include "footer.php";?>
</body>
</html>