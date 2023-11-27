<?php 
include("config.php");
include("functions.php");
$conn = connectDataBase(HOST,DATABASE,$user,$senha);
$get = (isset($_GET["add"])) ? isset($_GET["add"]) : null ; 
$arr = array("nome","qtd","info");
$values = array("Ayron Lindo",90,"RESPEITE O HOMI");
if($get == 1){
    //insertDefault($conn,"produtos",$arr,$values);
    //updateById($conn,"produtos", $arr, $values,"id_produto",1);
    //deleteById($conn,"produtos","id_produto",1);
   print_r(selectOnceDiferent($conn, "nome","usuario","nome", "ayron", 1));
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