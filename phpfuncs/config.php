<?php 
include("functions.php");
$host   = "localhost";
$db     = "funcoes_php";
$user   = "root";
$senha  = "";
$conn = new PDO("mysql:host=$host;dbname=$db", "$user", "$senha");
// conexao com o banco 
?>