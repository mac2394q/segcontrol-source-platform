<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."usuariosController.php");
require_once(CONTROLLER_PATH."clienteController.php");

  setlocale(LC_ALL,"es_ES");
  ini_set('date.timezone','America/Bogota');
  date("Y-m-d H:i:s");
  $fecha = date("Y-m-d H:i:s");
      $id = $_POST['id'];
      $objCliente= new clienteController();
      $arrayObj1 = $objCliente->clienteId($id);
       ?>

   <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $arrayObj1->getId_cliente(); ?>">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>Informacion Personal  </h2>
            </div>
            <div class="body">
              <small class="text-muted">Datos personales</small>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Razon Social </small>
                      <input type="text" class="form-control" name="cliente_social" id="cliente_social"  value="<?php echo $arrayObj1->getRazon_social();  ?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Nit</small>
                      <input type="text" class="form-control" name="cliente_nit" id="cliente_nit"  value="<?php echo $arrayObj1->getNit(); ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-12">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Nombre de Contacto</small>
                      <input type="text" class="form-control" name="cliente_nombre_contacto" id="cliente_nombre_contacto"  value="<?php echo $arrayObj1->getNombre(); ?>">
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
                      <input type="text" class="form-control" name="cliente_ciudad" id="cliente_ciudad" value="<?php  echo $arrayObj1->getCiudad(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Direccion</small>
                      <input type="text" class="form-control " name="cliente_direccion"  id="cliente_direccion" value="<?php echo $arrayObj1->getDireccion(); ?>" >
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
                      <small class="text-muted">Numero de Celular 1</small>
                      <input type="text" class="form-control" name="cliente_telefono1" id="cliente_telefono1" value="<?php echo $arrayObj1->getFijo(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Numero de Celular 2</small>
                      <input type="text" class="form-control" name="cliente_telefono2" id="cliente_telefono2" value="<?php echo $arrayObj1->getCelular1(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Numero de Celular 3</small>
                      <input type="text" class="form-control" name="cliente_telefono3" id="cliente_telefono3" value="<?php echo $arrayObj1->getCelular2(); ?>" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Email 1</small>
                      <input type="text" class="form-control" name="cliente_email1" id="cliente_email1" value="<?php echo $arrayObj1->getEmail(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <small class="text-muted">Email 2</small>
                      <input type="text" class="form-control" name="cliente_email2" id="cliente_email2" value="<?php echo $arrayObj1->getEmail2(); ?>" >
                    </div>
                  </div>
                </div>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Email 3</small>
                      <input type="text" class="form-control" name="cliente_email3" id="cliente_email3" value="<?php echo $arrayObj1->getEmail3(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Email 4</small>
                      <input type="text" class="form-control" name="cliente_email4" id="cliente_email4" value="<?php echo $arrayObj1->getEmail4(); ?>" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Email 5</small>
                      <input type="text" class="form-control" name="cliente_email5" id="cliente_email5" value="<?php echo $arrayObj1->getEmail5(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Email 6</small>
                      <input type="text" class="form-control" name="cliente_email6" id="cliente_email6" value="<?php echo $arrayObj1->getEmail6(); ?>" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Email 7</small>
                      <input type="text" class="form-control" name="cliente_email7" id="cliente_email7" value="<?php echo $arrayObj1->getEmail7(); ?>" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div class="form-line">
                      <small class="text-muted">Email 8</small>
                      <input type="text" class="form-control" name="cliente_email8" id="cliente_email8" value="<?php echo $arrayObj1->getEmail8(); ?>" >
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
                      <input type="password" class="form-control " name="password"  id="password" value="<?php echo $arrayObj2->getClave(); ?>" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
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
      <input class="btn btn-danger btn-lg" name="cliente_foto" id="cliente_foto" type="hidden"  onchange="readURL3(this);" accept="image/*" >
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="col-sm-6">
              <div class="form-group">
                <button type="button"  id="ModificarCliente" class="btn btn-raised btn-primary waves-effect">Modificar Cliente</button>
                <div id="smg_cliente"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
