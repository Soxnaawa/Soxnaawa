<?php
session_start();
include 'database.php';
// Vérifie si l'utilisateur est connecté et est un joueur
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'player') {
    header("Location: public/connexion.html");
    exit;
}

// Récupère les questions et leurs options depuis la base de données
$sql = "SELECT * FROM questions";
$result = $conn->query($sql);

$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}
//$username=$_SESSION['username'];
?>

<script>
const player="<?php echo $_SESSION['username'];
?>"
<?php
// Récupérer le score de l'utilisateur
// Récupérer le score de l'utilisateur
$username = $_SESSION['username']; // Assurez-vous que cette valeur est correcte
$sql = "SELECT score FROM scores WHERE player = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->bind_result($score);
$stmt->fetch();
$stmt->close();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Joueur</title>
    <link rel="stylesheet" href="css/styles.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scoreDisplay = document.getElementById('player-score');
            scoreDisplay.textContent = "<?php echo $score; ?>"; // Affiche le score dans l'élément HTML
        });
    </script>
</head>
<body>
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
    <form id="quiz-form">
        <?php foreach ($questions as $question): ?>
            <div class="question-container">
                <p><?php echo htmlspecialchars($question['question']); ?></p>
                <label>
                    <input type="radio" name="question_<?php echo $question['id']; ?>" value="option1">
                    <?php echo htmlspecialchars($question['option1']); ?>
                </label><br>
                <label>
                    <input type="radio" name="question_<?php echo $question['id']; ?>" value="option2">
                    <?php echo htmlspecialchars($question['option2']); ?>
                </label><br>
                <label>
                    <input type="radio" name="question_<?php echo $question['id']; ?>" value="option3">
                    <?php echo htmlspecialchars($question['option3']); ?>
                </label><br>
            </div>
        <?php endforeach; ?>
        <button type="submit">Soumettre Réponses</button>
    </form>
    <div id="score">
    <p>Votre score actuel : <span id="player-score"></span></p>
</div>
    

    <script src="../js/quizz.js"></script>
</body>
</html>
