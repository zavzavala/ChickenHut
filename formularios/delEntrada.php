<?php
session_start();

include("../Class/conexao.php");
error_reporting(0);

$codprod = intval($_GET['id']);

$delprod = "DELETE FROM entrada WHERE id_productos = '$codprod'";

$prod = $mysqli->query($delprod) or die($mysqli->error);


if($prod){

$_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Registro removido com sucesso.';
header('location:entradaproducto.php');
    
}
else{
	$_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Falha ao tentar eliminar producto.';
header('location:entradaproducto.php');
   
}


?>