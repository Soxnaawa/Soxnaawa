<?php 

$tab = array(5,8,6,7,0,2,10);
//$passage = 0;//   sert a initialiser une variable pour compter le nombre de passage dans le tri
$permutation = true;//indiquer
$en_cours;// stocker l'indice de l'element qu l'on compare
$temp;//variable temporaire

echo "AVANT ";
        echo '<table border = "2" widht = "200">';
        echo '<tr>';
        for ($j=0; $j<7; $j++)
         {
              echo '<td>';
              echo $tab[$j]; 
              echo '</td>';
        }
        echo '</tr>';
        echo '</table>';
        echo '<br>';
        echo '<hr>';
        echo '<br>';
        echo "APRES";

// APPLICATION DU TRI PEIGNE    

$gap = 7;//taille tableau
$permutation = true;
$en_cours;//
   
    while (( $permutation) || ($gap>1)) {
        $permutation = false;
        $gap = $gap / 1.3;
        if ($gap<1){ $gap=1;}
        for ($en_cours=0;$en_cours<7-$gap;$en_cours++) {
            if ($tab[$en_cours]>$tab[$en_cours+$gap]){
                $permutation = true;
                // on echange les deux elements
                $temp = $tab[$en_cours];
                $tab[$en_cours] = $tab[$en_cours+$gap];
                $tab[$en_cours+$gap] = $temp;
            }
        }
    }            
//FIN APPLICATION DU TRI PEIGNE  

//affichage 
echo '<table border = "2" widht = "200">';
echo '<tr>';
for ($j=0; $j<7; $j++)
 {
      echo '<td>';
      echo $tab[$j]; 
      echo '</td>';
}
echo '</tr>';
echo '</table>';
            
        ?>
        
    