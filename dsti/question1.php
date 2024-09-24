<?php 
/*$con=mysqli_connect("localhost","php_user","passer","tp_php");
$sql="select * from utilisateur";
$rslt=mysqli_query($con,$sql);
$tab=mysqli_fetch_all($rslt);
print_r($tab);
*/


echo "voici les utilisateurs <br>";
    try
    {
        $con = new PDO('mysql:host=localhost; dbname=tp_php; charset=utf8', 'root', '');
        $rslt = $con->query('select * from utilisateur');

        while ($utilisateur = $rslt->fetch()) {
            echo "Id : ".$utilisateur['id'].'<br>';
            echo "Prenom : ".$utilisateur['prenom'].'<br>';
            echo "Login : ".$utilisateur['login'].'<br>';
            echo "Nom : ".$utilisateur['nom'].'<br>';
            echo "Mot de passe : ".$utilisateur['mdp'].'<br>';
            
        }
         $rslt->closeCursor();
    }
    catch (PDOException $objet1)
    {
        echo "il y'a un soucis pour se connecter";
    }

?>