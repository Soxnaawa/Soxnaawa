<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// Déclaration des valeurs pour stocker le erreurs 
$nameErr = $ageErr = "";
$name = $age = "";

// verfivation si la methode d'envoie est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // Vérification si le nom contient uniquement des lettres et des espaces
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Seules les lettres de l'alphabet sont autorisées";
    }
  }

  if (empty($_POST["age"])) {
    $ageErr = "Age is required";
  } else {
    $age = test_input($_POST["age"]);
    // Vérification si l'âge est un nombre entier 
    if (!is_numeric($age)) {
        $ageErr = "L'âge doit être un nombre";
      } elseif ($age < 18) {
        $ageErr = "Votre âge est inférieur à 18";
      }
  }
}



function test_input($data) {
    // pour suuprimer les espacements de trop
  $data = trim($data);

  // pour ne pas prendre en compte les balises html
  $data = htmlspecialchars($data);

  return $data;
}

?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>

<?php 
// Définition de la fonction formulaire sans paramètres
function formulaire(){?>
<!-- Formulaire avec deux champs : nom et âge -->

<!-- GLOBALS sert a definir une variable en tant que variable globale-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
  Name: <input type="text" name="name" value="<?php echo $GLOBALS['name']; ?>">
  <span class="error">* <?php echo $GLOBALS['nameErr'];?></span>
  <br><br>
  Age: <input type="text" name="age" value="<?php echo $GLOBALS['age']; ?>">
  <span class="error">* <?php echo $GLOBALS['ageErr'];?></span>
  <br><br>
  <input type="submit" name="submit" value="Soumettre">  
</form>
<?php }

// Définition de la fonction traitement avec deux paramètres
function traitement($n, $a){
    // Construction du message avec les valeurs reçues
    $message = "Bonjour ".$n." vous avez ".$a." ans";
    // Affichage du message
    echo $message;
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($ageErr)) {
    // Appel de la fonction traitement si le formulaire a été soumis avec des données valides
    traitement($_POST["name"], $_POST["age"]);
} else {
    // Appel de la fonction formulaire si le formulaire n'a pas encore été soumis ou s'il y a des erreurs
    formulaire();
}
?>

</body>
</html>