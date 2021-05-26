<?php
 require_once("../Class/verifica.php");
            if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])) 
include("../Class/conexao.php");

include("scuser.php");

$cod = $_GET['codigoU'];
$pass = $_GET['pass'];
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
       
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar" id="pag">
<?php
//CODIGO

if(isset($_POST['upPass'])){
    

    $senha = $_POST['senha'];
  
    if($senha == ''){
            echo "<script>alert('Insira a nova Palavra-passe.');location.href='edit_pass_user.php';</script>"; 
    }
    else{
    $qr = "UPDATE usuarios SET senha='$senha' WHERE id_usuarios= '$cod' ";

    $sql = $mysqli->query($qr) or die($mysqli->error);

if($sql){

echo " <script>alert('Palavra-passe alterada com sucesso.'); location.href='edit_pass_user.php';</script>";
}
else{

    echo "<script>alert('Falha ao tentar alterar Palavra-passe');location.href='edit_pass_user.php';</script>";
}

}

}
$sql_code = "SELECT * FROM usuarios where id_usuarios ='$iduser' LIMIT 1";

$consulta = $mysqli->query($sql_code) or die($mysqli->error);

$total = mysqli_num_rows($consulta);
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
                    <a class="navbar-brand" href="Principal.php">
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
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                            <div class="dropdown-menu animated zoomIn">
                                <ul class="mega-dropdown-menu row">
<div class="col-md-5">ALIMENTACAO</div>  <div class="col-md-4"></div>
                                <div class="col-md-3"><h4>Valor de hoje: </h4><br><?php echo $gasto;?>Mt</div>  
                                <br>
                            <div class="col-md-8">
                                 <form action="process.php" id="frmClientes" method="POST">
            <label for="">Valor:</label>
<input type="text" class="form-control input-sm" id="gasto" name="gasto">

                <p></p>
                
                <a>
                <input class="btn btn-success" name="btnAdd" type="submit" value="Salvar">
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#">
        <div class="btn btn-info" id="btnclear" ><i class="fas fa-pencil"></i>Limpar</div>
                </a>

        </form>
                            </div>
            </div>      
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Search -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="fad fa-close"></i></a> </form>
                        </li>
                       
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
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-desktop"></i><span class="hide-menu">Pagina inicial</span></a>
                            <ul aria-expanded="false" class="collapse">
                               
                                <li><a href="Principal.php">Pagina inicial</a></li>
                                
                                
                            </ul>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fab fa-wpforms"></i><span class="hide-menu">Formularios</span></a>
                            <ul aria-expanded="false" class="collapse">
                               
                                <li><a href="EntradaProductouser.php">Entrada de producto</a></li>
                                
                                
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">tabelas</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="minhasvendas.php">Vendas do dia</a></li>
                                <li><a href="todasvendas.php">Todas Vendas</a></li>
                            
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
                    <h3 class="text-primary">Nova Palavra-passe</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                                <h4>MEUS DADOS</h4>

 <form action="" id="frmClientes" method="POST" enctype="multipart/form-data">

            <label for="nome">Palavra-passe</label>
            <input type="text" activated class="form-control input-sm" value="<?php echo $pass;?>" id="Senha" name="Senha">

                            <p></p>                     
                            
                            <a>
                 <input class="btn btn-primary" name="upPass" type="submit" value="Alterar">
                            </a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="Principal.php">
                    <div class="btn btn-warning" id="btnclear"><i class="far fa-remove-all">Cancelar</i></div>
                            </a>
            
                    </form>
                            </div>

                                <div class="card-body">

<table class="table table-hover" id="id_da_tabela">
                        <thead id='tabela'>
                            <tr>
                                
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Apelido</th>
                                <th>E-mail</th>                                
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                        if($total!=0){
                 
                         while($result = mysqli_fetch_assoc($consulta))
                        
                         echo
                                "<tr>
                                   
                                    <td>".$result['id_usuarios']."</td>
                                    <td> ".$result['nome']."</td>
                                    <td> ".$result['apelido']."</td>
                                    <td> ".$result['email']."</td>              
                                </tr>";
                        }
                        else{
                                echo "Nao ha registros";


                        }
                                ?>

                            
                        </tbody>

                     </table>

                                
                </div><!--Fim card-body-->



                
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
    <script src="js/lib/jquery/jquery.min.js"></script>
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

<script type="text/javascript" src="reset.js"></script>
</body>

</html>
?>