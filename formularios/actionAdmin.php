<?php

require("../Class/verifica.admin.php");
  if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin']))
require("../Class/conexao.php");
error_reporting(0);
   
/////////
if(isset($_POST['pid'])){

$pid=$_POST['pid'];
$pprice=$_POST['pprice'];
$pname=$_POST['pname'];
$pimage=$_POST['pimage'];
$pcode=$_POST['pcode'];
$tipo=$_POST['tipo'];
$pqty = 1;
$stmt = $mysqli->prepare("SELECT nome FROM cart WHERE descricao=?");
$stmt->bind_param("s", $pcode);
$stmt->execute();
$res=$stmt->get_result();
$r =$res->fetch_assoc();
$code= $r['nome'];

if(!$code){
    $query = $mysqli->prepare("INSERT INTO cart(
        nome,preco,imagem,quantidade,total,descricao,tipo) VALUES(?,?,?,?,?,?,?)");

    $query->bind_param("sssisss",$pname,$pprice,$pimage,$pqty,$pprice,$pcode,$tipo);
    $query->execute();

    echo '<div class="alert alert-info alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Item adicionado ao carrinho!</strong>
        </div>'; 
}else{
    echo '<div class="alert alert-danger alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Este item ja existe no carrinho!</strong>
        </div>';
}

}

if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
    $stmt = $mysqli->prepare("SELECT * FROM cart");
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;
    echo $rows;
}

