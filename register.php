<?php
    include 'connection.php';

    $username = $_GET['username'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $password = $_GET['password'];

    $queryRegister = "SELECT * FROM register WHERE username = '".$username."' OR email = '".$email."' OR phone = '".$phone."'";

    $msql = mysqli_query($conn, $queryRegister);

    $result = mysqli_num_rows($msql);

    if(!empty($username) && !empty($email) && !empty($phone) && !empty($password)) {
        
        if($result == 0){
            $regis = "INSERT INTO register (username, email, phone, password) VALUES ('".$username."', '".$email."', '".$phone."', '".$password."')";
            $msqlRegister = mysqli_query($conn, $regis);

            echo "1";
        }else{
            echo "0";
        }
    }else{
        echo "Please fill all the fields";
    }

?>