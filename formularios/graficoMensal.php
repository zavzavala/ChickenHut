<?php
require("../Class/verifica.admin.php");
            if(isset($_SESSION['idadmin']) && !empty($_SESSION['idadmin']))
 
    include("../Class/conexao.php");

  
  $consultChart = "SELECT MONTHNAME(Data) as mes, year(Data) as ano,
sum( total ) as total 
FROM orders where YEAR( Data ) = YEAR( current_date ) GROUP BY MONTHNAME( Data )";
  $resultado = $mysqli->query($consultChart) or die($mysqli->error);
  $chart_data = '';

  while($row = mysqli_fetch_array($resultado))
  {

    $chart_data .="{mes:'".$row["mes"]."', ano:".$row["ano"].", total:".$row["total"]."}, ";

  }
      $chart_data = substr($chart_data, 0, -2);   

                 ?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
  <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen wibbbbbinitial-scale=1">-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="ZAVALA">
    <title>Sistema</title>
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="bootstrap/fontawsome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="alertify/css/alertify.min.css">
   <link rel="stylesheet" type="text/css" href="../morris/morris/morris.css">
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">

<!-- Toggler/collapsibe Button-->
<a href="principaladmin.php">
    <button class="navbar-toggler" type="button" data-toggler="collapse" data-target="#collapsibleNavbar">
    <span class="fa fa-power-off"></span>   
    </button>
</a>
    <!-- Navbar links-->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link active" href="principaladmin.php">Sair</a>
            </li>

        </ul>
    </div>

</nav>
<br>
<div class = "page-wrapper">

     <div class="Container-fluid" style = "width: 900px;">
                    <div class = "row">
    
    <div class="col-md-12 col-lg-12">
                    <h2 align="center" style="color:darkblue;">Dados Mensais</h2>
                    <br><br>
                    <div id="chart"></div>
                </div>
</div>
</div>
    </div>
</div>

</div>
 <script src="../jquery-3.3.1.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="js/lib/bootstrap/js/popper.min.js"></script>
        <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../morris/morris/morrs.min.js"></script>
<script type="text/javascript" src="../morris/morris/morris.js"></script>
<script type="text/javascript" src="../raphael/raphael/raphael.min.js"></script>
    <script>
   Morris.Bar({

element : 'chart',
data:[<?php echo $chart_data; ?>],
xkey:'mes',
ykeys:['total'],
labels:['total'],
hideHover:'auto',
   });
    </script>
</body>
</html>