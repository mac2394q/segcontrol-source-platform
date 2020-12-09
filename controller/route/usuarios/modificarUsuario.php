<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."usuarioController.php");
require_once(MODEL_PATH."usuario.php");

$controller_usuario = new usuarioController();
$model_usuario = new usuario(
$_POST['id_usuario'],
$_POST['idRol'],
$_POST['usuario'],
$_POST['clave']

);
$controller_usuario->actualizarUsuario($model_usuario);

?>
