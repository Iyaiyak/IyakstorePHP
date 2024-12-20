<?php
    include'connection.php';

    $email = $_GET['email'];
    $password = $_GET['password'];

    $check = "SELECT * FROM register WHERE email = '".$email."' AND password = '".$password."'";

    $msql = mysqli_query($conn, $check);
    $result = mysqli_num_rows($msql);

    if(!empty($email) && !empty($password)) {

        if($result == 0){
            echo "0";
        }else{
            echo "1";           
        }

    }else{
        echo "please fill all the fields";
    }
?>