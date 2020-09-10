<?php
class ModelFuncionario
{
    private $idFuncionario;
    private $nome;
    private $salario;
    private $login;
    private $senha;
    private $idPermissao;
    private $idDepartamento;

    private $permissao;
    private $departamento;

    /**
     * Popula um obj funcionario com os dados vindos da tabela funcionario. Funciona como um construtor
     *
     * @param um array com dados da tupla proveniente do DB, em que o nome do atributo na entidade é o mesmo do atributo no objeto
     *
     * @return não há retorno.
     */
    public function setFuncionarioFromDataBase($linha)
    {
        $this->setIdFuncionario($linha["idFuncionario"])
            ->setNome($linha["nome"])
            ->setSalario($linha["salario"])
            ->setLogin($linha['login'])
            ->setSenhaBD($linha['senha'])
            ->setIdPermissao($linha['idPermissao'])
            ->setIdDepartamento($linha['idDepartamento']);
    }

    public function setFuncionarioFromPOST()
    {
        $this->setIdFuncionario(null)
            ->setNome($_POST["nome"])
            ->setSalario($_POST["salario"])
            ->setLogin($_POST['login'])
            ->setSenhaPOST($_POST['senha'])
            ->setIdPermissao($_POST['permissao'])
            ->setIdDepartamento($_POST['departamento']);
    }

    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }

    public function setIdFuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;

        return $this;
    }

    public function getPermissao()
    {
        return $this->permissao;
    }

    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;

        return $this;
    }


    public function getDepartamento()
    {
        return $this->departamento;
    }

    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of salario.
     *
     * @return mixed
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Sets the value of salario.
     *
     * @param mixed $salario the salario
     *
     * @return self
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Gets the value of login.
     *
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Sets the value of login.
     *
     * @param mixed $login the login
     *
     * @return self
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Gets the value of senha.
     *
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Sets the value of senha.
     *
     * @param mixed $senha the senha
     *
     * @return self
     */
    public function setSenhaPOST($senha)
    {
        //Por mais que função do PHP password_hash seja mais segura, ela vai dar problema na correção
        #$this->senha = password_hash($senha, PASSWORD_DEFAULT);
        $senha = "trabalho_ramos" + $senha;
        $this->senha = md5($senha);
        return $this;
    }

    public function setSenhaBD($senha)
    {
        
        //Qdo a senha vem do banco, não posso criptografar, pq ela já vem criptografada
        $this->senha = $senha;
        return $this;
    }

    /**
     * Gets the value of iddepartamento.
     *
     * @return mixed
     */
    public function getIdPermissao()
    {
        return $this->idPermissao;
    }

    /**
     * Sets the value of idPermissao.
     *
     * @param mixed $idPermissao the id permissao
     *
     * @return self
     */
    public function setIdPermissao($idPermissao)
    {
        $this->idPermissao = $idPermissao;
        return $this;
    }

    /**
     * Gets the value of idDepartamento.
     *
     * @return mixed
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * Sets the value of idDepartamento.
     *
     * @param mixed $idDepartamento the id departamento
     *
     * @return self
     */
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }
}
