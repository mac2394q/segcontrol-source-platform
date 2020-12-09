<?php

    include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
    require_once(CONTROLLER_PATH."correoServiciosController.php");
    require_once(MODEL_PATH."correoServicios.php");

    $controllerCorreo=new correoServiciosController();
    
    $act=0;
    $id=$_POST["idCorreo"];
    $activacion=1;
    
    if($controllerCorreo->actualizarCorreoServiciosActivacion($act)>0){
      
        if($controllerCorreo->actualizarCorreoServicios($id,$activacion)>0){
            ?><script>alert ("El correo electronico ha sido asignado correctamente");</script><?php
        }else{
            ?><script>alert ("El correo electronico no ha sido asignado correctamente");</script><?php
        }   
    }else{
        ?><script>alert ("Error al asignar el correo electronico");</script><?php
    }
    
?>