            <?php
            require_once("../Class/verifica.php");
            if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])) 
include("../Class/conexao.php");
//include("cart.php");
$sql = "SELECT * FROM productos WHERE tipo_prod = 'bebida' ";

$qr = $mysqli->query($sql) or die($mysqli->error);

$total = mysqli_num_rows($qr);

$qrCount="SELECT count(*) as tot_bebidas FROM productos WHERE tipo_prod = 'bebida'";

$consultaCount = $mysqli->query($qrCount) or die($mysql->error);

$totalCount = $consultaCount->fetch_object();

if(isset($_POST['btnSearch'])){

$pesquisa = $_POST['pesquisar'];

if($pesquisa == '')
{
echo "<script>alert('Campo vazio. Fim da pesquisa');location.href='drinks.php'</script>"; 
}
else{
    $qrpesuisa = "SELECT * FROM productos WHERE nome like '$pesquisa' OR descricao like '$pesquisa' and
  tipo_prod = 'bebida' ";

    $qr = $mysqli->query($qrpesuisa) or die($mysqli->error);
    $total = mysqli_num_rows($qr);

$qrCount="SELECT count(*) as tot_bebidas FROM productos WHERE nome like '$pesquisa' OR descricao like '$pesquisa' 
 and tipo_prod = 'bebida'";

$consultaCount = $mysqli->query($qrCount) or die($mysql->error);

$totalC = $consultaCount->fetch_object();
}

}
///////////////////


if(isset($_POST['contar'])){

$conta = $_POST['conta'];

if($conta == '')
{
echo "<script>alert('Campo vazio. Fim da pesquisa');location.href='drinks.php'</script>"; 
}
else{
    $qrConta = "SELECT * FROM productos WHERE tipo='$conta'";

    $qr = $mysqli->query($qrConta) or die($mysqli->error);
    $total = mysqli_num_rows($qr);

   $qrCount="SELECT count(*) as tot_bebidas FROM productos WHERE tipo_prod = 'bebida'";

$consultaCount = $mysqli->query($qrCount) or die($mysql->error);

$totalCount = $consultaCount->fetch_object();

}

}


//categofria
/*
$categoria = "SELECT * FROM categoria";
$cat = $mysqli->query($categoria) or die($mysqli->error);

$options = "";
while($linha = mysqli_fetch_array($cat)){
$options = $options."<option>$linha[2]</option>";
}
*/


/////////////////////////

$qrgasto="SELECT gasto FROM `gasto_usuario` WHERE id_usuario='$iduser'";

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

    <link rel="stylesheet" href="dataTables/DataTables/css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="../dataTables/DataTables/css/dataTables.bootstrap.min.css">
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
                                <div class="col-md-3"><h4>Valor: </h4><br><?php echo $gasto;?>Mt</div>  
                                <br>
                            <div class="col-md-8">
                                 <form action="process.php" id="frmClientes" method="POST">
            <label for="">Valor:</label>
<input type="text" class="form-control input-sm" id="gasto" name="gasto">

                <p></p>
                
                <a>
                <input class="btn btn-success" name="btnAdd" type="submit" value="Salvar">
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="drinks.php">
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

                        <!-- Search 
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            <form class="app-search" action = "drinks.php" type = "POST">
                                <input type="text" class="form-control" placeholder="Search here" name = "pesquisar"> <a class="srh-btn"><i class="far fa-close"></i></a> 
                                        <li><input type="submit" name="btnSearch" class="btn btn-primary" value="Pesquisar"></li>
                                </form>
                        </li>-->
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
                                
                                <li><a href="principal.php">Fast Foods</a></li>
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
                     <a class="text-primary" href="principal.php">
                        <button class="btn btn-primary"><i class="far fa-food">LISTA DE FAST FOODS</i></button>
                    </a>  </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Total da pesquisa: <?php 
                        if(isset($totalC->tot_bebidas)){

                        echo $totalC->tot_bebidas;
                         echo"<li class=\"breadcrumb-item\"><a href=\"drinks.php\">Todos</a></li>";
                    }else{
                        echo"<li class=\"breadcrumb-item\"><a href=\"principal.php\">Sair</a></li>";

                    }
                        ?></a></li>
                        <li class="breadcrumb-item active" style="color:yellowgreen">Total bebidas: <?php 
                        if(isset($totalCount->tot_bebidas) ){
                                echo $totalCount->tot_bebidas;
                        }
                        else{
                        echo "<li class=\"breadcrumb-item active\" style=\"color:yellowgreen\">0</li>";
                            }
                    ?></li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-8"> 
            
                 <form action = "drinks.php" method="POST" >
            <input type="text" placeholder="Pesquisar aqui" id="pesquisar" name = "pesquisar" onkeyup="muda(this)" size="60" style="width: 910px;">
                      <input type="submit" name="btnSearch" class="btn btn-primary" value="Pesquisar">
                                </form><br>

                                <form action = "drinks.php" method="POST" >
                                 <select name = "conta" id="conta" placeholder="Pesquisar bebidas..." class="form-control input-md" style="width: 910px;">
                   <option value="" class="">Pesquisar bebidas...</option>
                   <option>Agua</option>
                   <option>Bebida doce</option>
                  <option>Bebida alcoolica</option>
                    </select>
                      <input type="submit" name="contar" class="btn btn-success" value="Pesquisar">
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
                    <input type="hidden" class="tipo" name="" value="<?php echo $ln['tipo_prod']?>">
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
echo "Nao ha produtos.";
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
        <script>
    $(function() {
        $('#pesquisar').keyup(function() {
            var encontrou = false;
            var termo = $(this).val().toLowerCase();
            $('div > h2 > h3').each(function() {
                $(this).find('h4').each(function() {
                    if($(this).text().toLowerCase().indexOf(termo) > -1)
                        encontrou = true;
                });
                if(!encontrou)
                    $(this).hide();
                else
                    $(this).show();
                encontrou = false;
            });
        });
    });

</script>
</body>

</html>