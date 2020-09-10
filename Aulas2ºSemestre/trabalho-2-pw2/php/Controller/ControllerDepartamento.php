<?php

include_once $_SESSION["root"] . 'php/DAO/DepartamentoDAO.php';
include_once $_SESSION["root"] . 'php/Model/ModelDepartamento.php';


class ControllerDepartamento
{
    function getAllDepartamentos()
    {
        $departamentoDAO = new DepartamentoDAO();
        $departamentos = $departamentoDAO->getAllDepartamentos();
        return $departamentos;
    }

    function setDepartamento()
    {
        $departamentoDAO = new DepartamentoDAO();
        $departamento = new ModelDepartamento();
        $departamento->setDepartamentoFromPost();
        $resultadoInsercao = $departamentoDAO->setDepartamento($departamento);

        if ($resultadoInsercao) {
            $_SESSION["flash"]["msg"] = "Departamento Cadastrado com Sucesso";
            $_SESSION["flash"]["sucesso"] = true;
        } else {
            $_SESSION["flash"]["msg"] = "O Login já existe no banco";
            $_SESSION["flash"]["sucesso"] = false;
            //Var temp de feedback	
            $_SESSION["flash"]["nome"] = $departamento->getNome();
        }
        include_once $_SESSION["root"] . 'php/View/ViewCadastroDepartamento.php';
    }
}
