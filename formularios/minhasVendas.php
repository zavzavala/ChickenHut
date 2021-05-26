            <?php
            require_once("../Class/verifica.php");
            if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])) 
include("../Class/conexao.php");


 $somah = "SELECT 
            sum(total) as totalVenda 
            FROM orders 
            WHERE date(data) = date(current_date) and id_user = '$iduser'";
            
            $VendaH = $mysqli->query($somah) or die($mysqli->error);
            
            $rh = $VendaH->fetch_object();

            $qrgasto="SELECT sum(gasto) as gasto FROM `gasto_usuario` WHERE date(data) = date(current_date) and id_usuario='$iduser' ";

            $gasto = $mysqli->query($qrgasto) or die($mysqli->error);
             $lngasto = mysqli_fetch_assoc($gasto);
                                $gasto = $lngasto['gasto'];

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
 <!-- Custom CSS -->
    <link href="estilo.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
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
                    <a class="navbar-brand" href="principal.php">
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
                                <div class="mega-dropdown-menu row">
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
                <a href="minhasvendas.php">
        <div class="btn btn-info" id="btnclear" ><i class="fas fa-pencil"></i>Cancelar</div>
                </a>

        </form>
                            </div>
            </div>      
            </div>      


                            </div>



                        </li>
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
                                    
                                    <li><a href="ADMIN.php"><i class="ti-settings"></i> ADMIN</a></li>
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
                        <li class="nav-label">menu Principal</li>
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-desktop"></i><span class="hide-menu">Pagina inicial</span></a>
                            <ul aria-expanded="false" class="collapse">
                               
                                <li><a href="Principal.php">Inicio</a></li>
                                
                                
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
                    <h3 class="text-primary">Dashboard</h3> </div>
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
                <div class="col-md-3">
                        <div class="card bg-pink p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-comment f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-left">
                                    <h2 class="color-white">Total: <?php echo $rh->totalVenda;?> MT</h2>
                                    <p class="m-b-0">VENDAS DO DIA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php 
$sql = "SELECT *
FROM orders 
WHERE DATE(data) = DATE(current_date) and id_user = '$iduser' ";


$result = $mysqli->query($sql) or die($mysqli->error);

?>

                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>VENDAS DO DIA</h4>
                    <table class="table table-striped" id="tabela">
                        <thead>
                            <tr>
                                <th>venda</th>
                                <th>produtos</th>                               
                                <th>Pagamento</th>
                                <th>Dinheiro</th>
                                <th>Total</th>
                                <th>Trocos</th>
                                <th>Dada</th>
                                <th>Accoes</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php while($linha = $result->fetch_object()):?>

                                    <?php echo
                                    "
                                    <tr>
                                            <td>$linha->id</td>
                                            <td>$linha->produtos</td>
                                            <td>$linha->pagamento</td>
                                            <td>$linha->dinheiro Mzn</td>
                                            <td>$linha->total Mzn</td>
                                            <td>$linha->trocos Mzn</td>
                                            <td>$linha->Data</td>
                                            <td>
                                <a href='imprimir.php?id=$linha->id&posto=$linha->posto&data=$linha->Data&produtos=$linha->produtos&dinheiro=$linha->dinheiro'>
                                
                                                <button type=\"button\" class=\"btn btn-xs btn-primary\" >Comprovante</button></a>
                                                <button type=\"button\" class=\"btn btn-xs btn-success\">Relatorio</button>
                                            </td>
                                        </tr>";

                        ?>
                                        <?php endwhile;?>
                                <!-- Inicio Modal -->
                            
                                <!-- Fim Modal -->
                        </tbody>
                     </table>
</div></div></div></div></div>
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
    <script type="text/javascript" src="reset.php"></script>
<script type="text/javascript">
    

$(document).ready(function(){
    $('#tabela').DataTable({
        "language":{
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "Nenhum registro encontrado",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Sem registros disponiveis",
            "infoFiltered": "(filtrado de _MAX_ registros no total)"
        }
           

    });
  
});
</script>
</body>

</html>