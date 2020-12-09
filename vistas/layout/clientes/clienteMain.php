<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
   require_once(CONTROLLER_PATH."clienteController.php");
   require_once(CONTROLLER_PATH."usuariosController.php");

   $objusu= new usuariosController();
   $objCliente= new clienteController();
   $arrayObj = array();
   $arrayObjUsu = array();
   $arrayObj = $objCliente->listaClientes();
   if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
     echo "
     <div class='row clearfix'>
       <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        <div class='card'>
          <div class='body' id='footer'>
            <div class='row'>
              <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <div class'header'>
                  <h2>No hay clientes Activos .</h2>
                </div>
                <div class='text-muted-dk'>Desea registrar un primer Cliente en su sistema .</div>
                <br>
                 <button type='button' id='nuevoCliente' class='btn btn-raised btn-default waves-effect'>
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
                 <h2>Listados de Clientes Registrados en el Sistema.</h2>
               </div>

               <div class='body table-responsive'>
               <button type='button'  id='nuevoCliente' class='btn btn-raised btn-primary waves-effect'>Registrar Cliente</button>
               <div class='row clearfix'>
                   <div class='col-sm-8'>
                     <div class='form-group'>
                       <div class='form-line'>
                       <input type='text' class='form-control font-bold' name='nombre' id='nombre' placeholder='Buscar nombre o razon social . . .' >
                       </div>
                     </div>
                   </div>
                   <div class='col-sm-4'>
                     <div class='form-group'>
                       <button type='button' id='buscarCliente_' class='btn btn-raised bg-blue btn-lg waves-effect'> <i class='zmdi zmdi-search-replace zmdi-hc-4x'></i> </button>
                     </div>
                   </div>
                 </div>  
               <div id='tablacliente'>
               <table class='table table-striped table-borderless'>
                   <thead>
                     <tr>
                       <th>Nombre</th>
                       <th>Razon Social</th>
                       <th>Ciudad</th>
                       <th>Usuario Asignado</th>

                       <th style='width:5%;' class='actions'></th>
                     </tr>
                    </thead>
                   <tbody class='no-border-x'>";
                         foreach ($arrayObj as $clave => $valor) {
                           $arrayObjUsu = $objusu->usuarioId( intval($arrayObj[$clave]->getId_usuario()) );
                           if(intval($arrayObjUsu->getId_rol())==1){$rol="administrador";}
                           else{
                             if(intval($arrayObjUsu->getId_rol())==2){$rol="asistente";}
                             else{$rol="cliente";}}
                           echo "<tr>
                                     <td >".$arrayObj[$clave]->getNombre()."</td>
                                     <td >".$arrayObj[$clave]->getRazon_social()."</td>
                                     <td >".$arrayObj[$clave]->getCiudad()."</td>
                                     <td >".$arrayObjUsu->getUsuario()."</td>
                                     <td >".$rol."</td>
                                     <td style=' class='actions'><a href='#' title='".$arrayObj[$clave]->getId_cliente()."' id='idCliente' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
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