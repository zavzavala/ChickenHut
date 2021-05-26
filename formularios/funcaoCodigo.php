<?php
include_once("../Class/conexao.php");
///////////////////////

/////VER CHECKDELETE.JS

function retorna($nome_prod, $mysqli){

    $qr = "SELECT * FROM categoria WHERE  nome_prod = '$nome_prod' LIMIT 1 ";

    $consult = $mysqli->query($qr) or die($mysqli->error);
    if($consult->num_rows){
        $ln = mysqli_fetch_assoc($consult);
        //$valor['tempo'] = $ln['tempo'];
        $valor['codigo_espera'] = $ln['codigo_espera'];
        $valor['id_Codigo_Tempo_espera'] = $ln['id_Codigo_Tempo_espera'];
        
    }else{
    //$valor['tempo'] = "Nenhum";
        $valor['codigo_espera'] = "Nenhum valor Selecionado";
        $valor['id_Codigo_Tempo_espera'] = "Nenhum valor Selecionado";
    }
    return json_encode($valor);
}

if(isset($_GET['categoria'])){

    echo retorna($_GET['categoria'], $mysqli);

}


?>