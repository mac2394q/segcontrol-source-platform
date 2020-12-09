<?php
class vehiculo{
  private $id_vehiculo;
  private $id_cliente;
  private $placa;
  private $marca;
  private $color;
  private $n_trailer;

  public function __construct($id_vehiculo,$id_cliente,$placa,$marca,$color,$n_trailer){
    $this->id_vehiculo=$id_vehiculo;
    $this->$id_cliente=$id_cliente;
    $this->placa=$placa;
    $this->marca=$marca;
    $this->color=$color;
    $this->n_trailer=$n_trailer;
  }
  public function setId_vehiculo($id_vehiculo){$this->id_vehiculo = $id_vehiculo;}
  public function getId_vehiculo(){return $this->id_vehiculo;}

  public function setId_cliente($id_cliente){$this->id_cliente = $id_cliente;}
  public function getId_cliente(){return $this->id_cliente;}

  public function setPlaca($placa){$this->placa = $placa;}
  public function getPlaca(){return $this->placa;}

  public function setMarca($marca){$this->marca = $marca;}
  public function getMarca(){return $this->marca;}

  public function setColor($color){$this->color = $color;}
  public function getColor(){return $this->color;}

  public function setN_trailer($n_trailer){$this->n_trailer = $n_trailer;}
  public function getN_trailer(){return $this->n_trailer;}

}
