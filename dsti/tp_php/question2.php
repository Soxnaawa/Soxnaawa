<?php 
echo "voici la liste des users en tableau";
try
		{

	$con = new PDO('mysql:host=localhost;dbname=tp_php;charset=utf8', 'root', '');
    	$rslt = $con->query('select * from utilisateur ORDER BY nom ASC'); ?>

	<table border="3">
		<tr>
		<th>Id</th>
		<th>Prenom</th>
		<th>Nom</th>
         <th>login</th>
          <th>Mot de passe</th>
	</tr><?php
while ($utilisateur = $rslt->fetch())
				{?>
					<tr>
						<td><?= $utilisateur['id'] ?></td>
						<td><?= $utilisateur['prenom'] ?></td>
						<td><?= $utilisateur['nom'] ?></td>
                        <td><?= $utilisateur['login'] ?></td>
						<td><?= $utilisateur['mdp'] ?></td>
					</tr><?php
				}?>
			</table><?php
	$rslt->closeCursor();
		}
catch (PDOException $objet2)
		{
			echo "il y'a un soucis pour se connecter";
		}

?>