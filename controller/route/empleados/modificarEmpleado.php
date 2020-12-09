<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."empleadoController.php");
require_once(CONTROLLER_PATH."usuariosController.php");
require_once(MODEL_PATH."empleado.php");
require_once(MODEL_PATH."usuario.php");
$controller_usuario = new usuariosController();
$model_usuario = new usuario(
$_POST['id_usuario'],
intval($_POST['rol']),
$_POST['user'],
$_POST['password'],
"ACTIVO");

if($controller_usuario->actualizarUsuario($model_usuario)>= 0){
  $controller_empleado = new empleadoController();
  $model_empleado = new empleado(
  $_POST['id_empleado'],
  $_POST['id_usuario'],
  $_POST['nombre'],
  $_POST['tipo_documento'],
  $_POST['numero_documento'],
  $_POST['direccion'],
  $_POST['ciudad'],
  $_POST['fijo'],
  $_POST['celular1'],
  $_POST['celular2'],
  $_POST['celular3'],
  $_POST['email'],
  $_POST['foto']);
  if($controller_empleado->actualizarEmpleado($model_empleado)>=0){
    echo '<div class="alert alert-success">
             <strong>Empleado Actualizado.
          </div>';
  }else{
    echo '<div class="alert alert-danger">
             <strong>error no se puede actualizar el empleado.
          </div>';
  }

}else{
  //en caso no poder cumplirse enviara un mensje  con alerta tipo error
  echo '<div class="alert alert-danger">
   <strong>error no se puede actualizar el usuario.
  </div>';
}
?>
