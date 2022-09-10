<?php
    // FUNCTION TO VALIDATE NAME; RETURNS TRUE IF OK, ELSE RETURNS FALSE
    function validate_name($firstname, $lastname){
        return (!empty(htmlspecialchars(trim($firstname))) && !empty(htmlspecialchars(trim($lastname))));
    }


    // FUNCTION TO VALIDATE EMAIL; RETURNS GIVEN VALUE IF OK, ELSE RETURNS FALSE
    function validate_email($email){
        $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return (filter_var($sanitized_email, FILTER_VALIDATE_EMAIL));
    }


    // FUNCTION TO VALIDATE PHONE NUMBER; RETURNS TRUE IF OK, ELSE RETURNS FALSE
    function validate_phone($number){
        return (!empty(is_numeric(htmlspecialchars(trim($number)))));
    }


    // FUNCTION TO VALIDATE ADDRESS; RETURNS TRUE IF OK, ELSE RETURNS FALSE
    function validate_address($address){
        return (!empty(htmlspecialchars(trim($address))));
    }


    // FUNCTION TO VALIDATE USERNAME; RETURNS TRUE IF OK, ELSE RETURNS FALSE
    function validate_username($username){
        return (!empty(htmlspecialchars(trim($username))));
    }


    // FUNCTION TO VALIDATE PASSWORD; RETURNS TRUE IF OK, ELSE RETURNS FALSE
    function validate_password($password, $repassword){
        if((htmlspecialchars(trim($password))) == (htmlspecialchars(trim($repassword)))){
            return (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password));
        }
    }


    // FUNCTION TO VALIDATE SHOP; RETURNS TRUE IF OK, ELSE RETURNS FALSE
    function validate_shop($shop){
        return (!empty(htmlspecialchars(trim($shop))));
    }


    // FUNCTION TO VALIDATE TRADER TYPE; RETURNS TRUE IF OK, ELSE RETURNS FALSE
    function validate_trader_type($traderType){
        return (!empty(trim($traderType)));
    }

    // FUNCTION TO VALIDATE SHOP TYPE; RETURNS TRUE IF OK, ELSE RETURNS FALSE
    function validate_shop_type($shopType){
        return (!empty(trim($shopType)));
    }

    
    // FUNCTION TO VALIDATE PASSWORD FOR LOGIN; RETURNS TRUE IF OK, ELSE RETURNS FALSE
    function validate_login_password($password){
        return (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", htmlspecialchars(trim($password))));
    }
?>
