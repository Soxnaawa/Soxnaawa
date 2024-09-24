<?php
session_start();
include 'database.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    echo json_encode(['error' => 'Utilisateur non connecté']);
    exit;
}

// Récupérer les réponses du formulaire
$data = json_decode(file_get_contents('php://input'), true); // Utilisation de JSON
$answers = $data['answers']; // Récupérer les réponses du quiz envoyées depuis JS

$score = 0; // Initialisation du score

// Logique pour évaluer les réponses et calculer le score
$score = evaluateAnswers($answers);

// Mise à jour du score dans la base de données
//$username = $_SESSION['username'];
$sql = "UPDATE scores SET score = ? WHERE player = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('is', $score, $username);
$stmt->execute();

// Réponse JSON contenant le score
echo json_encode(['success' => true, 'score' => $score]);

$stmt->close();
$conn->close();

function evaluateAnswers($answers) {
    global $conn; // Utilisation de la connexion à la base de données
    $score = 0;

    foreach ($answers as $answer) {
        $questionId = $answer['questionId'];
        $userAnswer = $answer['answer'];

        // Récupérer la bonne réponse pour chaque question
        $sql = "SELECT correct_answer FROM questions WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $questionId);
        $stmt->execute();
        $stmt->bind_result($correctAnswer);
        $stmt->fetch();
        $stmt->close();

        // Comparer la réponse de l'utilisateur à la bonne réponse
        if ($userAnswer === $correctAnswer) {
            $score++;
        }
    }

    return $score;
}
?>
