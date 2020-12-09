<?php
class empleado{

private $id_empleado;
private $id_usuario;
private $nombre;
private $tipo_documento;
private $numero_documento;
private $direccion;
private $ciudad;
private $fijo;
private $celular1;
private $celular2;
private $celular3;
private $email;
private $foto;

public function __construct($id_empleado,$id_usuario,$nombre,$tipo_documento,$numero_documento,$direccion,
$ciudad,$fijo,$celular1,$celular2,$celular3,$email,$foto){

	$this->id_empleado=$id_empleado;
	$this->id_usuario=$id_usuario;
	$this->nombre=$nombre;
	$this->tipo_documento=$tipo_documento;
	$this->numero_documento=$numero_documento;
	$this->direccion=$direccion;
  $this->ciudad=$ciudad;
	$this->fijo=$fijo;
	$this->celular1=$celular1;
	$this->celular2=$celular2;
  $this->celular3=$celular3;
	$this->email=$email;
	$this->foto=$foto;
  }

public function setId_empleado($id_empleado){$this->id_empleado = $id_empleado;}
public function getId_empleado(){return $this->id_empleado;}

public function setId_usuario($id_usuario){$this->id_usuario = $id_usuario;}
public function getId_usuario(){return $this->id_usuario;}

public function setNombre($nombre){$this->nombre = $nombre;}
public function getNombre(){return $this->nombre;}

public function setTipo_documento($tipo_documento){$this->tipo_documento = $tipo_documento;}
public function getTipo_documento(){return $this->tipo_documento;}

public function setNumero_documento($numero_documento){$this->numero_documento = $numero_documento;}
public function getNumero_documento(){return $this->numero_documento;}

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

public function setCelular3($celular3){$this->celular3 = $celular3;}
public function getCelular3(){return $this->celular3;}

public function setEmail($email){$this->email = $email;}
public function getEmail(){return $this->email;}

public function setFoto($foto){$this->foto = $foto;}
public function getFoto(){return $this->foto;}


		}

    ?>
