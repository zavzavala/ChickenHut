<?php

/////PRODUCTOS
 require("../Class/verifica.admin.php");
            if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin']))
 include("../Class/conexao.php");

    
if(isset($_POST['produto']) ){
    
    $id_categoria = $_POST['id_Codigo_Tempo_espera'];
    $categoriap = $_POST['categoria'];
    $nome = $_POST['nome'];
    $descricaop = $_POST['descricao'];           
    $preco = $_POST['preco'];
    $codigo_espera = $_POST['codigo_espera'];
    $tipo_prod = 'Outro';
    //$tipo = $_POST['tipo'];
    //$tempo = $_POST['tempo'];
    $filename = $_FILES["foto"]["name"];
    $tempname = $_FILES["foto"]["tmp_name"];
    $folder = "image/".$filename;
    //echo $folder;
    move_uploaded_file($tempname, $folder);
    if($nome == '' || $descricaop == '' || $preco == '' || $id_categoria == '' || $categoriap == 'Selecione'){
            
            
        echo "<script>alert('Preencha todos campos para prosseguir...'); 
               location.href='produto.php';
               </script>";
            //$_SESSION['showAlert'] = 'block';
//$_SESSION['message'] = 'Preencha todos campos para prosseguir...';
//header('location:produto.php');
    }
    else{
        $qrp = "SELECT id_productos FROM productos WHERE nome='$nome' AND descricao='$descricaop' limit 1";
            $qrp2 = $mysqli->query($qrp) or die($mysqli->error);
             $codp = mysqli_fetch_assoc($qrp2);
            $codCp = $codp['id_productos'];

            if(!$codCp){
    $categ = "INSERT INTO productos(id_productos, nome, id_categoria, id_usuarios, descricao, categoria, preco, codigoCompra, tipo_prod, imagem, Data)
     VALUES(
        NULL,  
        '$nome',
        '$id_categoria',
        '$iduser',
        '$descricaop',
        '$categoriap',
        '$preco',
        '$codigo_espera',
        '$tipo_prod',
        
        '$folder',
         NOW())";

    $sql = $mysqli->query($categ) or die($mysqli->error);
    
if($sql){
    
        echo "<script>alert('Produto inserido com sucesso.'); 
               location.href='produto.php';
               </script>";
      //$_SESSION['showAlert'] = 'block';
//$_SESSION['message'] = 'Produto inserido com sucesso.';
//header('location:produto.php');
 
}else{}

}
else{
  
         echo "<script>alert('Este produto ja existe no banco. verifique.'); 
               location.href='produto.php';
               </script>";
   // $_SESSION['showAlert'] = 'block';
//$_SESSION['message'] = 'Este produto ja existe no banco. verifique';
//header('location:produto.php');
}

}


}//FIM DO POSTO.





//////////////////BEBIDAS
        if(isset($_POST['Addbebida']) ){
    
    $nomeb = $_POST['bebida'];
    $descricaob = $_POST['descricao'];
    $precob = $_POST['preco'];
    $tipo_prod = $_POST['tipo_prod'];
    $tipo = $_POST['tipo'];
    //$tempo = $_POST['tempo'];
    $filename = $_FILES["foto"]["name"];
    $tempname = $_FILES["foto"]["tmp_name"];
    $folder = "image/".$filename;
    //echo $folder;
    move_uploaded_file($tempname, $folder);
    if($nomeb == '' || $descricaob == '' || $precob == '' || $tipo == 'Selecione'){
            
            //$_SESSION['showAlert'] = 'block';
//$_SESSION['message'] = 'Preencha todos campos para prosseguir...';
echo "<script>alert('Preencha todos campos para prosseguir...'); 
               location.href='bebidas.php';
               </script>";
    }
    else{
         $qrB = "SELECT id_productos FROM productos WHERE nome='$nomeb' AND descricao='$descricaob'";
            $qrB2 = $mysqli->query($qrB) or die($mysqli->error);
             $codB = mysqli_fetch_assoc($qrB2);
            $codCB = $codB['id_productos'];

            if(!$codCB){
    $bebida = "INSERT INTO productos(id_productos, id_usuarios, nome, tipo_prod, tipo, descricao, preco, imagem, Data)
     VALUES(
        NULL,  
        '$iduser',
        '$nomeb',
        '$tipo_prod',
        '$tipo',
        '$descricaob',
        '$precob',
        '$folder',
         NOW()
         )";

    $sql = $mysqli->query($bebida) or die($mysqli->error);
    
if($sql){
//$_SESSION['showAlert'] = 'block';
//$_SESSION['message'] = 'Produto inserido com sucesso.';
 echo "<script>alert('Bebida inserida com sucesso.'); 
               location.href='bebidas.php';
               </script>";

}
else{
     echo "<script>alert('Falha ao tentar inserir o registro.'); 
               location.href='bebidas.php';
               </script>";
   // $_SESSION['showAlert'] = 'block';
//$_SESSION['message'] = 'Falha ao tentar inserir o registro.';
//header('location:bebidas.php');
 
 }

}else{
     echo "<script>alert('Este produto ja existe no banco. verifique.'); 
               location.href='bebidas.php';
               </script>";
      // $_SESSION['showAlert'] = 'block';
//$_SESSION['message'] = 'Este produto ja existe no banco. verifique';
//header('location:bebidas.php');
}

}
}

////////////////////////////PRODUTOS
    

?>