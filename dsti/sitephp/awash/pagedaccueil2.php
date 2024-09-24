<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
<div class="container">
<div id="create-account-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Créer un compte</h2>
        <form id="create-account-form">
        <div class="form-group">
                <label for="new-firstname">Prenom </label>
                <input type="text" id="new-firstname" name="new-firstname" required>
                </div>
            <div class="form-group">
                <label for="new-name">Nom </label>
                <input type="text" id="new-name" name="new-name" required>
                </div>
                <div class="form-group">
                <label for="new-email">Email : </label>
                <input type="text" id="new-email" name="new-email" required>
</div>
            <div class="form-group">
                <label for="new-username">Identifiant </label>
                <input type="text" id="new-username" name="new-username" required>
            </div>
            <div class="form-group">
                <label for="new-password">Mot de passe :</label>
                <input type="password" id="new-password" name="new-password" required>
            </div>
           
            <div class="form-group">
            <button type="button" onclick="window.location.href='pagedaccueil.php'">Créer le compte</button>
                
            </div>
        </form>
    </div>
</div>
</div>
</body>
</html>