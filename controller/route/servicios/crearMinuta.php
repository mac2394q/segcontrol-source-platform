<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."utilidades/mail.php");
require_once(CONTROLLER_PATH."correoServiciosController.php");
require_once(MODEL_PATH."correoServicios.php");
require_once(MODEL_PATH."servicios.php");
require_once(CONTROLLER_PATH."minutaController.php");
require_once (PERSISTENCIA_PATH."DataSource.php");
require_once (PERSISTENCIA_PATH."consultaClienteServicioDao.php");
require_once(MODEL_PATH."minuta.php");
require_once(CONTROLLER_PATH."clienteController.php");

  $controller_minuta = new minutaController();
  $idservicio = $_POST['idservicio'];
  $idempleado = $_POST['idempleado'];

  // echo " --- ".$idservicio." sdfsfds ".$idempleado;
  // echo"<br>fecha:".$_POST['fecha_novedad'];
  // echo"<br>evento:".$_POST['evento'];
  // echo"<br>observacion:".$_POST['observacion'];
  // echo"<br>nota:".$_POST['nota'];


  $model_minuta = new minuta('NULL',
    $idservicio,
    $idempleado,
    $_POST['fecha_novedad'],
    $_POST['evento'],
    $_POST['observacion'],
    $_POST['nota']
  );
  // $idservicio = 2;
  // $model_minuta = new minuta(
  //    'NULL',
  //    $idservicio,
  //    1,
  //    '2018-06-10 03:20:15',
  //    'eventual2',
  //    'eventual2',
  //    'eventual2'
  //  );
  //

   if($controller_minuta->registrarMinuta($model_minuta) > 0){

    $id =$controller_minuta->minutaIdMAX();
    if(!is_dir(RECURSOS_PATH.$idservicio)){
        mkdir(RECURSOS_PATH.$idservicio, 0777);}

    $directorio=RECURSOS_PATH.$idservicio;

    $temp_archivo2 = $_FILES["file-input1"]["tmp_name"];
    $f2=move_uploaded_file($temp_archivo2,$directorio . "/" .$id.".jpg");
    $o = new  consultaClienteServicioDao();
    $controller_servicio = new serviciosController();
    $servicio=$controller_servicio->serviciosPorId($idservicio);
    $placa=$o->servicioMinuta($idservicio);
    $ObjCliente=new clienteController();

     $ob=$ObjCliente->clienteId(intval($servicio->getId_cliente()));
    // $ob=$ObjCliente->clienteId(1);
    $objCorreo = new correoServiciosController();
    $correoActual=$objCorreo->CorreoServiciosIdActivacion();
      $m = new mail();
      $m->correo(
      $ob,
     "operaciones.segcontrol@gmail.com",
     "segcontrolgps@gmail.com",//cambiar po segcontrol gmail
     "Reporte de Minuta Vehiculo (" .$placa .")",
     "Reporte de Minuta Vehiculo (" .$placa .")",
     $correoActual->getCorreo(),
     $correoActual->getClave(),$idservicio
   );
      var_dump($m);


    echo '<div class="alert alert-success">
              <strong>Registro de minuta completa.</strong>
           </div>';
  }
   else{
     //en caso no poder cumplirse enviara un mensje  con alerta tipo error
     echo '<div class="alert alert-danger">
              <strong>error no se puede Registrar la minuta actual.</strong>
           </div>';
   }
 ?>
