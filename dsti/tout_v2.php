<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php function formulaire($paraprenom,$paraage){?>
    <form action="tout_v2.php" method="post" >
        nom:<input type="text" name="nom" value="<?php echo $paraprenom;?>" >
        age:<input type="text" name="age" value="<?php echo $paraage;?>" >
        <input type="submit"  value="envoyer" >
    </form>
    <?php }
    function traitement ($n,$a){
        $message="bonjour".$n."vous avez".$a;
        echo $message;
    }
    
    if (!isset($_REQUEST["nom"],$_REQUEST["age"])) {
        formulaire($paraprenom,$paraage);
    }
    else traitement($_REQUEST["nom"];$_REQUEST["age"]){
        if ($paraage<18) echo "vous etes un enfant attendez d'avoir 18 ans svp";
        else echo "bienvenue";
    }
    ?>
</body>
</html>