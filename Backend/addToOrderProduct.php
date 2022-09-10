<?php
    session_start();

    include "includes/connection.php";

    for($i=0; $i<count($_SESSION["productID"]); $i++){
        // CHECK WHETHER THE PRODUCT ALREADY EXISTS IN THE DATABASE OR NOT
        $checkProduct = oci_parse($conn, "SELECT COUNT(PRODUCT_ID_FK) FROM ORDER_PRODUCT WHERE PRODUCT_ID_FK='".$_SESSION['productID'][$i]."' AND CART_ID_FK='".$_SESSION['cartID'][$i]."'");
        oci_execute($checkProduct);

        $noOfProduct = oci_fetch_array($checkProduct, OCI_BOTH);

        if($noOfProduct[0]==0){
            $totalItems = 0;
            $totalItems = $totalItems + $_POST["item".$i+1];
    
            if($totalItems <= 20){
                $totalPrice = $_SESSION['price'][$i] * $_POST["item".$i+1];

                $insertToOrderProduct = oci_parse($conn, "INSERT INTO ORDER_PRODUCT(ORDER_QUANTITY, TOTAL_PRICE, PRODUCT_ID_FK, CART_ID_FK) VALUES(:quantity, :total, :productid, :cartid)");
                oci_bind_by_name($insertToOrderProduct, ":quantity", $_POST["item".$i+1]);
                oci_bind_by_name($insertToOrderProduct, ":total", $totalPrice);
                oci_bind_by_name($insertToOrderProduct, ":productid", $_SESSION["productID"][$i]);
                oci_bind_by_name($insertToOrderProduct, ":cartid", $_SESSION["cartID"][$i]);
                oci_execute($insertToOrderProduct);
    
                // header("Location: ../payment.php");
            }
            else{
                exit("Total items cannot be more than 20!");
            }
        }
    }
    header("Location: ../payment.php");
?>