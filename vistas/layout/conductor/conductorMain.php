<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
   require_once(CONTROLLER_PATH."conductorController.php");


   $objConductor= new conductorController();
   $arrayObj = array();
   $arrayObj = $objConductor->listaConductor();
   if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
     echo "
     <div class='row clearfix'>
       <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        <div class='card'>
          <div class='body' id='footer'>
            <div class='row'>
              <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <div class'header'>
                  <h2>No hay conductores Activos .</h2>
                </div>
                <div class='text-muted-dk'>Desea registrar un primer conductor en su sistema .</div>
                <br>
                 <button type='button' id='nuevoConductor' class='btn btn-raised btn-default waves-effect'>
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
                 <h2>Listados de conductores Registrados en el Sistema.</h2>
               </div>

               <div class='body table-responsive'>
               <button type='button'  id='nuevoConductor' class='btn btn-raised btn-primary waves-effect'>Registrar Conductor</button>
               <div class='row clearfix'>
                   <div class='col-sm-8'>
                     <div class='form-group'>
                       <div class='form-line'>
                       <input type='text' class='form-control font-bold' name='nombre' id='nombre' placeholder='Buscar . . .' >
                       </div>
                     </div>
                   </div>
                   <div class='col-sm-4'>
                     <div class='form-group'>
                       <button type='button' id='buscarConductor' class='btn btn-raised bg-blue btn-lg waves-effect'> <i class='zmdi zmdi-search-replace zmdi-hc-4x'></i> </button>
                     </div>
                   </div>
                 </div>
                 <div id='tablaconductor' >
                 <table class='table table-striped table-borderless'>
                   <thead>
                     <tr>
                       <th>Cedula</th>
                       <th>Nombre</th>
                       <th>Telefono1</th>
                       <th>Telefono2</th>
                       <th>Telefono3</th>
                       <th style='width:5%;' class='actions'></th>
                     </tr>
                    </thead>
                   <tbody class='no-border-x'>";
                         foreach ($arrayObj as $clave => $valor) {
                           echo "<tr>
                                     <td >".$arrayObj[$clave]->getCedula()."</td>
                                     <td >".$arrayObj[$clave]->getNombre_conductor()."</td>
                                     <td >".$arrayObj[$clave]->getTelefono1()."</td>
                                     <td >".$arrayObj[$clave]->getTelefono2()."</td>
                                     <td >".$arrayObj[$clave]->getTelefono3()."</td>

                                     <td style=' class='actions'><a href='#' title='".$arrayObj[$clave]->getId_conductor()."' id='idConductor' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
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
