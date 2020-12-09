<?php
session_start();

include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."usuariosController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."empleadoController.php");
require_once(CONTROLLER_PATH."serviciosController.php");

/* variables Globales*/
$sesion_id=$_GET["id"];
$rol =$_GET["rol"];

if(intval($rol)==1){
  $sesion_rol="administrador";
  $ConEmp = new EmpleadoController();
  $obj = $ConEmp->empleadoIdUsuario($sesion_id);
  $sesion_foto=$obj->getFoto();
  $sesion_nombre=$obj->getNombre();
  $id=$obj->getId_empleado();
  $_SESSION['id'] = $id ;
  $_SESSION['rol'] = "administrador";
}else{
  if(intval($rol)==2){
    $sesion_rol="asistente";
    $ConEmp = new EmpleadoController();
    $obj = $ConEmp->empleadoIdUsuario($sesion_id);
    $sesion_foto=$obj->getFoto();
    $sesion_nombre=$obj->getNombre();
    $id=$obj->getId_empleado();
    $_SESSION['id'] = $id ;
    $_SESSION['rol'] = "asistente";
  }else{
    $sesion_rol="cliente";
    $ConCli = new clienteController();
    $obj = $ConCli->clienteIdUsuario($sesion_id);
    $sesion_foto="../assets/images/random-avatar4.jpg";
    $sesion_nombre=$obj->getNombre();
    $id=$obj->getId_cliente();
    $_SESSION['id'] = $id ;
    $_SESSION['rol'] = "cliente"; 
    $_SESSION['nombre'] =$sesion_nombre; 
  }
}
?>
<!DOCTYPE html>
<html>
<?php require_once("head.php");?>
<body class="theme-blue">
  <input id="sesionHidden" name="sesionHidden" type="hidden" value="<?php echo $sesion_id; ?>" />
  <input id="rolHidden" name="rolHidden" type="hidden" value="<?php echo $sesion_rol; ?>" />
  <!-- <input id="idservicioHidden" name="idservicioHidden" value="" />
  <input id="idclienteHidden" name="idclienteHidden" value="" /> -->
  <?php require_once("topbar.php"); require_once("carga.php");?>
  <section>
    <?php
    if(strcmp($sesion_rol,"administrador")==0){
      //sidebar left
      require_once("sidebarAdmin.php");
      //sidebar right
      require_once("sidebarConfig.php");
    }else{
      if(strcmp($sesion_rol,"cliente")==0){require_once("sidebarCliente.php");}
      else{
        require_once("sidebarAsistente.php");}
      }?>
    </section>
    <!-- Main Content -->
    <section class="content home">
 
        <!-- <div class="row">
          <div class="col-md-8 col-sm-7 col-xs-12">
            <div class="h-left clearfix aos-item" data-aos-duration="400" data-aos-delay="300" data-aos="slide-down">
              <div class=" font-20">Bienvenido <span class="font-italic font-bold"><?php echo $sesion_nombre ?></span> a <span class="font-bold col-teal">Plataforma de Reportes Online.</span> <i class="material-icons">important_devices</i><br>
              </div>
              <br>
            </div>
          </div>
        </div> -->
        <span id="smg_panel">
        </span>
      
      <div class="container-fluid">
        <div class="row clearfisx">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="contenido">
              <?php
              if(strcmp($sesion_rol,"administrador")==0){
                require_once(VISTAS_PATH."administrador.php");

              }else{
                if(strcmp($sesion_rol,"cliente")==0){
                  require_once(VISTAS_PATH."cliente.php");
                }else{
                  require_once(VISTAS_PATH."asistente.php");
                }
              }
              ?>

            </div>
          </div>
        </div>

      
        <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="card cpu-usage aos-item aos-init aos-animate" data-aos-duration="400" data-aos-delay="400" data-aos="fade-up">
            <div class="header">
              <h2>Estado del servidor : Uso de la CPU (%) ... </h2>
              <div class="pull-right">
                <div class="switch panel-switch-btn"> <span class="m-r-10 font-12">Tiempo real , Transacciones</span>
                  <label>OFF
                    <input type="checkbox" id="realtime" checked="">
                    <span class="lever switch-col-cyan"></span>ON</label>
                  </div>
                </div>
              </div>
              <div class="body">
                <div id="real_time_chart" class="dashboard-flot-chart" style="padding: 0px; position: relative;"><canvas class="flot-base" width="673" height="199" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 673px; height: 199px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 61px; top: 176px; left: 22px; text-align: center;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 61px; top: 176px; left: 82px; text-align: center;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 61px; top: 176px; left: 146px; text-align: center;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 61px; top: 176px; left: 210px; text-align: center;">30</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 61px; top: 176px; left: 274px; text-align: center;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 61px; top: 176px; left: 338px; text-align: center;">50</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 61px; top: 176px; left: 401px; text-align: center;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 61px; top: 176px; left: 465px; text-align: center;">70</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 61px; top: 176px; left: 529px; text-align: center;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 61px; top: 176px; left: 593px; text-align: center;">90</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 61px; top: 176px; left: 654px; text-align: center;">100</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 160px; left: 13px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 120px; left: 7px; text-align: right;">25</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 80px; left: 7px; text-align: right;">50</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 40px; left: 7px; text-align: right;">75</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;">100</div></div></div><canvas class="flot-overlay" width="673" height="199" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 673px; height: 199px;"></canvas></div>
              </div>
            </div>
          </div> -->
          <!-- <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2> Segcontrol GPS <small>El mejor servicio para todos nuestro clientes  - <a href="http://www.segcontrol.com.co/" target="_blank">Eduardo Arias CEO</a></small> </h2>

                            </div>
                            <div class="body"> <img src="http://segcontrol.com.co/images/slide/slide_4.jpg" class="js-animating-object img-responsive">
                                <div class="demo-image-copyright"> This image taken from <a href="https://unsplash.com/" target="_blank">Unsplash</a> </div>
                            </div>
                        </div>
                    </div>
                </div> -->
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card">
              <div class="body" id="footer">
                <div class="row">
                  <!-- <div class="col-xs-12 col-sm-4">
                    <h5>suscribete para recibir ofertas en tu correo electronico.</h5>
                    <div class="input-group">
                      <div class="form-line">
                        <input type="text" class="form-control date" placeholder="Ingrese tu E-mail...">
                      </div>
                      <span class="input-group-addon"> <button type="button" id="email_registro" class="btn btn-raised btn-default btn-circle waves-effect waves-circle waves-float"> <i class="material-icons">email</i> </button> </div>
                      </div> -->
                      <!-- <div class="col-xs-12 col-sm-6">
                        <h5>SEGCONTROL GPS </h5>
                        <p class="justificar"> en segcontrol Implementamos tecnología de alta calidad en sistema de posicionamiento global GPS/GPRS, minimizando así el riego de pérdida o peinados de la mercancía en ruta, permitiéndole a nuestros clientes contar con una trazabilidad total, control en tiempo real y máxima seguridad en la operación portuaria y en el transporte de carga en contenedores.</p>
                      </div> -->
                      <div class="col-xs-12">
                        <p class="copy m-b-0">© Copyright
                          <time class="year">2018</time>
                          SEGCONTROL GPS   </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </section>
            <?php require_once("footer.php");?>
          </body>
          </html>
