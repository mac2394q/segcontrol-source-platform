
   <?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
   require_once(CONTROLLER_PATH."serviciosController.php");
   require_once(CONTROLLER_PATH."clienteController.php");
   require_once(CONTROLLER_PATH."vehiculoController.php");
   require_once(CONTROLLER_PATH."conductorController.php");
  require_once(PERSISTENCIA_PATH."serviciosDao.php");


//   set_error_handler('errorHandler');
//
// function errorHandler( $errno, $errstr, $errfile, $errline, $errcontext)
// {
//   echo 'Into '.__FUNCTION__.'() at line '.__LINE__.
//   "<br><br><br><br><br><br>nn---ERRNO---n". print_r( $errno, true).
//   "<br><br><br><br><br><br>nn---ERRSTR---n". print_r( $errstr, true).
//   "<br><br><br><br><br><br>nn---ERRFILE---n". print_r( $errfile, true).
//   "<br><br><br><br><br><br>nn---ERRLINE---n". print_r( $errline, true).
//   "<br><br><br><br><br><br>nn---ERRCONTEXT---n".print_r( $errcontext, true).
//   "<br><br><br><br><br><br>nnBacktrace of errorHandler()n".
//   print_r( debug_backtrace(), true);
// }

$objServi= new serviciosController();
$objServi= new serviciosController();
$objServi= new serviciosController();
$objServi= new serviciosController();
$objServi= new serviciosController();
   $objServi= new serviciosController();
   $objdao= new serviciosDao();
   // echo " vencidos ".$objdao->nMinutavencidos();
   // echo " pronto ".$objdao->nMinutaPronto();
   // echo " Tiempo ".$objdao->nMinutaTiempo();
   $arrayObj = array();   $arrayObjx = array();
   $arrayObjx = $objdao->verificarMinutaTiempo();
   if(is_null( $arrayObjx) == true || empty($arrayObjx) ==true  ){
     echo "
     <div class='row clearfix'>
       <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        <div class='card'>
          <div class='body' id='footer'>
            <div class='row'>
              <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <div class'header'>
                  <h2>No hay Servicios a Tiempo.</h2>
                </div>
                </div>
              </div>
            </div>
            <div class='col-xs-12 col-sm-12 col-md-12'>

             </div>
          </div>
      </div>
     ";
   }else{
  echo "<div class='row clearfix '>
           <div class='col-xs-12 col-sm-12 col-md-12'>";

    echo  " <button type='button' id='tiempoServicio' class='btn  btn-raised btn-success btn-lg waves-effect'><i class='material-icons'>alarm_on</i> A Tiempo (".$objdao->nMinutaTiempo().") </button>
            <button type='button' id='prontoServicio' class='btn  btn-raised btn-warning btn-lg waves-effect'><i class='material-icons'>alarm</i> Pronto a Vencer (".$objdao->nMinutaPronto().")</button>
            <button type='button' id='vencidosServicio' class='btn  btn-raised btn-danger btn-lg  waves-effect'> <i class='material-icons'>alarm_off</i>Vencidos (".$objdao->nMinutavencidos().")</button>";

             echo "<div class='card aos-item' data-aos-duration='400' data-aos-delay='100' d ata-aos='fade-up'>
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
                       <th>Fecha de Inicio</th>
                       <th>Ruta</th>
                       <th>Seguimiento</th>
                       <th style='width:5%;' class='actions'></th>
                     </tr>
                    </thead>
                   <tbody class='no-border-x' >";
                   foreach ($arrayObjx as $clave => $valor) {
                     $arrayObj = $objdao->servicioId($arrayObjx[$clave]->getId_servicio());
                     $arrayObj1 = array();
                     $arrayObj2 = array();
                     $arrayObj3 = array();
                     $objCliente =new clienteController();
                     $arrayObj1=$objCliente->clienteId($arrayObj->getId_cliente());

                     $objConductor=new conductorController();
                     $arrayObj2=$objConductor->ConductorId($arrayObj->getId_conductor());

                     $objVehiculo=new vehiculoController();
                     $arrayObj3=$objVehiculo->vehiculoId($arrayObj->getId_vehiculo());

                     echo "<tr>
                               <td >".$arrayObj->getEstado()."</td>
                               <td >".$arrayObj2->getNombre_conductor()."</td>
                               <td >".$arrayObj3->getPlaca()."</td>
                               <td >".$arrayObj1->getRazon_social()."</td>
                               <td >".$arrayObj->getFecha_creacion()."</td>
                               <td >".$arrayObj->getRuta()."</td>";
                      echo "<td  class='text-success'>A tiempo </td>";
                      echo " <td style='width:5%; class='actions'><a href='#' title='".$arrayObj->getId_servicio()."' id='bitacora' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
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
