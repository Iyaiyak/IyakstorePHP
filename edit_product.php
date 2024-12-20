<?php

    include "connection.php";

    if ($_GET['id']) {

        $id = $_GET['id'];

        $query = "SELECT * FROM product WHERE id = '".$id."'";

        $msql = mysqli_query($conn, $query);

        $rows = mysqli_fetch_assoc($msql);

        if(isset($_POST['submit'])){

            $name = $_POST["name"];
            $price = $_POST["price"];
            $description = $_POST["description"];

            if($_FILES['photo']['name']!=""){
                $name = $_POST["name"];
                $price = $_POST["price"];
                $description = $_POST["description"];
                $photo_tmp = $_FILES['photo']['tmp_name'];
                $photo = $_FILES['photo']['name'];
                
                $query = "UPDATE product SET name='".$name."', photo='".$photo."', price='".$price."', description='".$description."' WHERE id='".$id."'";

                if($row['photo']!= ""){
                    unlink('image/'.$row['photo']);
                }
                
                move_uploaded_file($photo_tmp, 'image/'.$photo);
                mysqli_query($conn, $query);
            }

            $queryNoImage = "UPDATE product SET name='".$name."', price='".$price."', description='".$description."' WHERE id='".$id."'";

            mysqli_query($conn, $queryNoImage);




        ?>

        <script type="text/javascript">
            alert("Data Updated Successfully");
            window.location.href = "view_product.php";
        </script>

        <?php     
       
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="name" value="<?php echo $rows['name'];?>">
            </br>
            <input type="text" name="price" value="<?php echo $rows['price'];?>">
            </br>
            <input type="text" name="description" value="<?php echo $rows['description'];?>">
            </br>
            <input type="file" name="photo" accept="image/*"></br>
            <img src="http://localhost/store/image/<?php echo $rows['photo']; ?>" height=150 width=150></br></br>
            <input type="submit" name="submit">
    </form>
</html>