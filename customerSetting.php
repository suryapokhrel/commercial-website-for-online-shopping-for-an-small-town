<?php
    include "header.php";
    // session_start();
    if(isset($_SESSION['cid']) && !empty($_SESSION['cid'])){
        include "Backend/includes/connection.php";

        $id = $_SESSION['cid'];

        $get_details = oci_parse($conn, "SELECT FIRSTNAME, LASTNAME, PHONE_NUMBER, IMAGES FROM CUSTOMER WHERE CUSTOMER_ID='$id'");
        oci_execute($get_details);

        $row = oci_fetch_array($get_details, OCI_BOTH);

        $firstName = $row['FIRSTNAME'];
        $lastName = $row['LASTNAME'];
        $phonenumber = $row['PHONE_NUMBER'];
        if(!empty($row['IMAGES'])){
            $img = 'static/images/profile/' . $row['IMAGES'];
        }
        else{
            $img = '';
        }
    }
    else{
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" href="./static/CSS/customerSetting.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="static/CSS/footer.css">
    <link rel="stylesheet" href="static/CSS/header.css">
</head>

<body>
    <form action="Backend/customer_setting_profile.php" method="POST" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 border border-primary">
                    <div class="container image">
                        <?php
                            include "Backend/includes/connection.php";

                            $id = $_SESSION['cid'];
                            $username = $_SESSION['user'];
                    
                            $get_details = oci_parse($conn, "SELECT FIRSTNAME, MIDDLENAME, LASTNAME, EMAIL, PHONE_NUMBER, IMAGES, CUST_ADDRESS FROM CUSTOMER WHERE CUSTOMER_ID='$id'");
                            oci_execute($get_details);
                    
                            $row = oci_fetch_array($get_details, OCI_BOTH);
                    
                            $firstName = $row['FIRSTNAME'];
                            !empty($row['MIDDLENAME']) ? $middleName = $row['MIDDLENAME'] : $middleName = "";
                            $lastName = $row['LASTNAME'];
                            $email = $row['EMAIL'];
                            $phonenumber = $row['PHONE_NUMBER'];
                            $address = $row['CUST_ADDRESS'];
                            if(!empty($row['IMAGES'])){
                                $img = 'static/images/profile/' . $row['IMAGES'];
                            }
                            else{
                                $img = '';
                            }

                            echo "<div class='profile'>";
                                echo "<img id='photo' src='".$img."' alt='profile_picture'>";
                                echo "<input type='file' name='image' id='file'>";
                                echo "<label for='file' id='uploadBtn'>Update Photo</label>";
                            echo "</div>";
                            echo "<h3>".ucfirst($firstName). " " . ucfirst($lastName) ."</h3>";
                            echo "<p>".$phonenumber."</p>";
                        ?>
                        <table>
                            <tr>
                                <td><a href="customerSetting.php">My Profile</a></td>
                            </tr>
                            <tr>
                                <td><a href="Backend/logout.php">Logout</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col border border-danger">
                    <div class="form">
                        <div>
                            <h2>My Profile</h2>
                        </div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <div>First Name: <span>*</span></div>
                                        <input type="text" name="firstname" class="input" value="<?php echo $firstName; ?>" required>
                                    </td>
                                    <td>
                                        Middle Name:
                                        <input type="text" name="middlename" class="input" value="<?php echo $middleName; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>Last Name: <span>*</span></div>
                                        <input type="text" name="lastname" class="input" value="<?php echo $lastName; ?>" required>
                                    </td>
                                    <td>
                                        <div>Username: <span>*</span></div>
                                        <input type="text" name="username" class="input" value="<?php echo $username; ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>Phone <span>*</span></div>
                                        <input type="text" name="phonenumber" class="input" value="<?php echo $phonenumber; ?>" required>
                                    </td>
                                    <td>
                                        <div>Email <span>*</span></div>
                                        <input type="email" name="email" class="input" value="<?php echo $email; ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10">
                                        <div>Address <span>*</span></div>
                                        <input type="text" name="address" class="input" value="<?php echo $address; ?>" required>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="button">
                                        <input type="submit" name="savechanges" value="Save Change">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </form>
    <script src="./js/uploadPhoto.js"></script>
    <?php include "footer.php"; ?>
</body>
</html>