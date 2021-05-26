<?php

require_once("../Class/verifica.php");
  if(isset($_SESSION['iduser']) && !empty($_SESSION['iduser']))

?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
  <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen wibbbbbinitial-scale=1">-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="ZAVALA">
    <title>Carrinho</title>
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="bootstrap/fontawsome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="alertify/css/alertify.min.css">
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">

<!-- Brand-->

<!-- Toggler/collapsibe Button-->
    <button class="navbar-toggler" type="button" data-toggler="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>   
    </button>

    <!-- Navbar links-->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
            <a class="nav-link" href="Checkout.php">Checkout</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="cart.php"><i class="fas fa-shopping-cart"></i><span id="cart-item" class="badge badge-danger"></span></a>
            </li>
        </ul>
    </div>

</nav>

<div class = "container">

<div class="row justfy-content-center">
    <div class="col-lg-10">
    <div style="display: <?php if(isset($_SESSION['showAlert'])){ echo $_SESSION['showAlert']; }else{ echo 'none';}  unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php if(isset($_SESSION['message'])){ echo $_SESSION['message'];}unset($_SESSION['showAlert']); ?></strong>
    </div>
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                    <td colspan="8">
                        <h4 class="text-center text-info m-0">Produtos no carrinho!</h4>
                    </td>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Produto</th>
                    <th>Descricao</th>
                    <th>Preco</th>
                    <th>Quantidade</th>
                    <th>Preco total</th>
                    <th>
                    <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Tem certeza que deseja limpar o carrinho?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;
                    Esvaziar carrinho</a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php require("../Class/conexao.php");
                $stmt = $mysqli->prepare("SELECT * FROM cart");
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while($row = $result->fetch_assoc()):
                ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?php echo $row['id'];?>">
                <td><img src="<?php echo $row['imagem'] ?>" width="50"></td>
                <td><?php echo $row['nome'] ?></td>
                <td><?php echo $row['descricao'] ?></td>
                <td><?php echo number_format($row['preco'],2) ?>&nbsp;&nbsp;<i class="">Mzn</i></td>
                <input type="hidden" class="pprice" value="<?php echo $row['preco'] ?>">
                <td><input type="number" name="" class="form-control itemQty" 
                value="<?php echo $row['quantidade']; ?>" style="width:75px;"></td>
                <td><?php echo number_format($row['total'],2) ?>&nbsp;&nbsp;<i class="">Mzn</i>
                </td>
                <td>
                    <a href="action.php?remove=<?php echo $row['id'];?>" class="text-danger lead" onclick="return confirm('Tem certeza que deseja eliminar este item?');"><i class='fas fa-trash-alt'></i></a>
                </td>
                
                
            </tr>
            <?php $grand_total +=$row['total'];?>
        <?php endwhile; ?>
        <tr>
        <td colspan="4">
            <a href="principal.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;Continuar comprando</a>
        </td>
        <td colspan="2"><b>Grande Total</b></td>
        <td><?php echo number_format($grand_total,2) ?>&nbsp;&nbsp;<i class="">Mzn</i></td>
        <td>
            <a href="Checkout.php" class="btn btn-info <?php echo ($grand_total>1)?"":"disabled"; ?>"  ><i class="fas fa-credit-card"></i>&nbsp;Criar venda</a>
        </td>
        </tr>
                </tbody>
            </table>
        </div>
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

                $(".itemQty").on('change', function(){
                    var $el = $(this).closest('tr');
                    var pid = $el.find(".pid").val();
                    var pprice = $el.find(".pprice").val();
                    var quantidade = $el.find(".itemQty").val();
                    //console.log(qty); Para ver na consola do navegador.
                    location.reload(true);
                    $.ajax({
                        url:'action.php',
                        method:'POST',
                        cache:false,
                        data:{quantidade:quantidade,pid:pid,pprice:pprice},
                        success: function(response){
                            console.log(response);
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