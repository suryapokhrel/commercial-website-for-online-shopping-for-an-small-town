<?php
    include "header.php";
    // session_start();
    if(isset($_SESSION['tid'])){
        include "Backend/includes/connection.php";

        $id = $_SESSION['tid'];

        $getShopName = oci_parse($conn, "SELECT SHOP_NAME FROM SHOP WHERE TRADER_ID_FK='$id'");
        oci_execute($getShopName);

        $shops = array();

        $i = 0;
        while($row = oci_fetch_array($getShopName, OCI_BOTH)){
            array_push($shops, $row['SHOP_NAME']);
        }
    }
    else{
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Product</title>
    <?php include "head.php"; ?>
    <link rel="stylesheet" href="static/CSS/crudProduct.css">
</head>
<body>
    <!-- <?php // include "header.php"; ?> -->
    <div class="headingdis">
    <h1><b>Manage Products</b></h1></div>
    <div class="insertProduct">
        <fieldset>
            <legend>Enter New Product Details</legend>
            <form action="Backend/insertProduct.php" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <div>Product Name: </div>
                            <br /><input type="text" name="ProductName" class="input" required/><br /><br />
                        </td>
                        <td>
                            <div>Shop Name: </div>
                            <!-- <br /><input type="text" name="ShopName" class="input" /><br /><br /> -->
                            <select name="ShopName" id="ShopName" class="input">
                                <option value="<?php echo $shops[0]; ?>"><?php echo ucfirst($shops[0]); ?></option>
                                <option value="<?php echo $shops[1]; ?>"><?php echo ucfirst($shops[1]); ?></option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div>Product Price: </div>
                            <br /><input type="text" name="productPrice" class="input" required/><br />
                        </td>
                        <td>
                            <div>Product Quantity:</div>
                            <br /><input type="number" name="productQuantity" class="input" required/><br />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div>Product Availability <br>(if yes 1, else 0): </div>
                            <input type="number" name="productAvailability" class="input" max="1" min="0" required/><br />
                        </td>
                        <td>
                            <div>Allergy Information:</div>
                            <br /><input type="text" name="allergyInfo" class="input" required/><br />
                            
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div>Maximum Order Availability: </div>
                            <br /><input type="number" name="max_order" class="input" min="1" max="20" required/><br />
                        </td>
                        <td>
                            <div>Product Category: </div>
                            <br />
                            <select name="productCategory" class="input">
                                <option value="fruit">Fruits</option>
                                <option value="vegetables">Vegetables</option>
                                <option value="seafood">Seafood</option>
                                <option value="dairy">Dairy</option>
                                <option value="meat">Meat</option>
                                <option value="cake">Cake</option>
                                <option value="FastFood">Fast Food</option>
                                <option value="cereals">Cereals</option>
                                <option value="bakery">Bakery</option>
                                <option value="dry">Dry Fruit</option>
                            </select><br />

                        </td>
                    </tr>

                    </tr >
                        <td class="flex">
                            <div >Image Filename:</div><br>
                            <input type="file" name="ImageFilename"  class="input " id="file"/>
                            <label for="file" class="input photo">choose Image</label>
                            <br>
                        </td>
                    <tr>
                    <tr  >
                        <td colspan="2">
                            <div>Product Description: </div>
                            <input type="textarea" name="ProductDesc" class="input1" required/><br />
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td style="text-align: center;">
                            <input type="submit" value="Submit" name="btnSubmit" />
                            <input type="reset" value="Clear" />
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>