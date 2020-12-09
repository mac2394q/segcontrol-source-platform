
<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."empleadoController.php");
require_once(CONTROLLER_PATH."serviciosController.php");
setlocale(LC_ALL,"es_ES");
ini_set('date.timezone','America/Bogota');
date("Y-m-d H:i:s");
$fecha = date("Y-m-d H:i:s");
$ids = $_POST['ids'];
$ide = $_POST['ide'];
// echo "id cliente ".$ids;
// echo "<br> id servicio ".$idc;
$objEmpleado= new empleadoController();
$objServicio = new serviciosController();
$obe =  $objEmpleado->empleadoId($ide);
$obs = $objServicio->serviciosPorId($ids);
// echo "<br>  ver : ".$obs->getId_servicio();
// echo "<br>  ver : ".$obs->getRuta();
//
// echo "<br>".$obc->getNombre();

?>
<input id="idempleadoHidden" type="hidden" name="idempleadoHidden" value="<?php echo $ide; ?>" />
<input id="idservicioHidden" type="hidden" name="idservicioHidden" value="<?php echo $ids; ?>" />
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>Nueva Minuta ID: <?php echo $obs->getId_servicio();  ?></h2>
      </div>
      <div class="body">

        <div class="row clearfix">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Fecha Novedad</small>
                <input type="text" class="form-control" name="fecha_novedad" id="fecha_novedad" value="<?php echo $fecha; ?>" >
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Evento</small>
                <input type="text" class="form-control " name="evento"  id="evento" placeholder="Evento" >
              </div>
            </div>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Observacion</small>
                <input type="text" class="form-control" name="observacion" id="observacion" placeholder="observacion" >
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="form-line">
                <small class="text-muted">Nota</small>
                <input type="text" class="form-control " name="nota"  id="nota" placeholder="Nota" >
              </div>
            </div>
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
        <h2> foto evidencia minuta  </h2>
      </div>
      <div class="body">
        <div class="form-group col-xs-6">
          <div class="col-md-6">
            <label for="exampleInputFile">imagen plataforma de rastreo GPS</label>
            <input class="btn btn-danger btn-lg" name="file-input1" id="file-input1" type="file"  onchange="readURL(this);" accept="image/*" >
            <p class="help-block">imagen obligatoria.</p>
            <div class="file-upload-content">
              <img class="file-upload-image" src="../assets/images/Upload-Information-Icon.png" alt="your image" height="200" width="200" />
              <div class="image-title-wrap">
                <button class="btn  btn-raised btn-success waves-effect" type="button" onclick="removeUpload()" class="remove-image">Remover <span class="image-title2">Imagen cargarda</span></button>
              </div>
            </div>
          </div>

          <br>
          <br>
          <div id="smg_servicio"></div>
        </div>
        <h2 class="card-inside-title">A tener en cuenta :</h2>
        <div class="demo-checkbox">
          <input type="checkbox" id="basic_checkbox_2" class="filled-in" checked />
          <label for="basic_checkbox_2">Desea enviar correo de notificacion del reporte de minuta </label>
        </div>
        <br>
        <br>
        <button type="button"  id="crearMinuta" class="btn btn-raised btn-primary waves-effect">Registrar Minuta</button>
      </div>
    </div>
  </div>
</div>
