<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>calcul sur les variables</h1>
    <?php 
    /*$pa=20000;
    $frais=7500;
    $pv=$pa+$frais;
    echo "$pv";*/
    //modifions le code de sorte que le pa et les frais soient pris comme argument
    $pa=$_GET["pa"];
    $frais=$_GET["frais"];
    $pv=$pa+$frais;
    echo "le prix de vente est de $pv";// meun na def '.....'.$pv.'.......'
    /*<?=....?> est l'equivalent de echo;*/
    //var_dump($_GET) permet de voir les contenus d'une variable 
    // la fonction print_r permet aussi e voir les contenus d'une variable 
    ?>
</body>
</html>