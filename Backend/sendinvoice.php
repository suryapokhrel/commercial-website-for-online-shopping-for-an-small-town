<?php
    session_start();
    include "includes/connection.php";

    // CUSTOMER ID
    $id = $_SESSION['cid'];

    // GET CUSTOMER EMAIL
    $getEmail = oci_parse($conn, "SELECT EMAIL FROM CUSTOMER WHERE CUSTOMER_ID='$id'");
    oci_execute($getEmail);
    $email = oci_fetch_array($getEmail, OCI_BOTH);

    $today = date('m/d/Y');


    // GET BILL
    $getBill = oci_parse($conn, "SELECT CUSTOMER_ID_FK, PRODUCT_ID_FK, PRICE, COLLECTION_TIME, COLLECTION_DATE, PAYMENT_DATE FROM BILL WHERE CUSTOMER_ID_FK='$id' AND PAYMENT_DATE='$today'");
    oci_execute($getBill);

    $productID = array();
    $price = array();
    $collectionTime = array();
    $collectionDate = array();
    $paymentDate = array();

    while($row = oci_fetch_array($getBill, OCI_BOTH)) {
        array_push($productID, $row['PRODUCT_ID_FK']);
        array_push($price, $row['PRICE']);
        array_push($collectionTime, $row['COLLECTION_TIME']);
        array_push($collectionDate, $row['COLLECTION_DATE']);
        array_push($paymentDate, $row['PAYMENT_DATE']);
    }

    $i = 0;

    $to = $email['EMAIL'];
    $subject = 'Your Order';
    $from = 'chffreshsales@gmail.com';
 
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
 
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<table cellspacing="2" style="text-align: center; border:2px solid black;">';
    $message .= '<tr>';
    $message .= '<td>Product ID</td>';
    $message .= '<td>Price</td>';
    $message .= '<td>Collection Time</td>';
    $message .= '<td>Collection Date</td>';
    $message .= '<td>Payment Date</td>';
    $message .= '</tr>';
    while($i < count($productID)){
        $message .= '<tr>';
        $message .= '<td>'.$productID[$i].'</td>';
        $message .= '<td>'.$price[$i].'</td>';
        $message .= '<td>'.$collectionTime[$i].'</td>';
        $message .= '<td>'.$collectionDate[$i].'</td>';
        $message .= '<td>'.$paymentDate[$i].'</td>';
        $message .= '</td>';
        $message .= '</tr>';
        $i++;
    }
    $message .= '</table>';
    $message .= '</body></html>';
 
    // Sending email
    if(mail($to, $subject, $message, $headers)){
        header("Location: ../dashboard/");
    } else{
        echo 'Unable to send email. Please try again.';
    }

?>