<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
//define ("Max",10);
session_start();
if (!isset($_SESSION["c"])){
$_SESSION["c"]=1;}
else{
$_SESSION["c"]++;
}
?>
<form action="nbrevisite.php">
vous etes venu <?php echo $_SESSION["c"]; ?> fois
 cliquez sur  <input type="submit" value="continuer"> pour continuer
</form>

</body>
</html>