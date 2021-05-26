<?php
include("../Class/conexao.php");
require("../Class/verifica.admin.php");
            if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin']))
 

$codUser = intval($_GET['usuario']);

$deluser = "DELETE FROM usuarios WHERE id_usuarios= '$codUser' ";

$confUser =$mysqli->query($deluser) or die($mysqli->error);
if($confUser){
$_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Usuario eliminado com sucesso.';
header('location:usuarios.php');
    }
else{

	$_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Falha ao tentar eliminar usuario.';
header('location:usuarios.php');
    
}


?>