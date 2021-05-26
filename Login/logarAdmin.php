<?php

if(isset($_POST['admail']) && !empty($_POST['admail']) && isset($_POST['senha']) && !empty($_POST['senha']) ){

    require("conn.php");
    require("admin.class.php");
   
    $u = new admin();

$admail = addslashes($_POST['admail']);
$adsenha = addslashes($_POST['senha']);

if($u->login($admail, $adsenha) == true){
     if(isset($_SESSION['idadmin'])){
        header("location: ../formularios/principalAdmin.php");
     }
else{
    header("location:../admin.php"); 
}
}else{
    header("location:../admin.php");  
}
}
else{
header("location:../admin.php"); 

}
?>