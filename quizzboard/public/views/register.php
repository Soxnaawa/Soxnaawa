<?php
// Inclut la configuration de la base de données
include 'database.php';

// Définit le type de contenu comme JSON
header('Content-Type: application/json');

// Récupère les données JSON envoyées par le client
$data = json_decode(file_get_contents('php://input'), true);

// Extrait les valeurs du tableau associatif
$username = $data['username'];
$dob = $data['dob'];
$password = $data['password'];

// Vérifie si tous les champs sont fournis
if (!$username || !$dob || !$password) {
    echo json_encode(['error' => 'Tous les champs sont requis']);
    exit;
}

// Hache le mot de passe pour le stockage sécurisé
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Prépare la requête d'insertion dans la base de données
$sql = "INSERT INTO users (username, dob, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

// Vérifie si la préparation de la requête a échoué
if ($stmt === false) {
    echo json_encode(['error' => 'Erreur de préparation: ' . $conn->error]);
    exit;
}

// Lie les paramètres à la requête
$stmt->bind_param('sss', $username, $dob, $hashedPassword);

// Exécute la requête d'insertion
if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    // Affiche l'erreur si l'exécution échoue
    echo json_encode(['error' => 'Erreur lors de l\'exécution: ' . $stmt->error]);
}

// Ferme la connexion et le statement
$stmt->close();
$conn->close();
?>
