
<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."clienteController.php");

setlocale(LC_ALL,"es_ES");
ini_set('date.timezone','America/Bogota');
date("Y-m-d H:i:s");
$fecha = date("Y-m-d H:i:s");
?>
<div class="row clearfix">
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="card">
      <?php
      $objCliente= new clienteController();
      $arrayObj = array();
      $arrayObj = $objCliente->listaClientesActivos();
      if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
        echo "
        <div class='header'>
           <h2>No hay clientes Registrados .</h2>
           <small>Desea crear un primer registro de cliente en su sistema .</small>
           <br>
           <button type='button' id='nuevoCliente' class='btn btn-raised btn-default waves-effect'> <i class='zmdi zmdi-accounts-add zmdi-hc-4x'></i> </button>
        </div>
        ";
      }else{
        echo "
        <div class='header'>
          <h2> Clientes <small>Listado de clientes activos registrados en el sistema </h2>
        </div>
        <div class='body'>
           <div class='row clearfix'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
              <p> <b> Cliente con su  Razon Social </b> </p>
              <div class='btn-group  form-control ''>
                <select name='cb1' id='cb1' class='form-control '  >";
                foreach ($arrayObj as $clave => $valor) {
                  echo "<option value='".$arrayObj[$clave]->getId_cliente()."'>".$arrayObj[$clave]->getNombre()." / ".$arrayObj[$clave]->getRazon_social()."</option>";
                }
                echo "</select>
              </div>
            </div>
          </div>
        </div>";}
        ?>
      </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="card">
        <?php
        $objVehiculo= new vehiculoController();
        $arrayObj1 = array();
        $arrayObj1 = $objVehiculo->listaVehiculos();
        if(is_null( $arrayObj1) == true || empty($arrayObj1) ==true ){
          echo "
          <div class='header'>
              <h2>No hay vehiculos Registrados  .</h2>
              <small>Desea crear un primer registro de vehiculo en su sistema .</small>
              <br>
              <button type='button' id='nuevoVehiculo' class='btn btn-raised btn-default waves-effect'> <i class='zmdi zmdi-car zmdi-hc-4x'></i> </button>
          </div>
          ";
        }else{
          echo "
          <div class='header'>
          <h2> Vehiculos <small>Listado de vehiculos activos registrados en el sistema </h2>
          </div>
          <div class='body'>
             <div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                  <p> <b>Placa de vehiculos con su cliente asignado</b> </p>
                    <div class='btn-group  form-control ''>
                      <select name='cb2' id='cb2' class='form-control '  >";
                          foreach ($arrayObj1 as $clave => $valor) {
                            if(is_null($arrayObj[$clave])){
                              echo "<option value='".$arrayObj1[$clave]->getId_vehiculo()."'>vehiculo placa : ".$arrayObj1[$clave]->getPlaca()."</option>";
                            }else{
                              $ob = $objCliente->clienteId($arrayObj[$clave]->getId_cliente() );
                              echo "<option value='".$arrayObj1[$clave]->getId_vehiculo()."'>vehiculo placa : ".$arrayObj1[$clave]->getPlaca()."   (".$ob->getRazon_social()." - ".$ob->getNombre().")</option>";
                            }

                          }
                     echo "</select>
                    </div>
                </div>
              </div>
           </div>";}
          ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="card">
          <?php
          $objConductor= new conductorController();
          $arrayObj2 = array();
          $arrayObj2 = $objConductor->listaConductor();
          if(is_null( $arrayObj2) == true || empty($arrayObj2) ==true ){
            echo "
            <div class='header'>
               <h2>No hay Conductores Registrados </h2>
               <small>Desea crear un primer registro de conductor en su sistema .</small>
               <br>
               <button type='button' id='nuevoConductor' class='btn btn-raised btn-default waves-effect'> <i class='zmdi zmdi-account-calendar zmdi-hc-4x'></i> </button>
            </div>
            ";
          }else{
            echo "
            <div class='header'>
               <h2> Clientes <small>Listado de conductores activos registrados en el sistema <small></h2>
            </div>
            <div class='body'>
              <div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                  <p> <b>Nombre del Conductor </b> </p>
                  <div class='btn-group  form-control '>
                    <select name='cb3' id='cb3' class='form-control ' >";
                    foreach ($arrayObj2 as $clave => $valor) {
                      echo "<option value='".$arrayObj2[$clave]->getId_conductor()."'>".$arrayObj2[$clave]->getNombre_conductor()."</option>";
                    }
                    echo "</select>
                  </div>
                </div>
              </div>
            </div>";}
            ?>
          </div>
        </div>
      </div>
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Descripcion del Viaje  </h2>
            </div>
            <div class="body">
              <small class="text-muted">Configuracion de ciudad de origen y destino</small>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Ciudad de Origen </small>
                      <input type="text" class="form-control" name="municipio" id="municipio" placeholder="EJ: Buenaventura" required>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Ciudad de Destino </small>
                      <input type="text" class="form-control" name="municipio2" id="municipio2" placeholder="EJ: Cali" required>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Manifiesto</small>
                      <input type="text" class="form-control" name="manifiesto" id="manifiesto" placeholder="Manifiesto" required>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Direccion de descargue</small>
                      <input type="text" class="form-control" name="direccion"  id="direccion" placeholder="Direccion del descargue" required>
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
              <h2>Registro y seguimiento</h2>
            </div>
            <div class="body">
              <small class="text-muted">Registros de seguimiento  </small>
              <div class="row clearfix">
                <div class="col-sm-8">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Hora y fecha de creacion del servicio</small>
                      <input type="text" class="form-control"name="fecha" id="fecha" value="<?php echo $fecha;  ?>" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Sello </small>
                      <input type="text" class="form-control" name="sello" id="sello" placeholder="Sello" required>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Numero de contenedores</small>
                      <input type="text" class="form-control" name="ncontenedor" id="ncontenedor" placeholder="N Contenedor" required>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Satelital activo</small>
                      <input type="text" class="form-control" name="satelital" id="satelital" placeholder="Satelital" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Ruta asignada</small>
                      <input type="text" class="form-control" name="ruta" id="ruta" placeholder="Ruta" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">enlace del localizador</small>
                      <input type="text" class="form-control" name="link" id="link" placeholder="Link Localizador" >
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
              <h2>Seguridad</h2>
            </div>
            <div class="body">
              <small class="text-muted"> Accesos al usuario</small>
              <div class="row clearfix">
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" class="form-control" name="usuario" id="usuario"placeholder="Usuario" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" class="form-control " name="clave"  id="clave" placeholder="Clave" >
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
              <h2> Foto parte frontal y trasera  </h2>
            </div>
            <div class="body">
              <div class="form-group col-xs-6">
                <div class="col-md-6">
                  <label for="exampleInputFile">Foto parte frontal</label>
                  <input class="btn btn-danger btn-lg" name="file-input1" id="file-input1" type="file"  onchange="readURL(this);" accept="image/*" >
                  <p class="help-block">foto #2 obligatorio.</p>
                  <div class="file-upload-content">
                    <img class="file-upload-image" src="../assets/images/Upload-Information-Icon.png" alt="your image" height="200" width="200" />
                    <div class="image-title-wrap">
                      <button class="btn  btn-raised btn-success waves-effect" type="button" onclick="removeUpload2()" class="remove-image">Remover <span class="image-title2">Imagen cargarda</span></button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputFile">Foto parte trasera</label>
                  <input class="btn btn-danger btn-lg" name="file-input2" id="file-input2" type="file"  onchange="readURL2(this);" accept="image/*" >
                  <p class="help-block">foto #2 obligatorio.</p>
                  <div class="file-upload-content2">
                    <img class="file-upload-image2" src="../assets/images/Upload-Information-Icon.png" alt="your image" height="200" width="200" />
                    <div class="image-title-wrap2">
                      <button class="btn  btn-raised btn-success waves-effect" type="button" onclick="removeUpload2()" class="remove-image">Remover <span class="image-title2">Imagen cargarda</span></button>
                    </div>
                  </div>
                </div>
                <button type="button"  id="crearServicio" class="btn btn-raised btn-primary waves-effect">Registrar Servicio</button>
                <br>
                <br>
                <div id="smg_servicio"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
