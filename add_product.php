<?php

    include "connection.php";

    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo = $_FILES['photo']['name'];
        $catId = $_POST['product_category'];
        
        $query = "INSERT INTO product (name, photo, price, description, cat_id) VALUES ('".$name."','". $photo."','". $price."', '". $description."', '". $catId."')";
        
        move_uploaded_file($photo_tmp, 'image/'.$photo);
        mysqli_query($conn, $query);
        

        ?>

        <script type="text/javascript">
            alert("Data berhasil ditambahkan");
            window.location.href = "view_product.php";
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
            <input type="text" name="name" placeholder="Product name">
            </br>
            <input type="text" name="price" placeholder="Price">
            </br>
            <input type="text" name="description" placeholder="Description">
            </br>
            <?php 
                include 'connection.php';
                $query_cat = "SELECT * FROM category";
                $msqlCat = mysqli_query($conn, $query_cat);
                $result = mysqli_fetch_assoc($msqlCat);
            ?>
            <select name="product_category" class="form-control">
                <?php while($data = mysqli_fetch_assoc($msqlCat)) {
                    if($data['id'] == $result['id']){ ?>
                    <option selected="<?php echo $result['id']?>" value="<?php echo $data['id']?>">
                        <?php echo $data['name']?>
                    </option>
                        
                    <?php }else{ ?>
                        <option value="<?php echo $data['id']?>">
                            <?php echo $data['name']?>
                        </option>

                    
                <?php } }?>
                
            </select>
            <input type="file" name="photo" accept="image/*">
            </br>
            <input type="submit" name="submit">
    </form>
</html>