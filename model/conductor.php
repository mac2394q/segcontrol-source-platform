<?php


class conductor{


  private $id_conductor;
  private $cedula;
  private $nombre_conductor;
  private $telefono1;
  private $telefono2;
  private $telefono3;

  public function __construct($id_conductor,$cedula,$nombre_conductor,$telefono1,$telefono2,$telefono3){
    $this->id_conductor=$id_conductor;
    $this->cedula=$cedula;
    $this->nombre_conductor=$nombre_conductor;
    $this->telefono1=$telefono1;
    $this->telefono2=$telefono2;
    $this->telefono3=$telefono3;
  }

  public function setId_conductor($id_conductor){$this->id_conductor = $id_conductor;}
  public function getId_conductor(){return $this->id_conductor;}

  public function setCedula($cedula){$this->cedula = $cedula;}
  public function getCedula(){return $this->cedula;}

  public function setNombre_conductor($nombre_conductor){$this->nombre_conductor = $nombre_conductor;}
  public function getNombre_conductor(){return $this->nombre_conductor;}

  public function setTelefono1($telefono1){$this->telefono1 = $telefono1;}
  public function getTelefono1(){return $this->telefono1;}

  public function setTelefono2($telefono2){$this->telefono2 = $telefono2;}
  public function getTelefono2(){return $this->telefono2;}

  public function setTelefono3($telefono3){$this->telefono3 = $telefono3;}
  public function getTelefono3(){return $this->telefono3;}

}



?>
