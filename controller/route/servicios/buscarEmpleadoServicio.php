<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."empleadoController.php");
$con = new serviciosDao();
$id = $_POST['busquedaHistorial'];
$fechai= $_POST['fechai'];
$fechaf= $_POST['fechaf'];
$arrayObj = array();
$arrayObj=$con->servicioEmpleado($id,$fechai,$fechaf);
if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
  echo  "<span> No se encuentra el empleado! </span>";
}else{
  echo "<table class='table table-striped table-borderless'>
  <thead>
   <tr>
    <th>Estados</th>
    <th>Empleado</th>
    <th>Conductor</th>
    <th>Vehiculo</th>
    <th>Cliente</th>
    <th>Fecha de Inicio</th>
    <th>Ruta</th>
    <th style='width:5%;' class='actions'></th>
   </tr>
  </thead>
  <tbody class='no-border-x'>";
  foreach ($arrayObj as $clave => $valor) {

    $arrayObj1 = array();
    $arrayObj2 = array();
    $arrayObj3 = array();
    $arrayObj4 = array();

    $objCliente =new clienteController();
    $arrayObj1=$objCliente->clienteId($arrayObj[$clave]->getId_cliente());

    $objConductor=new conductorController();
    $arrayObj2=$objConductor->ConductorId($arrayObj[$clave]->getId_conductor());

    $objVehiculo=new vehiculoController();
    $arrayObj3=$objVehiculo->vehiculoId($arrayObj[$clave]->getId_vehiculo());

    $objEmpleado=new empleadoController();
    $arrayObj4=$objEmpleado->empleadoId($arrayObj[$clave]->getId_empleado());
     echo "<tr>
               <td >".$arrayObj4->getNombre()."</td>
               <td >".$arrayObj[$clave]->getEstado()."</td>
               <td >".$arrayObj2->getNombre_conductor()."</td>
               <td >".$arrayObj3->getPlaca()."</td>
               <td >".$arrayObj1->getNombre()."</td>
               <td >".$arrayObj[$clave]->getFecha_creacion()."</td>
               <td >".$arrayObj[$clave]->getRuta()."</td>";
               echo " <td style='width:5%; class='actions'><a href='#' title='".$arrayObj[$clave]->getId_servicio()."' id='bitacora' class='icon'><i class='material-icons'>assignment</i></a></td>
            </tr>";}
    echo " </tbody>
    </table>";
}
 ?>
