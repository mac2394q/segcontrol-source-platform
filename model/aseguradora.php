<?php


class aseguradora{


  private $id_aseguradora;
  private $valor;
  private $fecha;
  private $hora;
  private $autorizacion;
  private $area;
  private $tipo_servicio;
  private $descripcion;
  private $placa;
  private $contenedor;
  private $tipo_vehiculo;
  private $color;
  private $id_acompanante;
  private $hora_llegada;
  private $hora_finalizacion;
  private $id_cliente;


  public function __construct($id_aseguradora,$valor,$fecha,$hora,$autorizacion,$area,
                              $tipo_servicio,$descripcion,$placa,$contenedor,$tipo_vehiculo,
                              $color,$id_acompanante,$hora_llegada,$hora_finalizacion,$id_cliente){
    $this->id_aseguradora=$id_aseguradora;
    $this->valor=$valor;
    $this->fecha=$fecha;
    $this->hora=$hora;
    $this->autorizacion=$autorizacion;
    $this->area=$area;
    $this->tipo_servicio=$tipo_servicio;
    $this->descripcion=$descripcion;
    $this->placa=$placa;
    $this->contenedor=$contenedor;
    $this->tipo_vehiculo=$tipo_vehiculo;
    $this->color=$color;
    $this->id_acompanante=$id_acompanante;
    $this->hora_llegada=$hora_llegada;
    $this->hora_finalizacion=$hora_finalizacion;
    $this->id_cliente=$id_cliente;
  }

  public function setId_aseguradora($id_aseguradora){$this->id_aseguradora = $id_aseguradora;}
  public function getId_aseguradora(){return $this->id_aseguradora;}

  public function setId_cliente($id_cliente){$this->id_cliente = $id_cliente;}
  public function getId_cliente(){return $this->id_cliente;}

  public function setValor($valor){$this->valor = $valor;}
  public function getValor(){return $this->valor;}

  public function setFecha($fecha){$this->fecha = $fecha;}
  public function getFecha(){return $this->fecha;}

  public function setHora($hora){$this->hora = $hora;}
  public function getHora(){return $this->hora;}

  public function setAutorizacion($autorizacion){$this->autorizacion = $autorizacion;}
  public function getAutorizacion(){return $this->autorizacion;}

  public function setArea($area){$this->area = $area;}
  public function getArea(){return $this->area;}

  public function setTipo_servicio($tipo_servicio){$this->tipo_servicio = $tipo_servicio;}
  public function getTipo_servicio(){return $this->tipo_servicio;}

  public function setDescripcion($descripcion){$this->descripcion = $descripcion;}
  public function getDescripcion(){return $this->descripcion;}

  public function setPlaca($placa){$this->placa = $placa;}
  public function getPlaca(){return $this->placa;}

  public function setContenedor($contenedor){$this->contenedor = $contenedor;}
  public function getContenedor(){return $this->contenedor;}

  public function setTipo_vehiculo($tipo_vehiculo){$this->tipo_vehiculo = $tipo_vehiculo;}
  public function getTipo_vehiculo(){return $this->tipo_vehiculo;}

  public function setColor($color){$this->color = $color;}
  public function getColor(){return $this->color;}

  public function setId_Acompanante($id_acompanante){$this->id_acompanante = $id_acompanante;}
  public function getId_Acompanante(){return $this->id_acompanante;}

  public function setHora_llegada($hora_llegada){$this->hora_llegada = $hora_llegada;}
  public function getHora_llegada(){return $this->hora_llegada;}

  public function setHora_finalizacion($hora_finalizacion){$this->hora_finalizacion = $hora_finalizacion;}
  public function getHora_finalizacion(){return $this->hora_finalizacion;}


}



?>
