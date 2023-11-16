<?php 
include("config.php");
include("functions.php");
$conn = connectDataBase(HOST,DATABASE,$user,$senha);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcoes Publicas</title>
</head>
<body>
<h1>login</h1>
<form action="verificar_login.php" method="post">
<label for="">email:</label><input type="email" name="email" id=""><br>
<label for="">senha:</label><input type="password" name="senha" id=""><br>
<br><input type="submit" value="Entrar">
</form>
</body>
</html>