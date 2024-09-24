<?php
$motif = $_REQUEST["motif"];

// Vérifier si un fichier a été envoyé
if (!isset($_FILES["fichier"])) {
    die("Erreur d'envoi du fichier!!!");
}

// Chemin du fichier temporaire sur le serveur
$fichier_temporaire = $_FILES["fichier"]["tmp_name"];

// Vérifier si le fichier a été correctement téléchargé
if (!is_uploaded_file($fichier_temporaire)) {
    die("Erreur lors du téléchargement du fichier!!!");
}

// Ouvrir le fichier en lecture
$f = fopen($fichier_temporaire, "r");

// Vérifier si le fichier a été ouvert avec succès
if (!$f) {
    die("Problème d'ouverture du fichier!!!");
}

// Créer un nom de fichier unique pour le fichier modifié
$chemin_fichier_modifie = 'chemin/vers/le/dossier/fichier_modifie.txt'; // Spécifiez le chemin vers le dossier et le nom du fichier modifié

// Ouvrir le fichier modifié en écriture
$fichier_modifie = fopen($chemin_fichier_modifie, "w");

// Vérifier si le fichier modifié a été ouvert avec succès
if (!$fichier_modifie) {
    die("Problème d'ouverture du fichier modifié!!!");
}

// Lire le fichier ligne par ligne et remplacer le motif
while (!feof($f)) {
    $ligne = fgets($f);
    $newligne = str_replace($motif, "<span style='color: #ff0000;'>$motif</span>", $ligne);
    // Écrire la ligne modifiée dans le fichier modifié
    fwrite($fichier_modifie, $newligne);
}

// Fermer les fichiers
fclose($f);
fclose($fichier_modifie);

echo "Le fichier a été modifié avec succès et enregistré.";
?>
