<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
        $name = "";
        $id = "";
        $pathing = "";
        $price = 0;
        $conn = mysqli_connect("LAPTOP-R604O2UQ","baodang","lmao","testing");
        if (mysqli_connect_errno()) {
            echo "". mysqli_connect_error();
            exit();
        }
        else
        {
            $sql = "SELECT * FROM product WHERE (product_id = '00001')";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
            }
            $name = $row["product_name"];
            $id = $row["product_id"];
            $price = $row["price"];
            $path = $row["pathing"];
        }
        echo $name . "<br>";
        echo $id . "<br>";
        echo $price . "<br>";
        echo $path;
    ?>
</body>
</html>
