
<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."aseguradoraController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."acompananteController.php");

setlocale(LC_ALL,"es_ES");
ini_set('date.timezone','America/Bogota');
date("Y-m-d H:i:s");
$fecha = date("Y-m-d H:i:s");
?>
<div class="row clearfix">
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="card">
      <?php
      $id=$_POST['id'];
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
        $objAcompanante= new acompananteController();
        $arrayObj1 = array();
        $arrayObj1 = $objAcompanante->listaAcompanante();
        if(is_null( $arrayObj1) == true || empty($arrayObj1) ==true ){
          echo "
          <div class='header'>
              <h2>No hay acompantes Registrados  .</h2>
              <small>Desea crear un primer registro de acompanante en su sistema .</small>
              <br>
              <button type='button' id='nuevoAcompanante' class='btn btn-raised btn-default waves-effect'> <i class='zmdi zmdi-car zmdi-hc-4x'></i> </button>
          </div>
          ";
        }else{
          echo "
          <div class='header'>
          <h2> Acompañante  <small>Listado de acompañantes registrados en el sistema </h2>
          </div>
          <div class='body'>
             <div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                  <p> <b>Acompanante con su vehiculo asignado</b> </p>
                    <div class='btn-group  form-control ''>
                      <select name='cb2' id='cb2' class='form-control '  >";
                          foreach ($arrayObj1 as $clave => $valor) {
                              echo "<option value='".$arrayObj1[$clave]->getId_acompanante()."'>Acompanante Nombre : ".utf8_encode($arrayObj1[$clave]->getNombre())."</option>";
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

    <?php
    $objAseguradora= new aseguradoraController();
    $arrayObj2 = array();
    $arrayObj2 = $objAseguradora->aseguradoraId($id);
    ?>
  <input type="hidden" name="id_aseguradora" id="id_aseguradora" value="<?php echo $arrayObj2->getId_aseguradora(); ?>">
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="header">
        </div>
        <div class="body">
          <small class="text-muted">Informacion</small>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Fecha</small>
                  <input type="text" class="form-control" name="fecha" id="fecha"  value="<?php echo $arrayObj2->getFecha(); ?>" >
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Hora</small>
                  <input type="text" class="form-control" name="hora" id="hora"  value="<?php echo $arrayObj2->getHora(); ?>" >
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Valor </small>
                  <input type="text" class="form-control" name="valor" id="valor"  value="<?php echo $arrayObj2->getValor();?>">
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
          <h2></h2>
        </div>
        <div class="body">
          <small class="text-muted"> Informacion</small>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Autorizacion</small>
                  <input type="text" class="form-control" name="autorizacion" id="autorizacion"  value="<?php echo $arrayObj2->getAutorizacion();?>" >
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Area</small>
                  <input type="text" class="form-control" name="area" id="area"  value="<?php echo $arrayObj2->getArea();?>" >
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Tipo de Servicio</small>
                  <input type="text" class="form-control" name="tipo_servicio" id="tipo_servicio"  value="<?php echo $arrayObj2->getTipo_servicio()?>">
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Descripcion</small>
                  <input type="text" class="form-control" name="descripcion" id="descripcion"   value="<?php echo $arrayObj2->getDescripcion(); ?>">
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
          <h2></h2>
        </div>
        <div class="body">
          <small class="text-muted"> Vehiculo </small>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Placa</small>
                  <input type="text" class="form-control" name="placa" id="placa"   value="<?php echo $arrayObj2->getPlaca()?>">
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Contenedor</small>
                  <input type="text" class="form-control" name="contenedor" id="contenedor"   value="<?php echo $arrayObj2->getContenedor();?>">
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Tipo de Vehiculo</small>
                  <input type="text" class="form-control" name="tipo_vehiculo" id="tipo_vehiculo"  value="<?php echo $arrayObj2->getTipo_vehiculo();?>" >
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Color</small>
                  <input type="text" class="form-control" name="color" id="color"  value="<?php echo $arrayObj2->getColor();?>" >
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
          <h2></h2>
        </div>
        <div class="body">
          <small class="text-muted"> Tiempo </small>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Hora llegada</small>
                  <input type="text" class="form-control" name="idhora_llegada" id="idhora_llegada"   value="<?php echo $arrayObj2->getHora_llegada();?>">
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Hora finalizada</small>
                  <input type="text" class="form-control" name="idhora_finalizacion" id="idhora_finalizacion"   value="<?php echo $arrayObj2->getHora_finalizacion();?>">
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
            <button type="button"  id="editarAseguradora" class="btn btn-raised btn-primary waves-effect">Modificar Aseguradora</button>
            <button type="button" id="envioCorreo" class="btn btn-raised btn-primary waves-effect">Envio de correo</button>
            <div id="smg_Aseguradora"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
