<?php
    define("ORDERDATE", ":orderdate");
    define("ORDERTIME", ":ordertime");
    define("COLLECTIONDATE", ":collectiondate");
    define("COLLECTIONTIME", ":collectiontime");
    define("COLLECTIONPOINT", ":collectionpoint");
    define("ID", ":id");
    define("ID2", ":id2");

    $collectionDate = "";
    $collectionTime = "";
    $collectionPoint = "Shop 23";


    function insertOrder($details){
        include "connection.php";

        // CHECK WHETHER THE PRODUCT ALREADY EXISTS IN THE DATABASE OR NOT
        $checkProduct = oci_parse($conn, "SELECT COUNT(PRODUCT_ID_FK) FROM CART WHERE PRODUCT_ID_FK='$details[0]' AND CUSTOMER_ID_FK='$details[1]'");
        oci_execute($checkProduct);

        $noOfProduct = oci_fetch_array($checkProduct, OCI_BOTH);
        if($noOfProduct[0] == 0){
            $insertToCart = oci_parse($conn, "INSERT INTO CART(ORDER_DATE, ORDER_TIME, COLLECTION_DATE, COLLECTION_TIME, COLLECTION_POINT, CUSTOMER_ID_FK, PRODUCT_ID_FK) VALUES(:orderdate, :ordertime, :collectiondate, :collectiontime, :collectionpoint, :id, :id2)");
            oci_bind_by_name($insertToCart, ORDERDATE, $details[2]);
            oci_bind_by_name($insertToCart, ORDERTIME, $details[3]);
            oci_bind_by_name($insertToCart, COLLECTIONDATE, $collectionDate);
            oci_bind_by_name($insertToCart, COLLECTIONTIME, $collectionTime);
            oci_bind_by_name($insertToCart, COLLECTIONPOINT, $collectionPoint);
            oci_bind_by_name($insertToCart, ID, $details[1]);
            oci_bind_by_name($insertToCart, ID2, $details[0]);
            oci_execute($insertToCart);
            oci_free_statement($insertToCart);
            oci_close($conn);
    
            // header("Location: ../../dashboard/cart.php");
            header("Location: {$_SERVER["HTTP_REFERER"]}");
        }
        else{
            header("Location: {$_SERVER["HTTP_REFERER"]}");
        }
        
    }
?>