<?php

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha']) ){

    require("conn.php");
    require("Usuario.class.php");
   
    $u = new Usuario();

$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

if($u->login($email, $senha) == true){
     if(isset($_SESSION['iduser'])){
        header("location: ../formularios/principal.php");
     }

    
else{
    header("location:../index.php"); 
}
}else{
    header("location:../index.php");  
}
}
else{
header("location:../index.php"); 

}
?>