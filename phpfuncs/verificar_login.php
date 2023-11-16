<?php 
include("config.php");
include("functions.php");
$conn = connectDataBase(HOST,DATABASE,$user,$senha);
$colunas = array("email","senha");
logar($conn,"usuario",$colunas,$_POST["email"],$_POST["senha"],"teste.php","index.php","login_ativo","Ayron");
?>