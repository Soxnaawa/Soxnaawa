
<?php
session_start();

$user = "root";
$database = "notesapp";
$db_adress = "localhost";
$mdp = "";

$conn = new mysqli($db_adress, $user, $mdp, $database);
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["delete"])) {
    $username = $_POST['username'];
    $datenaissance = $_POST['ddn'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $description = $_POST['description'];

    // Vérification si les mots de passe correspondent
    if ($password !== $confirm_password) {
        echo '<script>alert("Les mots de passe ne correspondent pas. Veuillez réessayer.");</script>';
    } else {
        // Requête SQL pour vérifier si le nom d'utilisateur existe déjà
        $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultat_verification_utilisateur = $stmt->get_result();

        // Vérification si le nom d'utilisateur est déjà utilisé
        if ($resultat_verification_utilisateur->num_rows > 0) {
            echo '<script>alert("Ce nom d\'utilisateur est déjà utilisé. Veuillez en choisir un autre.");</script>';
        } else {
            // Hachage du mot de passe
            $password_hache = password_hash($password, PASSWORD_DEFAULT);

            // Requête SQL pour insérer les données dans la base de données
            $stmt = $conn->prepare("INSERT INTO users (username, datenaissance, password, description) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $datenaissance, $password_hache, $description);

            if ($stmt->execute()) {
                echo '<script>window.location.href = "../login.html"; alert("Compte créé avec succès.");</script>';
                exit();
            } else {
                echo "Erreur lors de la création du compte : " . $conn->error;
            }
        }
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error-message {
            color:  rgb(244, 151, 164);
            display: none;
            margin-top:-20px;
        }
        </style>
        <link rel="stylesheet" href="../css/stylescreercompte.css?v1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
   <!-- fi -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var usernameInput = document.getElementById("username");
        var usernameError = document.getElementById("username-error");
        var createAccountForm = document.getElementById("mes-notes");

        usernameInput.addEventListener("input", function() {
            validateUsername();
        });

        createAccountForm.addEventListener("submit", function(event) {
            if (!validateUsername() || !validatePassword()) {
                event.preventDefault();
            }
        });


 function validateForm(event) {
    var newPassword = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm-password').value;
    var passwordError = document.getElementById('password-error');

    if (newPassword.length < 8 || newPassword !== confirmPassword) {
        passwordError.style.display = 'block';
        event.preventDefault();
    } else {
        passwordError.style.display = 'none';
    }
}


        function validateUsername() {
            var username = usernameInput.value;
            var hasNumber = /\d/;
            var hasSpace = /\s/;

            if (username.length < 5 || !hasNumber.test(username) || hasSpace.test(username)) {
                usernameError.style.display = "block";
                return false;
            } else {
                usernameError.style.display = "none";
                return true;
            }
        }

        function validatePassword() {
            var newPassword = document.getElementById('password').value;
            var errorMessage = document.getElementById('password-error');

            if (newPassword.length < 8) {
                errorMessage.style.display = 'block';
                return false;
            } else {
                errorMessage.style.display = 'none';
                return true;
            }
        }
    });

</script>

<div class="container">
     <h2><span>Notes-App</span> Création de Compte</h2>
     <form id="mes-notes"  method="POST" action="creercompte.php" onsubmit="validateForm(event)">
         <label for="username">Nom d'utilisateur :</label>
         <input type="text" id="username" name="username" required>
         <span id="username-error" class="error-message">L'identifiant doit comporter au moins 5 caractères, contenir au moins un chiffre et ne pas contenir d'espaces.</span>
         <label for="ddn">Date de Naissance :</label>
         <input type="date" id="ddn" name="ddn" required>
         <div class="password-container">
         <label for="password">Mot de passe :</label>
         <input type="password" id="password" name="password" required>
         
         <span id="password-error" class="error-message">Le mot de passe doit contenir au moins 8 caracteres et un chiffre.</span>
         </div>
         <label for="confirm-password">Confirmer le Mot de passe :</label>
         <input type="password" id="confirm-password" name="confirm-password" required>
         <label for="description">Votre Description :</label>
         <input type="description" id="description" name="description" required>
         <button type="submit">Créer Compte</button>
         <a href="../login.html">Déjà un compte ? Connectez-vous</a>
     </form>
 </div>
 
</body>
</html>
