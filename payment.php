 <?php
    date_default_timezone_set("Asia/Kathmandu");

    $orderDate = date("m/d/Y");
    $orderTime = date("H:i");
    $orderDay = date("l");

    $slot1 = 1;
    $slot2 = 1;
    $slot3 = 1;

    // echo $orderDate . "<br>";
    // echo $orderTime . "<br>";
    // echo $orderDay . "<br>";

    switch($orderDay){
        case "Tuesday":
            if(strtotime($orderTime) >= strtotime('10:00') || strtotime($orderTime) < strtotime('13:00')){
                $slot1 = 0;
                $slot2 = 1;
                $slot3 = 1;
                // echo "Wednesday ";
                // echo "2, 3 available";
            }
            elseif(strtotime($orderTime) >= strtotime('13:00') || strtotime($orderTime) < strtotime('16:00')){
                $slot1 = 0;
                $slot2 = 0;
                $slot3 = 1;
                // echo "Wednesday ";
                // echo "3 available";
            }
            elseif(strtotime($orderTime) >= strtotime('16:00') || strtotime($orderTime) < strtotime('19:00')){
                $slot1 = 0;
                $slot2 = 0;
                $slot3 = 0;
                // echo "Wednesday ";
                // echo "0 available";
            }
            break;
        
        case "Wednesday":
            if(strtotime($orderTime) >= strtotime('10:00') || strtotime($orderTime) < strtotime('13:00')){
                $slot1 = 0;
                $slot2 = 1;
                $slot3 = 1;
                // echo "Thursday ";
                // echo "2, 3 available";
            }
            elseif(strtotime($orderTime) >= strtotime('13:00') || strtotime($orderTime) < strtotime('16:00')){
                $slot1 = 0;
                $slot2 = 0;
                $slot3 = 1;
                // echo "Thursday ";
                // echo "1 available";
            }
            elseif(strtotime($orderTime) >= strtotime('16:00') || strtotime($orderTime) < strtotime('19:00')){
                $slot1 = 0;
                $slot2 = 0;
                $slot3 = 0;
                // echo "Thursday ";
                // echo "0 available";
            }
            break;

            case "Thursday":
                if(strtotime($orderTime) >= strtotime('10:00') || strtotime($orderTime) < strtotime('13:00')){
                    $slot1 = 0;
                    $slot2 = 1;
                    $slot3 = 1;
                    // echo "Friday ";
                    // echo "2, 3 available";
                }
                elseif(strtotime($orderTime) >= strtotime('13:00') || strtotime($orderTime) < strtotime('16:00')){
                    $slot1 = 0;
                    $slot2 = 0;
                    $slot3 = 1;
                    // echo "Friday ";
                    // echo "1 available";
                }
                elseif(strtotime($orderTime) >= strtotime('16:00') || strtotime($orderTime) < strtotime('19:00')){
                    $slot1 = 0;
                    $slot2 = 0;
                    $slot3 = 0;
                    // echo "Friday ";
                    // echo "0 available";
                }
                break;
    }
?>

