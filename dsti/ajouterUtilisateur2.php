<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ajout d'un utilisateur</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Ajout d'un utilisateur</h1>
	<?php
		if (!isset($_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['password']))
		{?>
			<form method="post">
				<fieldset>
					<legend>Ajout utilisateur</legend>
					<label for="nom">Nom</label>
					<input type="text" name="nom" id="nom">
					<label for="prenom">Prénom</label>
					<input type="text" name="prenom" id="prenom">
					<label for="login">Login</label>
					<input type="text" name="login" id="login">
					<label for="password">Password</label>
					<input type="password" name="password" id="password">
					<input type="submit" value="Ajouter">
				</fieldset>
			</form><?php
		}
		else
		{
			try
			{
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$login = $_POST['login'];
				$password = $_POST['password'];

				$connexion = new PDO('mysql:host=localhost;dbname=tp_php;charset=utf8', 'root', '');
				$requete = "INSERT INTO Utilisateur(nom, prenom, login, password) VALUES(:nom, :prenom, :login, SHA1(:password))";
				$requetePreparee = $connexion->prepare($requete);

				// exécution de la requête d'insertion
				try
				{
					$requetePreparee->execute([
						'nom' => $nom,
						'prenom' => $prenom,
						'login' => $login,
						'password' => $password
					]);
					echo "Ajout effectué avec succès !";
				}
				catch (PDOException $e)
				{
					echo "Echec de l'ajout : ".$e->getMessage();
				}
			}
			catch (PDOException $e)
			{
				echo "Erreur de connexion à la base de données !";
			}
		}
	?>
</body>
</html>