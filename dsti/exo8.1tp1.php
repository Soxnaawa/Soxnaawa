<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
if (!isset($_POST["prenom"],$_POST["nom"],$_POST["datenaissance"],$_POST["lieunaissance"])) { ?>
<form action="exo8.1tp1.php" method="post">
        prenom:<input type="text" name="prenom" value=""> <br>
        nom:<input type="text" name="nom" value=""> <br>
        datenaissance:<input type="text" name="datenaissance" value="">   <br>
        lieunaissance:<input type="text" name="lieunaissance" value="">  <br>
        <input type="submit" value="envoyer"> 

</form>
    
<?php}
else {?>
<h1>voici vos donnees</h1>
<p>

<?= $prenom=$_POST["prenom"] ?>
<?= $nom= $_POST["nom"] ?>
<?= $datenaissance= $_POST["datenaissance"] ?>
<?= $lieunaissance= $_POST["lieunaissance"] ?>

</p>
 
<?php }?>

    
</body>
</html>