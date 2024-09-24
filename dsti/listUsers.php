<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liste des utilisateurs</title>
</head>
<body>
	<h1>Liste des utilisateurs</h1>
	<?php
		try
		{
			$connexion = new PDO('mysql:host=localhost;dbname=tp_php;charset=utf8', 'root', '');
			$reponse = $connexion->query('SELECT * FROM Utilisateur');

			while ($utilisateur = $reponse->fetch()) {
				echo "ID : ".$utilisateur['id'].'<br>';
				echo "Nom : ".$utilisateur['nom'].'<br>';
				echo "Prénom : ".$utilisateur['prenom'].'<br>';
				echo "Login : ".$utilisateur['login'].'<br>';
				echo "Password : ".$utilisateur['password'].'<br>';
				echo '<a href="supprimerUtilisateur.php?id='.$utilisateur['id'].'">Supprimer</a><hr>';
			}

			$reponse->closeCursor();
		}
		catch (PDOException $e)
		{
			echo "Erreur de connexion à la base de données";
		}
	?>
</body>
</html>