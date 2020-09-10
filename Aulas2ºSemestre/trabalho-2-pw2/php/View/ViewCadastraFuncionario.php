<?php
$titulo = "Cadastrar Funcionario";
include $_SESSION["root"] . 'includes/header.php';
?>

<body>
	<div class="container">
		<!-- add no menu -->
		<?php include $_SESSION["root"] . 'includes/menu.php'; ?>
		<!-- fim menu -->
		<div id="principal">
			<?php if ( isset($_SESSION["flash"]["editar"]) ) echo "<h1 class='text-center'>Edição de Funcionário</h1>";
				  else echo "<h1 class='text-center'>Cadastro de Funcionário</h1>";
			?>

			<form action="<?php if ( isset($_SESSION["flash"]["editar"]) ) echo "postEditaFuncionario"; else echo "postCadastraFuncionario" ?>" method="POST">
				<div class="row">
					<?php if (isset($_SESSION["flash"]["msg"])) {
						if ($_SESSION["flash"]["sucesso"] == false)
							echo "<div class='bg-danger text-center msg'>" . $_SESSION["flash"]["msg"] . "</div>";
						else {
							echo "<div class='bg-success text-center msg'>" . $_SESSION["flash"]["msg"] . "</div>";
						}
					} ?>
					<div class="col-md-6">
						<div class="form-group">
							<label for="email">Login:<span class="requerido">*</span></label>
							<input type="login" name="login" class="form-control" id="login" value="<?php if (isset($_SESSION["flash"]["login"])) echo $_SESSION["flash"]["login"]; ?>">
						</div>
						<div class="form-group">
							<label for="pwd">Senha:<span class="requerido">*</span></label>
							<input type="password" name="senha" class="form-control" id="pwd" value="">
						</div>
						<div>
							<label for="permissao">Permissao:<span class="requerido">*</span></label>
							<select name="permissao" id="permissao" class="form-control">
								<?php foreach ($permissoes as $key => $value) : ?>
									<option value="<?= $value->getId() ?>" <?php if ( isset($_SESSION["flash"]["departamento"]) && ($_SESSION["flash"]["permissao"] == $value->getId()) ) echo "selected"; ?>> 
										<?= $value->getHierarquia() ?> 
									</option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="nome">Nome:<span class="requerido">*</span></label>
							<input type="text" name="nome" class="form-control" id="nome" value="<?php if (isset($_SESSION["flash"]["nome"])) echo $_SESSION["flash"]["nome"]; ?>">
						</div>
						<div class="form-group">
							<label for="salario">Salario:<span class="requerido">*</span></label>
							<input type="text" name="salario" class="form-control" id="salario" value="<?php if (isset($_SESSION["flash"]["salario"])) echo $_SESSION["flash"]["salario"]; ?>">
						</div>
						<div>
							<label for="departamento">Departamento:<span class="requerido">*</span></label>
							<select name="departamento" id="departamento" class="form-control">
								<?php foreach ($departamentos as $key => $value) :?>
									<option value="<?= $value->getId() ?>" <?php if ( isset($_SESSION["flash"]["departamento"]) && ($_SESSION["flash"]["departamento"] == $value->getId()) ) echo "selected"; ?> > 
										<?= $value->getNome() ?> 
									</option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-default center-block">Submit</button>
			</form>
		</div>
	</div>
</body>
<!-- add no footer -->
<?php
include $_SESSION["root"] . 'includes/footer.php';
if (isset($_SESSION["flash"])) {
	foreach ($_SESSION["flash"] as $key => $value) {
		unset($_SESSION["flash"][$key]);
	}
} ?>
<!-- fim footer -->
<script>
	$(document).ready(function() {
		$('.cadastrarFuncionario').addClass('active');

	});
</script>