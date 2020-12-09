
<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."minutaController.php");
require_once(CONTROLLER_PATH."empleadoController.php");
require_once(CONTROLLER_PATH."serviciosController.php");

setlocale(LC_ALL,"es_ES");
ini_set('date.timezone','America/Bogota');
date("Y-m-d H:i:s");
  $id=$_POST['idMinuta'];
  $fecha = date("Y-m-d H:i:s");
  $ObjMinuta =new minutaController();
  $arrayObj = array();
  $arrayObj=$ObjMinuta->minutaPorId($id);
?>

<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="card">

      <div class="header">
        <h2><button type="button" id="volver_verMinuta_bitacora" class="btn btn-raised btn-primary waves-effect"> <i class="material-icons">arrow_back</i> </button> Minuta</h2>
      </div>
      <div class="body">
        <small class="text-muted"> Informacion</small>
        <div class="row clearfix">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Fecha Novedad</small>
                <input type="text" class="form-control" name="fecha_novedad" id="fecha_novedad" value="<?php echo $arrayObj[0]->getFecha_novedad(); ?>">
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Evento</small>
                <input type="text" class="form-control " name="evento"  id="evento" value="<?php echo $arrayObj[0]->getEvento(); ?>" >
              </div>
            </div>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-12">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Observacion</small>
                <input type="text" class="form-control" name="observacion" id="observacion" value="<?php echo $arrayObj[0]->getObservacion(); ?>" >
              </div>
            </div>
          </div>

        </div>
        <?php
        $ObjServicio = new serviciosController();
        $arrayObj1=$ObjServicio->serviciosPorId($arrayObj[0]->getId_servicio());
         ?>
        <div class="row clearfix">
          <div class="col-sm-12">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Nota</small>
                <input type="text" class="form-control " name="nota"  id="nota" value="<?php echo $arrayObj[0]->getNota(); ?>" >
              </div>
            </div>
          </div>
          <?php
              $ObjEmpleado=new empleadoController();
              $arrayObj2=$ObjEmpleado->empleadoId($arrayObj[0]->getId_empleado());
           ?>
           <img height="950"  width="950" class="img-responsive thumbnail" src="<?php echo "../../../app/servicios/".$arrayObj[0]->getId_servicio()."/".$id.".jpg";  ?>" alt="">
          <input type="hidden" id="volver" value="<?php echo $arrayObj[0]->getId_servicio(); ?>" />
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="col-sm-6">
        <div class="form-group">
          <button type="button"  id="modificarMinuta" class="btn btn-raised btn-primary waves-effect">modificar Minuta</button>
          <div id="smg_minuta"></div>
       </div>
     </div>
   </div>
 </div>
</div>
