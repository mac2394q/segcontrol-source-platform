
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
              <h2>Conductor</h2>
            </div>
            <div class="body">
              <small class="text-muted"> Informacion Conductor</small>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Cedula Conductor</small>
                      <input type="text" class="form-control" name="ccConductor" id="ccConductor" placeholder="Cedula Conductor " >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Nombre Conductor</small>
                      <input type="text" class="form-control " name="nameConductor"  id="nameConductor" placeholder="Nombre Conductor" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Telefono 1</small>
                      <input type="text" class="form-control" name="telefono1" id="telefono1" placeholder="telefono" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Telefono 2</small>
                      <input type="text" class="form-control " name="telefono2"  id="telefono2" placeholder="telefono" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Telefono 3</small>
                      <input type="text" class="form-control " name="telefono3"  id="telefono3" placeholder="telefono" >
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
                <button type="button"  id="crearConductor" class="btn btn-raised btn-primary waves-effect">Registrar Conductor</button>
                <div id="smg_conductor"></div>
             </div>
           </div>
         </div>
       </div>
     </div>
