document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Envoyer les données de connexion au serveur via fetch
    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username, password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirection vers la page d'accueil après connexion
            window.location.href = 'dashboard.html';
        } else {
            // Affichage d'un message d'erreur si la connexion échoue
            document.getElementById('error-message').textContent = data.error;
            document.getElementById('error-message').style.display = 'block';
        }
    })
    .catch(error => console.error('Erreur:', error));
});
