<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(PERSISTENCIA_PATH."usuariosDao.php");
require_once(PERSISTENCIA_PATH."serviciosDao.php");
require_once(MODEL_PATH."empleado.php");
require_once(MODEL_PATH."cliente.php");
require_once(MODEL_PATH."servicios.php");
require_once(MODEL_PATH."minuta.php");
require_once(MODEL_PATH."conductor.php");
require_once(MODEL_PATH."vehiculo.php");

class serviciosController{


  public function registroServicio(servicio $servicios){
    $Objservicios=new serviciosDao();
    return  $Objservicios->registrarServicio($servicios);
  }

  public function actualizarServicio(servicio $servicios){
    $Objservicios=new serviciosDao();
    return  $Objservicios->actualizarServicio($servicios);
  }

  public function serviciosPorId($id){

    $Objservicios=new serviciosDao();
    return  $Objservicios->servicioId($id);
  }

  public function servicioPorCliente($id){
    $Objservicios=new serviciosDao();
    return  $Objservicios->servicioCli($id);
  }
  public function serviciosCliente($id){
    $objServicios=new serviciosDao();
    return $objServicios->serviciosCliente($id);
  }

  public function serviciosPorCliente($id,$fechai,$fechaf){
    $Objservicios=new serviciosDao();
    return  $Objservicios->serviciosCli($id,$fechai,$fechaf);
  }

  public function serviciosPorClientenombre($nombre){
    $Objservicios=new serviciosDao();
    return  $Objservicios->serviciosClinombre($nombre);
  }

  public function serviciosPorClientePlaca($id,$placa){
    $Objservicios=new serviciosDao();
    return  $Objservicios->serviciosClientePlaca($id,$placa);
  }

  public function serviciosPorEmpleado($id){
    $Objservicios=new serviciosDao();
    return  $Objservicios->servicioEmp($id);
  }

  public function listaTodosServicios(){
    $Objservicios=new serviciosDao();
    return  $Objservicios->listaServicios();
  }

  public function listaTodosServiciosActivos(){
    $Objservicios=new serviciosDao();
    return  $Objservicios->listaTodosServiciosActivos();
  }

  public function listaTodosServiciosActivosCliente($id){
    $Objservicios=new serviciosDao();
    return  $Objservicios->listaTodosServiciosActivosCliente($id);
  }

  public function listaTodosServiciosCerrados(){
    $Objservicios=new serviciosDao();
    return  $Objservicios->listaTodosServiciosCerrados();
  }

  public function cerrarServicioActual($id_servicio){
    $Objservicios=new serviciosDao();
    return  $Objservicios->cerrarServicio($id_servicio);
  }

  public function ultimoID(){
    $Objservicios=new serviciosDao();
    return $Objservicios->ultimoID();
  }
 public function verificarMinuta($id){
   $Objservicios=new serviciosDao();
   return $Objservicios->verificarMinuta($id);
 }

}
?>
