<?php 

echo  "fichier original:".$_FILES["fichier"]["name"]."<br>";
echo  "fichier temporaire:".$_FILES["fichier"]["tmp_name"]."<br>";
echo  "taille du fichier:".$_FILES["fichier"]["size"]."<br>";

/*if(!isset($_FILES["fichier"]))
die("erreur d'envoi du fichier!!!");*/

//copy($_FILES["fichier"]["tmp_name"],_DIR_."test.txt");
if (!$f=fopen("./test.txt","r")) {
    die("probleme d'ouverture du fichier!!!");
}
while (!feof($f)){ 
 $ligne=fgets($f,255);
   
    echo $ligne."<br>";
}
fclose($f);



?>
