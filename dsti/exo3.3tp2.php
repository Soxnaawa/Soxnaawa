<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>liste des utilisateurs</h1>
    <?php 
$fichier=fopen('utilisateurs.csv','r');
if ($fichier) {
    while (!feof($fichier)) {
        $ligne=fgets($fichier);
        if(!$ligne) continue;
          $donnees=explode(';',$ligne);?>//explode delimite une chaine a partir du separateur    
    
    <p><b><u>prenom:</u><?=$donnees[1]?></b>
    <b><u>nom:</u><?=$donnees[0]?></b></p>
    <?php
        }
fclose($fichier);
}
else{
    echo"erreur de chargement du fichier de donnees;";
}
    ?>
</body>
</html>