<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	
</head>
<body>
	
	<?php
    echo "entrez les donnees de l'utilisateur a ajouter:<br>";
		if (!isset( $_POST['prenom'],$_POST['nom'], $_POST['login'],$_POST['mdp']))
		{?>
			<form method="post">
					<label for="prenom">Prénom</label>
					<input type="text" name="prenom" id="prenom"><br>
                    <label for="nom">Nom</label>
					<input type="text" name="nom" id="nom"><br>
					<label for="login">Login</label>
					<input type="text" name="login" id="login"><br>
					<label for="mdp">Mot de passe</label>
					<input type="password" name="mdp" id="mdp"><br>
					<input type="submit" value="valider">
				
			</form><?php
		}
		else
		{
			try
			{
				
	$prenom = $_POST['prenom'];
     $nom = $_POST['nom'];
     $login = $_POST['login'];
	$mdp = $_POST['mdp'];
    $con = new PDO('mysql:host=localhost;dbname=tp_php;charset=utf8', 'root', '');
	 $rslt = "insert into utilisateur( prenom,nom,login, mdp) VALUES( :prenom, :nom,:login,:mdp)";
	$req = $con->prepare($rslt);

				
				try
				{
					$req->execute(['prenom' => $prenom,'nom' => $nom,'login' => $login,'mdp' => $mdp]);
					echo "Ajout effectué avec succès !";
				}
				catch (PDOException $objet3)
				{
					echo "l'ajout de l'utilisateur a echoue";
				}
			}
			catch (PDOException $objet3)
			{
				echo "il y'a un soucis pour se connecter";
			}
		}
	?>
</body>
</html>