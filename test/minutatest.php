<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."libPDF/src/Cezpdf.php");
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."minutaController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(MODEL_PATH."servicios.php");
require_once(MODEL_PATH."minuta.php");




setlocale(LC_ALL,"es_ES");
ini_set('date.timezone','America/Bogota');
$fecha = date("Y-m-d H:i:s");
$objs = new serviciosController();
$idservicio=$objs->ultimoID();
echo "ultimo ".$idservicio."\n\n";
$minuta = new minuta("null",intval(1),intval(1),$fecha,"Inicio de servicio "," Inicio del servicio "," dfsd");
$minutaCon = new minutaController();

echo "\n".$minutaCon->registrarMinuta($minuta);


?>
