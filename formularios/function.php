<?php

include_once("../Class/conexao.php");
error_reporting(0);

function retorna($nome, $mysqli){

    $dados = "SELECT * FROM productos WHERE nome = '$nome' LIMIT 1 ";

    $consulta = $mysqli->query($dados);
    if($consulta->num_rows){
        $linha = mysqli_fetch_assoc($consulta);
        $valores['descricao'] = $linha['descricao'];
        $valores['preco'] = $linha['preco'];
        $valores['imagem'] = $linha['imagem'];
    }else{
        $valores['preco'] = "Nao encontrado";
        $valores['descricao'] = "Nao encontrado";
    }
    return json_encode($valores);
}

if(isset($_GET['nome'])){

    echo retorna($_GET['nome'], $mysqli);

}
?>
