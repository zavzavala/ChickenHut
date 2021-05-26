                <?php
               require("../Class/verifica.admin.php");
            if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin']))

    include("../Class/conexao.php");
    include("scuser.php");
error_reporting(0);
    if(isset($_POST['pesqPosto'])){

            $posto = $_POST['posto'];

        if($posto == ''){

        echo "<script>alert('Campo vazio. Fim da pesquisa.');</script>";
            echo "<script>window.location='principaladmin.php';</script>";

        }else{

         $somahp = "SELECT *,
                    sum(total) as totalVenda 
                FROM orders 
                WHERE date(Data) = date(current_date) AND posto ='$posto' AND YEAR( Data ) = YEAR( current_date )";
                
                $VendaHp = $mysqli->query($somahp) or die($mysqli->error);
                
                $rh = $VendaHp->fetch_object();
                

                $sqltodasp = "SELECT *,
    sum(total) as todasVendas
    FROM orders WHERE posto ='$posto' AND YEAR( Data ) = YEAR( current_date )";
    $tdsp = $mysqli->query($sqltodasp) or die($mysqli->error);

    $todas = $tdsp->fetch_object();

    $sqlSemanap = "SELECT *,
    sum(total) as todasemana
    FROM orders where week(Data) = week(current_date) AND posto ='$posto' AND YEAR( Data ) = YEAR( current_date )";

    $tsemanap = $mysqli->query($sqlSemanap) or die($mysqli->error);
     $todasemana = $tsemanap->fetch_object();

    $sqlmesp = "SELECT MONTHNAME(Data) as mes, posto,
    sum(total) as totalVenda 
    FROM orders WHERE posto ='$posto' AND YEAR( Data ) = YEAR( current_date ) GROUP BY MONTH(Data)";
    $resultmes = $mysqli->query($sqlmesp) or die($mysqli->error);
 
 $resM = $resultmes->fetch_object();


    $qrmesp = "SELECT *, 
    sum(total) as totalVenda 
    FROM orders where month(Data) = month(current_date) AND posto ='$posto' AND YEAR( Data ) = YEAR( current_date )";
    $resmesp = $mysqli->query($qrmesp) or die($mysqli->error);

    $resM = $resmesp->fetch_object();

               $somadp = "SELECT *,
                sum(total) as totalVenda 
                FROM orders 
                WHERE date(Data) = date(current_date) AND posto ='$posto' AND YEAR( Data ) = YEAR( current_date )";
                
                $resultadodp = $mysqli->query($somadp) or die($mysqli->error);
                
                $resd = $resultadodp->fetch_object();

/////////////////////////////////PESQUISAS POR POSTO//////////////////////////
 $qrMesB = "SELECT SUM( total ) AS totalB
FROM bebida

WHERE MONTH(Data) = MONTH(current_date ) 
AND posto ='$posto' AND YEAR( Data ) = YEAR( current_date )";

$resmesBebidas = $mysqli->query($qrMesB) or die($mysqli->error);

$resMBebidas = $resmesBebidas->fetch_object();

$Mbebidas=$resMBebidas->totalB;
//echo $Mbebidas;
//////////////
$qrDB = "SELECT SUM( total ) AS totalB
FROM bebida

WHERE DATE(Data) = DATE(current_date ) 
AND posto ='$posto' AND YEAR( Data ) = YEAR( current_date )";

$resDiaBebidas = $mysqli->query($qrDB) or die($mysqli->error);

$DiaBebidas = $resDiaBebidas->fetch_object();

////////////////TODOS
$qrSomaB = "SELECT SUM( total ) AS totalB
FROM bebida

WHERE posto ='$posto' AND YEAR( Data ) = YEAR( current_date )";

$reSomaBebidas = $mysqli->query($qrSomaB) or die($mysqli->error);

$SomaBebidas = $reSomaBebidas->fetch_object();
//////////SEMANA

$qrsemana = "SELECT SUM( total ) AS totalB
FROM bebida
WHERE WEEK(Data) = WEEK(current_date ) 
AND posto ='$posto' AND YEAR( Data ) = YEAR( current_date )
";
            
            $resultadoSemanaB = $mysqli->query($qrsemana) or die($mysqli->error);
            
            $resSemanaB = $resultadoSemanaB->fetch_object();

//////////DIA
 
            
////////////SO FAST FOODS///////////////////////
$Mbebidas=$resMBebidas->totalB;

$Dbebidas=$DiaBebidas->totalB;

$Tbebidas=$SomaBebidas->totalB;

$Sbebidas=$resSemanaB->totalB;

$qrMesFF = "SELECT SUM( total ) AS totalFF
FROM orders
WHERE MONTH(Data) = MONTH(current_date ) 
AND posto ='$posto' AND YEAR( Data ) = YEAR( current_date )";

$resmesFF = $mysqli->query($qrMesFF) or die($mysqli->error);

$resMFoodd = $resmesFF->fetch_object();

$resMFood =$resMFoodd->totalFF;

$resMFF =$resMFood-$Mbebidas;

//echo $resMFF;
//////////////
$qrDFF = "SELECT SUM( total ) AS totalFF
FROM orders

WHERE DATE(Data) = DATE(current_date) 
AND posto ='$posto' AND YEAR( Data ) = YEAR( current_date )";

$resDiaFF = $mysqli->query($qrDFF) or die($mysqli->error);

$DiaFFood = $resDiaFF->fetch_object();

$resDFood =$DiaFFood->totalFF;

$DiaFF =$resDFood-$Dbebidas;
////////////////TODOS
$qrSomaFF = "SELECT SUM(total) AS totalFF
FROM orders

WHERE YEAR( Data ) = YEAR( current_date ) AND posto ='$posto' ";

$reSomaFF = $mysqli->query($qrSomaFF) or die($mysqli->error);

$SomaFFood = $reSomaFF->fetch_object();

$resTFood =$SomaFFood->totalFF;

$SomaFF =$resTFood-$Tbebidas;
//////////SEMANA

$qrsemanaFF = "SELECT SUM( total ) AS totalFF
FROM orders

WHERE week(Data) = week(current_date)
AND posto ='$posto' AND YEAR( Data ) = YEAR( current_date )";
            
            $resultadoSemanaFF = $mysqli->query($qrsemanaFF) or die($mysqli->error);
            
            $resSemanaFFood = $resultadoSemanaFF->fetch_object(); 


$ressemanaFood =$resSemanaFFood->totalFF;

$resSemanaFF =$ressemanaFood-$Sbebidas;
//////////DIA

              $posto = "SELECT posto FROM posto WHERE posto = '$posto' ";
$post = $mysqli->query($posto) or die($mysqli->error);
  $postos = $post->fetch_object();



}
    }
              $posto = "SELECT * FROM posto";
