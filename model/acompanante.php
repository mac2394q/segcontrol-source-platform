<?php


class acompanante{


  private $id_acompanante;
  private $nombre;
  private $cedula;
  private $telefono;
  private $placa;
  private $tipo;
  private $marca;
  private $color;

  public function __construct($id_acompanante,$nombre,$cedula,$telefono,$placa,$tipo,$marca,$color){
    $this->id_acompanante=$id_acompanante;
    $this->nombre=$nombre;
    $this->cedula=$cedula;
    $this->telefono=$telefono;
    $this->placa=$placa;
    $this->tipo=$tipo;
    $this->marca=$marca;
    $this->color=$color;
  }

  public function setId_acompanante($id_acompanante){$this->id_acompanante = $id_acompanante;}
  public function getId_acompanante(){return $this->id_acompanante;}

  public function setNombre($nombre){$this->nombre = $nombre;}
  public function getNombre(){return $this->nombre;}

  public function setCedula($cedula){$this->cedula = $cedula;}
  public function getCedula(){return $this->cedula;}

  public function setTelefono($telefono){$this->telefono = $telefono;}
  public function getTelefono(){return $this->telefono;}

  public function setPlaca($placa){$this->placa = $placa;}
  public function getPlaca(){return $this->placa;}

  public function setTipo($tipo){$this->tipo = $tipo;}
  public function getTipo(){return $this->tipo;}

  public function setMarca($marca){$this->marca= $marca;}
  public function getMarca(){return $this->marca;}

  public function setColor($color){$this->color= $color;}
  public function getColor(){return $this->color;}

}



?>
