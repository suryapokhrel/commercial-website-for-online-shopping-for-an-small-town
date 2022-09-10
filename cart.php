<?php
    // session_start();
    include "header.php";
    if(isset($_SESSION["cid"]) && !empty($_SESSION["cid"])){
        
    }else{
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php";?>
    <title>Add to cart </title>
</head>
<body>
    <section class="container content-section">
        <h2 class="section-header">CART</h2>
        <div class="cart-row">
            <span class="cart-item cart-header cart-column">ITEM</span>            
            <span class="cart-price cart-header cart-column">PRICE</span>
            <span class="cart-quantity cart-header cart-column">QUANTITY</span>
        </div>

        <form name="form" action="Backend/addToOrderProduct.php" method="POST">
        <?php
            // session_start();
            include "Backend/includes/connection.php";

            $getItems = oci_parse($conn, "SELECT IMAGES, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_ID_FK, CART_ID FROM PRODUCT P, CART C WHERE P.PRODUCT_ID=C.PRODUCT_ID_FK AND C.CUSTOMER_ID_FK='". $_SESSION['cid'] ."'");
            oci_execute($getItems);
    
            $totalPrice = 0;

            $count = 1;

            // Array to store product id and cart id and price
            $_SESSION['productID'] = array();
            $_SESSION['cartID'] = array();
            $_SESSION['price'] = array();
    
            while($row = oci_fetch_array($getItems, OCI_BOTH)){
                echo "<div class='cart-row'>"."<br>";
                    echo "<div class='cart-item cart-column'>"."<br>";
                        echo "<img class='cart-item-image' src='static/images/".$row["IMAGES"]."' width='100' height='100'>"."<br>";
                        echo "<span class='cart-item-title'>".ucfirst($row["PRODUCT_NAME"])."</span>"."<br>";
                    echo "</div>"."<br>";
                    echo "<span class='cart-price cart-column'>".$row["PRODUCT_PRICE"]."</span>";
                    echo "<div class='cart-quantity cart-column'>";
                        echo "<input class='cart-quantity-input' type='number' id='".$row["PRODUCT_PRICE"]."' name='item".$count."' value='1' min='1' max='20'>";
                        echo "<a href='Backend/removeProduct.php?id=".$row["PRODUCT_ID_FK"]."'><button class='btn btn-danger' type='button'>REMOVE</button></a>";
                    echo "</div>";
                echo "</div>";

                $totalPrice = $totalPrice + $row["PRODUCT_PRICE"];
                array_push($_SESSION["productID"], $row["PRODUCT_ID_FK"]);
                array_push($_SESSION["cartID"], $row["CART_ID"]);
                array_push($_SESSION['price'], $row["PRODUCT_PRICE"]);
                $count++;
            }
        ?>

        <div class="cart-total">
            <strong class="cart-total-title">Total</strong>
            <span class="cart-total-price"><?php echo $totalPrice; ?></span>
        </div>
        <button class="btn btn-primary btn-purchase" type="submit" name="purchase">PURCHASE</button>
        </form>
        <!-- header("Refresh:0"); -->
        <script>
            let initialQty = 1;
            let previousInputName;

            let inputs = {};

            document.body.onclick = function(){
                let selectedElementName = document.activeElement.name

                let currentInputName = selectedElementName;

                let selectedElementID = document.activeElement.id

                let element = document.querySelector(`form[name=form] input[name=${selectedElementName}]`);
                let finalQty = element.value;

                if(!inputs.selectedElementName){
                    inputs.selectedElementName = finalQty;
                }
                else if(inputs.selectedElementName){
                    // initialQty = inputs.selectedElementName;
                    inputs.selectedElementName = finalQty;
                }

                // console.log(inputs.selectedElementName);


                if(currentInputName == previousInputName){
                    if(finalQty > initialQty){
                        initialQty = finalQty;
                        
                        let totalPrice = parseInt(document.querySelector(".cart-total-price").innerHTML);
                        let newPrice1 = (totalPrice + (initialQty * selectedElementID)) - (selectedElementID * (initialQty - 1));
                        document.querySelector(".cart-total-price").innerHTML = newPrice1;

                        previousInputName = currentInputName;
                    }
                    else if(finalQty < initialQty){
                        initialQty = finalQty;

                        let totalPrice = parseInt(document.querySelector(".cart-total-price").innerHTML);
                        let newPrice2 = (totalPrice - (finalQty * selectedElementID)) + (selectedElementID * (finalQty - 1));
                        document.querySelector(".cart-total-price").innerHTML = newPrice2;

                        previousInputName = currentInputName;
                    }
                }else{
                    initialQty = 1;
                    if(finalQty > initialQty){
                        initialQty = finalQty;
                        
                        let totalPrice = parseInt(document.querySelector(".cart-total-price").innerHTML);
                        let newPrice1 = (totalPrice + (initialQty * selectedElementID)) - (selectedElementID * (initialQty - 1));
                        document.querySelector(".cart-total-price").innerHTML = newPrice1;

                        previousInputName = currentInputName;
                    }
                    else if(finalQty < initialQty){
                        // initialQty = finalQty;

                        let totalPrice = parseInt(document.querySelector(".cart-total-price").innerHTML);
                        let newPrice2 = (totalPrice - (finalQty * selectedElementID)) + (selectedElementID * (finalQty - 1));
                        document.querySelector(".cart-total-price").innerHTML = newPrice2;

                        previousInputName = currentInputName;
                    }
                }
            }
        </script>
</section>
<?php include "footer.php";?>
</body>

</html>