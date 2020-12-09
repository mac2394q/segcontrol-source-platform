

   <?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
   require_once(CONTROLLER_PATH."serviciosController.php");

   $objServi= new serviciosController();
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
                 <button type='button' id='agregar_servicio_main' class='btn btn-raised btn-default waves-effect'>
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
             <div class='card aos-item' data-aos-duration='400' data-aos-delay='100' data-aos='fade-up'>
               <div class='header'>
                 <h2>Sistema de Notificaciones :  Minutas de servicios Activos.</h2>
               </div>
               <div class='body table-responsive'>
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
                   <tbody class='no-border-x'>";
                         foreach ($arrayObj as $clave => $valor) {
                           echo "<tr>
                                     <td >".$arrayObj[$clave]->getEstado()."</td>
                                     <td >".$arrayObj[$clave]->getId_conductor()."</td>
                                     <td >".$arrayObj[$clave]->getId_vehiculo()."</td>
                                     <td >".$arrayObj[$clave]->getId_cliente()."</td>
                                     <td >".utf8_encode($arrayObj[$clave]->getCiudad_origen())."</td>
                                     <td >".utf8_encode($arrayObj[$clave]->getCiudad_destino())."</td>
                                     <td >".$arrayObj[$clave]->getFecha_creacion()."</td>
                                     <td >".$arrayObj[$clave]->getRuta()."</td>
                                     <td  class='text-success '>A tiempo</td>
                                     <td style='width:5%; class='actions'><a href='#' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
                                 </tr>";}
             echo " </tbody>
                 </table>
               </div>
            </div>
          </div>
        </div>";
   }
     ?>
