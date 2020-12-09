<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
   require_once(CONTROLLER_PATH."acompananteController.php");

   $objAcompanante= new acompananteController();
   $arrayObj = array();
   $arrayObjAcompanante= array();
   $arrayObj = $objAcompanante->listaAcompanante();
   if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
     echo "
     <div class='row clearfix'>
       <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        <div class='card'>
          <div class='body' id='footer'>
            <div class='row'>
              <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <div class'header'>
                  <h2>No hay acompanantes Activos .</h2>
                </div>
                <div class='text-muted-dk'>Desea registrar un primer Acompanante en su sistema .</div>
                <br>
                 <button type='button' id='nuevoAcompanante' class='btn btn-raised btn-default waves-effect'>
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
                 <h2>Listados de Acompanante Registrados en el Sistema.</h2>
               </div>

               <div class='body table-responsive'>
               <button type='button'  id='nuevoAcompanante' class='btn btn-raised btn-primary waves-effect'>Registrar Acompañante</button>
               <div class='row clearfix'>
                   <div class='col-sm-8'>
                     <div class='form-group'>
                       <div class='form-line'>
                       <input type='text' class='form-control font-bold' name='busquedaAcompanante' id='busquedaAcompanante' placeholder='Buscar . . .' >
                       </div>
                     </div>
                   </div>
                   <div class='col-sm-4'>
                     <div class='form-group'>
                       <button type='button' id='buscarAcompanante' class='btn btn-raised bg-blue btn-lg waves-effect'> <i class='zmdi zmdi-search-replace zmdi-hc-4x'></i> </button>
                     </div>
                   </div>
                 </div>
                 <div id='tablaacompanante' >
                 <table class='table table-striped table-borderless'>
                   <thead>
                     <tr>
                       <th>Nomber</th>
                       <th>Cedula</th>
                       <th>Placa</th>
                       <th>Marca</th>
                       <th>Color</th>
                       <th>Ver</th>
                       <th style='width:5%;' class='actions'></th>
                     </tr>
                    </thead>
                   <tbody class='no-border-x'>";
                         foreach ($arrayObj as $clave => $valor) {
                           echo "<tr>
                                     <td >".$arrayObj[$clave]->getNombre()."</td>
                                     <td >".$arrayObj[$clave]->getCedula()."</td>
                                     <td >".$arrayObj[$clave]->getPlaca()."</td>
                                     <td >".$arrayObj[$clave]->getMarca()."</td>
                                     <td >".$arrayObj[$clave]->getColor()."</td>
                                     <td style=' class='actions'><a href='#' title='".$arrayObj[$clave]->getId_acompanante()."' id='idAcompanante' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
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
