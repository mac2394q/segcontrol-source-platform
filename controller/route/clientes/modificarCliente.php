<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."usuariosController.php");
require_once(MODEL_PATH."cliente.php");
require_once(MODEL_PATH."usuario.php");


 $controller_usuario = new usuariosController();
 $model_usuario = new usuario(
 $_POST['id_usuario'],
 3,
 $_POST['user'],
 $_POST['password'],
 "ACTIVO");


 if($controller_usuario->actualizarUsuario($model_usuario)>=0){

   $controller_cliente = new clienteController();
   $model_cliente = new cliente(
   $_POST['id_cliente'],
   $_POST['id_usuario'],
   $_POST['cliente_social'],
   $_POST['cliente_nit'],
   $_POST['cliente_nombre_contacto'],
   $_POST['cliente_direccion'],
   $_POST['cliente_ciudad'],
   $_POST['cliente_telefono1'],
   $_POST['cliente_telefono2'],
   $_POST['cliente_telefono3'],
   $_POST['cliente_email1'],
   $_POST['cliente_email2'],
   $_POST['cliente_email3'],
   $_POST['cliente_email4'],
   $_POST['cliente_email5'],
   $_POST['clienta_email6'],
   $_POST['cliente_email7'],
   $_POST['cliente_email8'],
   " ");
   if($controller_cliente->actualizarCliente($model_cliente)>=0){
     echo '<div class="alert alert-success">
              <strong>Cliente Actualizado.
           </div>';
   }else{

      echo '<div class="alert alert-danger">
               <strong>error no se pudo actualizar el cliente en el sistema.
            </div>';
   }
 }else{
   echo '<div class="alert alert-danger">
            <strong>error no se pudo actualizar el usuario.
         </div>';
 }
?>
