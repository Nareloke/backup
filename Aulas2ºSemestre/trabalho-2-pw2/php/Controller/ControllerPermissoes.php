<?php

include_once $_SESSION["root"] . 'php/DAO/PermissoesDAO.php';
include_once $_SESSION["root"] . 'php/Model/ModelPermissao.php';

class ControllerPermissoes
{
	function getAllPermissoes()
	{
		$funcDAO = new PermissoesDAO();
		$permissoes = $funcDAO->getAllPermissoes();
        return $permissoes;
	}
}
