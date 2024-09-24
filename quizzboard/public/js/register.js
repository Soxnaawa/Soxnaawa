document.getElementById('register-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche le comportement par défaut du formulaire

    const username = document.getElementById('username').value;
    const dob = document.getElementById('dob').value;
    const password = document.getElementById('password').value;

    fetch('views/register.php', {  // Chemin relatif correct
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username, dob, password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Inscription réussie');
            window.location.href = 'connexion.html'; // Redirige vers la page de connexion après l'inscription réussie
        } else {
            alert('Erreur lors de l\'inscription');
        }
    })
    .catch(error => console.error('Erreur:', error));
});
