                <?php
                include("../Class/conexao.php");
             require("../Class/verifica.admin.php");
            if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin']))

                    error_reporting(0);

                $id_post = intval($_GET['codigop']);
                $post = $_GET['post'];
                $enderec = $_GET['enderec'];
                $contact = $_GET['telefone'];
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
        <script type="text/javascript" src="alertify/alertify.min.js"></script>
                <link rel="stylesheet" href="dataTables/DataTables/css/jquery.dataTables.min.css">
                <link rel="stylesheet" href="dataTables/datatables.min.css">
             <link rel="stylesheet" href="alertify/css/alertify.min.css" />
            
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
                        <h3 class="text-primary">Atualizar Postos</h3> </div>
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
                            <div class="card">
                                <div class="card-title">
                                    <h4>ATUALIZAR POSTO</h4>

                                </div>
                                    <div class="card-body">
                                    
                    </div><!--Fim card-body-->

    <form action = "" id="frmposto" method="POST" class="form-submit">
            <label for="posto">Posto:</label>
    <input type="text" class="form-control input-md posto" name="posto" value="<?php echo $post;?>" id="posto" >

                <label for="">Endereco:</label>
    <input type="text" class="form-control input-md endereco" name="endereco" value="<?php echo $enderec;?>" maxlength="50" id="endereco">
    <label for="contacto">Contacto:</label>
    <input type="tel" class="form-control input-md contacto" name="contacto" maxlength="13" id="contacto" value="<?php echo $contact;?>" >
                    <p></p>
                    
                    <input class="btn btn-success" name="update" type="submit" value="Atualizar">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="btn btn-warning" name="cancela" type="submit" value="Cancelar">

            </form>

                    
                        </div>
                        <div>
                          
                        </div>
                        <!-- /# column -->
                    </div>

         
                </div>
          <!-- estees -->
                    
                        </div>
                        <!-- /# column -->
                    </div>


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
            <!-- End Page wrapper  -->
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

             <script src="../bootstrap/bootstrap-validate.js"></script>
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
          <script src="checkdelete.js"></script>
           
            <script src="alertify/alertify.min.js"></script>
            
            <!--<script type="text/javascript">
                $(document).ready(function(){
                    $(".update").click(function(e){
                        e.preventDefault();

                        var $form= $(this).closest(".form-submit");
                        var posto = $form.find(".posto").val();
                        var endereco = $form.find(".endereco").val();
                        var contacto = $form.find(".contacto").val();

                        $.ajax({
                            url: ' ',
                            method: 'POST',
                            data:{posto:posto, endereco:endereco, contacto:contacto},
                            success:function(r){
                                //$("#message").html(response);
                                window.scrollTo(0,0);
                              
                                
                            }

                        });
                    });
                });


            </script>-->
            

    </body>

    </html>

    <?php



    if(isset($_POST['update'])){
        
            $posto = ucfirst($_POST['posto']);
            $endereco = ucfirst($_POST['endereco']);
            $contacto = $_POST['contacto'];
            

            if($posto == '' || $contacto == '+258' || $contacto == ''|| $endereco == ''){
                  
            echo "<script>alert('Preencha todos campos.')</script>";
            echo" <script>window.location='User_posto.php'</script>";

            }

            else{

            $sqltempo = "UPDATE posto SET id_posto = $id_post, posto = '$posto', 
            endereco ='$endereco', contacto ='$contacto'
            WHERE id_posto = $id_post";
        
            $sql = $mysqli->query($sqltempo) or die($mysqli->error);    

       
            if($sql){
        //echo "<script>alert('Posto atualizado com sucesso.')</script>";
                $_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Posto atualizado com sucesso.';
    echo "<script>window.location='User_posto.php'</script>";

        }
        else{
            echo "<script>alert('Falha ao tentar inserir dados.')</script>";
            echo" <script>window.location='User_posto.php'</script>";
        }

        }
    }
       if(isset($_POST['cancela'])){
         $_SESSION['showAlert'] = 'block';
$_SESSION['message'] = 'Cancelado';
header('location:User_posto.php');
       }
   
    ?>