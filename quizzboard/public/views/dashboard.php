<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: public/connexion.html"); // Rediriger si non connecté ou non administrateur
    exit;
}

// Code pour le tableau de bord admin ici
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('add-question-form');
            
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Récupérer les valeurs des champs
                const question = document.getElementById('question').value;
                const option1 = document.getElementById('option1').value;
                const option2 = document.getElementById('option2').value;
                const option3 = document.getElementById('option3').value;
                const correctAnswer = document.getElementById('correct_answer').value;

                // Envoyer les données au serveur via fetch
                fetch('add_questions.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `question=${encodeURIComponent(question)}&option1=${encodeURIComponent(option1)}&option2=${encodeURIComponent(option2)}&option3=${encodeURIComponent(option3)}&correct_answer=${encodeURIComponent(correctAnswer)}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        form.reset();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Erreur:', error));
            });
        });
    </script>
</head>
<body>
    <div class="admin-container">
        <h2>Tableau de Bord - Admin</h2>
        <form id="add-question-form" method="POST" action="add_questions.php">
            <label for="question">Nouvelle Question :</label>
            <input type="text" id="question" name="question" required><br>

            <label for="option1">Option 1 :</label>
            <input type="text" id="option1" name="option1" required><br>

            <label for="option2">Option 2 :</label>
            <input type="text" id="option2" name="option2" required><br>

            <label for="option3">Option 3 :</label>
            <input type="text" id="option3" name="option3" required><br>

            <label for="correct_answer">Bonne Réponse :</label>
            <input type="text" id="correct_answer" name="correct_answer" required><br>

            <button type="submit">Ajouter la question</button>
        </form>

        <div id="questions-list">
            <!-- Les questions ajoutées s'afficheront ici -->
        </div>
    </div>
    <script src="../js/quizz.js" defer></script>

</body>
</html>
