<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."empleadoController.php");
$con = new conductorDao();
$nombre = $_POST['nombre'];
$arrayObj = array();
$arrayObj=$con->buscarConductor($nombre);
if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
  echo  "<span> No se encuentra el conductor! </span>";
}else{
  echo "<table class='table table-striped table-borderless'>
  <thead>
   <tr>
    <th>Identificacion</th>
    <th>Nombre</th>
    <th>Telefono </th>
    <th>Telefono </th>
    <th>Telefono </th>
    <th style='width:5%;' class='actions'></th>
   </tr>
  </thead>
  <tbody class='no-border-x'>";
    foreach ($arrayObj as $clave => $valor) {
      echo "<tr>
                <td >".$arrayObj[$clave]->getCedula()."</td>
                <td >".$arrayObj[$clave]->getNombre_conductor()."</td>
                <td >".$arrayObj[$clave]->getTelefono1()."</td>
                <td >".$arrayObj[$clave]->getTelefono2()."</td>
                <td >".$arrayObj[$clave]->getTelefono3()."</td>

                <td style=' class='actions'><a href='#' title='".$arrayObj[$clave]->getId_conductor()."' id='idConductor' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
            </tr>";}
    echo " </tbody>
    </table>";
}
 ?>
