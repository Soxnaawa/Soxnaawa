document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('add-question-form');
    const questionsList = document.getElementById('questions-list');
    const playersList = document.getElementById('players-list');
    const scoresList = document.getElementById('scores-list');

    let questions = [];

    // Ajouter une question
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const questionInput = document.getElementById('question');
        const newQuestion = questionInput.value;
        
        questions.push(newQuestion);
        updateQuestionsList();
        
        questionInput.value = '';
    });

    // Mettre à jour la liste des questions
    function updateQuestionsList() {
        questionsList.innerHTML = '';
        
        questions.forEach(function(question, index) {
            const questionItem = document.createElement('div');
            questionItem.className = 'question-item';
            questionItem.textContent = `${index + 1}. ${question}`;
            
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Supprimer';
            deleteButton.addEventListener('click', function() {
                questions.splice(index, 1);
                updateQuestionsList();
            });
            
            questionItem.appendChild(deleteButton);
            questionsList.appendChild(questionItem);
        });
    }

    // Fonction pour charger les joueurs (simulation)
    function loadPlayers() {
        // Cette fonction devrait être remplacée par une requête AJAX vers le serveur pour obtenir la liste des joueurs
        const examplePlayers = [
            { username: 'joueur1', dateOfBirth: '2000-01-01' },
            { username: 'joueur2', dateOfBirth: '1999-05-15' }
        ];

        playersList.innerHTML = '';
        
        examplePlayers.forEach(function(player) {
            const playerItem = document.createElement('div');
            playerItem.className = 'player-item';
            playerItem.textContent = `${player.username} (Né le : ${player.dateOfBirth})`;
            playersList.appendChild(playerItem);
        });
    }

    // Fonction pour charger les scores (simulation)
    function loadScores() {
        // Cette fonction devrait être remplacée par une requête AJAX vers le serveur pour obtenir les scores
        const exampleScores = [
            { username: 'joueur1', score: 120 },
            { username: 'joueur2', score: 90 }
        ];

        scoresList.innerHTML = '';
        
        exampleScores.forEach(function(score) {
            const scoreItem = document.createElement('div');
            scoreItem.className = 'score-item';
            scoreItem.textContent = `${score.username} : ${score.score} points`;
            scoresList.appendChild(scoreItem);
        });
    }

    // Charger les joueurs et scores au chargement de la page
    loadPlayers();
    loadScores();
});
