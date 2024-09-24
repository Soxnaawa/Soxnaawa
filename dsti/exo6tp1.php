<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1><big>resolution equation second degre</big></h1>
        <?php 
        $a=$_POST[" a"];
        $b=$_POST[" b"];//4
        $c=$_POST[" c"];
        if ($a==0) {
            echo "entrez un a superieur a 0";}
            else{
        $d=($b*$b)-(4*$a*$c); // le prof a fait $d=pow($b, 2)-4 *a*c
        echo $d;
        if($d>0){
            $x1=(-$b-sqrt($d))/(2*$a);
            $x2=(-$b+sqrt($d))/(2*$a);
            echo "l'equation admet  deux solutions x1=".$x1."et x2=".$x2;
/* si je veux controler le nbre de chiffre apres a la virgule  round($variable,nbre de virgule ), de meme que numberformat 
   c'est la meme syntaxe */
        }
        elseif ($d==0) {
            $xo=-$b/(2*$a);
            echo "l'equation n'admet qu'une seule solution xo=".$xo;
        }
        
        else{
            echo "l'equation n'admet pas de soluions reelles";
        }
    }
        // ctrl + / pour les commentaires une ligne
        // ctrl+shift+/ pour ligne you beuri
        ?>
</body>
</html>