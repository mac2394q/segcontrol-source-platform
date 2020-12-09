
<input id='cargar' name='cargar' type='hidden' value='carga' />

<div class="alert bg-teal">
    <strong>A tener en cuenta </strong><br>El sistema realiza  en tiempo real un refresco del estado de cada minuta de los servicios activos.<br>las Minuta debe generarse cada
    <a href="javascript:void(0);" class="alert-link">60 minutos </a>, el sistema genera un reporte para el cliente del estado de su servico asociado.
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card">
        <div class="body bg-green"><i class='material-icons'>alarm_on</i> Minutas a tiempo.<br>
           Minutas que tienen un registro de tiempo preciso segun el estandar de tiempo que lleva la bitacora del servicio.<br> </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card">
        <div class="body bg-amber"><i class='material-icons'>assignment_late</i> Minutas  pronto a vencerse.<br>
           Minutas que tienen un registro de tiempo pronto a vencerse ,el sistema pone esta etiqueta a la minutas que le quedan menos de 15 minutos para vencerse. </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card">
        <div class="body bg-red"><i class='material-icons'>alarm_off</i> Minutas con tiempo vencido.<br>
          Minutas que tienen un registro de tiempo vencido ,el sistema pone esta  la etiqueta a la minutas que ya superaron el tiempo estipulado apra la siguiente minuta </div>
    </div>
</div>

   <?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
   require_once(CONTROLLER_PATH."serviciosController.php");
   require_once(CONTROLLER_PATH."clienteController.php");
   require_once(CONTROLLER_PATH."vehiculoController.php");
   require_once(CONTROLLER_PATH."conductorController.php");
  require_once(PERSISTENCIA_PATH."serviciosDao.php");
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
  echo "<div class='row clearfix '>
           <div class='col-xs-12 col-sm-12 col-md-12'>
          ";
        // echo  "  <button type='button' id='todosServicio'  class='btn btn-raised btn-primary btn-lg waves-effect'><i class='material-icons'>history</i> Todos</button>
        //  <button type='button' id='tiempoServicio' class='btn  btn-raised btn-success btn-lg waves-effect'><i class='material-icons'>alarm_on</i> A Tiempo (".$objdao->nMinutaTiempo().") </button>
        //     <button type='button' id='prontoServicio' class='btn  btn-raised btn-warning btn-lg waves-effect'><i class='material-icons'>assignment_late</i> Pronto a Vencer (".$objdao->nMinutaPronto().")</button>
        //     <button type='button' id='vencidosServicio' class='btn  btn-raised btn-danger btn-lg  waves-effect'> <i class='material-icons'>alarm_off</i>Vencidos (".$objdao->nMinutavencidos().")</button>";

             echo "<div class='card aos-item' data-aos-duration='400' data-aos-delay='100' d ata-aos='fade-up'>
               <div class='header'>
                 <h2>Sistema de Notificaciones : <i class='material-icons'>chrome_reader_mode</i>  Listado de servicios Activos.</h2>
               </div>
               <div class='body table-responsive'>
                 <input id='estadoHidden' name='estadoHidden' type='hidden' value='0'/>
                 <table class='table table-striped table-borderless'>
                   <thead>
                     <tr>
                       <th>Conductor</th>
                       <th>Vehiculo</th>
                       <th>Cliente</th>
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
                                <td >".$arrayObj2->getNombre_conductor()."</td>
                                <td >".$arrayObj3->getPlaca()."</td>
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
                  url="servicios/serviciosActivos.php";
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
