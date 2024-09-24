<?php 


function affichertableau($tab){
    if (!is_array($tab)) { //vérifie si une variable est un tableau
        echo "le parametre n'est pas un tableau";
    }
    
    else
    {foreach ($tab as $element) {
        echo $element."</br>";
    }
    return $element;}
}

//$t=array(0=>"lundi",1=>"mardi",2=>"mercredi",3=>"jeudi",4=>"vendredi",5=>"samedi",6=>"dimanche");
$t=9;
affichertableau($t);






?>