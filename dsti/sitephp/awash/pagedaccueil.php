<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page D'Accueil</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="header">
    <div class="menu-je-suis-container">
        <div class="menu">
            <button>Menu</button>
            <div class="menu-content">
                <a href="#">Accueil</a>
                <a href="#">Se connecter</a>
                <a href="pagedaccueil2.php">Créer un compte</a>
            </div>
        </div>
        <div class="je-suis">
            <span>Je suis :</span>
            <div class="je-suis-content">
                <a href="#">UN ADMINISTRATEUR</a>
                <a href="#">UN MONETIQUE</a>
                <a href="#">UN OPERATEUR</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="form-container">
        <h2>Connexion</h2>
        <form id="login-form">
            <div class="form-group">
                <label for="username">Identifiant :</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Se connecter</button>
            </div>
        </form>
    </div>
    <div class="form-group">
        <button type="button" onclick="window.location.href='pagedaccueil2.php'">Créer un compte</button>
    </div>
</div>

</body>
</html>
