<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."usuarioController.php");
$u = $_POST['claveActual'];
$c = $_POST['claveNueva'];
$var = new usuarioController();
$var->cambioClave($u,$c);
?>
