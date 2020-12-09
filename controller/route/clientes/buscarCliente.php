<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."empleadoController.php");
$con = new clienteDao();
$con2 = new usuariosDao();
$nombre = $_POST['nombre'];
$arrayObj = array();
$arrayObj=$con->clienteNombre($nombre);
if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
  echo  "<span> No se encuentra el cliente! </span>";
}else{
  echo "
              <table class='table table-striped table-borderless'>
                   <thead>
                     <tr>
                       <th>Nombre</th>
                       <th>Razon Social</th>
                       <th>Ciudad</th>
                       <th>Usuario Asignado</th>

                       <th style='width:5%;' class='actions'></th>
                     </tr>
                    </thead>
                    <tbody class='no-border-x'>";
                         foreach ($arrayObj as $clave => $valor) {
                          $arrayObjUsu = $con2->usuarioId( intval($arrayObj[$clave]->getId_usuario()) );

                          if(intval($arrayObjUsu->getId_rol())==1){
                             $rol="administrador";
                          }else{
                              if(intval($arrayObjUsu->getId_rol())==2){
                                $rol="asistente";
                              }else{
                                $rol="cliente";
                                }
                          }

                           echo "<tr>
                                     <td >".$arrayObj[$clave]->getNombre()."</td>
                                     <td >".$arrayObj[$clave]->getRazon_social()."</td>
                                     <td >".$arrayObj[$clave]->getCiudad()."</td>
                                     <td >".$arrayObjUsu->getUsuario()."</td>
                                     <td >".$rol."</td>
                                     <td style=' class='actions'><a href='#' title='".$arrayObj[$clave]->getId_cliente()."' id='idCliente' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
                                 </tr>";
                          }
             echo " </tbody>
                </table>";
}
 ?>
