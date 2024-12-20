<?php
    include 'connection.php';

    $query = "SELECT * FROM `order` JOIN register ON order.id_user = register.id";
    $msql = mysqli_query($conn, $query);

    $jsonArray = array();

    $photo = "http://localhost/store/image/";

    while ($category = mysqli_fetch_assoc($msql)) {

        $rows['id'] = $category['id'];
        $rows['user'] = $category['username'];
        $rows['email'] = $category['email'];
        $rows['amount'] = $category['amount'];
        $rows['note'] = $category['note'];

        array_push($jsonArray, $rows);

    }

    echo json_encode($jsonArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); 
?>