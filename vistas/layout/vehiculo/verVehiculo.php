
<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."clienteController.php");

setlocale(LC_ALL,"es_ES");
ini_set('date.timezone','America/Bogota');
date("Y-m-d H:i:s");
$fecha = date("Y-m-d H:i:s");


  $id = $_POST['id'];
  $ObjVehiculo = new vehiculoController();
  $arrayObj1 = $ObjVehiculo->vehiculoId($id);
?>

      <input type="hidden" name="id_vehiculo" id="id_vehiculo" value="<?php echo $arrayObj1->getId_vehiculo(); ?>">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Vehiculo</h2>
            </div>
            <div class="body">
              <small class="text-muted"> Informacion Vehiculo</small>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Placa</small>
                      <input type="text" class="form-control" name="Placa" id="Placa" value="<?php echo $arrayObj1->getPlaca(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Marca</small>
                      <input type="text" class="form-control " name="Marca"  id="Marca" value="<?php echo $arrayObj1->getMarca(); ?>" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Color</small>
                      <input type="text" class="form-control" name="Color" id="Color" value="<?php echo $arrayObj1->getColor(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">N trailer</small>
                      <input type="text" class="form-control " name="trailer"  id="trailer" value="<?php echo $arrayObj1->getN_trailer(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Cliente</small>
                      <select class="form-control " name=""  id="" >
                        <?php
                        $objCliente= new clienteController();
                        $arrayObj= array();

                        $arrayObj = $objCliente->listaClientesActivos();
                        foreach ($arrayObj as $clave => $valor) {
                          echo "<option value='".$arrayObj[$clave]->getId_cliente()."'>".$arrayObj[$clave]->getNombre()." / ".$arrayObj[$clave]->getRazon_social()."</option>";
                        }
                       ?>


                      </select>
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
                <button type="button"  id="editarVehiculo" class="btn btn-raised btn-primary waves-effect">Modificar Vehiculo</button>
                <div id="smg_vehiculo"></div>
             </div>
           </div>
         </div>
       </div>
     </div>
