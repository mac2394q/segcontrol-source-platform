<?php
session_start();
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."utilidades/mail.php");
require_once(MODEL_PATH."servicios.php");
require_once(CONTROLLER_PATH."minutaController.php");
require_once (PERSISTENCIA_PATH."DataSource.php");
require_once (PERSISTENCIA_PATH."consultaClienteServicioDao.php");
require_once(MODEL_PATH."minuta.php");


$idEmpleado=1;

if (session_status()==2){
  if(isset($_SESSION['id']))
     {
     $idEmpleado=$_SESSION['id'];
     }

}
//echo "<br>idEmpleado:" .$idEmpleado;

//crea los objetos de controllador y del modelo de servicio
$controller_servicio = new serviciosController();
$model_servicios = new servicio(
"NULL"  ,
$_POST['cb3'],
$_POST['cb2'],
$_POST['cb1'],
$idEmpleado,
$_POST['manifiesto'],
$_POST['fecha'],
" ",
"ACTIVO",
$_POST['satelital'],
$_POST['municipio'],
$_POST['municipio2'],
$_POST['direccion'],
$_POST['sello'],
$_POST['ncontenedor'],
$_POST['link'],
$_POST['usuario'],
$_POST['clave'],
$_POST['ruta']
);
//envia por medio del controllador ,el metodo recibe el objeto y lo envia

if($controller_servicio->registroServicio($model_servicios) > 0){

//   $controller_minuta = new minutaController();
//   $model_minuta = new minuta('NULL',
//   $controller_servicio->ultimoID(),
//   $_SESSION['id'],
//   $_POST['fecha'],
//   'evento inicial prueba',
//   'observacion inicial prueba',
//   'nota prueba'
// );
//
//   if($controller_minuta->registrarMinuta($model_minuta) > 0){
       $idservicio =$controller_servicio->ultimoID();

    if(!is_dir(RECURSOS_PATH.$idservicio)){
        mkdir(RECURSOS_PATH.$idservicio, 0777);}

    $directorio=RECURSOS_PATH.$idservicio;

    $temp_archivo = $_FILES["file-input1"]["tmp_name"];
    $temp_archivo2 = $_FILES["file-input2"]["tmp_name"];
    $f1=move_uploaded_file($temp_archivo,$directorio . "/" . "carro1.jpg");
    $f2=move_uploaded_file($temp_archivo2,$directorio . "/" . "carro2.jpg");
//     $o = new  consultaClienteServicioDao();
//     $o->servicioMinuta($idservicio);
//     $ObjCliente=new clienteController();
//     $ob=$ObjCliente->clienteId(intval($_POST['cb1']));
//     $m = new mail();
//      $m->correo(
//       $ob,
//      "operaciones@segcontrol.com.co",
//      "hhgomez@unipacifico.edu.co",
//      "Reporte de Minuta",
//      "Reporte de Minuta",
//      "operaciones@segcontrol.com.co",
//      "segcontrol1837",$idservicio
// );

  //
    echo '<div class="alert alert-success">
             <strong>Registro de servicio Completo .</strong>
          </div>';
  // }else {
  //   echo '<div class="alert alert-danger">
  //            <strong>error no se puede Registrar el nuevo servicio .</strong>
  //         </div>';
  // }
}else{
  //en caso no poder cumplirse enviara un mensje  con alerta tipo error
  echo '<div class="alert alert-danger">
           <strong>error no se puede Registrar el nuevo servicio.</strong>
        </div>';
}
?>
