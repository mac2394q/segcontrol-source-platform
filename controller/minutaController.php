<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(PERSISTENCIA_PATH."usuariosDao.php");
require_once(PERSISTENCIA_PATH."minutaDao.php");
require_once(PERSISTENCIA_PATH."serviciosDao.php");
require_once(MODEL_PATH."empleado.php");
require_once(MODEL_PATH."cliente.php");
require_once(MODEL_PATH."servicios.php");
require_once(MODEL_PATH."minuta.php");
require_once(MODEL_PATH."conductor.php");
require_once(MODEL_PATH."vehiculo.php");

class minutaController{

  public function registrarMinuta(minuta $minuta){
    $Objminuta=new minutaDao();
    return $Objminuta->registrarMinuta($minuta);
  }

  public function actualizarMinuta(minuta $minuta){
    $Objminuta=new minutaDao();
    return $Objminuta->actualizarMinuta($minuta);
  }

  public function listaMinutas(){
    $Objminuta=new minutaDao();
    return $Objminuta->listaGeneralMinuta();
  }

  public function minutasPorEmpleado($id_empleado){
    $Objminuta=new minutaDao();
    return $Objminuta->listaMinutaEm($id_empleado);
  }

  public function minutasPorServicios($id_servicio){
    $Objminuta=new minutaDao();
    return $Objminuta->listaMinutaId($id_servicio);
  }

  public function minutaPorId($id_minuta){
   $Objminuta=new minutaDao();
   return $Objminuta->minutaPorId($id_minuta);
 }

  public function minutaIdMAX(){

    $Objminuta=new minutaDao();
    return $Objminuta->ultimoID();
  }



}
?>
