<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_POST["nom"])) {
    $nom =$_POST["nom"]; 
}
else {?>
<form action="" method="post">
    <input type="text" name="nom">
    <input type="submit" value="soumettre">
</form>
<?php }
    


// Création du cookie avec le nom "nom_cookie" et la valeur du nom

if (isset($_COOKIE["nomcook"])) {
    $moncookie=$_COOKIE["nomcook"];
    echo "bienvenue $moncookie";
}
else {
    setcookie("nomcook", $nom);   
}


?>
</body>
</html>
