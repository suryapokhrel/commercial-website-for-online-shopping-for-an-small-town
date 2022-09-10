<?php
    session_start();
    $customerID = $_SESSION['cid'];
    include "includes/connection.php";

    $collectionDate = $_POST['collectDay'];
    $collectionTime = $_POST['collectTime'];
    $address = "Hull Road";

    $insertCollectionTime = oci_parse($conn, "UPDATE CART SET COLLECTION_DATE='$collectionDate', COLLECTION_TIME='$collectionTime', COLLECTION_POINT='$address' WHERE CUSTOMER_ID_FK='$customerID'");
    oci_execute($insertCollectionTime);

    header("Location: ../");
?>