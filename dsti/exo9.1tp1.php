<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
$i=$_REQUEST["table"];
$a=$_REQUEST["nombre"];
    for($j=1;$j<=$i;$j++){
        echo "table de $j <br>";
         for($h=1;$h<=$a;$h++){
            echo $j."*".$h."=".($j * $h)."<br>";
         }
    }
    ?>
</body>
</html>