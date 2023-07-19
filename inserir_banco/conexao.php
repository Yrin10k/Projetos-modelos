<?php 
$host = "localhost";
$database = "ayron";
$senha = "";
$usuario = "root";

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
    die('Falha ao conectar ao banco de dados'.$mysqli->error);
}
?>