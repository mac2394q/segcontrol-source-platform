<?php 

    class correoServicios{

        private $id_correos;
        private $correo;
        private $clave;
        private $activacion;

        public function __construct($id_correos,$correo,$clave,$activacion){

            $this->id_correos=$id_correos;
            $this->correo=$correo;
            $this->clave=$clave;
            $this->activacion=$activacion;
        }

        public function setId_correos($id_correos){$this->id_correos=$id_correos;}
        public function getId_correos(){return $this->id_correos;}

        public function setCorreo($correo){$this->correo=$correo;}
        public function getCorreo(){return $this->correo;}

        public function setClave($clave){$this->clave=$clave;}
        public function getClave(){return $this->clave;}

        public function setActivacioon($activacion){$this->activacion=$activacion;}
        public function getActivacion(){return $this->activacion;}
    }

?>