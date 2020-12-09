<?php


class usuario{

private $id_usuario;
private $id_rol;
private $usuario;
private $clave;
private $estado;

public function __construct($id_usuario,$id_rol,$usuario,$clave,$estado){
	$this->id_usuario=$id_usuario;
	$this->id_rol=$id_rol;
	$this->usuario=$usuario;
	$this->clave=$clave;
	$this->estado=$estado;
}


public function setId_usuario($id_usuario){$this->id_usuario = $id_usuario;}
public function getId_usuario(){return $this->id_usuario;}

public function setId_rol($id_rol){$this->id_rol = $id_rol;}
public function getId_rol(){return $this->id_rol;}

public function setUsuario($usuario){$this->usuario = $usuario;}
public function getUsuario(){return $this->usuario;}

public function setClave($clave){$this->clave = $clave;}
public function getClave(){return $this->clave;}

public function setEstado($estado){$this->estado = $estado;}
public function getEstado(){return $this->estado;}



		}

?>
