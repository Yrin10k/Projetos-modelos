<?php 
include("config.php");
include("functions.php");
$conn = connectDataBase(HOST,DATABASE,$user,$senha);
$get = (isset($_GET["add"])) ? isset($_GET["add"]) : null ; 
$arr = array("nome","qtd","info");
$values = array("Testekk2",10,"kakkk");
if($get == 1){
    //insertDefault($conn,"produtos",$arr,$values);
   if(verifyInstance($conn,"all","produtos",$arr,$values)){echo "salve";}else{echo "Deu ruim";};
} 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcoes Publicas</title>
</head>
<body>
<form method="get" action="">
    <a href="http://localhost/projetos/phpfuncs/?add=1">Insert Default</a>
</form>
</body>
</html>