if(isset($_GET['remove'])){
    $id = $_GET['remove'];
    $stmt = $mysqli->prepare("DELETE FROM cart WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = "Item removido com sucesso!";
    header('location:cart.php');
}
if(isset($_GET['clear'])){
    $stmt = $mysqli->prepare("DELETE FROM cart");
    $stmt->execute();
    $stmt = $mysqli->prepare("DELETE FROM cart WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = "Todos itens foram removidos com sucesso!";
    header('location:cart.php');
}
if(isset($_POST['quantidade'])){
$qty = $_POST['quantidade'];
$pid = $_POST['pid'];
$pprice = $_POST['pprice'];

$tprice = $qty*$pprice;
$stmt = $mysqli->prepare("UPDATE cart SET quantidade=?, total=? WHERE id=?");
$stmt->bind_param("isi",$qty,$tprice,$pid);
$stmt->execute();

}


 $post="SELECT posto.posto FROM `posto`, usuarios WHERE usuarios.id_posto=posto.id_posto AND usuarios.id_usuarios ='$iduser' limit 1 ";
 $qp = $mysqli->query($post) or die($mysqli->error);
 $lnposto = mysqli_fetch_assoc($qp); 
if(isset($_POST['action']) && isset($_POST['action']) == 'order'){

$produto = $_POST['produtos'];
$bebidas = $_POST['bebidas'];
//$tipo=$_POST['tipo'];
$pagamento = $_POST['pmode'];
$grand_total = $_POST['grand_total'];
$grand_totalB = $_POST['grand_totalB'];
$valor = $_POST['valor'];
$posto = $lnposto['posto']; 
$trocos =$valor-$grand_total;
$trocosB =$valor-$grand_totalB;
if($trocos <0){
    $trocos = 0;
}else{
 $trocos;
}

if($produto ==''){
     echo "<script>alert('Nao ha produto!');location.href='checkout.php';</script>"; 
}
elseif($pagamento ==''){
     echo "<script>alert('Selecione forma de pagamento!');location.href='checkout.php';</script>";
        }
        else{
$data = '';
$stmt = $mysqli->prepare("INSERT INTO orders(produtos,Pagamento,dinheiro,total,trocos,posto,id_user,Data)VALUES
    (?,?,?,?,?,?,?,NOW())");
$stmt->bind_param("ssssssi", $produto,$pagamento,$valor,$grand_total,$trocos,$posto,$iduser);
$stmt->execute();
/////////////////////////////
if($bebidas == ''){

}else{

$stmt = $mysqli->prepare("INSERT INTO bebida(produtos,Pagamento,dinheiro,total,trocos,posto,id_user,Data)VALUES
    (?,?,?,?,?,?,?,NOW())");
$stmt->bind_param("sssssss", $bebidas,$pagamento,$valor,$grand_totalB,$trocosB,$posto,$iduser);
$stmt->execute();
}
$stmt = $mysqli->prepare("DELETE FROM cart");
    $stmt->execute();
$data .='<div class="text-center">
    <h1 class="display-4 mt-2 text-danger">Obrigado!</h1>
    <h2  class="text-success">Concluido com sucesso!</h2>
    <h4 class="bg-danger text-light rounded p-2">Itens solicitados : '.$produto.'</4>
    <h4>Trocos : '.$trocos.' Mzn</h4>
    <h4>Dinheiro : '.number_format($valor,2).' Mzn</h4>
    <h4>Compra : '.number_format($grand_total,2).' Mzn</h4>
    <h4>Forma de Pagamento : '.$pagamento.'</h4>
        <div>';
        echo $data;
}
}
/////////////////////////////INSERTS
///////////////////////entradaproductouser.php
if(isset($_POST['nome'])){
    

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    
    $quantidade = $_POST['quantidade'];


    if($nome == '' || $quantidade == ''){
            
 echo '<div class="alert alert-warning alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Preencha todos campos para prosseguir...</strong>
        </div>';
    }
    else{
    $qr = "INSERT INTO entrada(id_productos, id_usuarios, id_posto, nome, descricao, quantidade, data_entrada)
     VALUES(
        NULL,  
        '$iduser',
        '$postos',
        '$nome',
        '$descricao',
        '$quantidade',
        
         NOW())";

    $sql = $mysqli->query($qr) or die($mysqli->error);
if($sql){

   echo '<div class="alert alert-info alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Produto inserido com sucesso.</strong>
        </div>';
}
else{

        echo '<div class="alert alert-warning alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Falha ao tentar inserir o registro.</strong>
        </div>';

    
}

}

}


////////////////////////////////CATEGORIA

    if(isset($_POST['codigo']) ){
        
            $codigo = $_POST['codigo'];
            $nome_prod = $_POST['nomeProd'];
            $tempo = $_POST['tempo'];


            if($codigo == '' || $tempo == '' || $nome_prod == '' ){
          
        echo '<div class="alert alert-success alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Preencha todos campos para prosseguir...</strong>
        </div>';
            }

            else{

            $qr = "select codigo_espera from categoria where codigo_espera='$codigo' ";
            $qr2 = $mysqli->query($qr) or die($mysqli->error);
             $cod = mysqli_fetch_assoc($qr2);
            $codC = $cod['codigo_espera'];

                if(!$codC){

           $sqltempo = "INSERT INTO categoria(id_Codigo_Tempo_espera, codigo_espera, nome_prod, tempo, data) 
            
            VALUES(NULL, '$codigo', '$nome_prod', '$tempo', NOW() )";
        
            $sql = $mysqli->query($sqltempo) or die($mysqli->error);
            //$verifica = num_rows($sql);
       
            if($sql){
      
                // $_SESSION['showAlert'] = 'block';
//$_SESSION['message'] = 'Regisro salvo com Sucesso.';
echo '<div class="alert alert-success alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Regisro salvo com Sucesso.</strong>
        </div>';
    
        }
    }
        else{

                 $_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Ja existe um registro com este codigo.';
          
            
        }

        }

        }

        //CODIGO ENTRADAS

if(isset($_POST['nomeEntrada'])){
    

    $nomeEntrada = $_POST['nomeEntrada'];
    $descricaoEntrada = $_POST['descricao'];

    $quantidade = $_POST['quantidade'];


    if($nomeEntrada == '' || $descricaoEntrada == ''){
            
             echo '<div class="alert alert-warning alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Preencha todos campos para prosseguir.</strong>
        </div>';
           //$_SESSION['showAlert'] = 'block';
//$_SESSION['message'] = 'Preencha todos campos para prosseguir.';
//header('location:EntradaProductouser.php');
    }
    else{
    $qr = "INSERT INTO entrada(id_productos, id_usuarios, nome, descricao, quantidade, data_entrada)
     VALUES(
        NULL,  
        '$iduser',
        '$nomeEntrada',
        '$descricaoEntrada',
        
        '$quantidade',
      
         NOW())";

    $sql = $mysqli->query($qr) or die($mysqli->error);
if($sql){
      echo '<div class="alert alert-success alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Produto inserido com sucesso.</strong>
        </div>';
//$_SESSION['showAlert'] = 'block';
//$_SESSION['message'] = 'Produto inserido com sucesso.';
//header('location:EntradaProductouser.php');
}
else{
   echo '<div class="alert alert-success alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Falha ao tentar inserir o registro.</strong>
        </div>';
      //  $_SESSION['showAlert'] = 'block';
//$_SESSION['message'] = '.';
   //header('location:EntradaProductouser.php');
}

}

}

//////////////////////POSTO


    if(isset($_POST['postos'])){
        
            $postos = ucfirst($_POST['postos']);
            $enderecos = ucfirst($_POST['endereco']);
            $contactos = ucfirst($_POST['contacto']);

            if($postos == '' || $enderecos == '' || $contactos == '+258' || $contacto == ''){

                  echo '<div class="alert alert-danger alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Preencha todos campos  para prosseguir...</strong>
        </div>';
           
            }
            else{

            $qr = "SELECT posto FROM posto WHERE posto ='$postos' limit 1";
            $qr2 = $mysqli->query($qr) or die($mysqli->error);
             $cod = mysqli_fetch_assoc($qr2);
            $codC = $cod['posto'];

                if(!$codC){

            $sqltempo = "INSERT INTO posto(id_posto, posto, endereco, contacto, data) 
            
            VALUES(NULL, '$postos', '$enderecos', '$contactos', NOW() )";
        
            $sql = $mysqli->query($sqltempo) or die($mysqli->error);    

       
            if($sql){
                  echo '<div class="alert alert-info alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Posto adicionado com sucesso.</strong>
        </div>';
       
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Falha ao tentar inserir dados.</strong>
        </div>';
           } 
        }else{
            echo '<div class="alert alert-danger alert-dismissible mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Este posto ja existe. Verifique</strong>
        </div>';
        }
    }
}

?>