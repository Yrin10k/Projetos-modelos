<?php session_start(); var_dump($_SESSION);?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso de Sessoes</title>
    <style> *{font-family: tahoma;}</style>
</head>
<body>
    <form action="logar.php" method="post">
        Usuario: <input type="text" name="txtUsuario" id="">
        <br>
        Senha: <input type="text" name="txtSenha" id=""> 
        <br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>