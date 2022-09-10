<?php 
    // session_start();
    // FUNCTION TO LOGIN USING CUSTOMER DATA
    function customer_login($email, $password){
        include "connection.php";
        
        $error = "";
        
        $customer_details = oci_parse($conn, "SELECT CUSTOMER_ID, EMAIL, CUSTOMER_USERNAME, CUSTOMER_PASSWORD FROM CUSTOMER C, CUSTOMER_CREDENTIAL CC WHERE C.CUSTOMER_ID=CC.CUSTOMER_ID_FK AND C.EMAIL='$email'");
        oci_execute($customer_details);

        if($row = oci_fetch_array($customer_details, OCI_BOTH)){
            if($row['EMAIL'] == $email && $row['CUSTOMER_PASSWORD'] == md5($password)){
                session_start();
                $_SESSION['cid'] = $row['CUSTOMER_ID'];
                $_SESSION['user'] = $row['CUSTOMER_USERNAME'];
                header("Location: ../../");
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
                // session_start();
                $_SESSION['tid'] = $row['TRADER_ID'];
                $_SESSION['user'] = $row['TRADER_USERNAME'];
                header("Location: ../../");
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
                $_SESSION['aid'] = $row['ADMIN_ID'];
                $_SESSION['user'] = $row['ADMIN_USERNAME'];
                header("Location: ../../");
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
?>