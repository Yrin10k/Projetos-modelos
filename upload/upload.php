<?php 
echo "<pre>";
var_dump($_FILES);

$nome_arquivo = $_FILES['arquivo']['name'];

$extencao = strchr($nome_arquivo, "."); // funcao que retorna tudo que vem depois da ocorrencia de certo caractere
$extencoes = array(".gif",".png",".jpg");

if(!empty($nome_arquivo))
{
    echo "o Arquivo tem um nome";
    if(in_array($extencao, $extencoes))
}else
{
    echo "o Arquivo Nao tem um nome";
}

echo $extencao;
?>