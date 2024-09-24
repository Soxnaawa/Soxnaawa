<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
define("Max",10);
Session_start();
if (!isset($_SESSION["c"])){ 
$_SESSION["c"]=1; //Temps que l'utilisateur a fait 
$_SESSION["t"]=time();//Variable de session
}else{
$_SESSION["c"]++;
}
if(time() - $_SESSION["t"] >Max){ //On compare , on fait une difference 
    Session_destroy();
die ("Trop Lent !!"); //Affiche un message et exit
}
$_SESSION["t"]=time();
?>
  <form action="delaistationnement.php"  method="POST">
     Vous êtes venu <?php echo $_SESSION["c"]; ?> fois <br>
     Cliquer sur <input type="submit" value="continuer"> pour continuer
</form>
</body>
</html>