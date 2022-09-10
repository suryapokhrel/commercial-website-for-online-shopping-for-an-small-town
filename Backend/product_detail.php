<?php
    // START SESSION
    // session_start();

    // CHECK IF SESSION IS SET FOR THE USER
    if(isset($_SESSION['cid']) || isset($_SESSION['tid'])){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            include "includes/connection.php";

            $get_product_detail = oci_parse($conn, "SELECT PRODUCT_NAME,PRODUCT_QUANTITY,PRODUCT_CATEGORY, IMAGES, PRODUCT_DESCRIPTION, PRODUCT_PRICE, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION FROM PRODUCT WHERE PRODUCT_ID='$id'");
            oci_execute($get_product_detail);

            if($row = oci_fetch_array($get_product_detail, OCI_BOTH)){
                $name = $row['PRODUCT_NAME'];
                $cat = $row['PRODUCT_CATEGORY'];
                $image = $row['IMAGES'];
                $description = $row['PRODUCT_DESCRIPTION'];
                $price = $row['PRODUCT_PRICE'];
                $quantity = $row['PRODUCT_QUANTITY'];
                $availability = $row['PRODUCT_AVAILABILITY'];
                $allergy_info = $row['ALLERGIC_INFORMATION'];
            }
            else{
                // CHANGE HERE
                exit("Product does not exists");
            }
        }
    }
    else{
        header("Location: ../dashboard/login.php");
    }
?>