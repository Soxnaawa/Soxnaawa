<?php
session_start();
include 'database.php';
header('Content-Type: application/json');

// Récupérer les données JSON envoyées par le client
$data = json_decode(file_get_contents('php://input'), true);

$player = $data['player'];
$score = $data['score'];

if (!$player || $score === null) {
    echo json_encode(['error' => 'Le joueur et le score sont requis']);
    exit;
}

// Vérifier si le joueur existe déjà dans la table scores
$sql = "SELECT COUNT(*) FROM scores WHERE player = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $player);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    // Si le joueur existe déjà, mettre à jour le score
    $sql = "UPDATE scores SET score = ? WHERE player = ?";
} else {
    // Sinon, insérer un nouveau score
    $sql = "INSERT INTO scores (player, score) VALUES (?, ?)";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $player, $score);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Erreur lors de l\'ajout du score']);
}

$stmt->close();
$conn->close();
?>
