<?php 
$titulo="Login";
include $_SESSION["root"].'includes/header.php';

?>
<body>
	<div class="container" >
		<div id="principal" >

			<form action="postLogin" method="POST" class="center-block">

				<div class="row">					
					<h1  class="text-center">Sistema DW1 - Script</h1>
					<?php if(isset($_SESSION["flash"]["msg"])){
							if($_SESSION["flash"]["sucesso"]==false)
								echo"<div class='bg-danger text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							else{
								echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							}
						} ?>
					<div class="col-md-4 col-md-offset-4 text-center">
						<div class="form-group">
							<label for="login">Login:<span class="requerido">*</span></label>
							<input type="text" name="login" class="form-control" id="login" 
								value="<?php if(isset($_SESSION["flash"]["login"]))echo $_SESSION["flash"]["login"];?>">
						</div>
						<div class="form-group">
							<label for="pwd">Senha:<span class="requerido">*</span></label>
							<input type="password" name="senha" class="form-control" id="pwd">
						</div>
					</div>					
		  		</div>

  				<button type="submit" class="btn btn-default center-block">Entrar	</button>
			</form>
		</div>
	</div>	
<?php 
	include $_SESSION["root"].'includes/footer.php';
	if(isset($_SESSION["flash"])){
		foreach ($_SESSION["flash"] as $key => $value) {
			unset($_SESSION["flash"][$key]);	
		}
	}
	
?>
