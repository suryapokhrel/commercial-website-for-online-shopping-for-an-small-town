<?php
    include "header.php";
    // session_start();
    if(isset($_SESSION['tid']) && !empty($_SESSION['tid'])){
        include "Backend/includes/connection.php";

        // TRADER ID
        $id = $_SESSION['tid'];

        // GET SHOP TYPE OF THIS TRADER
        $getShopType = oci_parse($conn, "SELECT SHOP_TYPE FROM SHOP S, TRADER T WHERE S.TRADER_ID_FK=T.TRADER_ID AND T.TRADER_ID='$id'");
        oci_execute($getShopType);
        $shop = oci_fetch_array($getShopType, OCI_BOTH);
        
        // GET PRODUCT CATEGORY OF THIS THIS TRADER
        $getProductCategory = oci_parse($conn, "SELECT PRODUCT_CATEGORY FROM PRODUCT P, SHOP S, TRADER T WHERE P.SHOP_ID_FK=S.SHOP_ID AND S.TRADER_ID_FK=T.TRADER_ID AND T.TRADER_ID='$id'");
        oci_execute($getProductCategory);
        $category = oci_fetch_array($getProductCategory, OCI_BOTH);


        if(isset($_POST["update"])){
            !empty($_POST['productName']) ? $productName = strtolower($_POST['productName']) : $productName = "";
            !empty($_POST['ShopOption']) ? $shopType = $_POST['ShopOption'] : $shopType = "";
            !empty($_POST['Price']) ? $price = $_POST['Price'] : $price = "";
            !empty($_POST['Quantity']) ? $quantity = $_POST['Quantity'] : $quantity = "";
            !empty($_POST['productAvailability']) ? $availability = $_POST['productAvailability'] : $availability = "";
            !empty($_POST['allergyInfo']) ? $allergyInfo = $_POST['allergyInfo'] : $allergyInfo = "";
            !empty($_POST['max_order']) ? $max = $_POST['max_order'] : $max = "";
            !empty($_POST['productCategory']) ? $productCategory = $_POST['productCategory'] : $productCategory = "";
            !empty($_POST['description']) ? $description = $_POST['description'] : $description = "";

            // GET PRODUCT ID
            $getProductID = oci_parse($conn, "SELECT PRODUCT_ID FROM PRODUCT WHERE PRODUCT_NAME='$productName'");
            oci_execute($getProductID);
            $pid = oci_fetch_array($getProductID, OCI_BOTH);

            // UPDATE ON DATABASE
            $updateProduct = oci_parse($conn, "UPDATE PRODUCT SET PRODUCT_NAME='$productName', PRODUCT_DESCRIPTION='$description', PRODUCT_CATEGORY='$productCategory', PRODUCT_PRICE='$price', PRODUCT_QUANTITY='$quantity', PRODUCT_AVAILABILITY='$availability', ALLERGIC_INFORMATION='$allergyInfo', MAX_ORDER='$max' WHERE PRODUCT_ID='$pid[0]'");
            oci_execute($updateProduct);

            header("Location: {$_SERVER['HTTP_REFERER']}");
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
    <?php include "head.php"; ?>
    <title>Product Update</title>
    <link rel="stylesheet" href="./static/CSS/productUpdate.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid" style="margin-top: 10em;">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-4 border ">
                    <div class="container image">
                        <h2>Product Edit Page</h2>
                        <div class="profile"  >
                            <img id="photo" src="./static/images/background/heritage.jpg" alt="profile_picture">
                            <input type='file' name='image' id='file'>
                            <label for='file' id='uploadBtn'>Update Photo</label>
                        </div>
                    </div>
                </div>
                <div class="col border ">
                    <div class="form">
                        <div>
                            <h2>Product Edit Page</h2>
                        </div>
                        <div>
                            <table>
                                <tr>
                                    <td>
                                        <div>Product Name</div>
                                        <input type="text" name="productName" class="input" required>
                                    </td>
                                    <td>
                                        <div>Shop</div>
                                        <select class="input" name="ShopOption" id="selector">
                                            <option value="<?php echo $shop[0]; ?>"><?php echo $shop[0]; ?></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>Price</div>
                                        <input type="text" name="Price" class="input" required>
                                    </td>
                                    <td>
                                        <div>Quantity</div>
                                        <input type="number" name="Quantity" class="input" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>Product Availability <br>(if yes 1, else 0): </div>
                                        <input type="number" name="productAvailability" class="input" max="1" min="0" required/><br />
                                    </td>
                                    <td>
                                        <div>Allergy Information:</div>
                                        <br /><input type="text" name="allergyInfo" class="input"/><br />
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>Maximum Order Availability: </div>
                                        <br /><input type="number" name="max_order" class="input" min="1" max="20" required/><br />
                                    </td>
                                    <td>
                                        <div>Product Category: </div>
                                        <br /><input type="text" name="productCategory" class="input" value="<?php echo $category[0]; ?>" required/><br />

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10">
                                        <div>Product Description</div>
                                        <input type="textarea" name="description" class="input desc" required>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="button">
                                        <input type="submit" name="update" value="Save Change">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div> 
    <?php include "footer.php"; ?>
    <script src="./js/uploadPhoto.js"></script>
</body>
</html>
