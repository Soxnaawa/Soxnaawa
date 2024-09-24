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
$note = $_POST['note'];

$sql = "UPDATE notes SET note = ? WHERE id = ? AND username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sis", $note, $id, $_SESSION['username']);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Note modifiée avec succès.";
} else {
    echo "Erreur lors de la modification de la note.";
}

$stmt->close();
$conn->close();
?>
