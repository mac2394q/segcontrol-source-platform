<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."acompananteController.php");
require_once(MODEL_PATH."acompanante.php");
$controller_acompañante = new acompananteController();
$model_acompañante = new acompanante(
$_POST['id_acompanante'],
$_POST['nombre'],
$_POST['cedula'],
$_POST['telefono'],
$_POST['placa'],
$_POST['tipo'],
$_POST['marca'],
$_POST['color']
);
if($controller_acompañante->actualizarAcompanante($model_acompañante)>0){
  echo '<div class="alert alert-success">
           <strong>Acompañante actualizado.
        </div>';
}else{
  echo '<div class="alert alert-danger">
           <strong>No se pudo actualizar el Acompañante
        </div>';
}
?>
