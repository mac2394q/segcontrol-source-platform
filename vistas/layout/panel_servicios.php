<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."serviciosController.php");
?>
  <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <div class='font-20  '> <h3>Gestion de registro de  servicios y minutas</h3>
                      </div>
                  <div class="body">
                      <div class="media">
                          <div class="media-left">
                            <a href="#" id="nuevoServicio"> <img class="media-object" src="http://ipm.com.pe/marketing/wp-content/uploads/2015/05/calidad-en-el-servicio.png" width="64" height="64"></a>
                          </div>
                          <div class="media-body">
                              <div class='font-15'>Modulo para crear nuevos servicios en el sistema.</div>
                          </div>
                      </div>
                      <div class="media">
                          <div class="media-left">
                            <a href="#" id="listaServicios"> <img class="media-object" src="http://www.gumonet.com/assets/img/gumonet-servicios-informaticos.png" width="64" height="64"> </a>
                          </div>
                          <div class="media-body">
                              <div class='font-15'> Modulo para cargar todos servicios activos. </div>
                          </div>
                      </div>
                      <div class="media">
                          <div class="media-left">
                            <a href="#" id="historialServicio"> <img class="media-object" src="https://reliabilityweb.com/assets/uploads/tips/9055/datos__medium.jpg" width="64" height="64"> </a>
                          </div>
                          <div class="media-body">
                              <div class='font-15'>Modulo para cargar un historial de servicios almacenados en el sistema.</div>
                          </div>
                      </div>
                      <div class="media">
                          <div class="media-left">
                            <a href="#" id="aseguradoraMain"> <img class="media-object" src="http://s03.s3c.es/imag/_v0/635x300/c/8/0/granseguros.jpg" width="64" height="64"> </a>
                          </div>
                          <div class="media-body">
                              <div class='font-15'>Modulo para crear nuevos registros de aseguradoras en el sistema.</div>
                         </div>
                      </div>
                      <div class="media">
                          <div class="media-left">
                            <a href="#" id="acompananteMain"> <img class="media-object" src="data:image/jpeg;base64,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" width="64" height="64"> </a>
                          </div>
                          <div class="media-body">
                              <div class='font-15'>Modulo para crear nuevos acompañantes en el sistema.</div>
                         </div>
                      </div>
              </div>
          </div>
      </div>
  </div>
</div>