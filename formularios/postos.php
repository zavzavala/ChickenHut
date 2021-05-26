            <?php
            require_once("../Class/verifica.php");
            if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])) 
include("../Class/conexao.php");
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

    <link href="bootstrap/fontawsome/css/all.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
 <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="style.css">
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
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                            <div class="dropdown-menu animated zoomIn">
                                <div class="mega-dropdown-menu row">
                                <div class="col-md-12">
                                <h4>VENDAS DO DIA</h4>
<?php 
$sql = "SELECT id_venda, id_usuarios, nome, preco, quantidade, total, 
data_venda as Data
FROM venda 
WHERE DATE(data_venda) = DATE(current_date) and id_usuarios='$iduser'";


$result = $mysqli->query($sql) or die($mysqli->error);


?>
                    <table class="table table-striped" id="id_da_tabela">
                        <thead>
                            <tr>
                                <th>venda</th>
                                <th>Usuario</th>
                                <th>producto</th>
                                <th>preco</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                                <th>Dada</th>
                                <th>Accoes</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php while($linha = $result->fetch_object()):?>
                                    <tr>
                                            <td><?php echo $linha->id_venda;?></td>
                                            <td><?php echo $linha->id_usuarios;?></td>
                                            <td><?php echo $linha->nome;?></td>
                                            <td><?php echo $linha->preco;?></td>
                                            <td><?php echo $linha->quantidade;?></td>
                                            <td><?php echo $linha->total;?></td>
                                            <td><?php echo $linha->Data;?></td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-primary" >Comprovante</button>
                                                <button type="button" class="btn btn-xs btn-success">Relatorio</button>
                                            </td>
                                        </tr>
                                        <?php endwhile;?>
                                <!-- Inicio Modal -->
                            
                                <!-- Fim Modal -->
                        </tbody>
                     </table>
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
                                    
                                    <li><a href="#"><i class="ti-settings"></i> Definicoes</a></li>
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
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fas fa-desktop"></i><span class="hide-menu">Dashboard <span class="label label-rouded label-primary pull-right">2</span></span></a>
                                <ul aria-expanded="false" class="collapse">
                                   <li><a href="todasvendasAdmin.php">Todas Vendas</a></li>
                                    <li><a href="principaladmin.php">Inicio </a></li>
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
                                <li><a href="alimentacaoMensal.php" Tooltip="alimentacao de Usuarios">Alimentacao</a></li>
                                <li><a href="vendaDiaria.php">Vendas de hoje</a></li>
                                <li><a href="vendaSemanal.php" Tooltip="Ver vendas desta Semana">Vendas da semana</a></li>
                               
                                
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
                <div class="row">
                    <div class="col-md-3">
                        <div class="card bg-primary p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-bag f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white">Total: <?php echo $resM->totalVenda?>MT</h2>
                                    <p class="m-b-0">VENDAS DESTE MES</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-pink p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-comment f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white">Total: <?php echo $rh->totalVenda;?>MT</h2>
                                    <p class="m-b-0">VENDAS DO DIA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-vector f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">

                                    <h2 class="color-white">Total: <?php echo $todasemana->todasemana;?>MT</h2>
                                    <p class="m-b-0">Vendas da Semana</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-danger p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-location-pin f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $todas->todasVendas;?>MT</h2>
                                    <p class="m-b-0">Todas vendas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
               <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>DRINKS/BEBIDAS</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover " id="id_da_tabeladrink">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Preco</th>
                                                <th>Descricao</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <?php while($drink=$dr->fetch_object()):?>
                                                <td><?php echo $drink->nome;?></td>
                                                <td><?php echo $drink->preco;?></td>
                                                <td><?php echo $drink->descricao;?></td>
                                            </tr>
                                            <?php endwhile;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
                        <!-- /# card -->
                    
                    <!-- /# column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>FAST FOODS</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover " id="id_tabela">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Preco</th>
                                                <th>Descricao</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($food =$fd->fetch_object()):?>
                                            <tr>
                                                <td><?php echo $food->nome;?></td>
                                                <td><?php echo $food->preco;?></td>
                                                <td><?php echo $food->descricao;?></td>
                                            </tr>
                                     <?php endwhile;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--fim row-->
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Relatorio Mensal</h4>

                            </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-striped" id="id_da_tabelames">
                        <thead>
                            <tr>
                                <th>Mes</th>
                                <th>Total</th>
                                <th>Accoes</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php while($linha = $resultmes->fetch_object()):?>
                                    <tr>
                                            <td><?php echo $linha->mes;?></td>
                                            <td><?php echo $linha->totalVenda;?></td>
                                            
                                            <td>
                                                <button type="button" class="btn btn-xs btn-primary" >Comprovante</button>
                                                <button type="button" class="btn btn-xs btn-success">Relatorio</button>
                                            </td>
                                        </tr>
                                        <?php endwhile;?>
                                <!-- Inicio Modal -->
                            
                                <!-- Fim Modal -->
                        </tbody>
                     </table>
                     </div> <!--Fim table-responsive-->
                </div><!--Fim card-body-->
                    </div>
                    <!-- /# column -->
                </div>
                </div>
                <!-- /# row -->


                <div class="row">

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-title">
               
                            <h4>Usuarios</h4>
                            </div>
                            <div class="card-body">
                                <div class="recent-meaasge">
                                <?php while($mostra2 = $pega2->fetch_object()):?>
                                    <div class="media">
                                                 
                                        <div class="media-left">
                                            <a href="#"><img alt="..." src="<?php echo 'images/avatar/1.jpg'; ?>" class="media-object"></a>
                                        </div>
                                        <div class="media-body">
                    

                       
                                            <h4 class="media-heading"><?php echo $mostra2->nome;?></h4>
                                            <div class="meaasge-date"><?php echo $mostra2->Posto;?></div>
                                            <p class="f-s-12">Vendas de Hoje</p>
                                              
                                        </div>

                                    
                                    </div>
                                    <?php endwhile;?>
                                </div>

                            </div>

                    </div>
                    </div>
                    
                    <!-- /# column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-title">
                                <h4>Usuarios</h4>
                            </div>
                            <div class="card-body">
                                <div class="recent-meaasge">
                                <?php while($mostra = $pega->fetch_object()):?>
                                    <div class="media">
                                                 
                                        <div class="media-left">
                                            <a href="#"><img alt="..." src="<?php echo 'images/avatar/1.jpg'; ?>" class="media-object"></a>
                                        </div>
                                        <div class="media-body">
                    

                       
                                            <h4 class="media-heading"><?php echo $mostra->nome;?></h4>
                                            <div class="meaasge-date"><?php echo $mostra->Posto;?></div>
                                            <p class="f-s-12">Vendas de Hoje</p>
                                              
                                        </div>

                                    
                                    </div>
                                    <?php endwhile;?>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-title">
                                <h4>Todo</h4>
                            </div>
                            <div class="todo-list">
                                <div class="tdl-holder">
                                    <div class="tdl-content">
                                        <ul>
                                            <li class="color-primary">
                                                <label>
                                                <input type="checkbox"><i class="bg-primary"></i><span>Post three to six times on Twitter.</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                            </li>
                                            <li class="color-success">
                                                <label>
                                                <input type="checkbox" checked><i class="bg-success"></i><span>Post one to two times on Facebook.</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                            </li>
                                            <li class="color-warning">
                                                <label>
                                                <input type="checkbox" checked><i class="bg-warning"></i><span>Follow back those who follow you</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                            </li>
                                            <li class="color-danger">
                                                <label>
                                                <input type="checkbox" checked><i class="bg-danger"></i><span>Connect with one new person</span>
                                                <a href='#' class="ti-close"></a>
                                            </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <input type="text" class="tdl-new form-control" placeholder="Type here">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

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
<script type="text/javascript">
    

$(document).ready(function(){
    $('#id_da_tabeladrink').DataTable({
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