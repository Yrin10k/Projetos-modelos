<?php
include("functions.php");
securityPage("login_ativo","index.php");
echo "OLA AQUI EH A PAGINA DOIS ----- > ".$_SESSION["Ayron"];
?>
<br>
<a href="logoff.php">SAIR</a>