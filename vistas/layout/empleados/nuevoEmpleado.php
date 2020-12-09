
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
              <h2>Informacion Personal  </h2>
            </div>
            <div class="body">
              <small class="text-muted">Datos personales</small>
              <div class="row clearfix">
                <div class="col-sm-12">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Nombre </small>
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Completo " >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Tipo de Documento</small>
                      <select class="form-control" name="tipo_documento" id="tipo_documento" required>
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
                      <small class="text-muted">*Numero de Documento</small>
                      <input type="text" class="form-control" name="numero_documento" id="numero_documento" placeholder="Numero de Documento" required>
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
                      <small class="text-muted">*Ciudad</small>
                      <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Colombia/valle del cauca / buenaventura" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Direccion</small>
                      <input type="text" class="form-control " name="direccion"  id="direccion" placeholder="Cra / Calle / lugar " >
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
                      <input type="text" class="form-control" name="fijo" id="fijo" placeholder="Fijo" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Numero de Celular 1</small>
                      <input type="text" class="form-control" name="celular1" id="celular1" placeholder="Numero de celular" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Numero de Celular 2</small>
                      <input type="text" class="form-control" name="celular2" id="celular2" placeholder="Numero de celular" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Numero de Celular 3</small>
                      <input type="text" class="form-control" name="celular3" id="celular3" placeholder="Numero de celular">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Email </small>
                      <input type="text" class="form-control" name="email" id="email" value="@" >
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
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Usuario</small>
                      <input type="text" class="form-control" name="user" id="user" placeholder="Usuario " >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">*Rol</small>
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
                      <small class="text-muted">*Contraseña</small>
                      <input type="password" class="form-control " name="password"  id="password" placeholder="Contraseña " >
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
                <button type="button"  id="crearEmpleado" class="btn btn-raised btn-primary waves-effect">Registrar Empleado</button>
                <div id="smg_empleado"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
