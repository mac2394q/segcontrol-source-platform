<?php session_start();
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."conductorController.php");

?>


<div class="row clearfix">  <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> Historial de servicios : Cliente <?php echo  $_SESSION['nombre']; ?><small>    </h2>
                    </div>
                    <div class="body">
                      <div class="well"> <code>Historial general de servicios registrados </code> <br>esta opcion carga un historial
                            general de todos los servicos que fueron terminados satisfactoriamente. </div>

                          <?
                          $objServi= new serviciosController();
                          $arrayObj = array();
                          $arrayObj = $objServi->serviciosPorClientenombre( $_SESSION['nombre']);
                          if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
                            echo "
                            <div class='row clearfix'>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                            <div class='card'>
                            <div class='body' id='footer'>
                            <div class='row'>
                            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                            <div class'header'>
                            <h2>No hay Servicios Registrados .</h2>
                            </div>
                            <div class='text-muted-dk'>Desea registrar un primer servicio en su sistema .</div>
                            <br>
                            <button type='button' id='nuevoServicio' class='btn btn-raised btn-default waves-effect'>
                            <i class='zmdi zmdi-developer-board zmdi-hc-4x'></i>
                            </button>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            ";
                          }else{
                            echo "
                            <div class='row clearfix '>
                            <div class='col-xs-12 col-sm-12 col-md-12'>
                            <div class='card aos-item' data-aos-duration='400' data-aos-delay='100' data-aos='fade-up'>
                            <div class='header'>
                            <h2>Historial de Servicios :  Clientes.</h2>
                            </div>
                            <div class='body table-responsive'>
                            <div id='tablan'>
                            <table class='table table-striped table-borderless'>
                            <thead>
                            <tr>
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
                            foreach ($arrayObj as $clave => $valor) {

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
                                         <td >".$arrayObj1->getRazon_social()."</td>
                                         <td >".$arrayObj[$clave]->getFecha_creacion()."</td>
                                         <td >".$arrayObj[$clave]->getRuta()."</td>";
                                         echo " <td style='width:5%; class='actions'><a href='#' title='".$arrayObj[$clave]->getId_servicio()."' id='bitacora' class='icon'><i class='material-icons'>assignment</i></a></td>
                                      </tr>";}
                              echo " </tbody>
                              </table>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div>";
                            }
                            ?>
                        </div>


                </div>
            </div>
        </div>
</div>

  </div>

  <!-- <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> Segcontrol GPS <small>El mejor servicio para todos nuestro clientes  - <a href="http://www.segcontrol.com.co/" target="_blank">Eduardo Arias CEO</a></small> </h2>

                    </div>
                    <div class="body"> <img src="http://segcontrol.com.co/images/slide/slide_4.jpg" class="js-animating-object img-responsive">
                        <div class="demo-image-copyright"> IPX SYSTEM Platform   </div>
                    </div>
                </div>
            </div>
        </div> -->
