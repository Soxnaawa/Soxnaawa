<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    for($i=1;$i<=5;$i++){
        echo "table de $i <br>";
         for($j=1;$j<=10;$j++){
            echo $i."*".$j."=".($i * $j)."<br>";
         }
    }
    ?>
</body>
</html>