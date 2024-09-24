
   // <?php 
   /* setcookie('lastseen',date('d-m-Y-H-i-s'));
    echo "cookie ajoutee avec succes";
    */
   // ?>

<?php
// Vérifier si le cookie existe déjà
if(isset($_COOKIE['nom_visiteur'])) {
    $nom_visiteur = $_COOKIE['nom_visiteur'];
    $message_bienvenue = "Bienvenue, $nom_visiteur !";
} else {
    // Vérifier si le formulaire a été soumis
    if(isset($_POST['nom'])) {
        // Récupérer le nom saisi dans le formulaire
        $nom_visiteur = $_POST['nom_visiteur'];

        // Créer le cookie avec une durée de vie de la session (il disparaîtra lorsque l'utilisateur fermera le navigateur)
        setcookie("nom_visiteur", $nom_visiteur);
        $message_bienvenue = "Bienvenue, $nom_visiteur !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de bienvenue</title>
</head>
<body>
    <?php if(isset($message_bienvenue)) { ?>
        <p><?php echo $message_bienvenue; ?></p>
    <?php } else { ?>
        <form method="post" action="">
            <label for="nom">Entrez votre nom :</label>
            <input type="text" id="nom_visiteur" name="nom_visiteur" required>
            <button type="submit" name="submit">Soumettre</button>
        </form>
    <?php } ?>
</body>
</html>

</body>
</html>