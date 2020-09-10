<?php
    class ModelPermissao {
        private $id;
        private $hierarquia;

        public function setPermissaoFromDataBase($linha){
            $this->setId($linha["id"])
                ->setHierarquia($linha["hierarquia"]);
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($idPermissao)
        {
            $this->id = $idPermissao;
            return $this;
        }

        public function getHierarquia()
        {
            return $this->hierarquia;
        }

        public function setHierarquia($hierarquia)
        {
            $this->hierarquia = $hierarquia;
            return $this;
        }
    }

?>