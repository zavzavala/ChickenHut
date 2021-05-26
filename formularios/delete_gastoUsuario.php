<?php
include("../Class/conexao.php");
error_reporting(0);

$codigo = intval($_GET['codigo']);

if(isset($_GET['codigo'])){

$query = "DELETE FROM gasto_Usuario WHERE id_gasto = '$codigo' ";

$qr = $mysqli->query($query) or die($mysqli->error);

if($qr){

echo "<script>alert('Registro eliminado com sucesso.');location.href='gasto_Usuarios.php';</script>"; 

}

else{

    echo "Falha ao tentar eliminar registos.";
}
}
else{
    echo "<script>alert('Codigo invalido.');location.href='principal.php';</script>"; 
}
?>