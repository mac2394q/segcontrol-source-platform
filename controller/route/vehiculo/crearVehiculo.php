<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(MODEL_PATH."vehiculo.php");
$controller_vehiculo = new vehiculoController();


if(intval($_POST['id_cliente'])==0){$id = "NULL";}else{$id = $_POST['id_cliente'];}
$model_vehiculo = new vehiculo(
"NULL",
$id,
$_POST['Placa'],
$_POST['Marca'],
$_POST['Color'],
$_POST['trailer']
);
if($controller_vehiculo->registrarVehiculo($model_vehiculo)>0){
  echo '<div class="alert alert-success">
           <strong>Registro de vehiculo Completo .</strong>
      </div>';
}else{
  echo '<div class="alert alert-danger">
           <strong> No se pudo realizar el registro del vehiculo.</strong>
           </div>';
}

?>
