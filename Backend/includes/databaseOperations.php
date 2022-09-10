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
    define("ADMIN", ":admin");
    define("TRADER", ":traderid");
    define("ID", ":id");

    $admin = "ADMIN1";


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

        oci_free_statement($cust_details);
        oci_free_statement($cust_id);
        oci_free_statement($cust_credentials);
        oci_close($conn);
    }


    // FUNCTION TO INSERT TRADER DATA TO THE DATABASE
    function register_trader($trader_array){
        // INCLUDE CONNECTION FILE TO CONNECT TO THE DATABASE
        include "connection.php";

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




    // FUNCTION TO SEND EMAIL CONFIRMATION FOR REGISTERATION
    function send_mail($email){
        $to_email=$email;
        $subject="CHFFreshSales Registeration";
        $body="Congratulations! Your account has been created. You can now login.";
        $headers="From: chffreshsales@gmail.com";
        mail($to_email,$subject,$body,$headers);
    }




    // FUNCTION TO LOGIN USING CUSTOMER DATA
    function customer_login($email, $password){
        include "connection.php";

        $error = "";
        $customer_details = oci_parse($conn, "SELECT CUSTOMER_ID, EMAIL, CUSTOMER_USERNAME, CUSTOMER_PASSWORD FROM CUSTOMER C, CUSTOMER_CREDENTIAL CC WHERE C.CUSTOMER_ID=CC.CUSTOMER_ID_FK AND C.EMAIL='$email'");
        oci_execute($customer_details);

        if($row = oci_fetch_array($customer_details, OCI_BOTH)){
            if($row['EMAIL'] == $email && $row['CUSTOMER_PASSWORD'] == md5($password)){
                session_start();
                $_SESSION['id'] = $row['CUSTOMER_ID'];
                $_SESSION['user'] = $row['CUSTOMER_USERNAME'];
                header("Location: ../../index.php");
            }
            else{
                $error = "Invalid credential!";
                header("Location: ../../dashboard/login.php");
            }
        }
        else{
            $error = "User does not exist!";
            header("Location: ../../dashboard/login.php");
        }
    }


    // FUNCTION TO LOGIN USING TRADER DATA
    function trader_login($email, $password){
        include "connection.php";

        $trader_details = oci_parse($conn, "SELECT TRADER_ID, EMAIL, TRADER_USERNAME, TRADER_PASSWORD FROM TRADER T, TRADER_CREDENTIAL TT WHERE T.TRADER_ID=TT.TRADER_ID_FK AND T.EMAIL='$email'");
        oci_execute($trader_details);

        if($row = oci_fetch_array($trader_details, OCI_BOTH)){
            if($row['EMAIL'] == $email && $row['TRADER_PASSWORD'] == md5($password)){
                session_start();
                $_SESSION['id'] = $row['TRADER_ID'];
                $_SESSION['user'] = $row['TRADER_USERNAME'];
                header("Location: ../../index.php");
            }
            else{
                $error = "Invalid credential!";
                header("Location: ../../dashboard/login.php");
            }
        }
        else{
            $error = "User does not exist!";
            header("Location: ../../dashboard/login.php");
        }
    }


    // FUNCTION TO LOGIN USING ADMIN DATA
    function admin_login($email, $password){
        include "connection.php";

        $admin_details = oci_parse($conn, "SELECT ADMIN_ID, EMAIL, ADMIN_USERNAME, ADMIN_PASSWORD FROM ADMIN A, ADMIN_CREDENTIAL AA WHERE A.ADMIN_ID=AA.ADMIN_ID_FK AND A.EMAIL='$email'");
        oci_execute($admin_details);

        if($row = oci_fetch_array($admin_details, OCI_BOTH)){
            if($row['EMAIL'] == $email && $row['ADMIN_PASSWORD'] == md5($password)){
                session_start();
                $_SESSION['id'] = $row['ADMIN_ID'];
                $_SESSION['user'] = $row['ADMIN_USERNAME'];
                header("Location: ../../index.php");
            }
            else{
                $error = "Invalid credential!";
                header("Location: ../../dashboard/login.php");
            }
        }
        else{
            $error = "User does not exist!";
            header("Location: ../../dashboard/login.php");
        }
    }




    // FUNCTION TO UPDATE TRADER DETAILS
    function update_trader($array){
        include "connection.php";

        if(sizeof($array) == 8){
            $update_details = oci_parse($conn, "UPDATE TRADER SET FIRSTNAME='$array[1]', MIDDLENAME='$array[2]', LASTNAME='$array[3]', EMAIL='$array[6]', PHONE_NUMBER='$array[5]', TRADER_ADDRESS='$array[7]' WHERE TRADER_ID='$array[0]'");
            oci_execute($update_details);

            $update_credentials = oci_parse($conn, "UPDATE TRADER_CREDENTIAL SET TRADER_USERNAME='$array[4]' WHERE TRADER_ID_FK='$array[0]'");
            oci_execute($update_credentials);

            oci_free_statement($update_details);
            oci_free_statement($update_credentials);
            oci_close($conn);
        }
        elseif(sizeof($array) == 7) {
            $update_details = oci_parse($conn, "UPDATE TRADER SET FIRSTNAME='$array[1]', LASTNAME='$array[2]', EMAIL='$array[5]', PHONE_NUMBER='$array[4]', TRADER_ADDRESS='$array[6]' WHERE TRADER_ID='$array[0]'");
            oci_execute($update_details);

            $update_credentials = oci_parse($conn, "UPDATE TRADER_CREDENTIAL SET TRADER_USERNAME='$array[3]' WHERE TRADER_ID_FK='$array[0]'");
            oci_execute($update_credentials);

            oci_free_statement($update_details);
            oci_free_statement($update_credentials);
            oci_close($conn);
        }
    }


    // FUNCTION TO UPDATE CUSTOMER DETAILS
    function update_customer($array){
        include "connection.php";

        if(sizeof($array) == 8){
            $update_details = oci_parse($conn, "UPDATE CUSTOMER SET FIRSTNAME='$array[1]', MIDDLENAME='$array[2]', LASTNAME='$array[3]', EMAIL='$array[6]', PHONE_NUMBER='$array[5]', CUST_ADDRESS='$array[7]' WHERE CUSTOMER_ID='$array[0]'");
            oci_execute($update_details);

            $update_credentials = oci_parse($conn, "UPDATE CUSTOMER_CREDENTIAL SET CUSTOMER_USERNAME='$array[4]' WHERE CUSTOMER_ID_FK='$array[0]'");
            oci_execute($update_credentials);

            oci_free_statement($update_details);
            oci_free_statement($update_credentials);
            oci_close($conn);
        }
        elseif(sizeof($array) == 7) {
            $update_details = oci_parse($conn, "UPDATE CUSTOMER SET FIRSTNAME='$array[1]', LASTNAME='$array[2]', EMAIL='$array[5]', PHONE_NUMBER='$array[4]', CUST_ADDRESS='$array[6]' WHERE CUSTOMER_ID='$array[0]'");
            oci_execute($update_details);

            $update_credentials = oci_parse($conn, "UPDATE CUSTOMER_CREDENTIAL SET CUSTOMER_USERNAME='$array[3]' WHERE CUSTOMER_ID_FK='$array[0]'");
            oci_execute($update_credentials);

            oci_free_statement($update_details);
            oci_free_statement($update_credentials);
            oci_close($conn);
        }
    }




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


    // FUNCTION TO INSERT PRODUCT INFO
    function insert_product_info($productData){
        include "connection.php";

        $get_shop_names = oci_parse($conn, "SELECT SHOP1, SHOP2 FROM TRADER WHERE TRADER_ID='".$_SESSION['id']."'");
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
            
                    header("Location: ../../insertProduct.php");
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
