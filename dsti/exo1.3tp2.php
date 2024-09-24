<?php 
/* $element est une variable qui va contenir chaque élément du tableau à chaque itération de la boucle.
À chaque itération de la boucle, la variable $element prend la valeur de l'élément suivant du tableau*/
function sommetableau($tab){
$somme=0;
    foreach ($tab as $element){
        ($somme=$somme + $element)."<br>";
    
    }
    echo $somme;
    return $somme;

}
function produittableau($tab){
    $produit=1;
 foreach($tab as $element){
 $produit=$produit * $element;
}
echo $produit;
return $produit;
}
 $t=array(4,5,9,);
 sommetableau($t);
 echo "<br>";
 produittableau($t);
 
 ?>