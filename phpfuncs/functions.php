<?php 
// verify
// caracter
function vNumber($n) // is a number/ eh um numero ? / return true or false
{
// is a number ? return true or false // indentify strings 
if(is_string($n))
{return false;}
elseif(!is_nan($n))
{return true;}
}
// database
//login
function connectDataBase($nome_host,$nome_db,$user,$senha)
{
    $conn = new PDO("mysql:host=$nome_host;dbname=$nome_db", "$user", "$senha");
    return $conn;
}
function vLogin($cn,$tbl,$camp, $lg, $pswd)
{   // verify login
    //the variable camp need be a array with two keys, contain the names of columns login and password
    // if you want ignore the condicional, set "" for $cnd
 $sql = "SELECT * FROM $tbl WHERE $camp[0] = :lg AND $camp[1] = :pswd";
 $query = $cn->prepare($sql);
 $query->bindValue(":lg",$lg);
 $query->bindValue(":pswd",$pswd);
 $query->execute();
 $tmp =  $query->fetchALL(\PDO::FETCH_OBJ);
 return $tmp;
}
function vLogin_mod($cn,$tbl,$lg, $pswd,$cnd)
{ // verify login
 $sql = "SELECT * FROM $tbl ";
}


//crud
function selectAll($conn, $table, $verify_string)
{   // return * values of your table in fetchALL in obj format, if you want return all without condicional, your can insired in $verify_string camp the value -> ""
    $sql = "SELECT * FROM $table WHERE :v";
    $query = $conn->prepare($sql);
    $query->bindValue(":v",$verify_string);
    $query->execute();
    return $query->fetchALL(\PDO::FETCH_OBJ);
}
// inserction 
function insertDefault($cn, $tb, $clmn,$values)
{
    // PAREI AJEITANDO O ARRAY DAS COLUNAS
    $tmp1 = "";
    $t = 0;
    $t1 = count($clmn);
    foreach ($clmn as $ac) 
    {
    $t++;
    $tmp1 = $tmp1.$ac.",";
    }
    $tmp1 = substr($tmp1, 0, -1);
        $cnt = count($values);
        $tmp0 = "";
        $algo = "";
        for ($i=0; $i <= count($values); $i++) {
            $tmp0 = $algo.$tmp0;
            $algo = $tmp0;
            $tmp0 = ":v$i,";
        }
        
        //echo $algo;
        $algo = substr($algo, 0, -1);        
        $sql = "INSERT INTO $tb($tmp1) VALUES ($algo)";
        $qry = $cn->prepare($sql);
        $a = -1;
        foreach($values as $v)
        {   
            $a++;
            $qry->bindValue(":v$a", $v);
        }
        $qry->execute();
        return $cn->lastInsertId();
    }
    function vSession_start()
    {// verify session exists, is'nt, start the session
        if(empty($_SESSION))
        {session_start(); return true;}
        else
        {return false;}
    }
    function Logar($conexao,$tabela,$colunas_array,$login,$senha,$location_pagina_principal,$location_pagina_login,$nome_sessao_login_ativo,$nome_sessao_nomedousuario)
    {
    $login = $login;
    $senha = $senha;
    $tbl = $tabela;
    $camp[0] = $colunas_array[0];
    $camp[1] = $colunas_array[1];
    $tmp = vLogin($conexao,$tbl,$camp, $login, $senha);
    if($tmp != null)
    {
        if(vSession_start() == true)
        {
            $_SESSION[$nome_sessao_login_ativo] = true;
            $_SESSION[$nome_sessao_nomedousuario] = $login;
            header("location: $location_pagina_principal");
        }
    }
    elseif($tmp == null)
    {
    if(vSession_start()==true)
        {   
            session_destroy();
            header("location: $location_pagina_login"); // redirecionar para a pagina de login 
        }
    }
        }

    function securityStay($nome_sessao_login_ativo,$location_pagina_login)
    {
        if(vSession_start())
        {
            if(empty($_SESSION[$nome_sessao_login_ativo]) OR empty($location_pagina_login)) // parei aqui 
            {session_destroy(); header("location: $location_pagina_login");}
        }
    }
    function securityPage($nome_sessao_login_ativo,$location_pagina_login)
    {//1 - COLOQUE O NOME DA SESSAO QUE IRA SER SETADA TRUE OU FALSE, NO MOMENTO DE VERIFICACAO DE LOGIN
    // 2 - COLOQUE A PAGINA ONDE O CLIENTE NAO VERIFICADO IRA FICAR CASO ACESSE UMA PAGINA COM NECESSIDADE DE LOGIN, POR EXEMPLO A PROPRIA PAGINA DE LOGIN;
        vSession_start();
        if(empty($_SESSION[$nome_sessao_login_ativo]))
        {
        session_destroy();
        header("location: $location_pagina_login");
        //securityStay($_SESSION[$nome_sessao_login_ativo],$_SESSION[$location_pagina_login]);
        }
        else
        {
            securityStay($nome_sessao_login_ativo,$location_pagina_login);
            // caso seja verificado retorna o nome do login do cliente antes dado na funcao de logar()
        }
    }
    
?>