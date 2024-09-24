async function fetchData(url, callback) {
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Erreur lors de la récupération des données à partir de ${url}`);
        }
        const data = await response.json();
        callback(data);
    } catch (error) {
        console.error('Erreur:', error);
    }
}

function afficherProduits(produits) {
    const tbody = document.getElementById('produits-body');
    tbody.innerHTML = '';
    produits.forEach(produit => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${produit.nom}</td>
            <td>${produit.description}</td>
            <td>${produit.prix}</td>
            <td>${produit.quantite}</td>
        `;
        tbody.appendChild(tr);
    });
}

function afficherCommandes(commandes) {
    const tbody = document.getElementById('commandes-body');
    tbody.innerHTML = '';
    commandes.forEach(commande => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${commande.date_commande}</td>
            <td>${commande.produit_id}</td>
            <td>${commande.quantite}</td>
            <td>${commande.statut}</td>
        `;
        tbody.appendChild(tr);
    });
}

function afficherFournisseurs(fournisseurs) {
    const tbody = document.getElementById('fournisseurs-body');
    tbody.innerHTML = '';
    fournisseurs.forEach(fournisseur => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${fournisseur.nom}</td>
            <td>${fournisseur.contact}</td>
            <td>${fournisseur.adresse}</td>
        `;
        tbody.appendChild(tr);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    fetchData('/api/produits', afficherProduits);
    fetchData('/api/commandes', afficherCommandes);
    fetchData('/api/fournisseurs', afficherFournisseurs);
});
