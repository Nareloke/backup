<?php
	include("util.php");	
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>FORM PHP</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
	<div id="conteudo">
		<header id="cabecalho">
			<h1>FORM PHP</h1>
			<nav id="menu">
				<ul>
					<a href="index.php"><li>FORM PHP</li></a>
					<a href="#"><li>Página 2</li></a>
					<a href="#"><li>Página 3</li></a>
				</ul>
			</nav>
		</header>

		<section id="principal">

		<?php

		?>
			<div id="calculadora" class="contorno">			
				<form action="recebeForm.php" method="POST" id="formulario">
					<div id="divFormEsq">
					    <label for="fname">Primeiro Name</label>
					    <input type="text" id="fname" name="firstname" placeholder="Primeiro nome">

						<label for="sNome">Sobrenome</label>
						<input type="text" id="sNome" name="lastName" placeholder="sobrenome">
					    
					    <label for="country">País</label>
					    <select id="country" name="country">
					      <option value="NULL"></option>	
					      <option value="australia">Australia</option>
					      <option value="canada">Canada</option>
					      <option value="brasil">Brasil</option>
					      <option value="usa">USA</option>
					    </select>

						<label for="cursos">Cursos</label>
						<div> 
							<input type="checkbox" id="php" name="cursos[]">
							<label for="php">PHP</label>
						</div>
						<div>
							<input type="checkbox" id="HTML" name="cursos[]">
							<label for="HTML">HTML</label>						 
						</div>
						<div>
							<input type="checkbox" id="css" name="cursos[]">
							<label for="css">CSS</label>
						</div>
				    </div>

				    <div id="divFormDir">
					<div>
					    <label for="email">E-mail</label>
					    <input type="text" id="email" name="email" placeholder="E-mail">	
					</div>

					<div id="divSenha">
						<label for="senha">Senha</label>
						<input type="password" id="senha" name="password" placeholder="Senha">
					</div>		

					<div id="divTelefone">
						<label for="telefone">Telefone</label>
						<input type="text" id="telefone" name="telefone" placeholder="telefone">
					</div>				
							    	
				    </div>


					
				  	<br style="clear: both">
				    <input type="submit" value="Submit">
			  	</form>
				
						
			</div>
		</section>
		<footer>
			Sistema desenvolvido por Rodrigo Henrique Ramos - 2019A
		</footer>
	</div>
	
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>