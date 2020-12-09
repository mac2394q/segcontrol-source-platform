<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");

$con = new conductorController();
$Nombre=$_POST['Nombre'];
$arrayObj = array();
$arrayObj=$con->buscarConductor($Nombre);
if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
  echo  "<span> No se encuentra el nombre del empleado! </span>";
}else{
  echo "<div class='body'>
            <div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    <p> <b>Nombre del Conductor </b> </p>
                    <div class='btn-group  form-control '>
                        <select name='cb3' id='cb3' class='form-control ' >";
                            foreach ($arrayObj as $clave => $valor) {
                               echo "<option value='".$arrayObj[$clave]->getId_conductor()."'>".$arrayObj[$clave]->getNombre_conductor()."</option>";
                            }
                        echo "</select>  
                    </div>
                </div>
            </div>
        </div>";
    }
 ?>

