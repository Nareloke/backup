<?php
$titulo = "Exibir Funcionários";
include $_SESSION["root"] . 'includes/header.php';
?>

<body>
	<div class="container">
		<!-- add no menu -->
		<?php include $_SESSION["root"] . 'includes/menu.php'; ?>
		<!-- fim menu -->
		<div id="principal">
			<h1 class="text-center">Funcionários </h1>
			<table class="table table-striped">
				<tr>
					<th> 
						<a class='order' href='#' id='funcionarios'> Nome </a> 
					</th>
					<th> Salário </th>
					<th> Login </th>
					<th> 
						<a class='order' href='#' id='departamentos'> Departamento </a> 
					</th>
					<th> Posição </th>
					<?php if ($_SESSION["posicao"] == 1) echo "<th>Opções</th>"; ?>
					<?php foreach ($funcionarios as $value) : ?>
						<tr>
							<td> <?= $value->getNome() ?> </td>
							<td> <?= $value->getSalario() ?> </td>
							<td> <?= $value->getLogin() ?> </td>
							<td> <?= $value->getDepartamento()->getNome() ?> </td>
							<td> <?= $value->getPermissao()->getHierarquia() ?> </td>
							<?php if ($_SESSION["posicao"] == 1) echo "<td> <a href='#' class='removerFuncionario'> <img src='includes/imgs/trash-alt-solid.svg' style='width: 2rem'></img> </a> 
						<a href='#' class='editarFuncionario'> <img src='includes/imgs/edit-solid.svg' style='width: 2rem'></img> </a> </td>";?>
						</tr>
					<?php endforeach; ?>
				</tr>
			</table>
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
		$('.visualizarFuncionario').addClass('active');

		$(".removerFuncionario").click(function() {
			let tr = $(this).closest('tr');
			let td = $(tr).children(':first').text().trim();
			$.ajax({
				url: 'removerFuncionario',
				data: {
					"nome": td
				},
				type: 'POST',
				datatype: 'JSON',
				success: function(envio) {
					console.log(envio);
					if (envio) {
						$(tr).fadeOut(500, function() {
							$(tr).remove();
					})
					}
				},
				error: function(envio) {
					console.log(envio);
				}
			})
		});

		$(".editarFuncionario").click(function() {
			let tr = $(this).closest('tr');
			let td = $(tr).children(':first').text().trim();
			console.log(td);
			$.ajax({
				url: 'editarFuncionario',
				data: {
					"nome": td
				},
				type: 'POST',
				datatype: 'JSON',
				success: function(envio) {
					location.href="cadastraFuncionario";
				},
				error: function(envio) {
					console.log(envio);
				}
			})
		});

		$(".order").click(function() {
			let order = $(this).attr('id');
			// let order = array[0];
			// let type = array[1];
			$.ajax({
				type: 'GET',
				datatype: 'JSON',
				success: function(envio) {
					console.log("cheogu");
					location.href = `exibeFuncionarios?order=` + order;
				}
			})
		});
	});
</script>