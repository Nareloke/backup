<?php
//Add a classe responsavel por fazer a conexao com banco de dados
include_once $_SESSION["root"] . 'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"] . 'php/Model/ModelFuncionario.php';
class LoginDAO
{
	/**
	 * Verifica se o login existe no banco
	 *
	 * @param uma string contendo o login do usuário
	 *
	 * @return NULL caso login não exista ou Objeto Funcionario populado
	 */
	function verificaLogin($login)
	{
		//pego uma ref da conexão
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		//Faço o select usando prepared statement
		$statement = $conn->prepare("SELECT * FROM funcionarios WHERE login = ?");

		$statement->bindParam(1, $login);
		$statement->execute();

		//linha recebe a primeira linha de retorno do banco		
		$linha = $statement->fetch(PDO::FETCH_ASSOC);
		/*echo "<pre>";
		print_r($linha);
		echo "</pre>";*/

		//Se o login não existir o retorno do banco é nulo
		if ($linha == null) {
			return null;
		}
		//Se chegou até aqui é pq o login existe no banco, passo os dados que vieram de banco para o Model correspondente
		$funcionario = new ModelFuncionario();

		//Vejam o funcionamento do método setFuncionarioFromDataBase
		$funcionario->setFuncionarioFromDataBase($linha);

		//Poderia fazer tudo isso dinâmicamente usando a linha de baixo, porém acredito que o passo-a-passo é importante para entender a ideia transferir os dados entre as camadas
		//$funcionario = $statement->fetchAll(PDO::FETCH_CLASS, "ModelFuncionario");
		return $funcionario;
	}
}
