<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
   require_once(CONTROLLER_PATH."vehiculoController.php");
   require_once(CONTROLLER_PATH."clienteController.php");

   $objcli= new clienteController();
   $objVehiculo= new vehiculoController();
   $arrayObj = array();
   $arrayObjcli = array();
   $arrayObj = $objVehiculo->listaVehiculos();
   if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
     echo "
     <div class='row clearfix'>
       <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        <div class='card'>
          <div class='body' id='footer'>
            <div class='row'>
              <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <div class'header'>
                  <h2>No hay vehiculos Activos .</h2>
                </div>
                <div class='text-muted-dk'>Desea registrar un primer Vehiculo en su sistema .</div>
                <br>
                 <button type='button' id='nuevoVehiculo' class='btn btn-raised btn-default waves-effect'>
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
                 <h2>Listados de Vehiculos Registrados en el Sistema.</h2>
               </div>

               <div class='body table-responsive'>
               <button type='button'  id='nuevoVehiculo' class='btn btn-raised btn-primary waves-effect'>Registrar Vehiculo</button>
               <div class='row clearfix'>
                   <div class='col-sm-8'>
                     <div class='form-group'>
                       <div class='form-line'>
                       <input type='text' class='form-control font-bold' name='busquedadVehiculo' id='busquedadVehiculo' placeholder='Buscar . . .' >
                       </div>
                     </div>
                   </div>
                   <div class='col-sm-4'>
                     <div class='form-group'>
                       <button type='button' id='buscarVehiculo' class='btn btn-raised bg-blue btn-lg waves-effect'> <i class='zmdi zmdi-search-replace zmdi-hc-4x'></i> </button>
                     </div>
                   </div>
                 </div>
                 <div id='tablavehiculo'>
                 <table class='table table-striped table-borderless'>
                   <thead>
                     <tr>
                       <th>vehiculo</th>
                       <th>Placa</th>
                       <th>Marca</th>
                       <th>Color</th>
                       <th>Trailer</th>

                       <th style='width:5%;' class='actions'></th>
                     </tr>
                    </thead>
                   <tbody class='no-border-x'>";
                         foreach ($arrayObj as $clave => $valor) {
                           echo "<tr>
                                     <td >".$arrayObj[$clave]->getId_vehiculo()."</td>
                                     <td >".$arrayObj[$clave]->getPlaca()."</td>
                                     <td >".$arrayObj[$clave]->getMarca()."</td>
                                     <td >".$arrayObj[$clave]->getColor()."</td>
                                     <td >".$arrayObj[$clave]->getN_trailer()."</td>

                                     <td style=' class='actions'><a href='#' title='".$arrayObj[$clave]->getId_vehiculo()."' id='idVehiculo' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
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
