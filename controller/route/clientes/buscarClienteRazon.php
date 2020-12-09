<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");

$con = new clienteController();
$razon=$_POST['RazonSocial'];
$arrayObj = array();
$arrayObj=$con->clienteIdNombre($razon);
if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
  echo  "<span> No se encuentra la razon social del cliente! </span>";
}else{
  echo "<div class='body'>
            <div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                     <p> <b> Cliente con su  Razon Social </b> </p>
                        <div class='btn-group  form-control ''>
                        <select name='cb1' id='cb1' class='form-control '  >";
                            foreach ($arrayObj as $clave => $valor) {
                            echo "<option value='".$arrayObj[$clave]->getId_cliente()."'>".$arrayObj[$clave]->getNombre()." / ".$arrayObj[$clave]->getRazon_social()."</option>";
                            }
                        echo "</select>
                        </div>
                </div>                
            </div>
        </div>";
    }
 ?>

