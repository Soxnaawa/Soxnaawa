<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="exo7tp1.php" method="post">
       <fieldset>
<legend>Authentification</legend>
        login:<input type="text" name="login" value=" <?= isset($_GET['login'])? $_GET['login'] : '' ?>"> <br>
        mdp:<input type="password" name="mdp" value="<?= isset($_GET['mdp'])? $_GET['mdp'] : '' 
         // mdp bi diaroul def car on ne le reverra pas?>"> <br>
        <input type="submit" value="envoyer">
        </fieldset>
    </form>
</body>
</html>