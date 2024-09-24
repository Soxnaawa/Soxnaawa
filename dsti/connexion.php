<?php session_start();
if (isset($_SESSION['login'])) {
    session_destroy();
}
//si l'user est deja connecte et on essaye d'acceder a la page de connexion
//on ne sait jamais ca peut ne pas etre le meme user (hacker) c une politique de securite 
?>

   <?php if(!isset($_POST['login'],$_POST['password'])){?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php if(isset($_POST['login'])){//
    ?>
    <p style="color : red">login ou mot de pass incorrect</p>
    <?php } ?>
    <form action="connexion.php" method="post">   
<fieldset>
    <legend>connexion</legend>
    <label for="login">login</label>
    <input type="text" name="login" id="login" value="<?=isset($_GET['login'])? $_GET['login']: "" ?>">
    <label for="password">mot de passe</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="connexion">
</fieldset>
</form> 
<?php } 
else {
    $login=$_POST['login'];
    $password=$_POST['password'];
if ($login=="admin" && $password == "passer") {
    session_start();
    $_SESSION['login'] = $login;
    header('Location:accueil.php');//header redirige vers la page acceuil.php
}
else {
    header('Location:connexion.php?login='.$login);
}
}
?>
</body>
</html>





















