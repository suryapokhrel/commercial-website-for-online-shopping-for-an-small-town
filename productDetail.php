<?php // include 'Backend/product_detail.php'; ?>
<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <?php include 'head.php';?>
    <link rel="stylesheet" href="./static/CSS/productDetail.css">
</head>
<body>


    <div class="topic">
        <h1>Product Detail Info</h1>
    </div>
    <div class="container">
        <?php
            include "Backend/includes/connection.php";
            $productID = $_GET["id"];

            $getProduct = oci_parse($conn, "SELECT PRODUCT_ID, IMAGES, PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_CATEGORY, PRODUCT_PRICE, PRODUCT_AVAILABILITY, PRODUCT_QUANTITY, ALLERGIC_INFORMATION FROM PRODUCT WHERE PRODUCT_ID='$productID'");
            oci_execute($getProduct);
            $getRating = oci_parse($conn, "SELECT COMMENTS, RATING_NO FROM CUSTOMER_REVIEW WHERE PRODUCT_ID_FK='$productID'");
            oci_execute($getRating);
            while($row = oci_fetch_array($getProduct, OCI_BOTH)){
                echo "<div class='section1'>";
                    echo "<figure class='figure'>";
                        echo "<img src='static/images/".$row['IMAGES']."' alt='product'>";
                        
                        echo "<div class='content'>";
                        
                            echo "<h4>Product Description</h4>";
                            echo "<p>".ucfirst($row['PRODUCT_DESCRIPTION'])."</p>";
                        echo "</div>";
                        echo "<br>";
                        
        ?>
                    <form action='Backend/rating_review.php' method='POST'>
                    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                        <label for='rating'>Rating:</label>&nbsp;&nbsp;&nbsp;
                        <input type='number' id='rating' name='rating' class='btn btn-default custreview' min='0' max='5'><br><br>
                        <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                        <label for='review'>Review:</label>&nbsp;&nbsp;&nbsp;
                        <input type='text' id='review' name='review' class='btn btn-default custreview' max='100'><br>
                        <input type='hidden' name='id' value='<?php echo $row["PRODUCT_ID"];?>'>
                        <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                        <input class='btn btn-default' name='submitBtn' type='submit' value='Submit'>
                    </form>
        <?php
                
                echo "</figure><br>";
                echo "</div>";
                echo "<div class='section2'>";
                echo "<h2>".ucfirst($row["PRODUCT_NAME"])."</h2>";
                echo "<p class='brand'>Product Category:".ucfirst($row["PRODUCT_CATEGORY"])."</p>";
                    echo "<div class='star'>";

                    $comments = array();
                    while($row1 = oci_fetch_array($getRating, OCI_BOTH)){
                        echo "<br>";
                        array_push($comments, $row1['COMMENTS']);
                        for($i = 0 ; $i < $row1['RATING_NO'] ; $i++){
                            echo "<i class='fas fa-star'></i>";
                        }
                    }
                    echo "</div><br>";
                    echo "<p class='price'><b>Price:</b>"."$".$row["PRODUCT_PRICE"]."</p><br>";
                    echo "<p><b>Availability:</b>".$row["PRODUCT_AVAILABILITY"]."</p><br>";
                    echo "<p><b>Condition:</b> New</p><br>";
                    echo "<label><b>Quantity:</b>".$row["PRODUCT_QUANTITY"]."</label><br><br>";
                    echo "<label><b>ALLERGIC INFORMATION:</b>".ucfirst($row["ALLERGIC_INFORMATION"])."</label> <br><br>";
                    echo '<a href="Backend/addToCart.php?id='.$row['PRODUCT_ID'].'"><button type="button" class="btn btn-default cart">Add to Cart</button></a>';
                echo '<a href="Backend/wishlist.php?id='.$row['PRODUCT_ID'].'"><button type="button" class="btn btn-default wishlist">Add to Wishlist</button></a>';
                   
            }
        ?>

                <?php 
                    include "Backend/includes/connection.php";
                    $productID = $_GET["id"];
                    echo "<br>";
                    echo "<label style='color:black;'><br>Review: </label>";
                        for($i = 0 ; $i < count($comments); $i++){
                            echo "<br>";
                            echo "<p class='review'>";
                            echo $comments[$i];
                            echo "<br>";
                            echo "</p>";
                        }  
                    echo "</div>";
                ?>
    </div>
<?php include 'footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

 