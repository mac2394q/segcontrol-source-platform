<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."conductorController.php");
require_once(CONTROLLER_PATH."vehiculoController.php");
require_once(CONTROLLER_PATH."serviciosController.php");
?>
<div id="contendor_dinamico_main" >
  <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <h2> Modulo de adminsitracion de usuarios <small>Empleados </small> </h2>
                  </div>
                  <div class="body">
                      <div class="media">
                          <div class="media-left"> <a href="#" id="empleadoMain"> <img class="media-object" src="../assets/images/empleados.jpg" width="64" height="64"> </a> </div>
                          <div class="media-body">
                              Crear , modificar o desactivar un empleado del sistema .</div>
                      </div>
                      <div class="header">
                          <h2> <small>Clientes </small> </h2>
                      </div>
                      <div class="media">
                          <div class="media-left"> <a href="#" id="clienteMain"> <img class="media-object" src="../assets/images/cliente.jpg" width="64" height="64"> </a> </div>
                          <div class="media-body">
                                Crear , modificar o desactivar un cliente del sistema
                          </div>
                      </div>
                      <!-- <div class="header">
                          <h2><small>Perfil del usuario</small> </h2>
                      </div>
                      <div class="media">
                          <div class="media-left"> <a href="#" id="perfil"> <img class="media-object" src="https://reliabilityweb.com/assets/uploads/tips/9055/datos__medium.jpg" width="64" height="64"> </a> </div>
                          <div class="media-body">
                              Carga toda la informacion del perfil del usuario actual. .
                          </div>
                      </div>
                       -->
                  </div>
              </div>
          </div>
      </div>

</div>
