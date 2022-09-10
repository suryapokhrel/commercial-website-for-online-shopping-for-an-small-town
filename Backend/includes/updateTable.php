<?php
    // FUNCTION TO UPDATE CUSTOMER DETAILS
    function update_customer($array){
        include "connection.php";

        if(sizeof($array) == 9){
            $update_details = oci_parse($conn, "UPDATE CUSTOMER SET FIRSTNAME='$array[1]', MIDDLENAME='$array[2]', LASTNAME='$array[3]', EMAIL='$array[6]', PHONE_NUMBER='$array[5]', IMAGES='$array[8]' ,CUST_ADDRESS='$array[7]' WHERE CUSTOMER_ID='$array[0]'");
            oci_execute($update_details);

            $update_credentials = oci_parse($conn, "UPDATE CUSTOMER_CREDENTIAL SET CUSTOMER_USERNAME='$array[4]' WHERE CUSTOMER_ID_FK='$array[0]'");
            oci_execute($update_credentials);

            oci_free_statement($update_details);
            oci_free_statement($update_credentials);
            oci_close($conn);

            header("Location: ../../dashboard/customerSetting.php");
        }
        elseif(sizeof($array) == 8) {
            $update_details = oci_parse($conn, "UPDATE CUSTOMER SET FIRSTNAME='$array[1]', LASTNAME='$array[2]', EMAIL='$array[5]', PHONE_NUMBER='$array[4]',IMAGES='$array[7]' ,CUST_ADDRESS='$array[6]' WHERE CUSTOMER_ID='$array[0]'");
            oci_execute($update_details);

            $update_credentials = oci_parse($conn, "UPDATE CUSTOMER_CREDENTIAL SET CUSTOMER_USERNAME='$array[3]' WHERE CUSTOMER_ID_FK='$array[0]'");
            oci_execute($update_credentials);

            oci_free_statement($update_details);
            oci_free_statement($update_credentials);
            oci_close($conn);

            header("Location: ../../dashboard/customerSetting.php");
        }
    }


    // FUNCTION TO UPDATE TRADER DETAILS
    function update_trader($array){
        include "connection.php";

        if(sizeof($array) == 9){
            $update_details = oci_parse($conn, "UPDATE TRADER SET FIRSTNAME='$array[1]', MIDDLENAME='$array[2]', LASTNAME='$array[3]', EMAIL='$array[6]', PHONE_NUMBER='$array[5]', TRADER_ADDRESS='$array[7]', IMAGES='$array[8]' WHERE TRADER_ID='$array[0]'");
            oci_execute($update_details);

            $update_credentials = oci_parse($conn, "UPDATE TRADER_CREDENTIAL SET TRADER_USERNAME='$array[4]' WHERE TRADER_ID_FK='$array[0]'");
            oci_execute($update_credentials);

            oci_free_statement($update_details);
            oci_free_statement($update_credentials);
            oci_close($conn);

            header("Location: ../../dashboard/traderSetting.php");
        }
        elseif(sizeof($array) == 8) {
            $update_details = oci_parse($conn, "UPDATE TRADER SET FIRSTNAME='$array[1]', LASTNAME='$array[2]', EMAIL='$array[5]', PHONE_NUMBER='$array[4]', TRADER_ADDRESS='$array[6]', IMAGES='$array[7]' WHERE TRADER_ID='$array[0]'");
            oci_execute($update_details);

            $update_credentials = oci_parse($conn, "UPDATE TRADER_CREDENTIAL SET TRADER_USERNAME='$array[3]' WHERE TRADER_ID_FK='$array[0]'");
            oci_execute($update_credentials);

            oci_free_statement($update_details);
            oci_free_statement($update_credentials);
            oci_close($conn);

            header("Location: ../../dashboard/traderSetting.php");
        }
    }
?>