<?php
session_start();

include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."usuariosController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."empleadoController.php");
require_once(CONTROLLER_PATH."serviciosController.php");

/* variables Globales*/
$sesion_id=$_GET["id"];
$rol =$_GET["rol"];

if(intval($rol)==1){
  $sesion_rol="administrador";
  $ConEmp = new EmpleadoController();
  $obj = $ConEmp->empleadoIdUsuario($sesion_id);
  $sesion_foto=$obj->getFoto();
  $sesion_nombre=$obj->getNombre();
  $id=$obj->getId_empleado();
  $_SESSION['id'] = $id ;
  $_SESSION['rol'] = "administrador";
}else{
  if(intval($rol)==2){
    $sesion_rol="asistente";
    $ConEmp = new EmpleadoController();
    $obj = $ConEmp->empleadoIdUsuario($sesion_id);
    $sesion_foto=$obj->getFoto();
    $sesion_nombre=$obj->getNombre();
    $id=$obj->getId_empleado();
    $_SESSION['id'] = $id ;
    $_SESSION['rol'] = "asistente";
  }else{
    $sesion_rol="cliente";
    $ConCli = new clienteController();
    $obj = $ConCli->clienteIdUsuario($sesion_id);
    $sesion_foto="../assets/images/random-avatar4.jpg";
    $sesion_nombre=$obj->getNombre();
    $id=$obj->getId_cliente();
    $_SESSION['id'] = $id ;
    $_SESSION['rol'] = "cliente"; ;
  }
}
?>
<!DOCTYPE html>
<html>
<?php require_once("head.php");?>
<body class="theme-blue">
  <input id="sesionHidden" name="sesionHidden" type="hidden" value="<?php echo $sesion_id; ?>" />
  <input id="rolHidden" name="rolHidden" type="hidden" value="<?php echo $sesion_rol; ?>" />
  <!-- <input id="idservicioHidden" name="idservicioHidden" value="" />
  <input id="idclienteHidden" name="idclienteHidden" value="" /> -->

    <!-- Main Content -->
  

      <div class="container-fluid">
        <div class="row clearfisx">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="contenido">
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

<input id='cargar' name='cargar' type='hidden' value='carga' />
<div class=" alert alert bg-teal">
  <strong>Estadisticas del sistema.<div id="refresco"></div></strong>
</div>
<div class="row clearfix">
    
      
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

                       <th>Vehiculo</th>
                     

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

                                <td >";
                                if(intval($estado)==3 ){
                                  echo "<a href='#' title='".$arrayObj[$clave]->getId_servicio()."' id='bitacora' class='text-success' ><p>".$arrayObj3->getPlaca()."<p>
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
                                
                              
                               echo "
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
                  url="mitabla.php";
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


            </div>
          </div>
        </div>


              </div>

        
            <?php require_once("footer.php");?>
          </body>
          </html>
