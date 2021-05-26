<?php
include("../Class/conexao.php");
 require("../Class/verifica.admin.php");
            if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin']))

if(isset($_POST['ad'])){
    
            
       $nome =  $_POST['nome'];
       $apelido = $_POST['apelido'];
        $senha = md5($_POST['senha']);
        $sexo = $_POST['sexo'];
        $email = $_POST['email'];
        $posto = $_POST['posto'];
        $tipo = $_POST['tipo'];

            if($nome ==''| $apelido =='' | $senha =='' | $sexo =='' | $email =='' | $posto == '' | $tipo == ''){ 

               echo "<script>alert('preencha todos campos.'); 
               location.href='user.php';
               </script>";
            } else{


    $sql_code = "INSERT INTO usuarios (id_usuarios, id_posto, nome, apelido, senha, sexo, email, tipo, Data)
    VALUES(NULL, '$posto',
        '$nome', '$apelido', '$senha', '$sexo', '$email', '$tipo', NOW()
   )";

    $execute = $mysqli->query($sql_code) or die($mysqli->error);
    
    if($execute){

        echo "<script>
        
        alert('Usuario inserido com sucesso.');
    location.href='usuarios.php';
        
        </script>";

    }else {
     
echo "<script>
        
        alert('Falha ao tentar atualizar no banco');
    location.href='usuarios.php';
        
        </script>";
    }
}


}

//FORMULARIO DE USUARIOS---update




?>