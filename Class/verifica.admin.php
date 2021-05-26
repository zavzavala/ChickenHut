<?php
require_once("../login/conn.php");

if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin'])){

    require_once("../login/admin.class.php");
    $u = new admin();
 
    $logado = $u->logged($_SESSION['idadmin']);
    $nomeUser = $logado['nome'];
    $iduser = $logado['id_usuarios'];

}else{
//header('location:../login.php');
  echo " <script>alert('Somente o administrador pode ter acesso a este formulario. A sessao sera cancelada de seguida!');location.href='../admin.php'</script>"; 
}

?>