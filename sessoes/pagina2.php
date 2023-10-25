<?php session_start();
if(!$_SESSION["cliente"]){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso de Sessoes</title>
    <style> *{font-family: tahoma;}</style>
</head>
<body>
   <h1>ola, <?php echo $_SESSION["cliente"]; ?>, voce esta na pagina 2!</h1>
</body>
</html>