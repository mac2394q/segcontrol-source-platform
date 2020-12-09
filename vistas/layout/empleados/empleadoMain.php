<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
   require_once(CONTROLLER_PATH."empleadoController.php");
   require_once(CONTROLLER_PATH."usuariosController.php");

   $objusu= new usuariosController();
   $objServi= new empleadoController();
   $arrayObj = array();
   $arrayObjUsu = array();
   $arrayObj = $objServi->listaEmpleados();
   if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
     echo "
     <div class='row clearfix'>
       <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
        <div class='card'>
          <div class='body' id='footer'>
            <div class='row'>
              <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                <div class'header'>
                  <h2>No hay empleados Activos .</h2>
                </div>
                <div class='text-muted-dk'>Desea registrar un primer Empleado en su sistema .</div>
                <br>
                 <button type='button' id='nuevoEmpleado' class='btn btn-raised btn-default waves-effect'>
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
                 <h2>Listados de Empleados Registrados en el Sistema.</h2>
               </div>

               <div class='body table-responsive'>
               <button type='button'  id='nuevoEmpleado' class='btn btn-raised btn-primary waves-effect'>Registrar Empleado</button>
                 <table class='table table-striped table-borderless'>
                   <thead>
                     <tr>
                       <th>Usuario</th>
                       <th>Nombre</th>
                       <th>Rol</th>
                       <th>Ciudad</th>
                       <th>Accion</th>
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
                                     <td >".$arrayObjUsu->getUsuario()."</td>
                                     <td >".$arrayObj[$clave]->getNombre()."</td>
                                     <td >".$rol."</td>
                                     <td >".$arrayObj[$clave]->getCiudad()."</td>
                                    <td style=' class='actions'><a href='#' title='".$arrayObj[$clave]->getId_empleado()."' id='idEmpleado' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
                                 </tr>";}
             echo " </tbody>
                 </table>
               </div>
            </div>
          </div>
        </div>";
   }
     ?>
