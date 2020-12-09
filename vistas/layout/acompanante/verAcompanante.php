
<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."acompananteController.php");

setlocale(LC_ALL,"es_ES");
ini_set('date.timezone','America/Bogota');
date("Y-m-d H:i:s");
$fecha = date("Y-m-d H:i:s");

$id=$_POST['id'];
$objAcompanante = new acompananteController();
$arrayObj1 = $objAcompanante->acompananteId($id);

?>

<input type="hidden" name="id_acompanante" id="id_acompanante" value="<?php echo $arrayObj1->getId_acompanante(); ?>">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Informacion Personal</h2>
            </div>
            <div class="body">
              <small class="text-muted">Datos personales</small>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Nombre </small>
                      <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $arrayObj1->getNombre(); ?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Numero de Cedula</small>
                      <input type="text" class="form-control" name="cedula" id="cedula" value="<?php echo $arrayObj1->getCedula(); ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-12">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Numero de Telefono</small>
                      <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $arrayObj1->getTelefono(); ?>">
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
              <h2>Vehiculo Acompañante</h2>
            </div>
            <div class="body">
              <small class="text-muted"> Informacion Vehiculo</small>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Placa</small>
                      <input type="text" class="form-control" name="placa" id="placa" value="<?php echo $arrayObj1->getPlaca(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Tipo</small>
                      <input type="text" class="form-control " name="tipo"  id="tipo" value="<?php echo $arrayObj1->getTipo(); ?>" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Marca</small>
                      <input type="text" class="form-control" name="marca" id="marca" value="<?php echo $arrayObj1->getMarca(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Color</small>
                      <input type="text" class="form-control " name="color"  id="color" value="<?php echo $arrayObj1->getColor();?>" >
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
                <button type="button"  id="editarAcompanante" class="btn btn-raised btn-primary waves-effect">Modificar Acompañante</button>
                <div id="smg_Acompanante"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
