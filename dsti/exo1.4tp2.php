<?php 
$utilisateur1=array("nom"=>"niang", "prenom"=>"awa","motdepasse"=>"niangawa","login"=>"20220axk");
$utilisateur2=array("nom"=>"niang", "prenom"=>"insa","motdepasse"=>"nianginsa","login"=>"20220isn");
function listutilisateurs($user){

echo "<h1>voici vos donnees</h1>";?>

<table border="1">
    <tr>
<th>nom</th>
<th>prenom</th>
<th>motdepasse</th>
<th>login</th>
</tr>

<?php
foreach($user as $valeur){
    echo "<tr>"; 
   echo "<td>". $valeur['nom'] ."</td>";
   echo "<td>". $valeur['prenom'] ."</td>";
   echo "<td>". $valeur['motdepasse'] ."</td>";
   echo "<td>". $valeur['login'] ."</td>";
   echo "</tr>";
}
echo "</table>";
}


//$user1=array($utilisateur1);
$utilisateuryeup=array($utilisateur1,$utilisateur2);
listutilisateurs($utilisateuryeup);



/*
// Tableau associatif décrivant un utilisateur
$user1 = array(
    "nom" => "Doe",
    "prenom" => "John",
    "login" => "john_doe",
    "password" => "123456"
);

// Fonction pour afficher les utilisateurs dans un tableau HTML
function listerUtilisateurs($utilisateurs) {
    echo "<table border='1'>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Login</th>
                <th>Password</th>
            </tr>";
    foreach ($utilisateurs as $user) {
        echo "<tr>";
        echo "<td>" . $user['nom'] . "</td>";
        echo "<td>" . $user['prenom'] . "</td>";
        echo "<td>" . $user['login'] . "</td>";
        echo "<td>" . $user['password'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// Test de la fonction avec un seul utilisateur
$utilisateurs = array($user1);
listerUtilisateurs($utilisateurs);*/




















?>






















