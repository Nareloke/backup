<?php
/*
Esse script funciona como um front controller, todas as requisições passam primeiro por aqui, também podemos enxergar como um gateway padrão. Isso só é possível graças ao htaccess que faz com que o todas as requisições feitas sejam redirecionadas para cá.
Da forma como esse arquivo de rotas funciona, nós não fazemos “links” para arquivos, nós associamos uma url a um controller.
****Descomentar os print_r abaixo para entender melhor****
*/

//Path é um array onde cada posição é um elemento da URL
$path = explode('/', $_SERVER['REQUEST_URI']);
//Action é a posição do array
$action = $path[sizeOf($path) - 1];
//Caso a ação tenha param GET esse param é ignorado, isso é particularmente útil para trabalhar com AJAX, já que o conteúdo do get será útil apenas para o controller e não para a rota
$action = explode('?', $action);
$action = $action[0];

//Descomentar esse bloco e acessar qualquer url do sistema.
/*echo "<pre>";
echo "A URL digitada<br>";
print_r($_SERVER['REQUEST_URI']);
echo "<br><br>A URL digitada explodida por / e tranformada em um array<br>";
print_r($path);
echo "<br><br>A ultima posição do array, que é a ação que o usuário/sistema quer realizar, é essa ação(string) que é mapeada(roteada) a um método de um controller<br>";
print_r($action);
echo "</pre>";*/
//Todo controller que tiver pelo menos uma rota associada a ele deve aparecer aqui.
include_once $_SESSION["root"] . 'php/Controller/ControllerLogin.php';
include_once $_SESSION["root"] . 'php/Controller/ControllerFuncionario.php';
include_once $_SESSION["root"] . 'php/Controller/ControllerDepartamento.php';
include_once $_SESSION["root"] . 'php/Controller/ControllerPermissoes.php';
//debug($_SESSION);

//Sequencia de condicionais que verificam se a ação informada está roteada
if ($action == '' || $action == 'index' || $action == 'index.php' || $action == 'login') {
	require_once $_SESSION["root"] . 'php/View/ViewLogin.php';

} else if ($action == 'ramos') {
	echo "fazer alguma coisa";

} else if ($action == 'logout') {
	unset($_SESSION["logado"]);
	unset($_SESSION["nomeLogado"]);
	require_once $_SESSION["root"] . 'php/View/ViewLogin.php';

} else if ($action == 'postLogin') {
	$cLogin = new ControllerLogin();
	$cLogin->verificaLogin();

} else if (isset($_SESSION["logado"]) && $_SESSION["logado"] == true) /* Verifica se o usuário está logado */ {
	if ($action == 'exibeFuncionarios') {
		$cFunc = new ControllerFuncionario();
		$funcionarios = $cFunc->getAllFuncionarios();

		include_once $_SESSION["root"] . 'php/View/ViewExibeFuncionarios.php';

	} else if ($action == 'exibeDepartamentos') {
		$cFunc = new ControllerDepartamento();
		$departamentos = $cFunc->getAllDepartamentos();	
		include_once $_SESSION["root"] . 'php/View/ViewExibeDepartamentos.php';

	} else if ($_SESSION["posicao"] == 1) /* Verifica se o usuário é admin */ {
		if ($action == 'cadastraFuncionario') {
			$cPermissoes 	= new ControllerPermissoes();
			$permissoes 	= $cPermissoes->getAllPermissoes();

			$cDepartamentos = new ControllerDepartamento();
			$departamentos 	= $cDepartamentos->getAllDepartamentos();
			require_once $_SESSION["root"] . 'php/View/ViewCadastraFuncionario.php';

		} else if ($action == 'cadastraDepartamento') {
			require_once $_SESSION["root"] . 'php/View/ViewCadastroDepartamento.php';

		} else if ($action == 'postCadastraFuncionario') {
			$cFunc = new ControllerFuncionario();
			$cFunc->setFuncionario();

			$cPermissoes 	= new ControllerPermissoes();
			$permissoes 	= $cPermissoes->getAllPermissoes();

			$cDepartamentos = new ControllerDepartamento();
			$departamentos 	= $cDepartamentos->getAllDepartamentos();
			include_once $_SESSION["root"] . 'php/View/ViewCadastraFuncionario.php';

		} else if ($action == 'postCadastraDepartamento') {
			$cDep = new ControllerDepartamento();
			$cDep->setDepartamento();

		} else if ($action == 'postEditaFuncionario') {
			$cFuncionario = new ControllerFuncionario();
			$cFuncionario->update();
			header('Location: exibeFuncionarios');

		} else if ($action == 'removerFuncionario') {
			$cFunc = new ControllerFuncionario();
			echo $cFunc->removerFuncionario();

		} else if ($action == 'editarFuncionario') {
			$cFunc = new ControllerFuncionario();
			$funcionario = $cFunc->read();
			debug($funcionario);
			$_SESSION["flash"]["editar"]	= "Edição de Funcionário";
			$_SESSION["flash"]["nome"]		= $funcionario->getNome();
			$_SESSION["flash"]["login"]		= $funcionario->getLogin();
			$_SESSION["flash"]["salario"]	= $funcionario->getSalario();
			$_SESSION["flash"]["permissao"]	= $funcionario->getIdPermissao();
			$_SESSION["flash"]["departamento"]	= $funcionario->getIdDepartamento();
			//header('Location: cadastraFuncionario');
		} 
	}
	else {
		echo "Acesso negado!!!";
	}
} else {
	echo "Página não encontrada!!!";
	//isso trata todo erro 404, podemos criar uma view mais elegante para exibir o aviso ao usuário.
}
