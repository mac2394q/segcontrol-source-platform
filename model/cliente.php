<?php
class cliente{

private $id_cliente;
private $id_usuario;
private $razon_social;
private $nit;
private $nombre;
private $direccion;
private $ciudad;
private $fijo;
private $celular1;
private $celular2;
private $email;
private $email2;
private $email3;
private $email4;
private $email5;
private $email6;
private $email7;
private $email8;
private $foto;

public function __construct($id_cliente,$id_usuario,$razon_social,$nit,$nombre,$direccion,
$ciudad,$fijo,$celular1,$celular2,$email,$email2,$email3,$email4,$email5,$email6,$email7,$email8,$foto){

	$this->id_cliente=$id_cliente;
	$this->id_usuario=$id_usuario;
	$this->razon_social=$razon_social;
	$this->nit=$nit;
	$this->nombre=$nombre;
	$this->direccion=$direccion;
  $this->ciudad=$ciudad;
	$this->fijo=$fijo;
	$this->celular1=$celular1;
	$this->celular2=$celular2;
	$this->email=$email;
  $this->email2=$email2;
  $this->email3=$email3;
	$this->email4=$email4;
	$this->email5=$email5;
	$this->email6=$email6;
	$this->email7=$email7;
	$this->email8=$email8;
	$this->foto=$foto;
  }

public function setId_cliente($id_cliente){$this->id_cliente = $id_cliente;}
public function getId_cliente(){return $this->id_cliente;}

public function setId_usuario($id_usuario){$this->id_usuario = $id_usuario;}
public function getId_usuario(){return $this->id_usuario;}

public function setRazon_social($razon_social){$this->razon_social = $razon_social;}
public function getRazon_social(){return $this->razon_social;}

public function setNit($nit){$this->nit = $nit;}
public function getNit(){return $this->nit;}

public function setNombre($nombre){$this->nombre = $nombre;}
public function getNombre(){return $this->nombre;}

public function setDireccion($direccion){$this->direccion = $direccion;}
public function getDireccion(){return $this->direccion;}

public function setCiudad($ciudad){$this->ciudad = $ciudad;}
public function getCiudad(){return $this->ciudad;}

public function setFijo($fijo){$this->fijo = $fijo;}
public function getFijo(){return $this->fijo;}

public function setCelular1($celular1){$this->celular1 = $celular1;}
public function getCelular1(){return $this->celular1;}

public function setCelular2($celular2){$this->celular2 = $celular2;}
public function getCelular2(){return $this->celular2;}

public function setEmail($email){$this->email = $email;}
public function getEmail(){return $this->email;}

public function setEmail2($email2){$this->email2 = $email2;}
public function getEmail2(){return $this->email2;}

public function setEmail3($email3){$this->email3 = $email3;}
public function getEmail3(){return $this->email3;}

public function setEmail4($email4){$this->email4 = $email4;}
public function getEmail4(){return $this->email4;}

public function setEmail5($email5){$this->email5 = $email5;}
public function getEmail5(){return $this->email5;}

public function setEmail6($email6){$this->email6 = $email6;}
public function getEmail6(){return $this->email6;}

public function setEmail7($email7){$this->email7 = $email7;}
public function getEmail7(){return $this->email7;}

public function setEmail8($email8){$this->email8 = $email8;}
public function getEmail8(){return $this->email8;}

public function setFoto($foto){$this->foto = $foto;}
public function getFoto(){return $this->foto;}

		}

    ?>
