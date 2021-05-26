
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    <script src="reset.js"></script>
       
        <link rel="stylesheet" href="bootstrap/fontawsome/css/all.css">
        <link rel="stylesheet" type="text/css" href="formularios/style.css">
</head>
<body>
<div class="Responsive">
 
	<div class="container">
               
    <h2 class="font-weight-normal" style="color:darkgreen; text-align:center;">Acesso ao sistema</h2>
    <br>
    <h2 style="color:darkgreen; text-align:center;"><a href="index.php">Usuario</a></h2>
    
	<div class="col-md-6">

	<form action = "login/logarAdmin.php" method = "POST">
				
		<div class="row">
			<label class="label ">Administrador</label>
			
				<input type="text" name="admail" class=" form-control">
			
		</div>
		<div class="row">
			<label class="label">Palavra-passe</label>
			
				<input type="password" name="senha" class="form-control" placeholder="Insira a Palavra-passe">
				
		</div>
	<br>
    <div class="row">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </div>
	

	</form>

	</div>
	</div>
</div>



  <script src="jquery-3.3.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      <!--<script type="text/javascript">
        	$(document).ready(function(){
        		$(".entra").click(function(e){
        			//e.preventDefault();
        			var $form = $(this).closest(".form-submit");
        			var senha = $form.find(".senha").val();
        			var email = $form.find(".email").val();
        		
 
        			$.ajax({
        				url: 'login/logar.php',
        				method:'POST',
        				data:{senha:senha,email:email},
        				success:function(response){
        					   $("#message").html(response);
        					   window.scrollTo(0,0);
                             	
        				}
        			});
        		});
        		
        		});
        </script>-->
</body>
</html>