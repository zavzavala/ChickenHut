            <?php
            require("../Class/verifica.admin.php");
            require_once("../Class/verifica.php");
            if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser']) or isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin'])) 

include("../Class/conexao.php");
//include_once("cart.php");

$sql = "SELECT * FROM productos WHERE tipo_prod != 'bebida'";

$qr = $mysqli->query($sql) or die($mysql->error);

$total = mysqli_num_rows($qr);


if(isset($_POST['btnSearch'])){

$pesquisa = $_POST['pesquisar'];

if($pesquisa == '')
{
echo "<script>alert('Campo vazio. Fim da pesquisa');location.href='principal.php'</script>"; 
}
else{
    $qrpesuisa = "SELECT * FROM productos WHERE nome like '$pesquisa' or descricao like '$pesquisa' 
    AND tipo_prod != 'bebida'";

    $qr = $mysqli->query($qrpesuisa) or die($mysqli->error);

    $total = mysqli_num_rows($qr);

}

}
$qrgasto="SELECT sum(gasto) as gasto FROM `gasto_usuario` WHERE date(data) = date(current_date) and id_usuario='$iduser'";

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

  
     <link rel="stylesheet" type="text/css" href="estilo1.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar" id="bod">
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
                            <div class="col-md-6">
                                 <form action="process.php" id="frmClientes" method="POST">
            <label for="">Valor:</label>
<input type="number" class="form-control input-sm" id="gasto" name="gasto">

                <p></p>
                
                <a>
                <input class="btn btn-success" name="btnAdd" type="submit" value="Salvar">
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="principal.php">
        <div class="btn btn-info" id="btnclear" ><i class="fas fa-pencil"></i>Cancelar</div>
                </a>

        </form>
                            </div>

                           

            </div>      


                            </div>



                        </li>
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                                      <!-- Carrinho/cart -->
                        <li class="nav-item dropdown">
                          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
<div class="mr-auto"></div>
<div class="navbar-nav">
<a href="cart.php" class="nav-item nav-link active">
<h5 class="px-5 cart">
<i class="fas fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger"></span>
</h5>
</a>
</div>
<div></div>
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
                       
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fab fa-wpforms"></i><span class="hide-menu">Formularios</span></a>
                            <ul aria-expanded="false" class="collapse">
                               
                                <li><a href="EntradaProductouser.php">Entrada de producto</a></li>
                                
                                <li><a href="drinks.php">Bebidas</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">tabelas</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="minhasvendas.php">Vendas do dia</a></li>
                                
                            <li><a href="todasvendas.php">Todas Vendas</a></li>
                            </ul>
                        </li>
                        
<li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Meus dados</span></a>
<ul aria-expanded="false" class="collapse">
                            
                            <li><a href="user_pass.php">Alterar palavra-passe</a></li>

                            </ul>
                       

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
             <div style="display: <?php if(isset($_SESSION['showAlert'])){echo 
                    $_SESSION['showAlert'];}else{ echo "none"; } unset($_SESSION['showAlert']);?>" class="alert alert-info alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php if(isset($_SESSION['message'])){echo 
                    $_SESSION['message'];} unset($_SESSION['showAlert']);?></strong>
                </div>
                <div id="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                   
                        <a class="text-primary" href="drinks.php">
                        <button class="btn btn-primary"><i class="fa fa-drink">LISTA DE BEBIDAS</i></button>
                    </a>
                    </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="principal.php">Menu</a></li>
                        <li class="breadcrumb-item active" ><a href="principal.php"></a>Fast Foods</li>
                        <li class="breadcrumb-item" ><a href="../login/logout.php">Sair</a></li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
             <div class="row">
            <div class="col-md-8"> 
                 <form action = "principal.php" method="POST" >
                         <input type="text" placeholder="Pesquisar aqui" name = "pesquisar">
                      <input type="submit" name="btnSearch" class="btn btn-primary" value="Pesquisar">
                                </form>
                </div>
            </div>
                <!-- Start Page Content -->
            <div class="row">
            <?php
              if($total!=0){
            
    while($ln = mysqli_fetch_assoc($qr)):
        ?>
        
                <div class="col-lg-4">
                <div class="card-body">
                    <div class="card">
                    <div class="card-title">
                    <div class="media">
                     <img alt="..." width="100" height="100" src=<?php echo $ln['imagem']?> class="media-object"/> <br /> &nbsp;&nbsp;
                    <br>

                  <h4 style="color:red;">Nome: <?php echo $ln['nome'] ?></h4>
                  
                    </div>
                    <div class="media"> 
                    
                  <h3 style="color:blue;">Descrição : <?php echo $ln['descricao']?></h3>
                    </div>
                    <div class="media">
                    <h2 style="color:orange;"> Preço  : <?php echo $ln['preco']?> Mt</h2>
                    </div>
                    <form action="" class="form-submit" >
                    <input type="hidden" class="pid" name="" value="<?php echo $ln['id_productos']?>">
                    <input type="hidden" class="pname" name="" value="<?php echo $ln['nome']?>">
                    <input type="hidden" class="tipo" name="" value="outro">
                    <input type="hidden" class="pprice" name="" value="<?php echo $ln['preco']?>">
                    <input type="hidden" class="pimage" name="" value="<?php echo $ln['imagem']?>">
                    <input type="hidden" class="pcode" name="" value="<?php echo $ln['descricao']?>">
                    <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;Adicionar ao carrinho</a>
                    </button>
                </form>
                
                        </div>

                    </div><!--card-->
                </div><!--card-body-->
                
                </div><!--FIM COL-LG-3-->
<?php

endwhile;
}
else{
echo "Nao ha productos.";
echo '<br>';
    echo "<a href='principal.php'>Sair</a>";

    }
    
    ?>

                    </div><!--row-->
</div><!--FIM DIV CONTAINER-FLUID-->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2020 All rights reserved. Template designed by <a href="#">Zavala</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
   
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <!--<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
     slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>


    <script src="js/custom.min.js"></script>
   <!-- <script src="dataTables/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="dataTable.js"></script>
<script type="text/javascript" src="reset.php"></script>-->

 <script type="text/javascript">
            $(document).ready(function(){
                $(".addItemBtn").click(function(e){
                    e.preventDefault();
                    var $form = $(this).closest(".form-submit");
                    var pid = $form.find(".pid").val();
                    var pname = $form.find(".pname").val();
                    var pprice = $form.find(".pprice").val();
                    var pimage = $form.find(".pimage").val();
                    var pcode = $form.find(".pcode").val();
                    var tipo = $form.find(".tipo").val();
                    $.ajax({
                        url: 'action.php',
                        method:'POST',
                        data:{pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode,tipo:tipo},
                        success:function(response){
                               $("#message").html(response);
                               window.scrollTo(0,0);
                                load_card_item_number();
                        }
                    });
                });
                load_card_item_number();

                function load_card_item_number(){
                    $.ajax({
                    url:'action.php',
                    method:'get',
                    data:{cartItem:"cart_item"},
                    success:function(response){
                        $("#cart-item").html(response);

                    }
                    });

                }
            });
        </script>
</body>

</html>