<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $tab=array(0=>"lundi",1=>"mardi",2=>"mercredi",3=>"jeudi",4=>"vendredi",5=>"samedi",6=>"dimanche") ;
    for ($i=0; $i <=6 ; $i++) { 
        echo $tab[$i]."</br>";
    }
    
    ?>
</body>
</html>