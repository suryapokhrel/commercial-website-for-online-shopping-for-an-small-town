<?php
    session_start();

    if(isset($_SESSION['cid']) && !empty($_SESSION['cid'])){
        include "includes/dbInsertOrder.php";

        // SET TIMEZONE
        date_default_timezone_set('Asia/Kathmandu');

        $pid = $_GET["id"];
        $cid = $_SESSION["cid"];
        $orderDate = date('m/d/Y');
        $orderTime = date("h:i:sa");
        $orderDay = date("l");

        $details = array(
            $pid, $cid, $orderDate, $orderTime, $orderDay
        );

        // FUNCTION TO INSERT ORDER
        insertOrder($details);
    }
    else{
        header("Location: ../login.php");
    }

    // header("Location: {$_SERVER["HTTP_REFERER"]}");
?>