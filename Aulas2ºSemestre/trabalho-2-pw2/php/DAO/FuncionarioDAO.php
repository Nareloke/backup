<?php
//Add a classe responsavel por fazer a conexao com banco de dados
include_once $_SESSION["root"] . 'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"] . 'php/Model/ModelFuncionario.php';
class FuncionarioDAO
{
	function createSQLStatement() {
		if ( isset($_GET["order"]) ) {		
			return "SELECT funcionarios.*, departamentos.nome as dep_nome, departamentos.id, departamentos.numero, p.*
			FROM funcionarios
			JOIN departamentos 
			ON funcionarios.idDepartamento = departamentos.id 
			JOIN permissoes p
			ON p.id = funcionarios.idPermissao
			WHERE funcionarios.contaAtiva = true
			ORDER BY ".$_GET['order'].".nome;";

		} else {
			return "SELECT f.*, d.nome as dep_nome, d.id, d.numero, p.*
			FROM funcionarios f 
			JOIN departamentos d 
			ON f.idDepartamento = d.id
			JOIN permissoes p
			ON p.id = f.idPermissao
			WHERE f.contaAtiva = true;";
		}	
	}

	/*Como o PHP tem inferência de tipo, esse método, assim como outros, poderia ser mais "simples", porém estou fazendo de uma maneira que acho mais didático*/
	function getAllFuncionarios()
	{
		//pego uma ref da conexão
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		$sql = $this->createSQLStatement();

		//Faço o select usando prepared statement
		$statement = $conn->prepare($sql);
		$statement->execute();

		//linhas recebe todas as tuplas retornadas do banco		
		$linhas = $statement->fetchAll();

		//Verifico se houve algum retorno, senão retorno null
		if (count($linhas) == 0)
			return null;

		//Var que irá armazenar um array de obj do tipo funcionário		
		foreach ($linhas as $value) {
			$funcionario = new ModelFuncionario();
			$funcionario->setFuncionarioFromDataBase($value);

			$funcionarioPermissoes = new ModelPermissao();
			$funcionarioPermissoes->setPermissaoFromDataBase($value);
			$funcionario->setPermissao($funcionarioPermissoes);

			$funcionarioDepartamento = new ModelDepartamento();
			$funcionarioDepartamento->setDepartamentoFromDataBase($value);
			$funcionario->setDepartamento($funcionarioDepartamento); 

			$funcionarios[] = $funcionario;
		}
		return $funcionarios;
	}

	function read() 
	{
		try {
			$nome = $_POST["nome"];
			echo $_POST["nome"];
			$sql = "SELECT idFuncionario, nome, senha, salario, login, idPermissao, idDepartamento 
			FROM funcionarios WHERE nome = ?";

			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			$statement = $conn->prepare($sql);

			$statement->bindValue(1, $nome);
			$statement->execute();
			$funcionario = $statement->fetch();

			if (count($funcionario) == 0)
				return null;

			return $funcionario;
		} catch (PDOException $e) {
			echo "Erro ao inserir na base de dados." . $e->getMessage();
		}
	}

	//Retorna 1 se conseguiu inserir;
	function setFuncionario($func)
	{

		try {
			//monto a query
			$sql = "INSERT INTO funcionarios (		
                nome,
                salario,
                login,
                senha,
                idPermissao,
                idDepartamento) 
                VALUES (
                :nome,
                :salario,
                :login,
                :senha,
                :idPermissao,
                :idDepartamento)";

			//pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

			$statement->bindValue(":nome", $func->getNome());
			$statement->bindValue(":salario", $func->getSalario());
			$statement->bindValue(":login", $func->getLogin());
			$statement->bindValue(":senha", $func->getSenha());
			$statement->bindValue(":idPermissao", $func->getIdPermissao());
			$statement->bindValue(":idDepartamento", $func->getIdDepartamento());
			return $statement->execute();
		} catch (PDOException $e) {
			echo "Erro ao inserir na base de dados." . $e->getMessage();
		}
	}

	function removerFuncionario() {
		try {
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			$sql = "UPDATE funcionarios SET contaAtiva = 0 WHERE nome = ?";
			$statement = $conn->prepare($sql);

			$statement->bindValue(1, $_POST["nome"]);
			return $statement->execute();
		} catch (PDOException $e) {
			echo "Erro ao inserir na base de dados." . $e->getMessage();
		}
	}

	function update($func) {
		try {
			//monto a query
			if ($_POST["senha"] == "") {
				echo "entrou";
			$sql = "UPDATE funcionarios SET login = ?, salario = ?, idPermissao = ?, idDepartamento = ? WHERE nome = ?";

			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			$statement = $conn->prepare($sql);

			$statement->bindValue(1, $func->getLogin());
			$statement->bindValue(2, $func->getSalario());
			$statement->bindValue(3, $func->getIdPermissao());
			$statement->bindValue(4, $func->getIdDepartamento());
			$statement->bindValue(5, $func->getNome()); 
			debug($statement->execute());

			} else {
				$sql = "UPDATE funcionarios SET login = ?, senha = ?, salario = ?, idPermissao = ?, idDepartamento = ? WHERE nome = ?";
				echo "entrou2";
				//pego uma ref da conexão
				$instance = DatabaseConnection::getInstance();
				$conn = $instance->getConnection();
				//Utilizando Prepared Statements
				$statement = $conn->prepare($sql);
	
				$statement->bindValue(1, $func->getLogin());
				$statement->bindValue(2, $func->getSenha());
				$statement->bindValue(3, $func->getSalario());
				$statement->bindValue(4, $func->getIdPermissao());
				$statement->bindValue(5, $func->getIdDepartamento());
				$statement->bindValue(6, $func->getNome()); 
				$statement->execute();

		}
			echo $_POST["senha"] == "";
			
		} catch (PDOException $e) {
			echo "Erro ao inserir na base de dados." . $e->getMessage();
		}
	}
}
