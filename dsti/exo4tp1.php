<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1> heure et date du jour</h1>
    <p>Nous sommes le:<?= 
     date('d/m/Y') // si je fais d et m en maj je les aurais en mot like fri/nov/24;
    ?> <br>
    
    il est:
<?= date('H:i:s')//le  h min  format 12h.
//timesmap : nombre de secondes qui s'est ecoule depuis janvier 1970.
/* la fonction associee au timesmamp est time() */
?><br>
Merci</p>
 
</body>
</html>