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

if ($fichier) {?>

<table border="1" cellspacing="0" cellpadding="0">

<tr>
    <th>prenom</th>
    <th>nom</th>
</tr> 

<?php

    while ($ligne=fgets($fichier)) {
        
        //if(!$ligne) continue;
          $donnees=explode(';',$ligne);?>//explode delimite une chaine a partir du separateur    
    
   <tr>
    <td><?=$donnees[1]?></td>
    <td><?=$donnees[0]?></td>
   </tr>
    <?php
        }?>
        </table>
        <?php
fclose($fichier);
}
else{
    echo"erreur de chargement du fichier de donnees;";
}
    ?>
</body>
</html>