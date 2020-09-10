<?php
    class ModelDepartamento {
        private $id;
        private $numero;
        private $nome;

        public function setDepartamentoFromDataBase($linha) {
            $this->setId($linha["id"])
                ->setNome($linha["dep_nome"])
                ->setNumero($linha["numero"]);
        }

        public function setDepartamentoFromPOST() {
            $this->setId(null)
                ->setNome($_POST["nome"])
                ->setNumero($_POST["numero"]);
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
            return $this;
        }

        public function getNumero() {
            return $this->numero;
        }

        public function setNumero($id) {
            $this->numero = $id;
            return $this;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
            return $this;
        }
    }
