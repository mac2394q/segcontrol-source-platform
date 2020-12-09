
<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."empleadoController.php");
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."minutaController.php");
require_once(CONTROLLER_PATH."clienteController.php");

session_start();
$id = $_POST['id'];

$controllerServicio = new serviciosController();
$controllerEmpleado = new empleadoController();
$controllerMinuta=new minutaController();
$controllerCliente=new clienteController();

$objServicio=$controllerServicio->serviciosPorId($id);
$objEmpleado=$controllerEmpleado->empleadoId($objServicio->getId_empleado());

$arrayMinuta= $controllerMinuta->minutasPorServicios($id);

$objCliente = $controllerCliente->clienteId($objServicio->getId_cliente());

setlocale(LC_ALL,"es_ES");
ini_set('date.timezone','America/Bogota');
date("Y-m-d H:i:s");
$fecha = date("Y-m-d H:i:s");
?>

<input id="idempleadoHidden" type="hidden" name="idempleadoHidden" value="<?php echo $objEmpleado->getId_empleado(); ?>" />
<input id="idservicioHidden" type="hidden" name="idservicioHidden" value="<?php echo $objServicio->getId_servicio(); ?>" />
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>Descripcion del Servicio : CLIENTE <?php echo $objEmpleado->getNombre();?> </h2> Registro de fecha y hora del servicio &nbsp;&nbsp;<?php echo $objServicio->getFecha_creacion();?>
      </div>
      <?php echo  "<button type='button'  id='nuevaMinuta' class='btn btn-raised btn-success waves-effect'>Crear Minuta</button>
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;

                   <button type='button'  id='cerrarServicio' class='btn btn-raised btn-danger waves-effect'>Cerrar Servicio</button>"; ?>
      <div class="body">
        <small class="text-muted">Configuracion de ciudad de origen y destino</small>
        <div class="row clearfix">
          <div class="col-sm-4">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Ciudad de Origen </small>
                <input type="text" class="form-control" name="municipio" id="municipio" value="<?php echo $objServicio->getCiudad_origen();?>">
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Ciudad de Destino </small>
                <input type="text" class="form-control" name="municipio2" id="municipio2" value="<?php echo $objServicio->getCiudad_destino();?>">
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Sello </small>
                <input type="text" class="form-control" name="sello" id="sello" value="<?php echo $objServicio->getSello();?>">
              </div>
            </div>
          </div>
        </div>

        <div class="row clearfix">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Ruta asignada</small>
                <input type="text" class="form-control" name="ruta" id="ruta" value="<?php echo $objServicio->getRuta();?>" >
            </div>
          </div>
         </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Satelital activo</small>
                <input type="text" class="form-control" name="satelital" id="satelital" value="<?php echo $objServicio->getSatelital();?>">
            </div>
          </div>
        </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-4">
        <div class="form-group">
          <div class="form-line">
            <small class="text-muted">Nombre del cliente</small>
            <input type="text" class="form-control" name="municipio" id="municipio" value="<?php echo $objCliente->getNombre();?>">
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="form-line">
            <small class="text-muted">Razon social </small>
            <input type="text" class="form-control" name="municipio2" id="municipio2" value="<?php echo $objCliente->getRazon_social();?>">
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="form-line">
            <small class="text-muted">Numero de contacto </small>
            <input type="text" class="form-control" name="sello" id="sello" value="<?php echo $objCliente->getFijo();?>">
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="form-line">
            <small class="text-muted">Numero de contacto #2</small>
            <input type="text" class="form-control" name="sello" id="sello" value="<?php echo $objCliente->getCelular1();?>">
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <div class="form-line">
            <small class="text-muted">Numero de contacto #3</small>
            <input type="text" class="form-control" name="sello" id="sello" value="<?php echo $objCliente->getCelular2();?>">
          </div>
        </div>
      </div>
    </div>
    <div class="row clearfix">
        <div class="col-sm-6">
         <img height="700"  width="450" class="img thumbnail" src="<?php echo "../../../app/servicios/".$objServicio->getId_servicio()."/carro1.jpg";  ?>" alt="">
        </div>
        <div class="col-sm-6">
         <img height="700"  width="450" class="img thumbnail" src="<?php echo "../../../app/servicios/".$objServicio->getId_servicio()."/carro2.jpg";  ?>" alt="">
        </div>
    </div>
  </div>
</div>
</div>
</div>
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h3 class="font-bold col-teal">Registro y Seguimiento . </h3>
      </div>

      <div class="body">
        <small class="text-muted"><?php echo " ".$sesion_rol;  ?> Seguimientos.  </small>
      <?php
echo "<div class='row clearfix '>
           <div class='col-xs-12 col-sm-12 col-md-12'>
               <div class='body table-responsive'>";
      echo  "   <button type='button'  id='nuevaMinuta' class='btn btn-raised btn-success waves-effect'>Crear Minuta</button>&nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;

                <button type='button'  id='cerrarServicio' class='btn btn-raised btn-danger waves-effect'>Cerrar Servicio</button>";
      echo   "  <div id='tabla'>
                 <table class='table table-striped table-borderless'>
                   <thead>
                     <tr>
                       <th>Fecha novedad</th>
                       <th>Evento</th>
                       <th>Observacion</th>
                       <th style='width:5%;' class='actions'>Ver minuta</th>
                     </tr>
                    </thead>
                   <tbody class='no-border-x'>";
                         foreach ($arrayMinuta as $clave => $valor) {
               echo "<tr>
                         <td >".$arrayMinuta[$clave]->getFecha_novedad()."</td>
                         <td >".$arrayMinuta[$clave]->getEvento()."</td>
                         <td >".$arrayMinuta[$clave]->getObservacion()."</td>
                         <td style='width:5%; class='actions'><a href='#' title='".$arrayMinuta[$clave]->getId_servicio_novedad()."' id='verMinuta' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
                     </tr>";}
             echo " </tbody>
                 </table>
                 </div>
               </div>
            </div>
          </div>";
        ?>
      </div>
    </div>
  </div>
</div>
<div id="smg_bitacora"></div>
