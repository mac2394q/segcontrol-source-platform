<?php

    include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
    require_once(CONTROLLER_PATH."correoServiciosController.php");
    require_once(MODEL_PATH."correoServicios.php");

    $controllerCorreo=new correoServiciosController();

    $act=0;
    if($controllerCorreo->actualizarCorreoServiciosActivacion($act)>0){
    $modelCorreo = new correoServicios(
        "NULL",
        $_POST["correo"],
        $_POST["clave"],
        1
    );
    if($controllerCorreo->registrarCorreoServicios($modelCorreo)>0){
            ?><script>alert ("El correo electronico ha sido registrado correctamente");</script><?php
        }else{
            ?><script>alert ("El correo electronico no ha sido registrado correctamente");</script><?php
        }
    }else{
        ?><script> alert ("No se ha podido registrar el correo");</script><?php
    }
?>