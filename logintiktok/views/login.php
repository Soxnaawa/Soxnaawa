
<?php session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = "root";
    $database = "notesapp";
    $db_adress = "localhost";
    $mdp = "";

    $conn = new mysqli($db_adress, $user, $mdp, $database);
    if ($conn->connect_error) {
        die("Erreur de connexion: " . $conn->connect_error);
    }

    // Requête pour récupérer toutes les données de l'utilisateur
    $sql = "SELECT * FROM users WHERE username=?";
    $stmnt = $conn->prepare($sql);
    $stmnt->bind_param('s', $username);
    $stmnt->execute();
    $result = $stmnt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        // Stocker les données dans la session
        $_SESSION["username"] = $user["username"];
        $_SESSION['description'] = $user['description'] ?? 'Aucune description disponible.';
        $_SESSION['datenaissance'] = $user['datenaissance'] ?? 'Date de naissance non disponible.';

        // Affichage pour débogage - à retirer une fois que tout fonctionne
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';

        // Fermer la connexion
        $stmnt->close();
        $conn->close();

        // Redirection
        header("Location: pagedaccueil.php");
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>