<?php include 'header.php';?>
<?php include 'head.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="./static/CSS/payment.css"> 
</head>
<body>
    <div class="containerpayment">
        <!-- <form target="_self" action="https://www.sandbox.paypal.com/cgi-bin/websrc" method="POST"> -->
            <div class="titleBanner">
                <h3 id="name">Your Payment</h3>
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                    <?php
                        include "Backend/includes/connection.php";

                        $totalPrice = 0;

                        $getItemsToPurchase = oci_parse($conn, "SELECT P.PRODUCT_NAME, P.PRODUCT_PRICE, OP.ORDER_QUANTITY, OP.TOTAL_PRICE FROM PRODUCT P, ORDER_PRODUCT OP, CART C WHERE P.PRODUCT_ID=OP.PRODUCT_ID_FK AND OP.CART_ID_FK=C.CART_ID AND C.CUSTOMER_ID_FK='".$_SESSION['cid']."'");
                        oci_execute($getItemsToPurchase);

                        while($row = oci_fetch_array($getItemsToPurchase, OCI_BOTH)){
                            echo "<tr>";
                            echo "<td>".ucfirst($row["PRODUCT_NAME"])."</td>";
                            echo "<td>".ucfirst($row["PRODUCT_PRICE"])."</td>";
                            echo "<td>".ucfirst($row["ORDER_QUANTITY"])."</td>";
                            echo "<td>".ucfirst($row["TOTAL_PRICE"])."</td>";
                            echo "</tr>";

                            $totalPrice = $totalPrice + $row["TOTAL_PRICE"];
                        }
                    ?>
                    <div class="col">
                        <tr>
                            <td id=" col" colspan="2"></td>
                            <td><b>Total Price :</b></td>
                            <?php echo "<td>$ ". $totalPrice . "</td>";?>
                        </tr>
                        <tr>
                            <td id="col" colspan="2"></td>
                            <td><b>Grand Total :</b></td>
                            <?php echo "<td>$ ". $totalPrice . "</td>";?>
                        </tr>
                    </div>
                </table>
            </div>
            <div class="para">
                <table>
                    <form action="Backend/updateCart.php" method="POST" id="update">
                        <tr><td><h2 style="background-color:lightgray; padding:3%; color:black; border-radius:3px">Collection Details</h2></td></tr>
                        <tr>
                            <td>
                                <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px">Collection Point :</h3>
                            </td>
                            <td>
                                <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px"><a href="https://goo.gl/maps/gEGWbs9bVFSZxVx67">Hull Road</a></h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px">Collection Time:</h3>
                            </td>
                            <?php if($slot1==0 && $slot2==1 && $slot3==1 && $orderDay=="Tuesday"){?>
                            <td>
                                <select name="collectTime" id="collectT">
                                    <!-- <option value="10">10:00 am to 13:00pm</option> -->
                                    <option value="13">13:00 pm to 16:00pm</option>
                                    <option value="16">16:00pm to 19:00pm</option>
                                </select>
                            </td>  
                        </tr>
                        <tr>
                            <td>
                                <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px">Collection Day:</h3>
                            </td>
                            <td>
                                <select name="collectDay" id="collectD">
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                </select>
                            </td>
                            <?php }elseif($slot1==0 && $slot2==0 && $slot3==1 && $orderDay=="Tuesday"){?>
                                <td>
                                <select name="collectTime" id="collectT">
                                    <!-- <option value="10">10:00 am to 13:00pm</option> -->
                                    <!-- <option value="13">13:00 pm to 16:00pm</option> -->
                                    <option value="16">16:00pm to 19:00pm</option>
                                </select>
                            </td>  
                        </tr>
                        <tr>
                            <td>
                                <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px">Collection Day:</h3>
                            </td>
                            <td>
                                <select name="collectDay" id="collectD">
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                </select>
                            </td>
                            <?php }elseif($slot1==0 && $slot2==0 && $slot3==0 && $orderDay=="Tuesday"){?>
                                <td>
                                <select name="collectTime" id="collectT">
                                    <option value="10">10:00 am to 13:00pm</option>
                                    <option value="13">13:00 pm to 16:00pm</option>
                                    <option value="16">16:00pm to 19:00pm</option>
                                </select>
                            </td>  
                        </tr>
                        <tr>
                            <td>
                                <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px">Collection Day:</h3>
                            </td>
                            <td>
                                <select name="collectDay" id="collectD">
                                    <!-- <option value="wednesday">Wednesday</option> -->
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                </select>
                            </td>
                            <?php }elseif($slot1==0 && $slot2==1 && $slot3==1 && $orderDay=="Wednesday"){?>
                                <td>
                                <select name="collectTime" id="collectT">
                                    <!-- <option value="10">10:00 am to 13:00pm</option> -->
                                    <option value="13">13:00 pm to 16:00pm</option>
                                    <option value="16">16:00pm to 19:00pm</option>
                                </select>
                            </td>  
                        </tr>
                        <tr>
                            <td>
                                <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px">Collection Day:</h3>
                            </td>
                            <td>
                                <select name="collectDay" id="collectD">
                                    <!-- <option value="wednesday">Wednesday</option> -->
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                </select>
                            </td>
                            <?php }elseif($slot1==0 && $slot2==0 && $slot3==1 && $orderDay=="Wednesday"){?>
                                <td>
                                <select name="collectTime" id="collectT">
                                    <!-- <option value="10">10:00 am to 13:00pm</option> -->
                                    <!-- <option value="13">13:00 pm to 16:00pm</option> -->
                                    <option value="16">16:00pm to 19:00pm</option>
                                </select>
                            </td>  
                        </tr>
                        <tr>
                            <td>
                                <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px">Collection Day:</h3>
                            </td>
                            <td>
                                <select name="collectDay" id="collectD">
                                    <!-- <option value="wednesday">Wednesday</option> -->
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                </select>
                            </td>
                            <?php }elseif($slot1==0 && $slot2==0 && $slot3==0 && $orderDay=="Wednesday"){?>
                                <td>
                                <select name="collectTime" id="collectT">
                                    <option value="10">10:00 am to 13:00pm</option>
                                    <option value="13">13:00 pm to 16:00pm</option>
                                    <option value="16">16:00pm to 19:00pm</option>
                                </select>
                            </td>  
                        </tr>
                        <tr>
                            <td>
                                <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px">Collection Day:</h3>
                            </td>
                            <td>
                                <select name="collectDay" id="collectD">
                                    <option value="wednesday">Wednesday</option>
                                    <!-- <option value="thursday">Thursday</option> -->
                                    <option value="friday">Friday</option>
                                </select>
                            </td>
                            <?php }elseif($slot1==0 && $slot2==1 && $slot3==1 && $orderDay=="Thursday"){?>
                                <td>
                                <select name="collectTime" id="collectT">
                                    <!-- <option value="10">10:00 am to 13:00pm</option> -->
                                    <option value="13">13:00 pm to 16:00pm</option>
                                    <option value="16">16:00pm to 19:00pm</option>
                                </select>
                            </td>  
                        </tr>
                        <tr>
                            <td>
                                <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px">Collection Day:</h3>
                            </td>
                            <td>
                                <select name="collectDay" id="collectD">
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                </select>
                            </td>
                            <?php }elseif($slot1==0 && $slot2==0 && $slot3==1 && $orderDay=="Thursday"){?>
                                <td>
                                <select name="collectTime" id="collectT">
                                    <!-- <option value="10">10:00 am to 13:00pm</option> -->
                                    <!-- <option value="13">13:00 pm to 16:00pm</option> -->
                                    <option value="16">16:00pm to 19:00pm</option>
                                </select>
                            </td>  
                        </tr>
                        <tr>
                            <td>
                                <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px">Collection Day:</h3>
                            </td>
                            <td>
                                <select name="collectDay" id="collectD">
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <option value="friday">Friday</option>
                                </select>
                            </td>
                            <?php }elseif($slot1==0 && $slot2==0 && $slot3==0 && $orderDay=="Thursday"){?>
                                <td>
                                <select name="collectTime" id="collectT">
                                    <option value="10">10:00 am to 13:00pm</option>
                                    <option value="13">13:00 pm to 16:00pm</option>
                                    <option value="16">16:00pm to 19:00pm</option>
                                </select>
                            </td>  
                        </tr>
                        <tr>
                            <td>
                                <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px">Collection Day:</h3>
                            </td>
                            <td>
                                <select name="collectDay" id="collectD">
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursday</option>
                                    <!-- <option value="friday">Friday</option> -->
                                </select>
                            </td>
                            <?php }else{?>
                                <td>
                                <select name="collectTime" id="collectT">
                                    <option value="10">10:00 am to 13:00pm</option>
                                    <option value="13">13:00 pm to 16:00pm</option>
                                    <option value="16">16:00pm to 19:00pm</option>
                                </select>
                                </td>  
                            </tr>
                            <tr>
                                <td>
                                    <h3 style="background-color:#F5F5F5; padding:3%; color:black; border-radius:3px">Collection Day:</h3>
                                </td>
                                <td>
                                    <select name="collectDay" id="collectD">
                                        <option value="wednesday">Wednesday</option>
                                        <option value="thursday">Thursday</option>
                                        <option value="friday">Friday</option>
                                    </select>
                                </td>
                            <?php } ?>
                        </tr>
                    </form>
                    <tr>
                        <form target="_blank" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST" id="buyCredits" name="buyCredits">
                            <input type="hidden" name="business" value="sb-9k47k516387951@business.example.com"/>
    
                            <input type='hidden' name='cmd' value='_xclick'>
    
                            <input type='hidden' name='amount' value='<?php $row["TOTAL_PRICE"]?>'>
                            <input type="hidden" name="amount" value="<?php echo $totalPrice?>"/>
                            <input type='hidden' name='currency_code' value='USD'>

                            <!-- <input type="hidden" name="lc" value="AU"> -->
                            <!-- <input type="hidden" name="rm" value="2"> -->
                            
                            <input type='hidden' name='return' value='http://localhost/dashboard/paypal.php'>
                        </form>
                        <td><b><input type="button" value="Back"></b></td>
                        <td><b><input type="submit" name="pay" value="Continue" onclick="submit()"></b></td>
                    </tr>
                </table>
            </div>
    </div>
    <script>
        function submit() {
            document.getElementById("buyCredits").submit();
            document.getElementById("update").submit();
        }
    </script>
    <?php include 'footer.php'?>
</body>
</html>