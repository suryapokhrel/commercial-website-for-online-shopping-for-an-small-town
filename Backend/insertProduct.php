<?php
    session_start();
    if(isset($_POST["btnSubmit"]) && isset($_SESSION['tid']) && !empty($_SESSION['tid'])){
        $productName = "";
        $shopName = "";
        $productPrice = "";
        $productQuantity = "";
        $productAvailability = "";
        $allergyInfo = "";
        $imageName = "";
        $productCategory = "";
        $maxOrder = "";
        $minOrder = "1";
        $description = "";
        $flag = TRUE;

        include "includes/validation.php";

        $productName = strtolower($_POST["ProductName"]);
        $shopName = strtolower($_POST["ShopName"]);

        // VALIDATION FOR PRICE, QUANTITY AND AVAILABILITY
        if(isset($_POST["productPrice"]) && isset($_POST["productQuantity"]) && isset($_POST["productAvailability"])){
            $productPrice = $_POST["productPrice"];
            $productQuantity = $_POST["productQuantity"];
            $productAvailability = $_POST["productAvailability"];
        }
        else{
            $flag = FALSE;
        }

        // VALIDATION FOR ALLERGY INFORMATION
        !empty(trim(isset($_POST["allergyInfo"]))) ? $allergyInfo = strtolower($_POST["allergyInfo"]) : $flag = FALSE;

        // VALIDATION FOR MAX ORDER
        isset($_POST["max_order"]) ? $maxOrder = $_POST["max_order"] : $flag = FALSE;

        // VALIDATION FOR PRODUCT CATEGORY
        !empty(trim(isset($_POST["productCategory"]))) ? $productCategory = strtolower($_POST["productCategory"]) : $flag = FALSE;

        // VALIDATION FOR PRODUCT DESCRIPTION
        !empty(trim(isset($_POST["ProductDesc"]))) ? $description = strtolower($_POST["ProductDesc"]) : $flag = FALSE;


        include "includes/connection.php";

        $prodID = oci_parse($conn, "SELECT COUNT(PRODUCT_ID) FROM PRODUCT");
        oci_execute($prodID);

        $row = oci_fetch_array($prodID, OCI_BOTH);


        // IMAGE UPLOAD
        $target_dir = "../static/images/";
        $imageFileType = strtolower(pathinfo($_FILES["ImageFilename"]["name"],PATHINFO_EXTENSION));
        // $imageName = $_SESSION["tid"] . $productName . "." . $imageFileType;
        $imageName = 'PROD' . $row[0]+1 . $productName . "." . $imageFileType;
        $target_file = $target_dir . basename($imageName);

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
            exit("Sorry, only JPG, PNG & JPEG files are allowed!");
        }
        else{
            move_uploaded_file($_FILES["ImageFilename"]["tmp_name"],$target_file);
        }


        include "includes/dbInsertProduct.php";

        // INSERT PRODUCT DATA TO DATABASE
        if($flag){
            $productData = array(
                $productName, $shopName, $productPrice, $productQuantity, $productAvailability, $allergyInfo, 
                $imageName, $productCategory, $maxOrder, $minOrder, $description
            );
            insert_product_info($productData);
        }
        else{
            exit("Incorrect or missing info!");
        }

        header("Location: ../crudProduct.php");
    }
    else{
        header("Location: ../login.php");
    }
?>