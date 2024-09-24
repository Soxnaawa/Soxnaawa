<?php 



/*
function triselection($tableau) {
    $tailletab = count($tableau);//pour obtenir la taille du tableau
    
    for ($i = 0; $i < $tailletab - 1; $i++) {
      //indicemin pour suivre l'indice de l'élément minimum trouvé lors de la recherche du minimum dans la partie non triée du tableau
        $indicemin = $i;
        for ($j = $i + 1; $j < $tailletab; $j++) { //La 2e boucle utilise j pour comparer 
            //les éléments restants du tableau à partir de l'indice $i + 1.
            if ($tableau[$j] < $tableau[$indicemin]) {
                $indicemin = $j;
            }
        }
        // Échanger les éléments
        $tmp = $tableau[$i];
        $tableau[$i] = $tableau[$indicemin];
        $tableau[$indicemin] = $tmp;
    }
    
    return $tableau;
}


function triparinsertion($tableau){
    $tailletab = count($tableau);//pour obtenir la taille du tableau
 for ($i=0; $i<$tailletab;$i++) {
    $x= $tableau[$i];
    $j=$i-1;
    //Déplace les éléments du tableau qui sont plus grands que x vers la droite d'une position ===>>>>>
    while (($j>=0) && ($tableau[$j] > $x)) {
        $tableau[$j+1] = $tableau[$j];
        $j=$j-1;
    }
    //Place x à la bonne position dans le tableau trié    
    $tableau[$j+1]=$x;
    
}
return $tableau; }*/

function triparbulles($tableau){
    $tailletab = count($tableau);//pour obtenir la taille du tableau
for ($i = 0; $i < $tailletab - 1; $i++) {//est utilisée pour contrôler le nombre de passages à effectuer dans le tri à bulles.
        // Boucle pour parcourir le tableau et effectuer les comparaisons
  for ($j = 0; $j < $tailletab - $i - 1; $j++) { /*  lors de chaque passage, 
    nous n'avons pas besoin de comparer les éléments déjà triés à la fin du tableau. 
    C'est pourquoi on a mis $taille - $i - 1 comme condition pour la boucle interne(celle avec le j).*/
    if ($tableau[$j] > $tableau[$j + 1]){//on veut comparer l'élément actuel et l'élément suivant dans le tableau (croissant on fait <)
                // Permutation des éléments grace a une variable temporaire tmp
                $tmp = $tableau[$j];
                $tableau[$j] = $tableau[$j + 1];
                $tableau[$j + 1] = $tmp;
            }
        }
    }
        return $tableau;
    }
    
    





// Exemple d'utilisation :
$tab=[0, 5, 20, 100, 25];
$tab=triparbulles($tab);
echo "Tableau trié : ";
foreach ($tab as $element) {
    echo $element . " ";
}

?>