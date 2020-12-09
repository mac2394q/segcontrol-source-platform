<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."aseguradoraController.php");
require_once(MODEL_PATH."aseguradora.php");
$controller_aseguradora = new aseguradoraController();
$model_aseguradora = new aseguradora(
$_POST['id_aseguradora'],
$_POST['valor'],
$_POST['fecha'],
$_POST['hora'],
$_POST['autorizacion'],
$_POST['area'],
$_POST['tipo_servicio'],
$_POST['descripcion'],
$_POST['placa'],
$_POST['contenedor'],
$_POST['tipo_vehiculo'],
$_POST['color'],
$_POST['cb2'],
$_POST['idhora_llegada'],
$_POST['idhora_finalizacion'],
$_POST['cb1']
);
if($controller_aseguradora->actualizarAseguradora($model_aseguradora)>0){

  echo '<div class="alert alert-success">
           <strong> Aseguradora actualizada.
        </div>';
}else{

  echo '<div class="alert alert-danger">
           <strong>No se pudo actualizar la aseguradora.
        </div>';
}
?>
