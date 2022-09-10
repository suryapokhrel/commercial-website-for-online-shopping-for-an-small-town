<?php
    // Connects to the XE service (i.e. database) on the "localhost" machine
    $conn = oci_connect('TestSchema', '12345', '//localhost/xe');

    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR); 
        exit("Unable to connect to the database!");
    }
?>