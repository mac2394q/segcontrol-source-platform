<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
$con = new serviciosController();
$id = $_POST['idservicio'];
if($con->cerrarServicioActual(intval($id)) > 0){
  echo '<div class="alert alert-success">
           <strong>Servicio cerrado Correctamente.
        </div>';
}else {
    echo '<div class="alert alert-danger">
     <strong>No se puede cerrar el servicio actual.
    </div>';
}

?>
