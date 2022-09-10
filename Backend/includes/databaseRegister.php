<?php
    // DEFINE CONSTANT VARIABLES
    define("FIRSTNAME", ":firstname");
    define("MIDDLENAME", ":middlename");
    define("LASTNAME", ":lastname");
    define("EMAIL", ":email");
    define("PHONE", ":phonenumber");
    define("ADDRESS", ":address");
    define("SHOP1", ":shop1");
    define("SHOP2", ":shop2");
    define("SHOPTYPE", ":shoptype");
    define("TRADERTYPE", ":tradertype");
    define("USERNAME", ":username");
    define("PASSWORD", ":password");
    define("TRADER", ":traderid");
    define("ID", ":id");

    $admin = "ADMIN1";


    // FUNCTION TO INSERT CUSTOMER DATA TO THE DATABASE
    function register_customer($customer_array){
        // INCLUDE CONNECTION FILE TO CONNECT TO THE DATABASE
        include "connection.php";

        $cust_details = oci_parse($conn, "INSERT INTO CUSTOMER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, CUST_ADDRESS) VALUES(:firstname, :middlename, :lastname, :email, :phonenumber, :address)");
        oci_bind_by_name($cust_details, FIRSTNAME, $customer_array[0]);
        oci_bind_by_name($cust_details, MIDDLENAME, $customer_array[1]);
        oci_bind_by_name($cust_details, LASTNAME, $customer_array[2]);
        oci_bind_by_name($cust_details, EMAIL, $customer_array[3]);
        oci_bind_by_name($cust_details, PHONE, $customer_array[4]);
        oci_bind_by_name($cust_details, ADDRESS, $customer_array[5]);
        oci_execute($cust_details);

        $cust_id = oci_parse($conn, "SELECT CUSTOMER_ID FROM CUSTOMER WHERE EMAIL='$customer_array[3]'");
        oci_execute($cust_id);
        ($row = oci_fetch_array($cust_id, OCI_BOTH)) ? $cid = $row["CUSTOMER_ID"] : exit("Error while registering!");

        $cust_credentials = oci_parse($conn, "INSERT INTO CUSTOMER_CREDENTIAL(CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_ID_FK) VALUES(:username, :password, :id)");
        oci_bind_by_name($cust_credentials, USERNAME, $customer_array[6]);
        oci_bind_by_name($cust_credentials, PASSWORD, $customer_array[7]);
        oci_bind_by_name($cust_credentials, ID, $cid);
        oci_execute($cust_credentials);

        $createWishlist = oci_parse($conn, "INSERT INTO WISHLIST(CUSTOMER_ID_FK) VALUES(:custid)");
        oci_bind_by_name($createWishlist, ":custid", $cid);
        oci_execute($createWishlist);

        oci_free_statement($cust_details);
        oci_free_statement($cust_id);
        oci_free_statement($cust_credentials);
        oci_close($conn);
    }




    // FUNCTION TO INSERT TRADER DATA TO THE DATABASE
    function register_trader($trader_array){
        // INCLUDE CONNECTION FILE TO CONNECT TO THE DATABASE
        include "connection.php";

        $getNumberOfTraders = oci_parse($conn, "SELECT COUNT(TRADER_ID) FROM TRADER");
        oci_execute($getNumberOfTraders);
        $row = oci_fetch_array($getNumberOfTraders, OCI_BOTH);

        // IF TRADER IS MORE THAN FIVE, REDIRECT TO HOMEPAGE INSTEAD OF REGISTER
        if($row[0] >= 5) {
            header("Location: ../../dashboard/");
            exit("Maximum number of traders reached!");
        }

        $trader_details = oci_parse($conn, "INSERT INTO TRADER(FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, TRADER_ADDRESS, SHOP1, SHOP2, TRADER_TYPE) VALUES(:firstname, :middlename, :lastname, :email, :phonenumber, :address, :shop1, :shop2, :tradertype)");
        oci_bind_by_name($trader_details, FIRSTNAME, $trader_array[0]);
        oci_bind_by_name($trader_details, MIDDLENAME, $trader_array[1]);
        oci_bind_by_name($trader_details, LASTNAME, $trader_array[2]);
        oci_bind_by_name($trader_details, EMAIL, $trader_array[3]);
        oci_bind_by_name($trader_details, PHONE, $trader_array[4]);
        oci_bind_by_name($trader_details, ADDRESS, $trader_array[5]);
        oci_bind_by_name($trader_details, SHOP1, $trader_array[6]);
        oci_bind_by_name($trader_details, SHOP2, $trader_array[7]);
        oci_bind_by_name($trader_details, TRADERTYPE, $trader_array[8]);
        oci_execute($trader_details);
        oci_free_statement($trader_details);

        $trader_id = oci_parse($conn, "SELECT TRADER_ID FROM TRADER WHERE EMAIL='$trader_array[3]'");
        oci_execute($trader_id);
        ($row = oci_fetch_array($trader_id, OCI_BOTH)) ? $tid = $row["TRADER_ID"] : exit("Error while registering!");
        oci_free_statement($trader_id);

        $insert_admin_id = oci_parse($conn, "UPDATE TRADER SET ADMIN_ID_FK = 'ADMIN1' WHERE TRADER_ID ='$tid'");
        oci_execute($insert_admin_id);
        oci_free_statement($insert_admin_id);

        $trader_credentials = oci_parse($conn, "INSERT INTO TRADER_CREDENTIAL(TRADER_USERNAME, TRADER_PASSWORD, TRADER_ID_FK) VALUES(:username, :password, :id)");
        oci_bind_by_name($trader_credentials, USERNAME, $trader_array[10]);
        oci_bind_by_name($trader_credentials, PASSWORD, $trader_array[11]);
        oci_bind_by_name($trader_credentials, ID, $tid);
        oci_execute($trader_credentials);
        oci_free_statement($trader_credentials);

        $setupShop1 = oci_parse($conn, "INSERT INTO SHOP(SHOP_NAME, SHOP_TYPE, TRADER_ID_FK) VALUES(:shop1, :shoptype, :traderid)");
        oci_bind_by_name($setupShop1, SHOP1, $trader_array[6]);
        oci_bind_by_name($setupShop1, SHOPTYPE, $trader_array[9]);
        oci_bind_by_name($setupShop1, TRADER, $tid);
        oci_execute($setupShop1);
        oci_free_statement($setupShop1);
        
        return $tid;
        oci_close($conn);
    }



    
    // FUNCTION TO ADD SECOND SHOP
    function add_shop2($shop, $shopType, $tID){
        include "connection.php";

        $setupShop2 = oci_parse($conn, "INSERT INTO SHOP(SHOP_NAME, SHOP_TYPE, TRADER_ID_FK) VALUES(:shop1, :shoptype, :traderid)");
        oci_bind_by_name($setupShop2, SHOP1, $shop);
        oci_bind_by_name($setupShop2, SHOPTYPE, $shopType);
        oci_bind_by_name($setupShop2, TRADER, $tID);
        oci_execute($setupShop2);
        
        oci_free_statement($setupShop2);
        oci_close($conn);
    }




    // FUNCTION TO SEND EMAIL CONFIRMATION FOR REGISTERATION FOR CUSTOMER
    function send_mail($email){
        $to_email=$email;
	    $subject="CHFFreshSales Registeration";
	    $body="Congratulations! Your account has been created. You can now login.";
	    $headers="From: chffreshsales@gmail.com";
	    mail($to_email,$subject,$body,$headers);
    }


    // FUNCTION TO SEND EMAIL CONFIRMATION FOR REGISTERATION FOR TRADER
    function send_mail_trader($email){
        $to_email="chffreshsales@gmail.com";
	    $subject="CHFFreshSales Registeration";
	    $body="New Trader has registered in the website.";
	    $headers="From: chffreshsales@gmail.com";
	    mail($to_email,$subject,$body,$headers);
    }
?>