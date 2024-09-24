<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
 
</head>
<body>

<?php
echo "Rechercher un utilisateur par nom, prénom ou login:<br>";

// Vérifier si des paramètres GET sont présents pour la recherche
if (isset($_GET['var1'])) {
    $var1 = $_GET['var1'];
    
    try {
        $con = new PDO('mysql:host=localhost;dbname=tp_php;charset=utf8', 'root', '');
        $rslt = $con->prepare("SELECT * FROM utilisateur WHERE prenom LIKE :var1 OR nom LIKE :var1 OR login LIKE :var1");
        $rslt->execute(['var1' => '%' . $var1 . '%']);
        // Afficher les résultats de la recherche
        echo '<table border="3">';
        echo '<tr><th>Id</th><th>Prénom</th><th>Nom</th><th>Login</th><th>mdp</th></tr>';
        while ($utilisateur = $rslt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($utilisateur['id']) . '</td>';
            echo '<td>' . htmlspecialchars($utilisateur['prenom']) . '</td>';
            echo '<td>' . htmlspecialchars($utilisateur['nom']) . '</td>';
            echo '<td>' . htmlspecialchars($utilisateur['login']) . '</td>';
            echo '<td>' . htmlspecialchars($utilisateur['mdp']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } catch (PDOException $objet4) {
        echo "yà un soucis avec la connexion  " ;
    }
} else {
    
    ?>
    <form method="get">
        <label for="var1">Ma recherche:</label>
        <input type="text" name="var1" id="var1">
        <input type="submit" value="entrer">
    </form>
    <?php
}
?>
</body>
</html>
