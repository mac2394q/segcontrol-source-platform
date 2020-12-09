<?php 

    include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
    require_once(PERSISTENCIA_PATH."correoServiciosDao.php");
    require_once(MODEL_PATH."correoServicios.php");

class correoServiciosController{

  public function registrarCorreoServicios(correoServicios $correoServicios){
    $ObjcorreoServicios=new correoServiciosDao();
    return $ObjcorreoServicios->registrarCorreoServicios($correoServicios);
  }

  public function actualizarCorreoServicios($id,$act){
    $ObjcorreoServicios=new correoServiciosDao();
    return $ObjcorreoServicios->actualizarCorreoServicios($id,$act);
  }

  public function actualizarCorreoServiciosActivacion($act){
    $ObjcorreoServicios=new correoServiciosDao();
    return $ObjcorreoServicios->actualizarCorreoServiciosActivacion($act);
  }

  public function listaCorreoServicios(){
    $ObjcorreoServicios=new correoServiciosDao();
    return $ObjcorreoServicios->listaCorreoServicios();
  }

  public function correoServiciosIdActivacion(){
    $ObjcorreoServicios=new correoServiciosDao();
    return $ObjcorreoServicios->correoServiciosIdActivacion();
  }
}
?>