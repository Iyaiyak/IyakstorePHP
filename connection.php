<?php
error_reporting(0);
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "store";

    $conn = mysqli_connect($host, $username, $password, $database);

    // if($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // } else {
    //     echo "Connected successfully";
    // }

    // if($conn) {
    //     echo "Connected successfully";
    // } else {
    //     echo "Connection failed";
    // }
?>