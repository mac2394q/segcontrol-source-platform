
   <?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
   require_once(CONTROLLER_PATH."serviciosController.php");
   require_once(CONTROLLER_PATH."clienteController.php");
   require_once(CONTROLLER_PATH."vehiculoController.php");
   require_once(CONTROLLER_PATH."conductorController.php");

   $objServi= new serviciosController();
   $arrayObj = array();
   $arrayObj = $objServi->listaTodosServiciosActivosCliente($_SESSION['id']);

   if(is_null($arrayObj) == true || empty($arrayObj) ==true ){
     echo "
     <div class='row clearfix'>
       <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        <div class='card'>
          <div class='body' id='footer'>
            <div class='row'>
              <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <div class'header'>
                  <h2>No hay Servicios Activos .</h2>
                </div>
                </div>
              </div>
            </div>
          </div>
      </div>
     ";
   }else{
  echo "<div class='row clearfix '>
           <div class='col-xs-12 col-sm-12 col-md-12'>


             <div class='card aos-item' data-aos-duration='400' data-aos-delay='100' data-aos='fade-up'>
               <div class='header'>
                 <h2>Sistema de Notificaciones :  Minutas de servicios Activos.</h2>
               </div>
               <div class='body table-responsive'>
                 <input id='estadoHidden' name='estadoHidden' type='hidden' value='0'/>
                 <table class='table table-striped table-borderless'>
                   <thead>
                     <tr>
                       <th>Estado</th>
                       <th>Conductor</th>
                       <th>Vehiculo</th>
                       <th>Cliente</th>
                       <th>Ciudad origen</th>
                       <th>Ciudad Destino</th>
                       <th>Fecha de Inicio</th>
                       <th>Ruta</th>
                       <th>Seguimiento</th>
                       <th style='width:5%;' class='actions'></th>
                     </tr>
                    </thead>
                   <tbody class='no-border-x' >
                    <div id='tabla' ";
                    foreach ($arrayObj as $clave => $valor) {

                      $estado = $objServi->verificarMinuta($arrayObj[$clave]->getId_servicio());

                      $objCliente =new clienteController();
                      $arrayObj1=$objCliente->clienteId($arrayObj[$clave]->getId_cliente());

                      $objConductor=new conductorController();
                      $arrayObj2=$objConductor->ConductorId($arrayObj[$clave]->getId_conductor());

                      $objVehiculo=new vehiculoController();
                      $arrayObj3=$objVehiculo->vehiculoId($arrayObj[$clave]->getId_vehiculo());

                      echo "<tr>
                                <td >".$arrayObj[$clave]->getEstado()."</td>
                                <td >".$arrayObj2->getNombre_conductor()."</td>
                                <td >".$arrayObj3->getPlaca()."</td>
                                <td >".$arrayObj1->getNombre()."</td>
                                <td >".utf8_encode($arrayObj[$clave]->getCiudad_origen())."</td>
                                <td >".utf8_encode($arrayObj[$clave]->getCiudad_destino())."</td>
                                <td >".$arrayObj[$clave]->getFecha_creacion()."</td>
                                <td >".$arrayObj[$clave]->getRuta()."</td>";

                              if(intval($estado)==3 ){
                                  echo "<td  class='text-success'>A tiempo </td>";
                              }else {
                                if(intval($estado)==2 ){
                                    echo "<td  class='text-warning'>Pronto a vencer</td>";
                                   }else {
                                    echo "<td  class='text-danger'>Vencido</td>";
                                  }
                                }
                               echo " <td style='width:5%; class='actions'><a href='#' title='".$arrayObj[$clave]->getId_servicio()."' id='bitacora' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
                            </tr>";
                          }
              echo "</div>
                   </tbody>
                  </table>
                 </div>
               </div>
            </div>
          </div>
        </div>";
   }
     ?>
