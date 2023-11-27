<?php 
function vNumber($n) // is a number/ eh um numero ? / return true or false
{
// is a number ? return true or false // indentify strings 
if(is_string($n))
{return false;}
elseif(!is_nan($n))
{return true;}
}

// database
function connectDataBase($nome_host,$nome_db,$user,$senha)
{
    $conn = new PDO("mysql:host=$nome_host;dbname=$nome_db", "$user", "$senha");
    return $conn;
}
//crud
function selectAll($conn, $table, $typeReturn)
{    // $typeReturn -> return OBJ or ARRAY, 1 or 2 
     // return * values of your table in fetchALL in obj format"
    if($typeReturn != 1 && $typeReturn != 2){  die("<b>ERROR FUNCTION</b> the typeReturn is diferent of 1 or 2, Select a Type"); }
    else{ 
    $sql = "SELECT * FROM $table";
    $query = $conn->prepare($sql);
    $query->execute();
    $ty = ($typeReturn == 1) ? $query->fetchALL(\PDO::FETCH_OBJ) : $query->fetchALL(\PDO::FETCH_ASSOC) ;
    return $ty;
    }
}
function selectOnceEqual($conn,$param, $table, $column, $value, $typeReturn){
    // $typeReturn -> return OBJ or ARRAY, 1 or 2 
     // return one line values of your table in fetchALL in obj format"
     if($typeReturn != 1 && $typeReturn != 2){  die("<b>ERROR FUNCTION</b> the typeReturn is diferent of 1 or 2, Select a Type"); }
     else{ 
     $sql = "SELECT $param FROM $table WHERE $column = :v";
     $query = $conn->prepare($sql);
     $query->bindValue(":v",$value);
     $query->execute();
     $ty = ($typeReturn == 1) ? $query->fetch(\PDO::FETCH_OBJ) : $query->fetchALL(\PDO::FETCH_ASSOC) ;
     return $ty;
    }
}
function selectOnceDiferent($conn,$param, $table, $column, $value, $typeReturn){
    // $typeReturn -> return OBJ or ARRAY, 1 or 2 
     // return one line values of your table in fetchALL in obj format"
     if($typeReturn != 1 && $typeReturn != 2){  die("<b>ERROR FUNCTION</b> the typeReturn is diferent of 1 or 2, Select a Type"); }
     else{ 
     $sql = "SELECT $param FROM $table WHERE $column != :v";
     $query = $conn->prepare($sql);
     $query->bindValue(":v",$value);
     $query->execute();
     $ty = ($typeReturn == 1) ? $query->fetch(\PDO::FETCH_OBJ) : $query->fetchALL(\PDO::FETCH_ASSOC) ;
     return $ty;
    }
}
function verifyInstanceDefault($conn,$param, $table, $columns, $values){
    // $conn -> conection ; $param -> the lines where you want return ;
    // $conn -> conexao com o banco de dados; $param -> as linhas(tuplas) que voce deseja retornar como verificacao do banco de dados, aconselhavel deixar como *(all ou tudo);
    // verify if the value are in the columns inserted in the array $columns;
    // verifica se os valores estao nas colunas inseridas, respectivamente   
    // $columns and $values need to in array format
    // $columns e $values precisam estar no formato de array
    switch ($param) {   
        case 'tudo':
            $param = "*";
            break;
        
        case 'Tudo':
            $param = "*";
        break;

        case 'TUDO':
            $param = "*";
        break;
        
        case 'all':
            $param = "*";
        break;

        case 'All':
            $param = "*";
        break;
        
        case 'ALL':
            $param = "*";
        break;
    }

    $sql = "SELECT $param FROM $table WHERE ";
    $cnt = count($values);
    $i = 0;
    while ($i < $cnt) {
        $vl_cout = "\"$values[$i]\"";
        if($i == ($cnt-1)){$sql = $sql."$columns[$i] = "." $vl_cout "; $i = $cnt;}
        if($i < $cnt){
        $sql = $sql."$columns[$i] = "." $vl_cout AND ";
        }
        $i++;
    }
    $qry = $conn->prepare($sql);
    $qry->execute();
    $tmp3 = $qry->fetch(\PDO::FETCH_OBJ);
    if($tmp3 == null){
        return false;
    }else{
        return true;
    }
}
function verifyInstanceEqual_Or($conn,$param, $table, $columns, $values){
    // $conn -> conection ; $param -> the lines where you want return ;
    // $conn -> conexao com o banco de dados; $param -> as linhas(tuplas) que voce deseja retornar como verificacao do banco de dados, aconselhavel deixar como *(all ou tudo);
    // verify if the value is diferent in the columns inserted in the array $columns;
    // verifica se os valores estao nas colunas inseridas, respectivamente   
    // $columns and $values need to in array format
    // $columns e $values precisam estar no formato de array
    switch ($param) {   
        case 'tudo':
            $param = "*";
            break;
        
        case 'Tudo':
            $param = "*";
        break;

        case 'TUDO':
            $param = "*";
        break;
        
        case 'all':
            $param = "*";
        break;

        case 'All':
            $param = "*";
        break;
        
        case 'ALL':
            $param = "*";
        break;
    }
    
    $sql = "SELECT $param FROM $table WHERE ";
    $cnt = count($values);
    $i = 0;
    while ($i < $cnt) {
        $vl_cout = "\"$values[$i]\"";
        if($i == ($cnt-1)){$sql = $sql."$columns[$i] = "." $vl_cout "; $i = $cnt;}
        if($i < $cnt){
        $sql = $sql."$columns[$i] != "." $vl_cout AND ";
        }
        $i++;
    }
    $qry = $conn->prepare($sql);
    $qry->execute();
    $tmp3 = $qry->fetch(\PDO::FETCH_OBJ);
    if($tmp3 == null){
        return false;
    }else{
        return true;
    }
}
function verifyInstanceDiferent($conn,$param, $table, $columns, $values){
    // $conn -> conection ; $param -> the lines where you want return ;
    // $conn -> conexao com o banco de dados; $param -> as linhas(tuplas) que voce deseja retornar como verificacao do banco de dados, aconselhavel deixar como *(all ou tudo);
    // verify if the value is diferent in the columns inserted in the array $columns;
    // verifica se os valores estao nas colunas inseridas, respectivamente   
    // $columns and $values need to in array format
    // $columns e $values precisam estar no formato de array
    switch ($param) {   
        case 'tudo':
            $param = "*";
            break;
        
        case 'Tudo':
            $param = "*";
        break;

        case 'TUDO':
            $param = "*";
        break;
        
        case 'all':
            $param = "*";
        break;

        case 'All':
            $param = "*";
        break;
        
        case 'ALL':
            $param = "*";
        break;
    }
    
    $sql = "SELECT $param FROM $table WHERE ";
    $cnt = count($values);
    $i = 0;
    while ($i < $cnt) {
        $vl_cout = "\"$values[$i]\"";
        if($i == ($cnt-1)){$sql = $sql."$columns[$i] = "." $vl_cout "; $i = $cnt;}
        if($i < $cnt){
        $sql = $sql."$columns[$i] != "." $vl_cout AND ";
        }
        $i++;
    }
    $qry = $conn->prepare($sql);
    $qry->execute();
    $tmp3 = $qry->fetch(\PDO::FETCH_OBJ);
    if($tmp3 == null){
        return false;
    }else{
        return true;
    }
}
function verifyInstanceDiferent_Or($conn,$param, $table, $columns, $values){
    // $conn -> conection ; $param -> the lines where you want return ;
    // $conn -> conexao com o banco de dados; $param -> as linhas(tuplas) que voce deseja retornar como verificacao do banco de dados, aconselhavel deixar como *(all ou tudo);
    // verify if the value is diferent in the columns inserted in the array $columns;
    // verifica se os valores estao nas colunas inseridas, respectivamente   
    // $columns and $values need to in array format
    // $columns e $values precisam estar no formato de array
    switch ($param) {   
        case 'tudo':
            $param = "*";
            break;
        
        case 'Tudo':
            $param = "*";
        break;

        case 'TUDO':
            $param = "*";
        break;
        
        case 'all':
            $param = "*";
        break;

        case 'All':
            $param = "*";
        break;
        
        case 'ALL':
            $param = "*";
        break;
    }
    
    $sql = "SELECT $param FROM $table WHERE ";
    $cnt = count($values);
    $i = 0;
    while ($i < $cnt) {
        $vl_cout = "\"$values[$i]\"";
        if($i == ($cnt-1)){$sql = $sql."$columns[$i] = "." $vl_cout "; $i = $cnt;}
        if($i < $cnt){
        $sql = $sql."$columns[$i] != "." $vl_cout OR ";
        }
        $i++;
    }
    $qry = $conn->prepare($sql);
    $qry->execute();
    $tmp3 = $qry->fetch(\PDO::FETCH_OBJ);
    if($tmp3 == null){
        return false;
    }else{
        return true;
    }
}
// inserction 
function insertDefault($cn, $tb, $clmn,$values)
{   // erros codes in the last line of the function
    //$cn -> connection database ;$tb -> table; $clmn -> columnns 
    if(verifyInstanceDefault($cn, "*", $tb,$clmn,$values)!=false)
    {
        die("ERROR 1");
    }
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
        // ERROR 1 ; THE VALUES EXISTS IN THE DATABASE !
        // IF YOU WANT THE VALUES REPEAT; USE THE FUNCTION insertDefault_repeat();
    }
    function insertDefault_repeat($cn, $tb, $clmn,$values)
{   // erros codes in the last line of the function
    // $cn -> connection database ;$tb -> table; $clmn -> columnns  
   
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
    function updateAll($conn, $table, $clmn, $vle){
        // not recomend
        $sql = "UPDATE $table SET $clmn = :v";
        $qry = $conn->prepare($sql);
        $qry->bindValue(":v",$vle);
        $qry->execute();
        return true;
    }
    function updateOnceById($conn, $table, $clmn, $vle, $column_id, $id){
        $sql = "UPDATE $table SET $clmn = :v WHERE $column_id = $id";
        $qry = $conn->prepare($sql);
        $qry->bindValue(":v",$vle);
        $qry->execute();
        return true;
    }
    function updateById($conn, $table, $clmn, $vle,$column_id, $id){
    // $conn -> conexao com o Banco de Dados / Conection with the DataBase
    // $clmn -> PRECISA ESTAR EM FORMATO DE ARRAY | NEED TO STAY IN ARRAY FORMAT Colunas que voce deseja alterar //columns who you wish to alter OBS -> Devem ser ordenados respectivamente de acordo com a ordem dos Valores // They must be ordered respectively according to the order of Values
    // $vle -> PRECISA ESTAR EM FORMATO DE ARRAY | NEED TO STAY IN ARRAY FORMAT Valores a setar // values to set // OBS -> Devem ser ordenados respectivamente de acordo com a ordem das colunas // They must be sorted respectively according to the order of the columns
    // $column_id -> nome da coluna id da tabela desejada, ele quem diferencia quem vai sofrer o update || column name id of the desired table, he is the one who differentiates who will undergo the update
    // $id -> valor do id; 
       $sql = "UPDATE $table SET ";
        $cnt = count($vle);
        $i = 0;
        while ($i < $cnt) {
            $vl_cout = "\"$vle[$i]\"";
            if($i == ($cnt-1)){$sql = $sql."$clmn[$i] = "." $vl_cout "; $i = $cnt;}
            if($i < $cnt){
            $sql = $sql."$clmn[$i] = "." $vl_cout, ";
            }
            $i++;
        }
        $sql = $sql." WHERE $column_id = $id";
        $qry = $conn->prepare($sql);
        $qry->execute();
        //$tmp3 = $qry->fetch(\PDO::FETCH_OBJ);
    }
    function deleteAll($conn, $table){
        //use apenas se voce precisar apagar a tabela inteira || just use if you want delete all data from table
        $sql = "DELETE FROM $table";
        $query = $conn->prepare($sql);
        $query->execute();
    }
    function deleteById($conn, $table, $column_id, $id){
        $sql = "DELETE FROM $table WHERE $column_id = :id";
        $query = $conn->prepare($sql);
        $query->bindValue("id",$id);
        $query->execute();
    }
    //login
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
    // logoff 
    function logOff($pagina_retorno)
    {
        if(empty($_SESSION))
        {
            vSession_start();
            session_destroy();
            header("location: $pagina_retorno");
        }
    }
    
?>