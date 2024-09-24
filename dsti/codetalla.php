<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferer</title>
</head>
<body bgcolor="#e3e3e3">
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $motif = $_REQUEST["motif"];
        if ($_FILES["monFichier"]["error"] > 0) {
            echo "Erreur lors du transfert du fichier : " . $_FILES["monFichier"]["error"] . "<br>";
        } else {
            echo "Fichier original : " . $_FILES["monFichier"]["name"] . "<br>";
            echo "Fichier temporaire : " . $_FILES["monFichier"]["tmp_name"] . "<br>";
            echo "Taille du fichier : " . $_FILES["monFichier"]["size"] . " octets<br><br>";
            $ligne="";
            // Ouvrir et afficher le contenu du fichier text.txt s'il existe
            $fichier = $_FILES["monFichier"]["name"];
            if (file_exists($fichier)) {
                $f = fopen($fichier, "r");
                if ($f) {
                    if(strpos($ligne, $_POST['motif']) == false) {
                        echo "Le motif n'existe pas. Désolé";
                    }
                    while (!feof($f)) {
                        $ligne = fgets($f);
                        if(strpos($ligne, $_POST['motif']) !== false) {
                            // Marquer le motif dans la ligne avec du texte rouge
                            $ligne = str_replace($_POST['motif'], '<span style="color:red;">'.$_POST['motif'].'</span>', $ligne);
                        }
                        echo $ligne . "<br>";
                    }
                    fclose($f);
                } else {
                    echo "Problème d'ouverture du fichier!";
                }
            } else {
                echo "Le fichier n'existe pas!";
            }
        }
    }
    ?>
</body>
</html>