<?php

class ParametrosSistema{

//servidor local
// private  $nombreBD="segcontrol1";
// private  $IPBD="localhost";
// private  $usuarioBD="roost";
// private  $claveBD="";

//servidor ipxsystem
// private  $nombreBD="segcontrol";
// private  $IPBD="localhost";
// private  $usuarioBD="hhgomez";
// private  $claveBD="GAUS2871";

//servidor portalx.net
 private  $nombreBD="portalxn_segcontrol";
private  $IPBD="192.185.128.14";
 private  $usuarioBD="portalxn_admin";
 private  $claveBD="f11235813";
 
public function __construct(){}

//nombre de la base de dato
 function getNombreBD(){return $this->nombreBD;}

//ip de la base de dato
 function getIPBD(){return $this->IPBD;}

//usuario de la base de dato
function getUsuarioBD(){return $this->usuarioBD;}

//clave para acceder a la base de datos
function getClaveBD(){return $this->claveBD;}

}

?>
