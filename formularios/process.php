    <?php
    include_once("../Class/conexao.php");

    require("../Class/verifica.php");
                if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser']) ) 

    $post="SELECT posto.id_posto FROM `posto`, usuarios WHERE usuarios.id_posto=posto.id_posto AND usuarios.id_usuarios = $iduser limit 1 ";
                                    $qp = $mysqli->query($post) or die($mysqli->error);
                                    $lnposto = mysqli_fetch_assoc($qp);
                                    $posto = $lnposto['id_posto'];

    if(isset($_POST['btnAdd']) ){
        
            $gasto = $_POST['gasto'];
        //$gasto = number_format($vgasto, 2, ',', '.');

            if($gasto == ''){
                    echo "<script>alert('Este campo nao pode estar vazio.');location.href='principal.php';</script>"; 
            }
            else{
            $gast = "INSERT INTO gasto_usuario(id_gasto, id_usuario, id_posto, gasto, Data) VALUES(NULL,  $iduser, '$posto',
            
            '$gasto', NOW())";
        
            $sql = $mysqli->query($gast) or die($mysqli->error);
        if($sql){
        
        echo " <script>alert('Registro inserido com sucesso.'); location.href='principal.php';</script>";
        }
        else{
        
            echo "<script>alert('Falha ao tentar inserir dados.');location.href='principal.php';</script>";
        }
        
        }
        }
        
      
    //////////////////////////////////////

    if(isset($_POST['Senha'])){
        

        $senha = MD5($_POST['Senha']);
      
        if($senha == ''){
              
        $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Insira a nova Palavra-passe..';
    header('location:edit_user_pass.php');
    }
        else{
        $qr = "UPDATE usuarios SET senha = '$senha' WHERE id_usuarios = '$iduser' ";

        $sql = $mysqli->query($qr) or die($mysqli->error);

    if($sql){
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Usuario actualizado com sucesso.';

    header('location:principal.php');

    }
    else{

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Falha ao tentar alterar Palavra-passe.';
    header('location:principal.php');
    }
    }
    }
    //echo '<div class="alert alert-success alert-dismissible">
                    //    <button type="button" class="close" 
                         // data-dismiss="alert">&times;</button>
                    //<strong>Salvo com Sucesso.</sctrong>
                //</div>';

////////////////////////////
if(isset($_POST['upfoto']) ){

    if(isset($_FILES["foto"]["name"]) && ($_FILES["foto"]["name"])!=''){
//$foto = $_GET['foto'];
$size = $_FILES["foto"]["size"];
$tempname = $_FILES["foto"]["tmp_name"];
$type = $_FILES["foto"]["type"];
$filename = $_FILES["foto"]["name"];
$pasta = "image/".$filename;
//para deletar a foto antiga
unlink("image/$old_image");

move_uploaded_file($tempname, $pasta);


$qrUp = "UPDATE productos SET imagem = '$pasta' WHERE id_productos = '$codProd' ";

$qractualiza = $mysqli->query($qrUp) or die($mysqli->error);

if($qractualiza){
$_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Imagem actualizada com sucesso.';
header('location:produto.php');

}else{
          $_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Falha ao tentar actualizar imagem.';
header('location:produto.php');
       
}

}
else{
      $_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Nenhuma imagem foi actualizada.';
header('location:produto.php');
        $filename = $old_image;
}





}

//mysqli_close($mysqli); 
    ?>