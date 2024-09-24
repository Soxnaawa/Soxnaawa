<?php
$host = 'localhost';
$user = 'root';
$password = '';  // Mets ici ton mot de passe MySQL
$database = 'quiz_app';

$conn = new mysqli($host, $user, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}
?>
