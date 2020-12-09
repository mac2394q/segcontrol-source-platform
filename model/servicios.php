<?php
class servicio{
  private $id_servicio;
  private $id_conductor;
  private $id_vehiculo;
  private $id_cliente;
  private $id_empleado;
  private $manifiesto;
  private $fecha_creacion;
  private $fecha_fin;
  private $estado;
  private $satelital;
  private $ciudad_origen;
  private $ciudad_destino;
  private $direccion_descargue;
  private $sello;
  private $numero_contenedor;
  private $link_localizador;
  private $usuario_satelital;
  private $clave_satelital;
  private $ruta;


  public function __construct($id_servicio,$id_conductor,$id_vehiculo,$id_cliente,
  $id_empleado,$manifiesto,$fecha_creacion,$fecha_fin,$estado,$satelital,$ciudad_origen,
  $ciudad_destino,$direccion_descargue,$sello,$numero_contenedor,$link_localizador,$usuario_satelital,
  $clave_satelital,$ruta){

    $this->id_servicio=$id_servicio;
    $this->id_conductor=$id_conductor;
    $this->id_vehiculo=$id_vehiculo;
    $this->id_cliente=$id_cliente;
    $this->id_empleado=$id_empleado;
    $this->manifiesto=$manifiesto;
    $this->fecha_creacion=$fecha_creacion;
    $this->fecha_fin=$fecha_fin;
    $this->estado=$estado;
    $this->satelital=$satelital;
    $this->ciudad_origen=$ciudad_origen;
    $this->ciudad_destino=$ciudad_destino;
    $this->direccion_descargue=$direccion_descargue;
    $this->sello=$sello;
    $this->numero_contenedor=$numero_contenedor;
    $this->link_localizador=$link_localizador;
    $this->usuario_satelital=$usuario_satelital;
    $this->clave_satelital=$clave_satelital;
    $this->ruta=$ruta;
  }

  public function setId_servicio($id_servicio){$this->id_servicio = $id_servicio;}
  public function getId_servicio(){return $this->id_servicio;}

  public function setId_conductor($id_conductor){$this->id_conductor = $id_conductor;}
  public function getId_conductor(){return $this->id_conductor;}

  public function setId_vehiculo($id_vehiculo){$this->id_vehiculo = $id_vehiculo;}
  public function getId_vehiculo(){return $this->id_vehiculo;}

  public function setId_cliente($id_cliente){$this->id_cliente = $id_cliente;}
  public function getId_cliente(){return $this->id_cliente;}

  public function setId_empleado($id_empleado){$this->id_empleado = $id_empleado;}
  public function getId_empleado(){return $this->id_empleado;}

  public function setManifiesto($manifiesto){$this->manifiesto = $manifiesto;}
  public function getManifiesto(){return $this->manifiesto;}

  public function setFecha_creacion($fecha_creacion){$this->fecha_creacion = $fecha_creacion;}
  public function getFecha_creacion(){return $this->fecha_creacion;}

  public function setFecha_fin($fecha_fin){$this->fecha_fin = $fecha_fin;}
  public function getFecha_fin(){return $this->fecha_fin;}

  public function setEstado($estado){$this->estado = $estado;}
  public function getEstado(){return $this->estado;}

  public function setSatelital($satelital){$this->satelital = $satelital;}
  public function getSatelital(){return $this->satelital;}

  public function setCiudad_origen($ciudad_origen){$this->ciudad_origen = $ciudad_origen;}
  public function getCiudad_origen(){return $this->ciudad_origen;}

  public function setCiudad_destino($ciudad_destino){$this->ciudad_destino = $ciudad_destino;}
  public function getCiudad_destino(){return $this->ciudad_destino;}

  public function setDireccion_descargue($evento){$this->direccion_descargue = $direccion_descargue;}
  public function getDireccion_descargue(){return $this->direccion_descargue;}

  public function setSello($sello){$this->sello = $sello;}
  public function getSello(){return $this->sello;}

  public function setNumero_contenedor($numero_contenedor){$this->numero_contenedor = $numero_contenedor;}
  public function getNumero_contenedor(){return $this->numero_contenedor;}

  public function setLink_localizador($link_localizador){$this->link_localizador = $link_localizador;}
  public function getLink_localizador(){return $this->link_localizador;}

  public function setUsuario_satelital($usuario_satelital){$this->usuario_satelital = $usuario_satelital;}
  public function getUsuario_satelital(){return $this->usuario_satelital;}

  public function setClave_satelital($clave_satelital){$this->clave_satelital = $clave_satelital;}
  public function getClave_satelital(){return $this->clave_satelital;}

  public function setRuta($ruta){$this->ruta = $ruta;}
  public function getRuta(){return $this->ruta;}



}



?>
