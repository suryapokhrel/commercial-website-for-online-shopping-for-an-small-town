<?php
    // START SESSION
    session_start();

    // CHECK IF SESSION IS SET FOR THE USER
    if(isset($_SESSION['cid']) && !empty($_SESSION['cid'])){
        if(isset($_POST["savechanges"])){
            // INITIALIZE EMPTY VARIABLES
            $id = "";
            $firstname = "";
            $middlename = "";
            $lastname = "";
            $username = "";
            $phonenumber = "";
            $email = "";
            $address = "";
            $imageName = "";
            $flag = TRUE;


            // INCLUDE VALIDATION FILE
            include "includes/validation.php";
            
            // VALIDATE FIRSTNAME AND LASTNAME
            if(validate_name($_POST["firstname"], $_POST["lastname"])){
                $firstname = strtolower($_POST["firstname"]);
                $lastname = strtolower($_POST["lastname"]);

                if(!empty(htmlspecialchars(trim($_POST["middlename"])))){
                    $middlename = strtolower($_POST["middlename"]);
                }
            }
            else{
                $flag = FALSE;
            }

            // VALIDATE USERNAME
            validate_username($_POST["username"]) ? $username = strtolower($_POST["username"]) : $flag = FALSE;

            // VALIDATE PHONE NUMBER
            validate_phone($_POST["phonenumber"]) ? $phonenumber = $_POST["phonenumber"] : $flag = FALSE;

            // VALIDATE EMAIL
            validate_email($_POST["email"]) ? $email = strtolower($_POST["email"]) : $flag = FALSE;
        
            // VALIDATE ADDRESS
            validate_address($_POST["address"]) ? $address = strtolower($_POST["address"]) : $flag = FALSE;
        
            // IMAGE UPLOAD
            if(!empty(pathinfo($_FILES['image']['name'], PATHINFO_FILENAME))){
                $target_dir = "../static/images/profile/";
                $imageFileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
                $imageName = $_SESSION["cid"] . $firstname . "." . $imageFileType;
                $target_file = $target_dir . basename($imageName);

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
                    exit("Sorry, only JPG, PNG & JPEG files are allowed!");
                }
                else{
                    move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
                }
            }   

            if($flag){
                include "includes/connection.php";
                include "includes/duplicateCheck.php";
                include "includes/updateTable.php";

                if(check_user_credentials_on_update($username, $email, $phonenumber, $_SESSION['cid'])){
                    exit("Details already exists!");
                }
                else{
                    $id = $_SESSION['cid'];

                    if(!empty($middlename)){
                        $array = array(
                            $id, $firstname, $middlename, $lastname, $username, $phonenumber, $email, $address, $imageName
                        );
                        update_customer($array);
                    }
                    else{
                        $array = array(
                            $id, $firstname, $lastname, $username, $phonenumber, $email, $address, $imageName
                        );
                        update_customer($array);
                    }
                }
            }
            else{
                exit("Please enter valid details!");
            }
        }
        else{
            // CHANGE HERE
            exit("Please enter details!");
        }
    }
    else{
        header("Location: ../login.php");
    }
?>