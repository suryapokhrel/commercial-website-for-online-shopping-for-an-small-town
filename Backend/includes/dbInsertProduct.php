<?php
    // DEFINE CONSTANT VARIABLES
    define("PRODUCTNAME", ":productname");
    define("PRODUCTDESCRIPTION", ":productdescription");
    define("PRODUCTCATEGORY", ":productcategory");
    define("PRODUCTPRICE", ":productprice");
    define("PRODUCTQUANTITY", ":productquantity");
    define("AVAILABILITY", ":availability");
    define("ALLERGYINFO", ":allergyinfo");
    define("MAXORDER", ":maxorder");
    define("MINORDER", ":minorder");
    define("IMAGES", ":images");
    define("ID", ":id");


    // FUNCTION TO INSERT PRODUCT INFO
    function insert_product_info($productData){
        include "connection.php";

        $get_shop_names = oci_parse($conn, "SELECT SHOP1, SHOP2 FROM TRADER WHERE TRADER_ID='".$_SESSION['tid']."'");
        oci_execute($get_shop_names);
        if($row = oci_fetch_array($get_shop_names, OCI_BOTH)){
            if($row["SHOP1"] != $productData[1] && $row["SHOP2"] != $productData[1]){
                exit("Shop does not exist!");
            }
            else{
                $get_shop_id = oci_parse($conn, "SELECT SHOP_ID FROM SHOP WHERE SHOP_NAME='".$productData[1]."'");
                oci_execute($get_shop_id);

                if($row = oci_fetch_array($get_shop_id, OCI_BOTH)){
                    $insert_product_details = oci_parse($conn, "INSERT INTO PRODUCT(PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_QUANTITY, PRODUCT_AVAILABILITY, ALLERGIC_INFORMATION, MAX_ORDER, MIN_ORDER, IMAGES, SHOP_ID_FK) VALUES(:productname, :productdescription, :productcategory, :productprice, :productquantity, :availability, :allergyinfo, :maxorder, :minorder, :images, :id)");
                    oci_bind_by_name($insert_product_details, PRODUCTNAME, $productData[0]);
                    oci_bind_by_name($insert_product_details, PRODUCTDESCRIPTION, $productData[10]);
                    oci_bind_by_name($insert_product_details, PRODUCTCATEGORY, $productData[7]);
                    oci_bind_by_name($insert_product_details, PRODUCTPRICE, $productData[2]);
                    oci_bind_by_name($insert_product_details, PRODUCTQUANTITY, $productData[3]);
                    oci_bind_by_name($insert_product_details, AVAILABILITY, $productData[4]);
                    oci_bind_by_name($insert_product_details, ALLERGYINFO, $productData[5]);
                    oci_bind_by_name($insert_product_details, MAXORDER, $productData[8]);
                    oci_bind_by_name($insert_product_details, MINORDER, $productData[9]);
                    oci_bind_by_name($insert_product_details, IMAGES, $productData[6]);
                    oci_bind_by_name($insert_product_details, ID, $row['SHOP_ID']);
                    oci_execute($insert_product_details);

                    oci_free_statement($get_shop_names);
                    oci_free_statement($get_shop_id);
                    oci_free_statement($insert_product_details);
                    oci_close($conn);
            
                    header("Location: ../../dashboard/insertProduct.php");
                }
                else{
                    exit("Error!");
                }
            }
        }
        else{
            exit("Unable to get shop name!");
        }
    }
?>