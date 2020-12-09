<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(PERSISTENCIA_PATH."usuariosDao.php");
require_once(PERSISTENCIA_PATH."serviciosDao.php");
require_once(PERSISTENCIA_PATH."conductorDao.php");
require_once(MODEL_PATH."empleado.php");
require_once(MODEL_PATH."cliente.php");
require_once(MODEL_PATH."servicios.php");
require_once(MODEL_PATH."minuta.php");
require_once(MODEL_PATH."conductor.php");
require_once(MODEL_PATH."vehiculo.php");

class conductorController{

  public function registrarConductor(conductor $conductor){
    $Objconductor=new conductorDao();
    return $Objconductor->registrarConductor($conductor);
  }

  public function actualizarConductor(conductor $conductor){
    $Objconductor=new conductorDao();
    return $Objconductor->actualizarConductor($conductor);
  }

  public function listaConductor(){
    $Objconductor=new conductorDao();
    return $Objconductor->listaConductor();
  }

  public function ConductorId($id_conductor){
    $Objconductor=new conductorDao();
    return $Objconductor->listaConductorId($id_conductor);
  }

  public function buscarConductor($Nombre){
    $Objconductor=new conductorDao();
    return $Objconductor->buscarConductor($Nombre);
  }
}
?>
