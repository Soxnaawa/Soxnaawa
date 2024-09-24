<?php
session_start();

// Vérifier que l'utilisateur est bien admin
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header('Location: /');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $question = $_POST['question'] ?? '';
    $questionId = $_POST['questionId'] ?? '';

    $conn = new mysqli('localhost', 'root', '', 'quiz_dashboard');
    if ($conn->connect_error) {
        die('Erreur de connexion : ' . $conn->connect_error);
    }

    if ($action === 'add') {
        $stmt = $conn->prepare('INSERT INTO questions (question) VALUES (?)');
        $stmt->bind_param('s', $question);
        $stmt->execute();
        $stmt->close();
    } elseif ($action === 'delete') {
        $stmt = $conn->prepare('DELETE FROM questions WHERE id = ?');
        $stmt->bind_param('i', $questionId);
        $stmt->execute();
        $stmt->close();
    }

    $conn->close();
    header('Location: /dashboard.html');
    exit();
}
?>
