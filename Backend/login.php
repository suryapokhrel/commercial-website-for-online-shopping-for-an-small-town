<?php
    $error= isset($error) ? $error: '';
    if(isset($_POST["loginSubmit"])){
        // INITIALIZE EMPTY VARIABLES
        $email = "";
        $password = "";
        $role = "";
        $flag = TRUE;
        $error= isset($error) ? $error: '';
    
    
        // INCLUDE VALIDATION FILE
        include "includes/validation.php";

        // VALIDATE INPUTS
        $role = $_POST["roles"];
        validate_email($_POST["email"]) ? $email = $_POST["email"] : $flag = FALSE;
        validate_login_password($_POST["password"]) ? $password = $_POST["password"] : $flag = FALSE;

        include "includes/databaseLogin.php";

        if($role == "customer" && $flag){
            customer_login($email, $password);
        }
        elseif($role == "trader" && $flag){
            trader_login($email, $password);
        }
        elseif($role = "admin" && $flag){
            admin_login($email, $password);
        }
        else{
            $error= "Please select a valid user with proper credentials!";
        }
    }
?>
