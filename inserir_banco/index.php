 

<?php 
include('conexao.php');

if(count($_POST) > 0){
    $nome = $_POST['nome'];
    if($nome <=0){
        echo"<script>
        alert('Preencha seu nome!')
    </script>";
    }
    else{
        $sql_code = "INSERT INTO usuar (id, nome, email, status) VALUES ('','$nome','','')";
        echo"ola";
    }
}

//if(isset($_POST['nome'])){
    //$nome = $_POST['nome'];
   // if(strlen($_POST['nome'])==0){ //strlen() -> conta o número de caracteres
      //  echo "<script>
       // alert('Preencha seu nome!')
   // </script>";
   // }
//}

//else{
   // $sql_code = "INSERT INTO `usuar`(`id`, `nome`, `email`, `status`) VALUES ('','$nome','teste','teste')";
 //   echo"teste";
//}


?>

 


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir no banco</title>
    <style>
*{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
form{
    width: 50%;
    margin: 50px auto;
    padding: 5%;
    border: 1px solid #444;
    border-radius: 10px;
    box-shadow: 20px 30px 15px 10px rgba(31, 31, 134, 0.443);
}
input[type="text"]{
 width: 300px;
 height: 30px;
}
label{
    font-size: 25px;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
}
input[type="submit"]{
padding-top: 10px;
margin-top: 20px;
padding: 10px;
background-color: rgb(12, 14, 139);
color: white;
border-radius: 10px;
cursor: pointer;
border: 0;

}
input[type="submit"]:hover{
    animation: mymove 0.3s;
    animation-delay: 1ms;
    animation-iteration-count:1;
    animation-fill-mode:forwards;
  
    /*box-shadow: 2px 2px 6px 0px black;*/
}
@keyframes mymove{
    from{
        box-shadow: 0px;
    
    }
    to{
        box-shadow: 2px 2px 6px 0px black;
      
    }
}
h1{
    font-family: tahoma;
    color: rgb(3, 53, 103);
}

    </style>
</head>
<body>
    <form action="" method="post">
        <h1>Inserir no Banco de Dados</h1><br>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">
        <br>
        <input type="submit">
    </form>
    
</body>
</html>