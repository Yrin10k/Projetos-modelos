<?php include("functions.php");?>
<h1>Arquivo enviado? </h1>
<?php  
$mime = [".png", ".jpg"];
if(upFile($_FILES["arquivo"],"F:\\prog\\htdocs\\projetos\\phpfuncs\\updateFiles",2000000,$mime))
{
    echo "Arquivo enviado com sucesso !";
}else{
    echo "ops! Houve erro no envio do arquivo";
}

?>