<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion des users</title>
</head>
<body>
    <h1>ajout users</h1>
   
        <?php 
        if (isset($_POST['nom'],$_POST['prenom'])) {
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];

            $fichier=fopen('utilisateurs.csv','a');//a cest pour ajout
        if ($fichier) {
            //$ligne="$nom;$prenom\n";//retour a la  ligne faut ""
            $ligne=$nom.';'.$prenom."\n";
            fputs($fichier,$ligne);
            fclose($fichier);
            echo "<p>ajout avec succees</p>";
            
        }
        
        }
        else {
        ?>
         <form action="" method="post">
        <label for="nom">nom</label>
        <input type="text" name="nom" id="nom">
        <label for="prenom">prenom</label>
        <input type="text" name="prenom" id="prenom">
        <input type="submit" value="envoyer">
    </form>
    <?php }?>
</body>
</html>