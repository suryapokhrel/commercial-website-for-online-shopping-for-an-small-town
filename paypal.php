<?php
    session_start();
    include "Backend/includes/connection.php";

    $customerID = $_SESSION['cid'];

    // SQL QUERY TO GET CART ID OF SPECIFIC CUSTOMER
    $getCartID = oci_parse($conn, "SELECT CART_ID, COLLECTION_DATE, COLLECTION_TIME, PRODUCT_ID_FK FROM CART WHERE CUSTOMER_ID_FK='$customerID'");
    oci_execute($getCartID);

    $paymentMethod = "PayPal";
    $paymentDate = date('m/d/Y');

    while($row2 = oci_fetch_array($getCartID, OCI_BOTH)){
        $getOrderedItems = oci_parse($conn, "SELECT TOTAL_PRICE, ORDER_QUANTITY, PRODUCT_ID_FK FROM ORDER_PRODUCT WHERE CART_ID_FK='".$row2['CART_ID']."'");
        oci_execute($getOrderedItems);

        $rows = oci_fetch_array($getOrderedItems, OCI_BOTH);

        $getItemsQuantity = oci_parse($conn, "SELECT PRODUCT_QUANTITY FROM PRODUCT WHERE PRODUCT_ID='".$row2['PRODUCT_ID_FK']."'");
        oci_execute($getItemsQuantity);
    
        $initialQuantity = oci_fetch_array($getItemsQuantity, OCI_BOTH);

        $totalQuantity = $initialQuantity['PRODUCT_QUANTITY'] - $rows['ORDER_QUANTITY'];

        $updateProductQuantity = oci_parse($conn, "UPDATE PRODUCT SET PRODUCT_QUANTITY='".$totalQuantity."' WHERE PRODUCT_ID='".$row2['PRODUCT_ID_FK']."'");
        oci_execute($updateProductQuantity);


        
        $insertToBill = oci_parse($conn, "INSERT INTO BILL(PAYMENT_METHOD, PAYMENT_DATE, COLLECTION_DATE, COLLECTION_TIME, PRICE, PRODUCT_ID_FK, CUSTOMER_ID_FK) VALUES(:method, :paymentdate, :collectiondate, :collectiontime, :price, :pid, :cid)");
        oci_bind_by_name($insertToBill, ":method", $paymentMethod);
        oci_bind_by_name($insertToBill, ":paymentdate", $paymentDate);
        oci_bind_by_name($insertToBill, ":collectiondate", $row2["COLLECTION_DATE"]);
        oci_bind_by_name($insertToBill, ":collectiontime", $row2["COLLECTION_TIME"]);
        oci_bind_by_name($insertToBill, ":price", $rows['TOTAL_PRICE']);
        oci_bind_by_name($insertToBill, ":pid", $row2["PRODUCT_ID_FK"]);
        oci_bind_by_name($insertToBill, ":cid", $customerID);
        oci_execute($insertToBill);
    }


    // SQL QUERY TO DELETE ORDERED ITEMS FROM CART OF SPECIFIC CUSTOMER    
    $deleteCartItems = oci_parse($conn, "DELETE FROM CART WHERE CUSTOMER_ID_FK='$customerID'");
    oci_execute($deleteCartItems); 

    include "Backend/sendinvoice.php";
?>