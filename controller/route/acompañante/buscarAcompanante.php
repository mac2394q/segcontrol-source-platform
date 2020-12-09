<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."empleadoController.php");
require_once(PERSISTENCIA_PATH."acompananteDao.php");
$con = new acompananteDao();
$nombre = $_POST['nombre'];
$arrayObj = array();
$arrayObj=$con->buscarAcompanante($nombre);
if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
  echo  "<span> No se encuentra el Acompanante! </span>";
}else{
  echo "<table class='table table-striped table-borderless'>
    <thead>
      <tr>
        <th>Nomber</th>
        <th>Cedula</th>
        <th>Placa</th>
        <th>Marca</th>
        <th>Color</th>
        <th>Ver</th>
        <th style='width:5%;' class='actions'></th>
      </tr>
     </thead>
    <tbody class='no-border-x'>";
          foreach ($arrayObj as $clave => $valor) {
            echo "<tr>
                      <td >".$arrayObj[$clave]->getNombre()."</td>
                      <td >".$arrayObj[$clave]->getCedula()."</td>
                      <td >".$arrayObj[$clave]->getPlaca()."</td>
                      <td >".$arrayObj[$clave]->getMarca()."</td>
                      <td >".$arrayObj[$clave]->getColor()."</td>
                      <td style=' class='actions'><a href='#' title='".$arrayObj[$clave]->getId_acompanante()."' id='idAcompanante' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
                  </tr>";}
    echo " </tbody>
    </table>";
}
 ?>
