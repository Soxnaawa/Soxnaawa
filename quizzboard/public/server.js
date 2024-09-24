const express = require('express');
const mysql = require('mysql2');
const bcrypt = require('bcrypt');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

// Middleware
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));

// Connexion à la base de données MySQL
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root', // Remplace par ton utilisateur MySQL
    password: '', // Remplace par ton mot de passe MySQL
    database: 'quiz_app'
});

db.connect((err) => {
    if (err) throw err;
    console.log('Connecté à la base de données MySQL');
});

// Route pour l'inscription
app.post('/api/register', (req, res) => {
    const { username, dob, password } = req.body;

    // Validation des entrées
    if (!username || !dob || !password) {
        return res.status(400).json({ error: 'Tous les champs sont requis' });
    }

    // Hachage du mot de passe
    bcrypt.hash(password, 10, (err, hash) => {
        if (err) {
            console.error('Erreur lors du hachage du mot de passe:', err);
            return res.status(500).json({ error: 'Erreur serveur' });
        }

        // Insertion dans la base de données
        const query = 'INSERT INTO users (username, dob, password) VALUES (?, ?, ?)';
        db.query(query, [username, dob, hash], (err) => {
            if (err) {
                console.error('Erreur lors de l\'insertion dans la base de données:', err);
                return res.status(500).json({ error: 'Erreur serveur' });
            }
            res.json({ success: true });
        });
    });
});

// Route pour la connexion
app.post('/api/login', (req, res) => {
    const { username, password } = req.body;

    // Validation des entrées
    if (!username || !password) {
        return res.status(400).json({ error: 'Tous les champs sont requis' });
    }

    // Recherche de l'utilisateur
    const query = 'SELECT * FROM users WHERE username = ?';
    db.query(query, [username], (err, results) => {
        if (err) {
            console.error('Erreur lors de la recherche dans la base de données:', err);
            return res.status(500).json({ error: 'Erreur serveur' });
        }

        if (results.length > 0) {
            // Comparaison du mot de passe
            bcrypt.compare(password, results[0].password, (err, match) => {
                if (err) {
                    console.error('Erreur lors de la comparaison des mots de passe:', err);
                    return res.status(500).json({ error: 'Erreur serveur' });
                }

                if (match) {
                    res.json({ success: true });
                } else {
                    res.json({ success: false });
                }
            });
        } else {
            res.json({ success: false });
        }
    });
});

// Route pour récupérer les questions
app.get('/api/questions', (req, res) => {
    const query = 'SELECT * FROM questions';
    db.query(query, (err, results) => {
        if (err) {
            console.error('Erreur lors de la récupération des questions:', err);
            return res.status(500).json({ error: 'Erreur serveur' });
        }
        res.json(results);
    });
});

// Route pour soumettre une réponse au quiz
app.post('/api/submit-answer', (req, res) => {
    const { answer } = req.body;

    // Pour simplifier, on vérifie ici une seule réponse (ceci devrait être modifié pour des validations plus complexes)
    const correctAnswer = 'la bonne réponse'; // Remplacer par la logique réelle pour vérifier la bonne réponse

    let score = 0;
    if (answer.toLowerCase() === correctAnswer.toLowerCase()) {
        score = 1;
    }

    res.json({ score });
});

// Route pour ajouter des questions
app.post('/api/questions', (req, res) => {
    const { question } = req.body;

    // Validation des entrées
    if (!question) {
        return res.status(400).json({ error: 'La question est requise' });
    }

    const query = 'INSERT INTO questions (question) VALUES (?)';
    db.query(query, [question], (err) => {
        if (err) {
            console.error('Erreur lors de l\'insertion de la question dans la base de données:', err);
            return res.status(500).json({ error: 'Erreur serveur' });
        }
        res.json({ success: true });
    });
});

// Route pour ajouter des scores (si on veut enregistrer le score des joueurs)
app.post('/api/scores', (req, res) => {
    const { player, score } = req.body;

    // Validation des entrées
    if (!player || score === undefined) {
        return res.status(400).json({ error: 'Le joueur et le score sont requis' });
    }

    const query = 'INSERT INTO scores (player, score) VALUES (?, ?)';
    db.query(query, [player, score], (err) => {
        if (err) {
            console.error('Erreur lors de l\'insertion du score dans la base de données:', err);
            return res.status(500).json({ error: 'Erreur serveur' });
        }
        res.json({ success: true });
    });
});

app.listen(port, () => {
    console.log(`Serveur démarré sur le port ${port}`);
});
