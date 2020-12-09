<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."conductorController.php");
require_once(MODEL_PATH."conductor.php");
$controller_conductor = new conductorController();
$model_conductor = new conductor(
$_POST['idConductor'],
$_POST['ccConductor'],
$_POST['nameConductor'],
$_POST['telefono1'],
$_POST['telefono2'],
$_POST['telefono3']

);
if($controller_conductor->actualizarConductor($model_conductor)>0){
  echo '<div class="alert alert-success">
           <strong>Conductor Actualizado.
        </div>';
}else{

  echo '<div class="alert alert-danger">
           <strong>error no se pudo actualizar el conductor.
        </div>';
}
?>
