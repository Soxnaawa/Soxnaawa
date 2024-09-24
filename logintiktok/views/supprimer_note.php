<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.html");
    exit();
}

$user = "root";
$database = "notesapp";
$db_adress = "localhost";
$mdp = "";

$conn = new mysqli($db_adress, $user, $mdp, $database);
if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

$id = $_POST['id'];

$sql = "DELETE FROM notes WHERE id = ? AND username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $id, $_SESSION['username']);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Note supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la note.";
}

$stmt->close();
$conn->close();
?>
