<?php
include("../Class/conexao.php");
require("../Class/verifica.admin.php");
            if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin']))


$codigo = intval($_GET['id']);
$cod = $_GET['cod'];
$temp = $_GET['temp'];
$nome_prod = $_GET['nom_prod'];
?>
<!DOCTYPE html>
<html lang="PT-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar Categoria</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="scripts/jquery-3.3.1.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="estilo.css">
        <link rel="stylesheet" href="../bootstrap/fontawsome/css/all.css">
</head>
<body id="pag">
<script>
$(document).ready(function(){
$('#btnclear').click(function() {
$('input[type="text"]').val('');
$('.clear').val('');
});
});


</script>
<?php
$codiespera = $_POST['codigoEspera'];
$nom_prod = $_POST['nomeprod'];
$tempo = $_POST['tempo'];

if(isset($_GET['id'])){

if($_POST){

    if($codiespera == '' || $nom_prod == '' || $tempo == ''){

        echo "<script>alert('Preencha todos campos.');location.href='edit_categoria.php'</script>";
    
    }else{

        $qr = "UPDATE categoria SET codigo_espera = '$codiespera', tempo = '$tempo', nome_prod = '$nom_prod' WHERE id_Codigo_Tempo_espera = '$codigo' ";

        $consulta = $mysqli->query($qr) or die($mysqli->error);

        if($consulta){

            echo "<script>alert('reistro actualizada com sucesso.');location.href='../categoria.php';</script>";

        }
        else{
            echo "<script>alert('Falha ao tentar actualizar registo.');location.href='../categoria.php';</script>";
           
        }
    }

}

} else{
    echo "<script>alert('Codigo invalido');location.href='../principal.php';</script>";

}

?>
        <header>
            
                <div class="left-area">
                        <h3>Zav <span>Zavala</span></h3>
                        
                    </div>
                    <div class="right-area">
                        <a href="../principal.php" class="logout_btn">Inicio</a>
                        <a href="../categoria.php" class="ver">voltar</a>
                    </div>
        </header>
<br><br><br><br>
<div class="container">
        <h1>Actualizar Categoria</h1>
<div class="row">
    <div class="col-sm-4">
    <form action="edit_categoria.php" id="frmClientes" method="POST">
    <label for="">Nome</label>
<input type="text" class="form-control input-sm" value="<?php echo $nome_prod; ?>" maxlenght="20" id="nom_prod" name="nomeprod">

            <label for="">Codigo</label>
<input type="text" class="form-control input-sm" value="<?php echo $cod; ?>" maxlenght="5" id="codigo" name="codigoEspera">
<label for="">Tempo de espera</label>
<input type="text" class="form-control input-sm" value="<?php echo $temp; ?>" maxlenght="10" id="tempo" name="tempo">
                <p></p>
                
                <a>
                <input class="btn btn-success" name="update" type="submit" value="Actualizar">
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#">
        <div class="btn btn-info" id="btnclear" ><i class="fas fa-pencil"></i>Limpar</div>
                </a>

        </form>
    </div>
   
</body>
</html>