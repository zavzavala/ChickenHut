<?php
include("../Class/conexao.php");
error_reporting(0);
session_start();
$codprod = intval($_GET['codigo']);

$delprod = "DELETE FROM productos WHERE id_productos = '$codprod'";

$prod = $mysqli->query($delprod) or die($mysqli->error);


if($prod){

    $_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Registro removido com sucesso.';
header('location:produto.php');
}
else{
	$_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Falha ao tentar eliminar producto.';
header('location:produto.php');
    
}



?>