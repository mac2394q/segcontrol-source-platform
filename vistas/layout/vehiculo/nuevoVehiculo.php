
<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');

require_once(CONTROLLER_PATH."clienteController.php");

setlocale(LC_ALL,"es_ES");
ini_set('date.timezone','America/Bogota');
date("Y-m-d H:i:s");
$fecha = date("Y-m-d H:i:s");
?>


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
                      <small class="text-muted">*Placa</small>
                      <input type="text" class="form-control" name="Placa" id="Placa" placeholder="Placa " >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Marca</small>
                      <input type="text" class="form-control " name="Marca"  id="Marca" placeholder="Marca" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Color</small>
                      <input type="text" class="form-control" name="Color" id="Color" placeholder="Color" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">N Trailer</small>
                      <input type="text" class="form-control " name="trailer"  id="trailer" placeholder="trailer" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Cliente</small>
                      <select class="form-control " name="id_cliente"  id="id_cliente" >
                        <?php
                        $objCliente= new clienteController();
                        $arrayObj = array();
                        $arrayObj = $objCliente->listaClientesActivos();
                        echo "<option value='0'>Sin cliente asignado</option>";
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
                <button type="button"  id="crearVehiculo" class="btn btn-raised btn-primary waves-effect">Registrar Vehiculo</button>
                <div id="smg_vehiculo"></div>
             </div>
           </div>
         </div>
       </div>
     </div>
