<?php
//Inicia a sessão
session_start();

function debug($param){
	echo "<pre>";
	print_r($param);
	echo "</pre>";
}

//Add o caminho sistema a uma váriavel de sessão; descomentar o printr para entender melhor
/*if (!isset($_SESSION["root"])) {
	$_SESSION["root"] = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
}*/

$_SESSION["root"]="C:/xampp/htdocs/backup/Aulas2ºSemestre/trabalho-2-pw2/";
//print_r($_SESSION["root"] );

//Chamo o arquivo responsável por gerenciar as rotas do sistema
include $_SESSION["root"].'routes.php';

?>