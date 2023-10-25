<?php 
session_start(); // iniciar a sessao 
if($_POST['txtUsuario'] == "Ayron" && $_POST['txtSenha'] == "123")
{
    $_SESSION["cliente"] = "Ayron Nascimento"; 
    $_SESSION["login"] = "Ayron";
    header("location: pagina1.php");
}
else
{
   unset( $_SESSION["cliente"]);
   unset( $_SESSION["login"]);
   header("location: index.php");
}
?>