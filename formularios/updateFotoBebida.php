            <?php
           require("../Class/verifica.admin.php");
            if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin']))

include("../Class/conexao.php");
error_reporting(0);
         $id_bebida=intval($_GET['id']);
         $nom=$_GET['nome'];
         
include("scuser.php");

                ?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon.png">
    <title>Bem vindo!!! - Sistema</title>
 <script src="js/lib/jquery/jquery.min.js"></script>
    <link href="bootstrap/fontawsome/css/all.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="dataTables/DataTables/css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="../dataTables/DataTables/css/dataTables.bootstrap.min.css">
       <script type="text/javascript" src="checkdelete.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
<?php

$sql_code = "SELECT * FROM productos WHERE tipo_prod = 'bebida'";

$qr = $mysqli->query($sql_code) or die($mysqli->error);

$total = mysqli_num_rows($qr);

$qrCount="SELECT count(*) as total_bebidas FROM productos WHERE tipo_prod = 'bebida'";

$consultaCount = $mysqli->query($qrCount) or die($mysql->error);

$totalCount = $consultaCount->fetch_object();
//mysqli_close($mysqli);
//$nome_prod = $_POST['categoria'];
?>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="principaladmin.php">
                        <!-- Logo icon -->
                        <b><img src="../img/logo.png" alt="homepage" class="dark-logo" style="width:50px;" /></b>
                        <!--End Logo icon -->
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- Messages -->
                        
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                       
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="fa fa-user"></i> perfil- <?php echo $nomeUser;?></a></li>
                                    
                              
                                    <li><a href="../login/logout.php"><i class="fa fa-power-off"></i> Sair</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Menu Principal</li>
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fas fa-desktop"></i><span class="hide-menu">Dashboard <span class="label label-rouded label-primary pull-right">1</span></span></a>
                                <ul aria-expanded="false" class="collapse">
                                   <li><a href="todasvendasAdmin.php">Todas Vendas</a></li>
                                    
                                </ul>
                            </li>
                            
                            
                            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Postos <span class="label label-rouded label-danger pull-right">1</span></span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="USER_POSTO.php">Posto</a></li>
                                    
                                   
                                </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fab fa-wpforms"></i><span class="hide-menu">Formularios</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="Categoria.php">Categoria</a></li>
                                <li><a href="Produto.php">Productos</a></li>
                                <li><a href="EntradaProducto.php">Entrada de producto</a></li>
                                <li><a href="Principal.php">Formulario de Usuarios</a></li>
                                
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">tabelas</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="vendaStory.php">vendas deste mes</a></li>
                                <li><a href="alimentacaoMensal.php" tooltip="alimentacao de Usuarios">Alimentacao</a></li>
                                <li><a href="vendaDiaria.php">Vendas de hoje</a></li>
                                <li><a href="vendaSemanal.php" tooltip="Ver vendas desta Semana">Vendas da semana</a></li>
                               
                                
                            </ul>
                        </li>
                        
                        <li class="nav-label">EXTRA</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Paginas <span class="label label-rouded label-success pull-right">1</span></span></a>
                            <ul aria-expanded="false" class="collapse">

                                <li><a href="#" class="has-arrow">Autenticacao <span class="label label-rounded label-success">3</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="../index.php">Login</a></li>
                                        <li><a href="user.php">Registar</a></li>
                                        <li><a href="usuarios.php">Usuarios</a></li>
                                    </ul>
                                </li>
                                
                            </ul>
                        </li>
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fab fa-facebook btn-pulse"></i><span class="hide-menu">facebook</span></a>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <a class="text-primary" href="produto.php">
                        <button class="btn btn-primary"><i class="far fa-food">Adicionar Produto</i></button>
                    </a>  </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                       <li class="breadcrumb-item active" style="color:yellowgreen"><a href="javascript:void(0)">Tem
                            <?php

                            if(isset($totalCount->total_bebidas) ){
                                echo $totalCount->total_bebidas;
                        }
                        else{
                        echo "<li class=\"breadcrumb-item active\" style=\"color:yellowgreen\">0</li>";
                            } 
                            ?> variedades de bebidas
                        </li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->

                    <div class="col-lg-12">
                    
                        <div class="card">
                            <div class="card-title">
                                <h4>ATUALIZAR IMAGEM</h4>
                                </div>
