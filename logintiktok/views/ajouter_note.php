<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['note'])) {
    $note = $_POST['note'];
    $username = $_SESSION['username']; // Récupérer le nom d'utilisateur de la session

    // Connexion à la base de données
    $user = "root";
    $database = "notesapp";
    $db_adress = "localhost";
    $mdp = "";

    $conn = new mysqli($db_adress, $user, $mdp, $database);
    if ($conn->connect_error) {
        die("Erreur de connexion: " . $conn->connect_error);
    }

    // Insertion de la note dans la base de données avec le username
    $sql = "INSERT INTO notes (note, username) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $note, $username); // Bind les deux paramètres

    if ($stmt->execute()) {
        echo "Note ajoutée avec succès!";
    } else {
        echo "Erreur lors de l'ajout de la note.";
    }

    $stmt->close();
    $conn->close();

    // Redirection après ajout
    header("Location: pagedaccueil.php");
    exit();
}
?>
