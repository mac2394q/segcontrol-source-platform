
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>:: INTRANET  ::</title>
  <!-- Favicon-->
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- Custom Css -->
  <link href="../assets/css/main.css" rel="stylesheet">
  <link href="../assets/css/login.css" rel="stylesheet">

  <!-- AdminCC You can choose a theme from css/themes instead of get all themes -->
  <link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-cyan">
  <div class="authentication">
    <div class="container-fluid">
      <div class="row clearfix">
        <div class="col-lg-9 col-md-8 col-xs-12">
          <div class="l-detail">
            <h5>Bienvenido</h5>
            <h1>SEGCONTROL GPS<span> INTRANET</span></h1>
            <!-- <h3>Ingresa los datos para iniciar sesion</h3> -->
            <h3>Plataforma en servicio</h3>
            <p class="justificar">en segcontrol Implementamos tecnología de alta calidad en sistema de
              posicionamiento global GPS/GPRS, minimizando así el riego de pérdida o peinados de la
              mercancía en ruta, permitiéndole a nuestros clientes contar con una trazabilidad total,
              control en tiempo real y máxima seguridad en la operación portuaria y en el transporte de
              carga en contenedores.</p>
              <p class="justificar">DESARROLLADO POR :<br><br>
                TEAM IPX SYSTEM : Miguel Angel Claros Quintero , Stiwar Julian Marin  -  SEGCONTROL GPS </p>
              <ul class="list-unstyled l-social">
                <li><a href="#"><i class="zmdi zmdi-facebook-box"></i></a></li>
                <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                <li><a href="#"><i class="zmdi zmdi-youtube-play"></i></a></li>
                <li><a href="#"><i class="zmdi zmdi-google-plus-box"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-xs-12">
            <div class="card">
              <h4 class="l-login">Plataforma de acceso.
                <div class="msg">ONLINE</div>
                <br/>
                <div id ="smg_login" class="justificar msg"></div>
              </h4>
              <form class="col-md-12" id="" method="POST">
                <div class="form-group form-float">
                  <label class="form-label">Usuario o Correo Electronico</label>
                  <div class="form-line">
                    <input type="text" name="usuario" id="usuario" class="form-control">
                  </div>
                </div>
                <div class="form-group form-float">
                  <label class="form-label">Contraseña</label>
                  <div class="form-line">
                    <input type="password"  name="clave" id="clave"  class="form-control">
                  </div>
                </div>
                <div class="text-left"> <a href="#" id="validarSesion" class="btn btn-raised waves-effect bg-red" type="submit">SESION</a> </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../assets/bundles/libscripts.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="../assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    <script src="../assets/plugins/css-gradientify/gradientify.min.js"></script><!-- Gradientify Js -->

    <script src="../assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
    <script src="../assets/js/rutas/ruta.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $("body").gradientify({
        gradients: [
          { start: [49,76,172], stop: [242,159,191] },
          { start: [255,103,69], stop: [240,154,241] },
          { start: [33,229,241], stop: [235,236,117] }
        ]
      });
    });
    </script>
  </body>

  </html>
