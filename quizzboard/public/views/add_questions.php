<?php
session_start();

// Vérifier si l'utilisateur est connecté et a le rôle d'admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(['success' => false, 'message' => 'Accès refusé']);
    exit;
}

// Vérifier si les données sont présentes
if (isset($_POST['question'], $_POST['option1'], $_POST['option2'], $_POST['option3'], $_POST['correct_answer'])) {
    
    // Récupérer les données du formulaire
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $correctAnswer = $_POST['correct_answer'];

    // Vous pouvez ici insérer les données dans votre base de données
    // Exemple d'insertion (il faut ajuster en fonction de votre base de données)
    
    $servername = "localhost";  // Modifier avec votre configuration
    $username = "root";         // Modifier avec votre configuration
    $password = "";             // Modifier avec votre configuration
    $dbname = "quiz_app";        // Modifier avec le nom de votre base de données

    // Créer une connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Erreur de connexion à la base de données']);
        exit;
    }

    // Préparer et exécuter la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO questions (question, option1, option2, option3, correct_answer) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $question, $option1, $option2, $option3, $correctAnswer);

    if ($stmt->execute()) {
        // Si l'insertion réussit
        echo json_encode(['success' => true, 'message' => 'Question ajoutée avec succès']);
    } else {
        // Si l'insertion échoue
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout de la question']);
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
    
} else {
    // Si les données POST ne sont pas définies
    echo json_encode(['success' => false, 'message' => 'Données manquantes']);
}
?>
