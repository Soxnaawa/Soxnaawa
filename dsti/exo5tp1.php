<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>bonjour</h1>
    <?php 
    $nbre=10;
    $s=0;
    //les lignes qui suivent avec for
    /*for ($i=0; $i <=5 ; $i++) { 
        $s=$s+$i;
        
    }
    echo "la somme des nombre allant de 1 a $nbre est ".$s; */
    //.................................................................................................
    //les lignes qui suivent avec while
    $i=0;
    while ($i<=$nbre) {
        $s=$s+$i;//  equibvalent => $s += $i
        $i++;
    }
    echo "la somme des nombre allant de 1 a $nbre est ".$s;
    ?>
</body>
</html>