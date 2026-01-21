<?php
    
    class Usuario{
        private $nombre;
        private $apellido;
        private $departamento;
        private $esAdmin;

        public function __construct($nombre,$apellido,$departamento,$esAdmin)
        {
            $this->nombre = $nombre ;
            $this->apellido = $apellido;
            $this->departamento = $departamento;
            $this->esAdmin = $esAdmin;
        }

        public function getNombre(){
            return $this->nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function getDepartamento(){
            return $this->departamento;
        }
        public function esAdmin(){
            return $this->esAdmin;
        }
    }

    
?>