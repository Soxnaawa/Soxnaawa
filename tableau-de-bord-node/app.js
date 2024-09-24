const express = require('express');
const mysql = require('mysql2/promise');
const path = require('path'); // Module pour gérer les chemins de fichier

const app = express();
const PORT = process.env.PORT || 3000;

// Configuration de la base de données MySQL
const dbConfig = {
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'gestionstock'
};

// Middleware pour servir les fichiers statiques depuis le répertoire 'public'
app.use(express.static(path.join(__dirname, 'public')));

// Route racine
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// Route pour récupérer les produits
app.get('/api/produits', async (req, res) => {
    try {
        const connection = await mysql.createConnection(dbConfig);
        const [rows, fields] = await connection.execute('SELECT * FROM Produits');
        connection.end();
        res.json(rows);
    } catch (error) {
        console.error('Erreur lors de la récupération des produits :', error);
        res.status(500).json({ error: 'Erreur lors de la récupération des produits' });
    }
});

// Route pour récupérer les commandes
app.get('/api/commandes', async (req, res) => {
    try {
        const connection = await mysql.createConnection(dbConfig);
        const [rows, fields] = await connection.execute('SELECT * FROM Commandes');
        connection.end();
        res.json(rows);
    } catch (error) {
        console.error('Erreur lors de la récupération des commandes :', error);
        res.status(500).json({ error: 'Erreur lors de la récupération des commandes' });
    }
});

// Route pour récupérer les fournisseurs
app.get('/api/fournisseurs', async (req, res) => {
    try {
        const connection = await mysql.createConnection(dbConfig);
        const [rows, fields] = await connection.execute('SELECT * FROM Fournisseurs');
        connection.end();
        res.json(rows);
    } catch (error) {
        console.error('Erreur lors de la récupération des fournisseurs :', error);
        res.status(500).json({ error: 'Erreur lors de la récupération des fournisseurs' });
    }
});

// Démarrage du serveur
app.listen(PORT, () => {
    console.log(`Serveur backend démarré sur le port ${PORT}`);
});
