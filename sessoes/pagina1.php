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
    <?php  // echo "<pre>" ; var_dump($_SESSION);  echo "</pre>" ;?>
   <h1>Ola,  <?php echo $_SESSION["cliente"]; ?> Voce esta na pagina  01</h1>
   <br><br>
   <a href="pagina2.php">Ir para a pagina 2</a>
</body>
</html>