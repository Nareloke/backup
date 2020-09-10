<?php
include("util.php");
if($_POST["firstname"]===$_POST["password"]){
    
	header("Location:index.php?senha=senha-invalida");
}else{
	$msgErro = "";
	if ($_POST["firstname"]=="") {
		$msgErro = "Informe o primeiro nome;";
	}
	if ($_POST["lastname"]=="") {
		$msgErro .= "Informe o último nome;";
	}
	if ($_POST["country"]=="NULL") {
		$msgErro .= "Informe um pais;";
	}
	if ($_POST["email"]=="") {
		$msgErro .= "Informe um email;";
	}
	if ($_POST["password"]=="") {
		$msgErro .= "Informe uma senha;";
	}
	if ($_POST["telefone"]=="") {
		$msgErro .= "Informe um telefone;";
	}
	if (!isset($_POST["cursos"])) {
		$msgErro .= "Escolha pelo menos um curso;";
	}
	//Se a msgErro estiver vazia é pq deu tudo certo
	if($msgErro==""){
		$msgSucesso .= "Curso cadastrado com sucesso!";
		header("Location:index.php?msgSucesso=".$msgSucesso);
	}else{
		header("Location:index.php?msgErro=".$msgErro);
	}
	
}
debug($_POST);

//header("Location:index.php");