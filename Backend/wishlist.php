<?php
    session_start();

    if(isset($_SESSION['cid']) && !empty($_SESSION['cid'])){
        include "includes/connection.php";

        $productID = $_GET['id'];
        $customerID = $_SESSION['cid'];
        $wishlistID = "";

        $getWishlistID = oci_parse($conn, "SELECT WISHLIST_ID FROM WISHLIST WHERE CUSTOMER_ID_FK='$customerID'");
        oci_execute($getWishlistID);

        $row = oci_fetch_array($getWishlistID, OCI_BOTH);
        $wishlistID = $row['WISHLIST_ID'];

        $insertToWishlist = oci_parse($conn, "INSERT INTO WISHLIST_PRODUCT(PRODUCT_ID_FK, WISHLIST_ID_FK) VALUES(:productid, :wishlistid)");
        oci_bind_by_name($insertToWishlist, ":productid", $productID);
        oci_bind_by_name($insertToWishlist, ":wishlistid", $wishlistID);
        oci_execute($insertToWishlist);

        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }
    else{
        header("Location: ../login.php");
    }
?>