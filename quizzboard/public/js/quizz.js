
document.addEventListener('DOMContentLoaded', function() {
        // Gestion du formulaire de quiz
        document.addEventListener('DOMContentLoaded', function() {
            // Définir la variable player en JavaScript
            const player = "<?php echo $username; ?>"; // Assurez-vous que $username est correctement injecté dans le script
        
            const quizForm = document.getElementById('quiz-form');
            const scoreDisplay = document.getElementById('player-score');
        
            if (quizForm) {
                quizForm.addEventListener('submit', function(event) {
                    event.preventDefault();
        
                    // Soumettre les réponses au serveur pour calculer le score
                    fetch('views/submit_answer.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ answers: getAnswers() })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Affiche le score sur l'interface utilisateur
                            scoreDisplay.textContent = `Votre score : ${data.score}`;
        
                            // Envoyer le score au serveur pour l'enregistrer
                            return fetch('views/add_score.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({ player: player, score: data.score })
                            });
                        } else {
                            console.error('Erreur lors du calcul du score:', data.error);
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Score enregistré avec succès');
                        } else {
                            console.error('Erreur lors de l\'enregistrement du score:', data.error);
                        }
                    })
                    .catch(error => console.error('Erreur:', error));
                });
            }
        
            function getAnswers() {
                const questions = document.querySelectorAll('.question-container');
                const answers = [];
        
                questions.forEach(questionContainer => {
                    const questionId = questionContainer.querySelector('p').getAttribute('data-question-id');
                    const selectedOption = questionContainer.querySelector('input[name="question_' + questionId + '"]:checked');
                    
                    if (selectedOption) {
                        answers.push({
                            questionId: questionId,
                            answer: selectedOption.value
                        });
                    }
                });
        
                return answers;
            }
        });
        
        
        //pour les erreurs

        
/*
    // Gestion du formulaire d'ajout de questions
    const addQuestionForm = document.getElementById('add-question-form');
    
    if (addQuestionForm) {
        addQuestionForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const question = document.getElementById('question').value;
            const option1 = document.getElementById('option1').value;
            const option2 = document.getElementById('option2').value;
            const option3 = document.getElementById('option3').value;
            const correctAnswer = document.getElementById('correct_answer').value;

            const formData = new FormData();
            formData.append('question', question);
            formData.append('option1', option1);
            formData.append('option2', option2);
            formData.append('option3', option3);
            formData.append('correct_answer', correctAnswer);

            fetch('views/add_questions.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `question=${encodeURIComponent(question)}&option1=${encodeURIComponent(option1)}&option2=${encodeURIComponent(option2)}&option3=${encodeURIComponent(option3)}&correct_answer=${encodeURIComponent(correctAnswer)}`
            })
            .then(response => response.json())  // Traite la réponse en JSON
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    form.reset();  // Réinitialise le formulaire si succès
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Erreur:', error));
            
        });
    }*/
});
