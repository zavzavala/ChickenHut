<?php
require_once("../login/conn.php");

if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])){

    require_once("../login/Usuario.class.php");
    $u = new Usuario();
 
    $logado = $u->logged($_SESSION['iduser']);

    $nomeUser = $logado['nome'];
    $iduser = $logado['id_usuarios'];
    $postos = $logado['id_Posto'];

}else{
//header('location:../login.php');
  echo " <script>alert('Cadastre-se para usar o sistema');location.href='../index.php'</script>"; 
}

?>