<?php
/*
* Classe Singleton que permite apenas uma instancia com o banco de dados
* no contrutor é "parseado" o arquivo ini que armazena a configuração do bando de dados 
*/
class DatabaseConnection {
	private static $instance;
	private $config;
	private $conn;

	private function __construct() {
		//Passa os dados do arquivo de configuração para um array;
		$this->config = parse_ini_file($_SESSION["root"].'php/Configuration/dataBaseConfig.ini.php');
		$host = $this->config['mysql_host'];
		$dbname = $this->config['mysql_dbname'];
		$username = $this->config['mysql_username'];
		$password = $this->config['mysql_password'];

		//DSN = Data Source Name, é a string de conexao
		$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
		try {
			$this->conn = new PDO($dsn, $username, $password);
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch (Exception $ex) {
			die('Unable to connect: ' . $ex->getMessage());
		}
	}
	//Singleton - É discutível se a melhor solução para esse cenário seria um singleton. Explico melhor na aula, mas o resumo é que não. Só estou usando Singleton aqui para trazer a discussão sobre o assunto. 
 	public static function getInstance()
	{
		if(!self::$instance)
		{
			self::$instance = new DatabaseConnection();
		}

		return self::$instance;
	}
  	//Retorna a conexão única
	public function getConnection()
	{
		return $this->conn;
	}

}

?>