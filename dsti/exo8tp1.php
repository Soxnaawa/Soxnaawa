<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $prenom=$_REQUEST["prenom"];
    $nom=$_REQUEST["nom"];
    $datenaissance=$_REQUEST["datenaissance"];
    $lieunaissance=$_REQUEST["lieunaissance"];
    echo "voici vos donnees :</br>";
    echo "prenom:  $prenom  </br>"  ;
    echo "nom:  $nom </br>" ; 
    echo "date de naissance:  $datenaissance </br>"  ;
    echo "lieu de naissance :  $lieunaissance </br>" ;
      ?>
</body>
</html>