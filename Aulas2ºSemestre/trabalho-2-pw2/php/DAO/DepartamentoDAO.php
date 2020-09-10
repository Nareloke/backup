<?php
include_once $_SESSION["root"] . 'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"] . 'php/Model/ModelDepartamento.php';

class DepartamentoDAO
{

    function getAllDepartamentos()
    {
        $instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();

        $statement = $conn->prepare("SELECT d.id, d.numero, d.nome as dep_nome FROM departamentos d");
        $statement->execute();
        $linhas = $statement->fetchAll();

        if (count($linhas) == 0)
            return null;

        foreach ($linhas as $value) {
            $departamento = new ModelDepartamento();
            $departamento->setDepartamentoFromDataBase($value);
            $departamentos[] = $departamento;
        }
        return $departamentos;
    }

    function setDepartamento($departamento)
    {
        try {
            $sql = "INSERT INTO departamentos (		
                id,
                numero,
                nome) 
                VALUES (
                :idDepartamento,
                :numero,
                :nome)";

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindValue(":idDepartamento", $departamento->getId());
            $statement->bindValue(":numero", $departamento->getNumero());
            $statement->bindValue(":nome", $departamento->getNome());
            return $statement->execute();
        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados." . $e->getMessage();
        }
    }
}
