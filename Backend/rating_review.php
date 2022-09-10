<?php
    session_start();
    if(isset($_POST["submitBtn"])){
        $productID = $_POST['id'];
        $rating = $_POST['rating'];
        $review = $_POST['review'];

        if(isset($_SESSION['cid'])){
            $customerID = $_SESSION['cid'];
        }
        else{
            $customerID = "";
        }

        include "includes/connection.php";

        $insertReviews = oci_parse($conn, "INSERT INTO CUSTOMER_REVIEW(COMMENTS, RATING_NO, CUSTOMER_ID_FK, PRODUCT_ID_FK) VALUES(:comments, :ratings, :customerid, :productid)");
        oci_bind_by_name($insertReviews, ":comments", $review);
        oci_bind_by_name($insertReviews, ":ratings", $rating);
        oci_bind_by_name($insertReviews, ":customerid", $customerID);
        oci_bind_by_name($insertReviews, ":productid", $productID);
        oci_execute($insertReviews);

        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }
?>