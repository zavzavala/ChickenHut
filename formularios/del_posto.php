<?php

  include("../Class/conexao.php");
                require("../Class/verifica.admin.php");
            if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin'])){

    $codigo = $_GET['codigop'];


if(isset($_GET['codigop'])){

$queryposto = "DELETE FROM posto WHERE id_posto = '$codigo' ";

$qrposto = $mysqli->query($queryposto) or die($mysqli->error);

if($qrposto){
echo "<script>alert('posto eliminado com sucesso.')</script>";

echo "<script>window.location='user_posto.php'</script>";

}

else{

echo "<script>alert('Falha ao tentar eliminar o registro.')</script>";

echo "<script>window.location='user_posto.php'</script>";
   
}
}
else{
    echo "<script>alert('Codigo invalido.');location.href='principal.php';</script>"; 
}
?>