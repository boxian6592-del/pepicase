<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        $data = [];
        $data["name"] = "okay";
        $data["age"] = "old";
        var_dump($data);
        $data1 = json_encode($data);
        var_dump($data1);
    ?>
</head>
<body>
    <div>lmao</div>
</body>
<script>
    var array = [2];
    array[0] = "okay";
    array[1] = "old";
    var json = JSON.parse(array.toString);
    console.log.(json);
    for(let i = 0; i < array.length; i++)
    {
        console.log(array[i]);
    }
</script>
</html>

