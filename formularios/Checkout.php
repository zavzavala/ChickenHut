<?php
require_once("../Class/verifica.php");
require('../Class/conexao.php');
  if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser']))
  	error_reporting(0);
  	$post="SELECT posto.posto FROM `posto`, usuarios WHERE usuarios.id_posto=posto.id_posto AND usuarios.id_usuarios ='$iduser' limit 1 ";
$qp = $mysqli->query($post) or die($mysqli->error);
$lnposto = mysqli_fetch_assoc($qp); 
$posto=$lnposto['posto'];
$grand_total = 0;
$grand_totalB =0;
$trocos = 0;
$valor = 0;
$allItems = '';
$items = array();
$bebidas = '';
$itemsbebidas = array();

$sql = "SELECT CONCAT(nome,'(',quantidade,')') AS ItemQty, total FROM cart";
$stmt = $mysqli->prepare($sql);
$stmt ->execute();
$stmt = $stmt->get_result();

while($row = $stmt->fetch_assoc()){
$grand_total +=$row['total'];
$items[] = $row['ItemQty'];

}
//echo $grand_total;
//print_r($items);
$allItems = implode(", ", $items);

////////////////////////BEBIDAS
$sqlB = "SELECT CONCAT(nome,'(',quantidade,')') AS ItemQty, total FROM cart WHERE tipo != 'outro' ";
$stmtB = $mysqli->prepare($sqlB);
$stmtB ->execute();
$stmtB = $stmtB->get_result();

while($row = $stmtB->fetch_assoc()){
$grand_totalB +=$row['total'];
$itemsbebidas[] = $row['ItemQty'];

}
//echo $grand_total;
//print_r($items);
$bebidas = implode(", ", $itemsbebidas);

//echo $allItems;
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
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">

<!-- Toggler/collapsibe Button-->
	<button class="navbar-toggler" type="button" data-toggler="collapse" data-target="#collapsibleNavbar">
	<span class="navbar-toggler-icon"></span>	
	</button>

	<!-- Navbar links-->
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
			<a class="nav-link" href="principal.php">Produtos</a>
			</li>
			
			<li class="nav-item">
			<a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger"></span></a>
			</li>
		</ul>
	</div>

</nav>
<br>
<div class = "container">

<div class="row justify-content-center">
<div style="display: <?php if(isset($_SESSION['showAlert'])){ echo $_SESSION['showAlert']; }else{ echo 'none';}  unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php if(isset($_SESSION['message'])){ echo $_SESSION['message'];}unset($_SESSION['showAlert']); ?></strong>
    </div>
	<div class="col-lg-6 px-4 pb-4" id="Order">
		<h4 class="text-center text-info p-2">Completar Venda</h4>

		<div class="jumbotron p-3 mb-2 text-center">
		<h6><b>Produto(s) :</b>&nbsp;<?php echo $allItems;?></h6>
		<!--<h6 class="lead"><b>Trocos : </b>&nbsp;<?php //echo $trocos;?> Mzn</h6>-->
		<h5><b>Valor a pagar : </b>&nbsp;<?php echo number_format($grand_total,2);?> Mzn</h5>
		</div>
		<form action="" method="POST" id="placeOrder">
			<input type="hidden" name="produtos" value="<?php echo $allItems; ?>">
			<input type="hidden" name="bebidas" value="<?php echo $bebidas; ?>">
			<input type="hidden" name="grand_total" value="<?php echo $grand_total;?>">
			<input type="hidden" name="grand_totalB" value="<?php echo $grand_totalB;?>">
			<div class="form-group">
			<input type="hidden" name="user" value="<?php echo $iduser;?>">
			<input type="hidden" name="posto" value="<?php echo $posto;?>">
			<input type="hidden" name="trocos" value="<?php echo $trocos;?>">
			
				<h6 class="text-center lead">Como deseja pagar?</h6>
				<div class="form-group">
					<select name="pmode" class="form-control">
						<option value="" selected disabled>Selecione forma de pagamento		
					</option>
					<option value="dinheiro">Dinheiro</option>
					<option value="M-Pesa">M-Pesa</option>
					<option value="POS">POS</option>
					
					</select>
					<br>
					<input type="text" class="col-md-12" name="valor" placeholder="Insira o valor...">
				</div>
						
				<div class="form-group">
					<input type="submit" name="submit" value="Concluir" class="btn btn-danger btn-block">
				</div>
			</div>
		</form>
			
	</div>
</div>

</div>
 <script src="../jquery-3.3.1.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="js/lib/bootstrap/js/popper.min.js"></script>
        <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
       
            
            <script src="alertify/alertify.min.js"></script>
        <script type="text/javascript">
        	$(document).ready(function(){

        		$('#placeOrder').submit(function(e){
        			e.preventDefault();
        			$.ajax({
        				url:'action.php',
        				method:'POST',
        				data: $('form').serialize()+"&action=Order",
        				success: function(response){
        					$("#Order").html(response);
        				}
        			});
        		})
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