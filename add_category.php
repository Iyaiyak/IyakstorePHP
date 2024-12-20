<?php

    include "connection.php";

    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo = $_FILES['photo']['name'];
        
        $query = "INSERT INTO category (name, photo) VALUES ('".$name."','". $photo."')";
        
        move_uploaded_file($photo_tmp, 'image/'.$photo);
        mysqli_query($conn, $query);
        
        ?>

        <script type="text/javascript">
            alert("Data berhasil ditambahkan");
            window.location.href = "view.php";
        </script>

        <?php


    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Tambah Category</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="name">
            </br>
            <input type="file" name="photo" accept="image/*">
            </br>
            <input type="submit" name="submit">
    </form>
</html>