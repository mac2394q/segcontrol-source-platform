
<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');



setlocale(LC_ALL,"es_ES");
ini_set('date.timezone','America/Bogota');
date("Y-m-d H:i:s");
$fecha = date("Y-m-d H:i:s");
?>


      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Correo Electronico</h2>
            </div>
            <div class="body">
              <small class="text-muted"> Informacion</small>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Correo Electronico</small>
                      <input type="text" class="form-control" name="Correo" id="correo" placeholder="Correo Electronico " >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Clave</small>
                      <input type="password" class="form-control " name="Clave"  id="clave" placeholder="*******" >
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
            <div class="col-sm-6">
              <div class="form-group">
                <button type="button"  id="crearCorreo" class="btn btn-raised btn-primary waves-effect">Registrar Correo</button>
             </div>
           </div>
         </div>
       </div>
     </div>
