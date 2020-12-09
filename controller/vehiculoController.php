<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(PERSISTENCIA_PATH."usuariosDao.php");
require_once(PERSISTENCIA_PATH."serviciosDao.php");
require_once(PERSISTENCIA_PATH."vehiculoDao.php");
require_once(MODEL_PATH."empleado.php");
require_once(MODEL_PATH."cliente.php");
require_once(MODEL_PATH."servicios.php");
require_once(MODEL_PATH."minuta.php");
require_once(MODEL_PATH."conductor.php");
require_once(MODEL_PATH."vehiculo.php");

class vehiculoController{

  public function registrarVehiculo(vehiculo $vehiculo){
    $ObjVehiculo=new vehiculoDao();
    return $ObjVehiculo->registrarVehiculo($vehiculo);
  }

  public function  actualizarVehiculo(vehiculo $vehiculo){
    $ObjVehiculo=new vehiculoDao();
    return $ObjVehiculo->actualizarVehiculo($vehiculo);
  }

  public function listaVehiculos(){
    $ObjVehiculo=new vehiculoDao();
    return   $ObjVehiculo->listaVehiculo();
  }

  public function vehiculoId($id_vehiculo){
    $ObjVehiculo=new vehiculoDao();
    return $ObjVehiculo->listaVehiculoId($id_vehiculo);
  }

  public function vehiculosPorCliente($id_cliente){
    $ObjVehiculo=new vehiculoDao();
    return $ObjVehiculo->listaVehiculoCli($id_cliente);
  }

  public function buscarVehiculo($placa){
    $ObjVehiculo=new vehiculoDao();
    return $ObjVehiculo->buscarVehiculo($placa);
  }


}
?>