$post = $mysqli->query($posto) or die($mysqli->error);

$options = "";
while($linha = mysqli_fetch_array($post)){
$options = $options."<option>$linha[1]</option>";
            }

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

                                        <li><a href="../login/logoutAdmin.php"><i class="fa fa-power-off"></i> Sair</a></li>
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
                            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Tabelas</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="vendaStory.php">Vendas deste mes</a></li>
                                    <li><a href="alimentacaoMensal.php" Tooltip="alimentacao de Usuarios">Alimentacao</a></li>
                                    <li><a href="vendaDiaria.php">Vendas de hoje</a></li>
                                    <li><a href="vendaSemanal.php" Tooltip="Ver vendas desta Semana">Vendas da semana</a></li>
                                   
                                    
                                </ul>
                            </li>
                            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fab fa-chart"></i><span class="hide-menu">Graficos<span class="label label-rouded label-info pull-right">3</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="graficoMensal.php">Mensal</a></li>
                                    <li><a href="graficoAnual.php" Tooltip="Dados Anuais">Anual</a></li>  
                                    <li><a href="graficoDiario.php" Tooltip="Dados Diarios">Diario</a></li> 
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
            <!-- Page wrapper Menu -->

            <div class="page-wrapper">
                <!-- Bread crumb -->

                <div class="row page-titles">

                    <div class="col-md-5 align-self-center fix-header">
                        <h3 class="text-primary">
                            <form action="principaladmin.php" method = "POST">
                            <select name="posto" placeholder="Pesquisar por posto...">
                                <option ></option>
                                <?php echo $options;?>
                            </select>

                                <input type="submit" class="btn btn-primary" value="Pesquisar" name="pesqPosto">
                            </form>
                        </h3> </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="principaladmin.php">Ver todas vendas</a></li>
                            <li class="breadcrumb-item active">Posto: <?php 
                                    if(isset($postos->posto)){
                                        echo $postos->posto;

                                    }else{
                                            echo "Todos postos.";
                                    }
                             ?></li>
                        </ol>
                    </div>
                </div><!-- fim Page-tittles -->
                <!-- End Bread crumb -->
                <!-- Container fluid  -->
                <div class="container-fluid"  id="myGroup">
                    <!-- Start Page Content -->
                    <p>
                    <button class="btn btn-outline-primary " activeted="true" type="button" data-toggle="collapse" data-target="#geral"
                    aria-expanded="false" aria-controls="collapses">
                        Geral
                    </button>
                    <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#bebidas"
                    aria-expanded="false" aria-controls="collapses">
                        Bebidas
                    </button>
                    <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#fastfoods"
                    aria-expanded="false" aria-controls="collapses">
                        Fast Foods
                    </button>
                    </p>
                    <div class="collapse" id="geral" data-parent="#myGroup">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card bg-primary p-20">
                                <div class="media widget-ten">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-bag f-s-40"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h2 class="color-white">Total: 

                                        <?php 
                                            if($resM->totalVenda){
                                                echo "$resM->totalVenda MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                      ?>

                                        </h2>
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
                                        <h2 class="color-white">Total: 

                                        <?php 
                                            if($rh->totalVenda){
                                                echo "$rh->totalVenda MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                       ?>
                                        </h2>
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

                                        <h2 class="color-white">Total: <?php 
                                                      if($todasemana->todasemana){
                                                echo "$todasemana->todasemana MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                       ?>


                                        </h2>
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
                                        <h2 class="color-white"><?php 
                                               if($todas->todasVendas){
                                                echo "$todas->todasVendas MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                    ?>
                                        </h2>
                                        <p class="m-b-0">Vendas do Ano</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div> <!--Fim do collapse Group do botao 1-Geral-->
                   


                        <!-- Inicio do collapse Group do botao 2-Bebidas-->
                   <div class="collapse" id="bebidas" data-parent="#myGroup">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card bg-primary p-20">
                                <div class="media widget-ten">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-bag f-s-40"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h2 class="color-white">Total: 

                                        <?php 
                                            if($resMBebidas->totalB){
                                                echo "$resMBebidas->totalB MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                      ?>

                                        </h2>
                                         <h2 class="color-white">Lucro: 

                                        <?php 
                                            if($resMBebidas->lucro){
                                                echo "$resMBebidas->lucro MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                      ?>

                                        </h2>
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
                                        <h2 class="color-white">Total: 

                                        <?php 
                                            if($DiaBebidas->totalB){
                                                echo "$DiaBebidas->totalB MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                       ?>
                                        </h2>
                                         <h2 class="color-white">Lucro: 

                                        <?php 
                                            if($DiaBebidas->lucro){
                                                echo "$DiaBebidas->lucro MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                       ?>
                                        </h2>
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

                                        <h2 class="color-white">Total: <?php 
                                                      if($resSemanaB->totalB){
                                                echo "$resSemanaB->totalB MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                       ?>
                                        </h2>
                                        <h2 class="color-white">Lucro: <?php 
                                                      if($resSemanaB->lucro){
                                                echo "$resSemanaB->lucro MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                       ?>
                                        </h2>
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
                                        <h2 class="color-white"><?php 
                                               if($SomaBebidas->totalB){
                                                echo "$SomaBebidas->totalB MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                    ?>
                                        </h2>
                                        <h2 class="color-white">Lucro:<?php 
                                               if($SomaBebidas->lucro){
                                                echo "$SomaBebidas->lucro MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                    ?>
                                        </h2>
                                        <p class="m-b-0">Vendas do Ano</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    </div> <!--Fim do collapse Group do botao 2-Bebidas-->
                     <!-- Inicio do collapse Group do botao 3-->
                   <div class="collapse" id="fastfoods" data-parent="#myGroup">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card bg-primary p-20">
                                <div class="media widget-ten">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-bag f-s-40"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <h2 class="color-white">Total: 

                                        <?php 
                                            if($resMFF){
                                                echo "$resMFF MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                      ?>

                                        </h2>
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
                                        <h2 class="color-white">Total: 

                                        <?php 
                                            if($DiaFF){
                                                echo "$DiaFF MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                       ?>
                                        </h2>
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

                                        <h2 class="color-white">Total: <?php 
                                                      if($resSemanaFF){
                                                echo "$resSemanaFF MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                       ?>


                                        </h2>
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
                                        <h2 class="color-white"><?php 
                                               if($SomaFF){
                                                echo "$SomaFF MT";
                                                }else{
                                                 echo "0 MT";
                                                }
                                    ?>
                                        </h2>
                                        <p class="m-b-0">Vendas do Ano</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div> <!--Fim do collapse Group do botao 3-->
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
                                                    <td><?php echo $drink->preco;?> Mzn</td>
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
                                                    <td><?php echo $food->preco;?> Mzn</td>
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
                                                <div class="meaasge-date"><?php echo $mostra2->posto;?></div>
                                                <p class="f-s-12">Activos</p>
                                                  
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
                                                <div class="meaasge-date"><?php echo $mostra->posto;?></div>
                                                <p class="f-s-12">Activos</p>
                                                  
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
                                    <h4>Todos</h4>
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
                                                <div class="meaasge-date"><?php echo $mostra->posto;?></div>
                                                <p class="f-s-12">Activos</p>
                                                  
                                            </div>

                                        
                                        </div>
                                        <?php endwhile;?>
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