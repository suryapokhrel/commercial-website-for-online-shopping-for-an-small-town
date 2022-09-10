<?php
    session_start();
    if(isset($_SESSION['cid']) && !empty($_SESSION['cid'])){
        $productID = $_GET['id'];

        include "includes/connection.php";

        $removeProduct = oci_parse($conn, "DELETE FROM CART WHERE PRODUCT_ID_FK='$productID'");
        oci_execute($removeProduct);

        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }
    else{
        header("Location: ../../dashboard/login.php");
    }
?>