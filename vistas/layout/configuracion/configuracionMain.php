<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
   require_once(CONTROLLER_PATH."correoServiciosController.php");


  $objCorreos= new correoServiciosController();
  $arrayObj = array();
  $arrayObj = $objCorreos->listaCorreoServicios();
   if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
     echo "
     <div class='row clearfix'>
       <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        <div class='card'>
          <div class='body' id='footer'>
            <div class='row'>
              <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <div class'header'>
                  <h2>No hay correos registrados .</h2>
                </div>
                <div class='text-muted-dk'>Desea registrar un primer Correo en su sistema .</div>
                <br>
                 <button type='button' id='nuevoCorreo' class='btn btn-raised btn-default waves-effect'>
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
                 <h2>Listados de correos Registrados en el Sistema.</h2>
               </div>

               <div class='body table-responsive'>
               <button type='button'  id='nuevoCorreo' class='btn btn-raised btn-primary waves-effect'>Registrar Correo</button>
                 <table class='table table-striped table-borderless'>
                   <thead>
                     <tr>
                       <th>Id_Correo</th>
                       <th>Correo</th>
                       <th>Clave</th>
                       <th>Accion</th>
                       <th style='width:5%;' class='actions'></th>
                     </tr>
                    </thead>
                   <tbody class='no-border-x'>";
                         foreach ($arrayObj as $clave => $valor) {
                            echo "<tr>
                                     <td >".$arrayObj[$clave]->getId_correos()."</td>
                                     <td >".$arrayObj[$clave]->getCorreo()."</td>
                                     <td >".$arrayObj[$clave]->getClave()."</td>
                                    <td style=' class='actions'><a href='#' title='".$arrayObj[$clave]->getId_correos()."' id='idCorreo' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
                                 </tr>";}
             echo " </tbody>
                 </table>
               </div>
            </div>
          </div>
        </div>";
        
   }
     ?>