<form action="" id="frmClientes" class="form-submit" method="POST" enctype="multipart/form-data">

           
           <div class="row">
            <div class="col">
                    <div class="form-group">
                  <label for="nome" value=""><?php echo $nom; ?></label>
            
                    </div>
            
                     <div class="form-group">
                  
            <input type="file" name="foto">
                    </div>
            </div>
           
                    </div>
                           <br>
                           <br>                     
                            
                            <a>
                 <input class="btn btn-primary " name="updateFoto" type="submit" value="Atualizar">
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="Bebidas.php">
                            <input class="btn btn-warning " name="cancela" type="submit" value="Cancelar">
                    
                            </a>
            
                    </form>

</div>
                            </div>

                    </div> <!---fim card-body-->

                    </div>
                    <!-- /# column -->
                </div>




                </div>
                <!-- /# row -->




</div><!--FIM DIV CONTAINER-FLUID-->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2020 All rights reserved. Template designed by <a href="#">Zavala</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
   
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>


    <script src="js/lib/datamap/d3.min.js"></script>
    <script src="js/lib/datamap/topojson.js"></script>
    <script src="js/lib/datamap/datamaps.world.min.js"></script>
    <script src="js/lib/datamap/datamap-init.js"></script>

    <script src="js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="js/lib/weather/weather-init.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>


    <script src="js/lib/chartist/chartist.min.js"></script>
    <script src="js/lib/chartist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/lib/chartist/chartist-init.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="dataTables/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="dataTable.js"></script>
<!---<script type="text/javascript">
        $(document).ready(function(){
            $(".Addbebida").click(function(e){
                  //e.preventDefault();
                  var $form = $(this).closest(".form-submit");
                  var nome = $form.find(".nome").val();
                  var tipo = $form.find(".tipo").val();               
                   var descricao = $form.find(".descricao").val();
                  var preco = $form.find(".preco").val();
                
                  var foto = $form.find(".foto").val();

                  $.ajax({
                    url: 'prod.php',
                    method: 'post',
                    data: {nome:nome,tipo:tipo,descricao:descricao,preco:preco,foto:foto},
                    success:function(response){
                        $("#message").html(response);
                        window.scrollTo(0,0);
                    }

                  });

              });
          

        });


   
        </script>-->
<script type="text/javascript" src="reset.js"></script>
</body>

</html>
<?php
error_reporting(0);
if(isset($_POST['updateFoto']) ){
    
  $filename = $_FILES["foto"]["name"];
    $tempname = $_FILES["foto"]["tmp_name"];
    $folder = "image/".$filename;
    //echo $folder;
    move_uploaded_file($tempname, $folder);
   
    if($filename == ''){
            
echo "<script>
            
            alert('Selecione imagem para prosseguir...');
        location.href='updateFotoBebida.php';
            
            </script>";
            
    }
    
            if(!$codCB){
   
     $query = "UPDATE productos SET imagem = '$folder' WHERE id_productos = '$id_bebida'";

    $actualiza = $mysqli->query($query) or die($mysqli->error);
   
    
if($actualiza){

echo "<script>
            
            alert('imagem atualizada com sucesso.');
        location.href='bebidas.php';
            
            </script>";
}
else{
    echo "<script>
            
            alert('Falha ao tentar atualizar imagem.');
        location.href='bebidas.php';
            
            </script>";
  
 
 }

}

}

if(isset($_POST['cancela'])){
$_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = "Cancelado!";
    header('location:bebidas.php'); 
    }


?>


