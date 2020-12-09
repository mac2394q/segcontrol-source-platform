
<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."conductorController.php");

setlocale(LC_ALL,"es_ES");
ini_set('date.timezone','America/Bogota');
date("Y-m-d H:i:s");
$fecha = date("Y-m-d H:i:s");

      $id=$_POST['id'];
      $objConductor = new conductorController();
      $arrayObj1 = array();
      $arrayObj1 = $objConductor->ConductorId($id);
    ?>
     <input type="hidden" name="idConductor" id="idConductor" value="<?php echo $arrayObj1->getId_conductor(); ?>">
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
                      <small class="text-muted">Cedula Conductor</small>
                      <input type="text" class="form-control" name="ccConductor" id="ccConductor" value="<?php echo $arrayObj1->getCedula(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Nombre Conductor</small>
                      <input type="text" class="form-control " name="nameConductor"  id="nameConductor" value="<?php echo $arrayObj1->getNombre_conductor(); ?>" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Telefono 1</small>
                      <input type="text" class="form-control" name="telefono1" id="telefono1" value="<?php echo $arrayObj1->getTelefono1(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Telefono 2</small>
                      <input type="text" class="form-control " name="telefono2"  id="telefono2" value="<?php echo $arrayObj1->getTelefono2(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Telefono 3</small>
                      <input type="text" class="form-control " name="telefono3"  id="telefono3" value="<?php echo $arrayObj1->getTelefono3(); ?>" >
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
                <button type="button"  id="editarConductor" class="btn btn-raised btn-primary waves-effect">Modificar Conductor</button>
                <div id="smg_conductor"></div>
             </div>
           </div>
         </div>
       </div>
     </div>
