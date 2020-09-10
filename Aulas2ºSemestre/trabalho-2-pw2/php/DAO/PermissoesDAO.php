<?php
include_once $_SESSION["root"] . 'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"] . 'php/Model/ModelPermissao.php';

class PermissoesDAO
{
    function getAllPermissoes()
    {
        $instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();

        $statement = $conn->prepare("SELECT * FROM permissoes");
        $statement->execute();
        $linhas = $statement->fetchAll();

        if (count($linhas) == 0)
            return null;

        foreach ($linhas as $value) {
            $permissao = new ModelPermissao();
            $permissao->setPermissaoFromDataBase($value);
            $permissoes[] = $permissao;
        }
        return $permissoes;
    }
}
