<?php 
    $db_name = "bdfacilita";
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "123456789"; 
    $db_port = "3307";

    global $conn;
    $conn = new PDO("mysql:dbname=" . $db_name . ";host=" . $db_host . "; port=" . $db_port , $db_user, $db_pass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    
?>