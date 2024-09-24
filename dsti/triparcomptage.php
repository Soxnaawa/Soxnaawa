<?php
 function triparcomptage($tableau) {
    $max = max($tableau);
    $min = min($tableau);
    $comptage = array_fill($min, $max - $min + 1, 0);
    /*array_fill 
    crée un tableau où chaque indice représente une valeur possible dans l'intervalle des valeurs du tableau d'entrée,
     et chaque élément est initialement défini à zéro
    La taille du tableau est déterminée par la différence entre la valeur maximale et minimale du tableau d'entrée.
    on a fait +1 car pour un intervalle de valeurs de $min à $max,
     nous avons $max - $min + 1 valeurs possibles,
      d'où le besoin d'ajouter 1 pour s'assurer que le tableau $comptage soit suffisamment grand pour inclure toutes ces valeurs.*/
     foreach ($tableau as $valeur) {
      $comptage[$valeur]++;
        /*Cette boucle foreach parcourt chaque élément du tableau d'entrée ($tableau). 
        Pour chaque élément ($valeur) rencontré, elle incrémente le compteur correspondant dans le tableau $comptage. */
    }
   $i = 0;//Initialise un compteur qui sera utilisé pour positionner les valeurs triées dans le tableau $tableau.
    foreach (range($min, $max) as $valeur) {/*range  retourne un tableau contenant une séquence de nombres ou de caractères, 
        débutant à $min et se terminant à $max */
        /* le for Parcourt chaque valeur possible dans l'intervalle des valeurs minimale et maximale
       comme ca nous pouvons etre sur que nous parcourons toutes les valeurs possibles,
        même si elles ne sont pas toutes présentes dans le tableau d'origine */
         while ($comptage[$valeur]-- > 0) {// c a dire tant qu'il reste des occurrences de la valeur $valeur à placer dans le tableau trié
            // mais aussi [$valeur]-- > 0 vérifie si la valeur de $comptage[$valeur] avant la décrémentation est supérieure à zéro.
            $tableau[$i++] = $valeur;
        }
    }
    return $tableau;
}
$tableau = array(5, 3, 8, 2, 7, 1, 4, 6);
echo "Tableau avant le tri par comptage : " . implode(", ", $tableau) . "\n";
$tableau_trie = triparcomptage($tableau);
echo "Tableau après le tri par comptage : " . implode(", ", $tableau_trie) . "\n";

/* le implode c'est pour afficher pour afficher les éléments du tableau $tableau sous forme d'une seule chaîne de caractères,
 avec chaque élément séparé par une virgule et un espace.*/




















?>