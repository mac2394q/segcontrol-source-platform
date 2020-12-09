<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."conductorController.php");
require_once(PERSISTENCIA_PATH."serviciosDao.php");
require_once(PERSISTENCIA_PATH."empleadoDao.php");
require_once(PERSISTENCIA_PATH."clienteDao.php");
require_once(PERSISTENCIA_PATH."conductorDao.php");
require_once(PERSISTENCIA_PATH."vehiculoDao.php");

 ?>
<a
  href="http://portalx.net/segcontrol/app/segcontrol/vistas/mitabla.php?id=1&rol=1"
  target="popup"
  onclick="window.open('', 'popup', 'width = 350, height = 600')">
  <i class='material-icons'>assignment_late</i>
</a>
<input id='cargar' name='cargar' type='hidden' value='carga' />
<div class=" alert alert bg-teal">
  <strong>Estadisticas del sistema.<div id="refresco"></div></strong>
</div>
<div class="row clearfix">
       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <div class="card info-box">
               <div class="icon bg-red"><i class="material-icons">account_box</i></div>
               <div class="content">
                   <div class="text">Numero de clientes </div>
                   <div class="number"><?php
                       $objdao4= new clienteDao();
                       echo $objdao4->nCliente();
                     ?></div>
               </div>
           </div>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <div class="card info-box-3 bg-light-green hover-expand-effect">
               <div class="icon"> <i class="material-icons">battery_charging_full</i> </div>
               <div class="content">
                   <div class="text">Numeros de conductores</div>
                   <div class="number"><?php
                       $objdao3= new conductorDao();
                       echo $objdao3->nConductor();
                     ?></div>
               </div>
           </div>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <div class="card info-box-3 bg-red">
               <div class="icon"><i class="zmdi zmdi-bookmark"></i> </div>
               <div class="content">
                   <div class="text">Numero de Empleados</div>
                   <div class="number"><?php
                       $objdao2= new empleadoDao();
                       echo $objdao2->nEmpleados();
                     ?></div>
               </div>
           </div>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
           <div class="card info-box-3 bg-cyan hover-zoom-effect">
               <div class="icon"> <i class="material-icons">gps_fixed</i> </div>
               <div class="content">
                   <div class="text">Numero de Servicios Activos </div>
                   <div class="number"><?php
                       $objdao1= new serviciosDao();
                       echo $objdao1->nServiciosActivos();
                     ?>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class=" alert alert bg-teal">
     <strong>Filtros.<div id="refresco"></div></strong>
   </div>
   <?php

   $objServi= new serviciosController();
   $objdao= new serviciosDao();
   // echo " vencidos ".$objdao->nMinutavencidos();
   // echo " pronto ".$objdao->nMinutaPronto();
   // echo " Tiempo ".$objdao->nMinutaTiempo();
   $arrayObj = array();
   $arrayObj = $objServi->listaTodosServiciosActivos();
   if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
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

  echo "<div id='tablax'> <div class='row clearfix '>
           <div class='col-xs-12 col-sm-12 col-md-12'>";
     echo  "
            <button type='button' id='tiempoServicio' class='btn  btn-raised btn-success btn-lg waves-effect'><i class='material-icons'>alarm_on</i> A Tiempo (".$objdao->nMinutaTiempo().") </button>
            <button type='button' id='prontoServicio' class='btn  btn-raised btn-warning btn-lg waves-effect'><i class='material-icons'>assignment_late</i> Pronto a Vencer (".$objdao->nMinutaPronto().")</button>
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
                       <th>ID</th>
                       <th>Conductor</th>
                       <th>Vehiculo</th>
                       <th>Cliente</th>
                       <th>Ruta</th>
                       <th>Seguimiento</th>
                       <th style='width:5%;' class='actions'></th>
                     </tr>
                    </thead>
                   <tbody class='no-border-x' >
                     ";
                     $c = 0;
                    foreach ($arrayObj as $clave => $valor) {
                      
                      $estado = $objServi->verificarMinuta($arrayObj[$clave]->getId_servicio());

                      $objCliente =new clienteController();
                      $arrayObj1=$objCliente->clienteId($arrayObj[$clave]->getId_cliente());

                      $objConductor=new conductorController();
                      $arrayObj2=$objConductor->ConductorId($arrayObj[$clave]->getId_conductor());

                      $objVehiculo=new vehiculoController();
                      $arrayObj3=$objVehiculo->vehiculoId($arrayObj[$clave]->getId_vehiculo());
                      $c++;

                      echo "<tr>
                                <td >".$c."</td>
                                <td >".$arrayObj2->getNombre_conductor()."</td>
                                <td >";
                                if(intval($estado)==3 ){
                                  echo "<a href='#' title='".$arrayObj[$clave]->getId_servicio()."' id='bitacora' class='text-success' ><p >".$arrayObj3->getPlaca()."<p>
                                </a>";
                              }else {
                                if(intval($estado)==2 ){
                                    echo "<a href='#' title='".$arrayObj[$clave]->getId_servicio()."' id='bitacora' class='text-warning' ><p>".$arrayObj3->getPlaca()."<p>
                                </a>";
                                   }else {
                                    echo "<a href='#' title='".$arrayObj[$clave]->getId_servicio()."' id='bitacora' class='text-danger' ><p>".$arrayObj3->getPlaca()."<p>
                                </a>";
                                  }
                                }
                                
                                echo "</td>
                                <td >".$arrayObj1->getRazon_social()."</td>
                                <td >".$arrayObj[$clave]->getRuta()."</td>";
                              if(intval($estado)==3 ){
                                  echo "<td  class='text-success'><i class='material-icons'>alarm_on</i>A tiempo </td>";
                              }else {
                                if(intval($estado)==2 ){
                                    echo "<td  class='text-warning'><i class='material-icons'>assignment_late</i>Pronto a vencer</td>";
                                   }else {
                                    echo "<td  class='text-danger'><i class='material-icons'>alarm_off</i>Vencido</td>";
                                  }
                                }
                               echo " <td style='width:5%; class='actions'><a href='#' title='".$arrayObj[$clave]->getId_servicio()."' id='bitacora' class='icon'><i class='material-icons'>assignment</i></a></td>
                            </tr>";
                          }
              echo "
                   </tbody>
                  </table>
                 </div>
               </div>
            </div>
          </div>
        </div></div>";
   }
     ?>
     <script>
          clearInterval(intervalo);
          var intervalo = setInterval(  function showSeconds(){
              console.log("verificador de estados de minutas ");
              var carga=document.getElementById("cargar");
              if(typeof carga == "undefined" ){
               console.log("carga fallida ");
              }else{
                if(document.getElementById("cargar").value == "carga" ){
                  console.log("carga reactiva funcionando");
                  url="administrador.php";
                   $.ajax({
                     url:   url,
                     type:  'post',
                     beforeSend: function () {},
                     success:  function (response) {$("#contenido").html(response);}});
                }else{
                  console.log("no es la interfaz del administrador ");
                }
              }
            },60000);
      //    clearInterval(intervalo);
     </script>
