<?php
    // FUNCTION TO CHECK WHETHER CREDENTIALS ALREADY EXISTS IN THE DATABASE OR NOT; RETURNS TRUE IF MATCHED, ELSE FALSE
    function check_user_credentials($username, $email, $phonenumber){
        // INCLUDE CONNECTION FILE TO CONNECT TO THE DATABASE
        include "connection.php";

        // CHECK CUSTOMER USERNAME
        $check_customer_username = oci_parse($conn, "SELECT COUNT(*) FROM CUSTOMER_CREDENTIAL WHERE CUSTOMER_USERNAME='$username'");
        oci_execute($check_customer_username);

        // CHECK CUSTOMER EMAIL
        $check_customer_email = oci_parse($conn, "SELECT COUNT(*) FROM CUSTOMER WHERE EMAIL='$email'");
        oci_execute($check_customer_email);

        // CHECK CUSTOMER PHONE NUMBER
        $check_customer_number = oci_parse($conn, "SELECT COUNT(*) FROM CUSTOMER WHERE PHONE_NUMBER='$phonenumber'");
        oci_execute($check_customer_number);

        // CHECK TRADER USERNAME
        $check_trader_username = oci_parse($conn, "SELECT COUNT(*) FROM TRADER_CREDENTIAL WHERE TRADER_USERNAME='$username'");
        oci_execute($check_trader_username);

        // CHECK TRADER EMAIL
        $check_trader_email = oci_parse($conn, "SELECT COUNT(*) FROM TRADER WHERE EMAIL='$email'");
        oci_execute($check_trader_email);

        // CHECK TRADER PHONE NUMBER
        $check_trader_number = oci_parse($conn, "SELECT COUNT(*) FROM TRADER WHERE PHONE_NUMBER='$phonenumber'");
        oci_execute($check_trader_number);


        // VARIABLES TO STORE 1 IF DETAIL EXISTS, 0 IF IT DOESN'T
        $customer_username_exists = oci_fetch_array($check_customer_username, OCI_BOTH);
        $customer_email_exists = oci_fetch_array($check_customer_email, OCI_BOTH);
        $customer_number_exists = oci_fetch_array($check_customer_number, OCI_BOTH);
        $trader_username_exists = oci_fetch_array($check_trader_username, OCI_BOTH);
        $trader_email_exists = oci_fetch_array($check_trader_email, OCI_BOTH);
        $trader_number_exists = oci_fetch_array($check_trader_number, OCI_BOTH);

        // RETURNS TRUE IF DETAIL ALREADY EXISTS
        return (($customer_username_exists[0] || $customer_email_exists[0] || $customer_number_exists[0] || $trader_username_exists[0] || $trader_email_exists[0] || $trader_number_exists[0]) == 1) ? TRUE : FALSE;
    }


    // FUNCTION TO CHECK WHETHER CREDENTIALS ALREADY EXISTS IN THE DATABASE OR NOT; RETURNS TRUE IF MATCHED, ELSE FALSE
    function check_user_credentials_on_update($username, $email, $phonenumber, $id){
        // INCLUDE CONNECTION FILE TO CONNECT TO THE DATABASE
        include "connection.php";

        // CHECK CUSTOMER USERNAME
        $check_customer_username = oci_parse($conn, "SELECT COUNT(*) FROM CUSTOMER_CREDENTIAL WHERE CUSTOMER_USERNAME='$username' AND CUSTOMER_ID_FK!='$id'");
        oci_execute($check_customer_username);

        // CHECK CUSTOMER EMAIL
        $check_customer_email = oci_parse($conn, "SELECT COUNT(*) FROM CUSTOMER WHERE EMAIL='$email' AND CUSTOMER_ID!='$id'");
        oci_execute($check_customer_email);

        // CHECK CUSTOMER PHONE NUMBER
        $check_customer_number = oci_parse($conn, "SELECT COUNT(*) FROM CUSTOMER WHERE PHONE_NUMBER='$phonenumber' AND CUSTOMER_ID!='$id'");
        oci_execute($check_customer_number);

        // CHECK TRADER USERNAME
        $check_trader_username = oci_parse($conn, "SELECT COUNT(*) FROM TRADER_CREDENTIAL WHERE TRADER_USERNAME='$username' AND TRADER_ID_FK!='$id'");
        oci_execute($check_trader_username);

        // CHECK TRADER EMAIL
        $check_trader_email = oci_parse($conn, "SELECT COUNT(*) FROM TRADER WHERE EMAIL='$email' AND TRADER_ID_FK!='$id'");
        oci_execute($check_trader_email);

        // CHECK TRADER PHONE NUMBER
        $check_trader_number = oci_parse($conn, "SELECT COUNT(*) FROM TRADER WHERE PHONE_NUMBER='$phonenumber' AND TRADER_ID_FK!='$id'");
        oci_execute($check_trader_number);


        // VARIABLES TO STORE 1 IF DETAIL EXISTS, 0 IF IT DOESN'T
        $customer_username_exists = oci_fetch_array($check_customer_username, OCI_BOTH);
        $customer_email_exists = oci_fetch_array($check_customer_email, OCI_BOTH);
        $customer_number_exists = oci_fetch_array($check_customer_number, OCI_BOTH);
        $trader_username_exists = oci_fetch_array($check_trader_username, OCI_BOTH);
        $trader_email_exists = oci_fetch_array($check_trader_email, OCI_BOTH);
        $trader_number_exists = oci_fetch_array($check_trader_number, OCI_BOTH);

        // RETURNS TRUE IF DETAIL ALREADY EXISTS
        return (($customer_username_exists[0] || $customer_email_exists[0] || $customer_number_exists[0] || $trader_username_exists[0] || $trader_email_exists[0] || $trader_number_exists[0]) == 1) ? TRUE : FALSE;
    }
?>