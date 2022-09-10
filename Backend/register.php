<?php
    $error= isset($error) ? $error: '';
    if(isset($_POST["register"])){
        // INITIALIZE EMPTY VARIABLES
        $firstname = "";
        $middlename = "";
        $lastname = "";
        $email = "";
        $phonenumber = "";
        $address = "";
        $username = "";
        $password = "";
        $terms_and_conditions = "";
        $user = "";
        $shop1 = "";
        $shop2 = "";
        $traderType = "";
        $shopType = "";
        $flag = TRUE;



        // INCLUDE VALIDATION PHP FILE
        include "includes/validation.php";

        // VALIDATE NAME
        if(validate_name($_POST["ufname"], $_POST["ulname"])){
            $firstname = strtolower($_POST["ufname"]);
            $lastname = strtolower($_POST["ulname"]);

            if(!empty(htmlspecialchars(trim($_POST["umname"])))){
                $middlename = strtolower($_POST["umname"]);
            }
        }
        else{
            $flag = FALSE;
        }

        // VALIDATE EMAIL
        validate_email($_POST["pwd"]) ? $email = strtolower($_POST["pwd"]) : $flag = FALSE;

        // VALIDATE PHONE NUMBER
        validate_phone($_POST["phone"]) ? $phonenumber = $_POST["phone"] : $flag = FALSE;

        // VALIDATE ADDRESS
        validate_address($_POST["address"]) ? $address = strtolower($_POST["address"]) : $flag = FALSE;

        // CHECK USER TYPE THEN VERIFY USERNAME AND PASSWORD
        $user = $_POST["user"];
        if($_POST["user"] == "customer"){
            validate_username($_POST["custuname"]) ? $username = strtolower($_POST["custuname"]) : $flag = FALSE;
            validate_password($_POST["custpass"], $_POST["recustpass"]) ? $password = md5($_POST["custpass"]) : $flag = FALSE;
        }
        else{
            validate_username($_POST["traduname"]) ? $username = strtolower($_POST["traduname"]) : $flag = FALSE;
            validate_password($_POST["tradpass"], $_POST["retradpass"]) ? $password = md5($_POST["tradpass"]) : $flag = FALSE;
        
            // VALIDATE SHOP
            if(isset($_POST["shopf"]) && isset($_POST["shops"])){
                validate_shop($_POST["shopf"]) ? $shop1 = strtolower($_POST["shopf"]) : $flag = FALSE;
                validate_shop($_POST["shops"]) ? $shop2 = strtolower($_POST["shops"]) : $flag = FALSE;
            }
            elseif(isset($_POST["shopf"])){
                validate_shop($_POST["shopf"]) ? $shop1 = strtolower($_POST["shopf"]) : $flag = FALSE;
            }
            elseif(isset($_POST["shops"])){
                validate_shop($_POST["shops"]) ? $shop1 = strtolower($_POST["shops"]) : $flag = FALSE;
            }

            // VALIDATE TRADER TYPE
            if(isset($_POST["traderType"])){
                validate_trader_type($_POST["traderType"]) ? $traderType = strtolower($_POST["traderType"]) : $flag = FALSE;
            }

            // VALIDATE SHOP TYPE
            if(isset($_POST["shopType"])){
                validate_shop_type($_POST["shopType"]) ? $shopType = strtolower($_POST["shopType"]) : $flag = FALSE;
            }
        }

        // CHECK FOR TERMS AND CONDITIONS AGREEMENT
        (isset($_POST["radio"]) == "box") ? $terms_and_conditions = $_POST["radio"] : $flag = FALSE;
        

        
        if($flag && $terms_and_conditions == "box"){
            // CHECK FOR ALREADY EXISTING DETAILS IN THE DATABASE
            include "includes/duplicateCheck.php";
            include "includes/databaseRegister.php";
            check_user_credentials($username, $email, $phonenumber) ? exit("Detail already exists") : FALSE;

            
            // INSERT DATA TO THE DATABASE
            if($user == "customer"){
                $customer_array = array(
                    $firstname, $middlename, $lastname, $email, $phonenumber, $address, $username, $password
                );
                register_customer($customer_array);
                send_mail($email);
                header("Location: ../login.php");
            }
            else{
                $trader_array = array(
                    $firstname, $middlename, $lastname, $email, $phonenumber, $address, $shop1, $shop2, $traderType, $shopType, $username, $password
                );
                $tID = register_trader($trader_array);
                send_mail($email);
                send_mail_trader($email);
                add_shop2($shop2, $shopType, $tID);
                header("Location: ../login.php");
            }
        }
        else{
            $error= "Please Fil out the form properly.";
            echo $error;
        }  
    }
    else{
        header("Location: ../register.php");
    }
?>
