
<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."usuariosController.php");
require_once(CONTROLLER_PATH."empleadoController.php");



setlocale(LC_ALL,"es_ES");
ini_set('date.timezone','America/Bogota');
date("Y-m-d H:i:s");
$fecha = date("Y-m-d H:i:s");

$id = $_POST['id'];
$objEmpleado= new empleadoController();
$arrayObj1 = $objEmpleado->empleadoId($id);
?>
      <input type="hidden" name="id_empleado" id="id_empleado" value="<?php echo $arrayObj1->getId_empleado(); ?>">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Informacion Personal  </h2>
            </div>
            <div class="body">
              <small class="text-muted">Datos personales</small>
              <div class="row clearfix">
                <div class="col-sm-12">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Nombre </small>
                      <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $arrayObj1->getNombre(); ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Tipo de Documento</small>
                      <select class="form-control" name="tipo_documento" id="tipo_documento" >
                        <option value="Cedula de ciudadania"><?php echo $arrayObj1->getTipo_documento();?></option>
                        <option value="Cedula de ciudadania">Cedula</option>
                        <option value="Cedula de extranjeria">Cedula de extranjeria</option>
                        <option value="Registro Civil">Registro Civil</option>
                        <option value="Documento Nacional de Identidad">DNI</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Numero de Documento</small>
                      <input type="text" class="form-control" name="numero_documento" id="numero_documento" value="<?php echo $arrayObj1->getNumero_documento(); ?>">
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
              <h2>Lugar de Residencia</h2>
            </div>
            <div class="body">
              <small class="text-muted"> Ubicacion</small>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Ciudad</small>
                      <input type="text" class="form-control" name="ciudad" id="ciudad" value="<?php echo $arrayObj1->getCiudad(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Direccion</small>
                      <input type="text" class="form-control " name="direccion"  id="direccion" value="<?php echo $arrayObj1->getDireccion(); ?>" >
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
              <h2>Contacto</h2>
            </div>
            <div class="body">
              <small class="text-muted"> Numeros de Telefono </small>
              <div class="row clearfix">
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Numero Fijo</small>
                      <input type="text" class="form-control" name="fijo" id="fijo" value="<?php echo $arrayObj1->getFijo(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Numero de Celular 1</small>
                      <input type="text" class="form-control" name="celular1" id="celular1" value="<?php echo $arrayObj1->getCelular1(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Numero de Celular 2</small>
                      <input type="text" class="form-control" name="celular2" id="celular2" value="<?php echo $arrayObj1->getCelular2(); ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Numero de Celular 3</small>
                      <input type="text" class="form-control" name="celular3" id="celular3" value="<?php echo $arrayObj1->getCelular3(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Email </small>
                      <input type="text" class="form-control" name="email" id="email" value="<?php echo $arrayObj1->getEmail(); ?>" >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    $objUsuario= new usuariosController();
    $arrayObj2 = $objUsuario->usuarioId($arrayObj1->getId_usuario());
     ?>

     <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $arrayObj2->getId_usuario(); ?>">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Seguridad</h2>
            </div>
            <div class="body">
              <small class="text-muted"> Accesos al usuario</small>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="text" class="form-control" name="user" id="user" value="<?php echo $arrayObj2->getUsuario(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <select class="form-control" name="rol" id="rol">
                        <option value="1">Administrador</option>
                        <option value="2">Asistente</option>
                        <option value="3">Cliente</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="password" class="form-control " name="password"  id="password" value="<?php echo $arrayObj2->getClave(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                      <button type="button" id="verificarUsuario" class="btn btn-raised btn-primary waves-effect">Verificar Usuario</button>
                  </div>
                  <div id="smg_verificar"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <input class="btn btn-danger btn-lg" name="foto" id="foto" type="hidden"  onchange="readURL(this);" accept="image/*" >
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="col-sm-6">
              <div class="form-group">
                <button type="button"  id="ModificarEmpleado" class="btn btn-raised btn-primary waves-effect">Modificar Empleado</button>
                <div id="smg_empleado"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
