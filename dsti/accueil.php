<?php session_start();
if(!isset($_SESSION['login'])){
header('location:connexion.php');
die();}//sinon il va faire le header et lautre partie du code
//c importantpour ne pas etre expose aux hackers tmt
//le truc de php c pour proteger la page d'accueil?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php//quand on initialise une session , on cree un cookie phpsessid
//c'est un identifiant de session
//le fichier sess_qlqchoz est stocke dans le fichier temp ?>
<body>
    <h1>accueil</h1>
    <p>bienvenue cher(e) <?=$_SESSION['login']?>, soyez la benevenye!
le code d'acces du jour est 4635</p>
<p><a href="deconnexion.php">deconnexion</a></p>

</body>
</html>