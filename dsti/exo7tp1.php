<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <?php 
    $login=$_REQUEST["login"];
    $mdp=$_REQUEST["mdp"];
    if ($mdp=="passer" && $login=="admin") {
        echo "Bienvenue $login";
    }
    else{
        ?>
        <h3>connexion invalide</h3>
      <button> <a href="pageconnexionexo7tp1.php?login=<?=$login?>">retour</a></button>
   <?php }
    
    ?>
</body>
</html>