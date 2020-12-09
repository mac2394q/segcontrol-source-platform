<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."usuarioController.php");
$u = $_POST['idUsuario'];
$var = new usuariosController();
$var->desactivar_Usuario($u);
?>
