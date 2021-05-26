                <?php
                include("../Class/conexao.php");
               require("../Class/verifica.admin.php");
            if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin']))

                    error_reporting(0);
                    $id_categoria=intval($_GET['id']);
                      $c_espera=$_GET['c_espera'];
                        $temp=$_GET['temp'];
                          $categ=$_GET['categ'];
       
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
                <link rel="stylesheet" href="dataTables/datatables.min.css">
            
                <link rel="stylesheet" href="../dataTables/DataTables/css/dataTables.bootstrap.min.css">
           
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
        <!--[if lt IE 9]>
        <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body class="fix-header fix-sidebar">
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
                        <a class="navbar-brand" href="index.php">
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
                            
                        </ul>
                        <!-- User profile and search -->
                        <ul class="navbar-nav my-lg-0">

                           
                            <!-- Profile -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                                <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                    <ul class="dropdown-user">
                                        <li><a href="#"><i class="fa fa-user"></i> perfil- <?php echo $nomeUser;?></a></li>
                                        
                                        <li><a href="#"><i class="ti-settings"></i> Definicoes</a></li>
                                        <li><a href="#"><i class="fa fa-power-off"></i> Sair</a></li>
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
                        <div class="col-lg-12">
                        
                                <div id="message"></div>
                               <div class="card">
                               <div class="card-title">
                                    <h4>ATUALIZAR CATEGORIA</h4>

                                </div>
                                    <!--Fim card-body-->

    <form action="" class="form-submit" method="POST" id="frmClientes">
            <label for="nom_prod">Nome</label>
    <input type="text" class="form-control input-md nomeProd" name="nomeProd" value="<?php echo $categ;?>" maxlenght="10" id="nom_prod" >

                <label for="">Codigo</label>
    <input type="text" class="form-control input-md codigo" name="codigo" value="<?php echo $c_espera;?>" maxlenght="5" id="codigo" >
    <label for="">Tempo de espera</label>
    <input type="text" class="form-control input-md tempo" name="tempo" value="<?php echo $temp;?>" maxLenght="10" id="tempo" >
                    <p></p>
                    
                    <a>
                    <input class="btn btn-success" name="updateCateg" type="submit" value="Atualizar">
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="categoria.php" >
            <div class="btn btn-info" id="btnclear"><i class=""></i>Cancelar</div>
                    </a>

            </form>       
                        </div>
                        <!-- /# column -->
                    </div>

         
        </div>
                </div><!--FIM DIV ROW-->
          <!-- estees -->
                    
                        </div>
                        <!-- /# column -->
                    </div><!-- End Page wrapper  -->


                    </div>
                    <!-- /# row -->


    </div><!--FIM DIV ROW-->

    </div><!--FIM DIV CONTAINER-FLUID-->
                    <!-- End PAge Content -->
                </div>
                <!-- End Container fluid  -->
                <!-- footer -->
                <footer class="footer"> © 2020 All rights reserved. Template designed by <a href="#">Zavala</a></footer>
                <!-- End footer -->
           
        </div>
        <!-- End Wrapper -->
        <!-- All Jquery -->
      <script src="scripts/jquery-3.3.1.js"></script>
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
        <script src="reset.js"></script>
        <script type="text/javascript" src="alertify/alertify.min.js"></script>
        <script src="checkdelete.js"></script>
            <!--<script src="alertify/css/alertify.min.css"></script>
            <script src="alertify/css/themes/semantic.min.css"></script>
            <script src="alertify/alertify.min.js"></script>
            -->
    <script>
    $(document).ready(function(){
        $('#id_da_tabela').DataTable({
            "language":{
                "lengthMenu": "Mostrando _MENU_ registros por pagina",
                "zeroRecords": "Nenhum registro encontrado",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Sem registros disponiveis",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
               

        });
        
    });
    </script><!---
    <script type="text/javascript">
        $(document).ready(function(){
            $(".btnAdd").click(function(e){
                  //e.preventDefault();
                  var $form = $(this).closest(".form-submit");
                  var nomeProd = $form.find(".nomeProd").val();
                  var codigo = $form.find(".codigo").val();
                  var tempo = $form.find(".tempo").val();

                  $.ajax({
                    url: 'prod.php',
                    method: 'post',
                    data: {nomeProd:nomeProd,codigo:codigo,tempo:tempo},
                    success:function(response){
                        $("#message").html(response);
                        window.scrollTo(0,0);
                    }

                  });

              });
          

        });


   
        </script>---->
        
    </body>

    </html>
    <?php

error_reporting(0);
//////////EDIT_CATEGORIA.PHP

    if(isset($_POST['updateCateg'])){
     
        $codiespera = $_POST['codigo'];
    $nom_prod = $_POST['nomeProd'];
    $tempo = $_POST['tempo'];

        if($codiespera == '' || $nom_prod == '' || $tempo == ''){
echo "<script>
            
            alert('Preencha os campos para prosseguir.');
        location.href='edit_categoria.php';
            
            </script>";
           
         }
             else{
    $qr = "select codigo_espera from categoria where codigo_espera='$codiespera' ";
                $qr2 = $mysqli->query($qr) or die($mysqli->error);
                 $cod = mysqli_fetch_assoc($qr2);
                $codC = $cod['codigo_espera'];

                if($codC){
       
echo "<script>
            
            alert('Ja existe um registro com este codigo.Verifique.');
        location.href='categoria.php';
            
            </script>";
    }else{
          
    $qrcateg = "UPDATE categoria SET `codigo_espera` = '$codiespera', `nome_prod` = '$nom_prod', `tempo` = '$tempo' 
    WHERE id_Codigo_Tempo_espera = '$id_categoria'";

            $consultaCateg = $mysqli->query($qrcateg) or die($mysqli->error);

            //$consulta=mysqli_num_rows($consult);

            if($consultaCateg){

               
           echo "<script>
            
            alert('Categoria atualizada com sucesso.');
        location.href='categoria.php';
            
            </script>";
               }else{
              
    echo "<script>
            
            alert('Ocorreu um erro.Verifique.');
        location.href='categoria.php';
            
            </script>";
               }
           
    }


           }
      }

    ?>