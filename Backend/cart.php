<?php
    // START SESSION
    session_start();

    // CHECK IF SESSION IS SET OR NOT
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
        $id = $_SESSION['id'];

        // INCLUDE CONNECTION FILE
        include "includes/connection.php";

        // SQL QUERY TO GET ALL ITEMS FROM THE CART OF SPECIFIC CUSTOMER
        $get_cart_items = oci_parse($conn, "SELECT PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_PRICE, ORDER_QUANTITY FROM PRODUCT P, ORDER_PRODUCT OP, CART C WHERE P.PRODUCT_ID=OP.PRODUCT_ID_FK AND OP.CART_ID_FK=C.CART_ID AND C.CUSTOMER_ID_FK='$id'");
        oci_execute($get_cart_items);

        if($row = oci_fetch_array($get_cart_items, OCI_BOTH)){
            $name = $row['PRODUCT_NAME'];
            $desc = $row['PRODUCT_DESCRIPTION'];
            $price = $row['PRODUCT_PRICE'];
            $quantity = $row['ORDER_QUANTITY'];
        }
        else{
            exit("No items found or customer doesn't exists!");
        }
    }
    else{
        header("Location: ../Frontend/login.php");
    }
?>