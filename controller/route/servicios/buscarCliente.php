<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
$con = new serviciosController();


$id = $_POST['busquedaHistorial'];
// $fechai= $_POST['fechai'];
// $fechaf= $_POST['fechaf'];
$arrayObj = array();
$arrayObj=$con->serviciosPorClientenombre($id);
if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
  echo  "<span> No se encuentra el cliente! </span>";
}else{

  echo "<table class='table table-striped table-borderless'>
  <thead>
   <tr>
    <th>Razon Social</th>
    <th>Estado</th>
    <th>Conductor</th>
    <th>Vehiculo</th>
    <th>Cliente</th>
    <th>Fecha de Inicio</th>
    <th>Ruta</th>
    <th style='width:5%;' class='actions'></th>
   </tr>
  </thead>
  <tbody class='no-border-x'>";
  $arrayObj1 = array();
  $arrayObj2 = array();
  $arrayObj3 = array();
  $objCliente =new clienteController();
  $arrayObj1=$objCliente->clienteId($arrayObj[0]->getId_cliente());

  $objConductor=new conductorController();
  $arrayObj2=$objConductor->ConductorId($arrayObj[0]->getId_conductor());

  // echo "<tr>
  //           <td >".$arrayObj[0]->getEstado()."</td>
  //           <td >".$arrayObj2->getNombre_conductor()."</td>
  //           <td >".$arrayObj3->getPlaca()."</td>
  //           <td >".$arrayObj1->getNombre()."</td>
  //           <td >".$arrayObj[0]->getFecha_creacion()."</td>
  //           <td >".$arrayObj[0]->getRuta()."</td>";
  //          echo " <td style='width:5%; class='actions'><a href='#' title='".$arrayObj[0]->getId_servicio()."' id='verServicio' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
  //          <td style='width:5%; class='actions'><a href='#' title='".$arrayObj[0]->getId_servicio()."' id='bitacora' class='icon'><i class='material-icons'>publish</i></a></td>
  //        </tr>";
  foreach ($arrayObj as $clave => $valor) {
    $objVehiculo=new vehiculoController();
    $arrayObj3=$objVehiculo->vehiculoId($arrayObj[$clave]->getId_vehiculo());
     echo "<tr>
               <td >".$arrayObj1->getRazon_social()."</td>
               <td >".$arrayObj[$clave]->getEstado()."</td>
               <td >".$arrayObj2->getNombre_conductor()."</td>
               <td >".$arrayObj3->getPlaca()."</td>
               <td >".$arrayObj1->getNombre()."</td>
               <td >".$arrayObj[$clave]->getFecha_creacion()."</td>
               <td >".$arrayObj[$clave]->getRuta()."</td>";
              echo " <td style='width:5%; class='actions'><a href='#' title='".$arrayObj[$clave]->getId_servicio()."' id='verServicio' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
              <td style='width:5%; class='actions'><a href='#' title='".$arrayObj[$clave]->getId_servicio()."' id='bitacora' class='icon'><i class='material-icons'>publish</i></a></td>
           </tr>";
  }
    echo " </tbody>
    </table>";
}
 ?>
