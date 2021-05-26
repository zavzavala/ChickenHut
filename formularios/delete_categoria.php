<?php
include("../Class/conexao.php");
//error_reporting(0);
require("../Class/verifica.admin.php");
            if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin'])){

$codigo = intval($_GET['codigo']);

//$codigo_posto = $_GET['codigop'];

if(isset($_GET['codigo'])){

$query = "DELETE FROM categoria WHERE id_Codigo_Tempo_espera = '$codigo' ";

$qr = $mysqli->query($query) or die($mysqli->error);

if($qr){

$_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Registro removido com sucesso.';
header('location:categoria.php');

}

else{
$_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Falha ao tentar eliminar o registro.';
header('location:categoria.php');

}
}
else{
    
$_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Codigo invalido..';
header('location:categoria.php');
}

?>