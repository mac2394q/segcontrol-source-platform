<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(PERSISTENCIA_PATH."usuariosDao.php");
require_once(PERSISTENCIA_PATH."serviciosDao.php");
require_once(PERSISTENCIA_PATH."empleadoDao.php");
require_once(MODEL_PATH."empleado.php");
require_once(MODEL_PATH."cliente.php");
require_once(MODEL_PATH."servicios.php");
require_once(MODEL_PATH."minuta.php");
require_once(MODEL_PATH."conductor.php");
require_once(MODEL_PATH."vehiculo.php");
require_once(MODEL_PATH."usuario.php");

class empleadoController{

  public function registrarEmpleado(empleado $empleado){
    $ObjEmpleado=new empleadoDao();
    return   $ObjEmpleado->registrarEmpleado($empleado);
  }

  public function actualizarEmpleado(empleado $empleado){
    $ObjEmpleado=new empleadoDao();
    return   $ObjEmpleado->actualizarEmpleado($empleado);
  }

  public function listaEmpleados(){
     $ObjEmpleado = new empleadoDao();
     return $ObjEmpleado->listaEmpleados();
  }

  public function empleadoId($id_empleado){
    $ObjEmpleado=new empleadoDao();
    return $ObjEmpleado->empleadoId($id_empleado);
  }

  public function empleadoIdUsuario($id_usuario){
    $ObjEmpleado=new empleadoDao();
    return   $ObjEmpleado->empleadoIdUsuario($id_usuario);
  }


}
?>
