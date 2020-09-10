<?php
//Inicia a sessão

session_start();
function debug($param){
    echo "<pre>";
    print_r($param);
    echo "</pre>";
}

$_SESSION["root"] = "C:/xampp/htdocs/Trabalho/Trabalho1_Loja/TrabalhoParte1/";

if (empty($_SESSION["produtos"])) {
    $_SESSION["produtos"] = [];
}

include $_SESSION["root"].'routes.php';
?>