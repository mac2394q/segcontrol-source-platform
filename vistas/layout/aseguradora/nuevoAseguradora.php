
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
          <h2> Vehiculos <small>Listado de acompañantes registrados en el sistema </h2>
          </div>
          <div class='body'>
             <div class='row clearfix'>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                  <p> <b>Acompanante con su vehiculo asignado</b> </p>
                    <div class='btn-group  form-control ''>
                      <select name='cb2' id='cb2' class='form-control '  >";
                          foreach ($arrayObj1 as $clave => $valor) {
                              echo "<option value='".$arrayObj1[$clave]->getId_acompanante()."'>Acompanante Nombre : ".$arrayObj1[$clave]->getNombre()."</option>";

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
        </div>
        <div class="body">
          <small class="text-muted">Informacion</small>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">*Fecha</small>
                  <input type="text" class="form-control" name="fecha" id="fecha" placeholder="0000-00-00" required>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">*Hora</small>
                  <input type="text" class="form-control" name="hora" id="hora" placeholder="00:00:00" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">*Valor </small>
                  <input type="text" class="form-control" name="valor" id="valor" placeholder="Valor" required>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">Correo Electronico </small>
                  <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo Electronico" required>
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
                  <small class="text-muted">*Autorizacion</small>
                  <input type="text" class="form-control" name="autorizacion" id="autorizacion" placeholder="Autorizacion " >
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">*Area</small>
                  <input type="text" class="form-control" name="area" id="area" placeholder="area " >
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">*Tipo de Servicio</small>
                  <input type="text" class="form-control" name="tipo_servicio" id="tipo_servicio" placeholder="Tipo de servicio " >
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">*Descripcion</small>
                  <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="descripcion " >
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
                  <small class="text-muted">*Placa</small>
                  <input type="text" class="form-control" name="placa" id="placa" placeholder="Placa " >
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">*Contenedor</small>
                  <input type="text" class="form-control" name="contenedor" id="contenedor" placeholder="Contenedor " >
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">*Tipo de Vehiculo</small>
                  <input type="text" class="form-control" name="tipo_vehiculo" id="tipo_vehiculo" placeholder="Tipo de vehiculo " >
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">*Color</small>
                  <input type="text" class="form-control" name="color" id="color" placeholder="Color " >
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
                  <small class="text-muted">*Hora llegada</small>
                  <input type="text" class="form-control" name="idhora_llegada" id="idhora_llegada" placeholder="00:00:00" >
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <div class="form-line">
                  <small class="text-muted">*Hora finalizada</small>
                  <input type="text" class="form-control" name="idhora_finalizacion" id="idhora_finalizacion" placeholder="00:00:00" >
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
            <button type="button"  id="crearAseguradora" class="btn btn-raised btn-primary waves-effect">Registrar Aseguradora</button>
            <div class='row clearfix'>
                <div class='col-sm-8'>
                  <div class='form-group'>
                    <div class='form-line'>
                    <input type='text' class='form-control font-bold' name='email' id='email' placeholder='Buscar . . .' >
                    </div>
                  </div>
                </div>
                <div class='col-sm-4'>
                  <div class='form-group'>
                    <button type="button" id="envioCorreo" class="btn btn-raised btn-primary waves-effect">Registrar + Envio de correo</button>
                  </div>
                </div>
              </div>
            <div id="smg_Aseguradora"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
