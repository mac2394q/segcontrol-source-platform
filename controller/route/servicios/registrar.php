<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');

require_once(CONTROLLER_PATH."libPDF/src/Cezpdf.php");
require_once(CONTROLLER_PATH."serviciosController.php");
require_once(CONTROLLER_PATH."minutaController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(MODEL_PATH."servicios.php");
require_once(MODEL_PATH."minuta.php");

$municipio = $_POST['municipio'];
$municipio2 = $_POST['municipio2'];
$cb1 = $_POST['cb1'];
$cb2 = $_POST['cb2'];
$cb3 = $_POST['cb3'];
$manifiesto = $_POST['manifiesto'];
$direccion = $_POST['direccion'];
$ruta = $_POST['ruta'];
$sello = $_POST['sello'];
$ncontenedor = $_POST['ncontenedor'];
$satelital = $_POST['satelital'];
$link = $_POST['link'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$foto1 = $_POST['foto1'];
$foto2 = $_POST['foto2'];
$fecha = $_POST['fecha'];
$mod = new servicio("NULL",intval($cb1),intval($cb2),intval($cb3),1,$manifiesto,$fecha," ","ACTIVO",$satelital,$municipio,$municipio2,$direccion ,$sello,$ncontenedor,$link,$usuario,$clave,$ruta);
$con = new serviciosController();
$r=$con->registroServicio($mod);

  setlocale(LC_ALL,"es_ES");
  ini_set('date.timezone','America/Bogota');
  $fecha = date("Y-m-d H:i:s");
  $objs = new serviciosController();
  $idservicio=$objs->ultimoID();

  $minuta = new minuta("NULL",intval($idservicio),1,$fecha,"Inicio de servicio "," Inicio del servicio "," ");
  $minutaCon = new minutaController();
  $minutaCon->registrarMinuta($minuta);

  if(!is_dir(RECURSOS_PATH.$idservicio)){
      mkdir(RECURSOS_PATH.$idservicio, 0777);}

  $pdf = new CezPDF('a4');
  //// 2.54 cm / pulgada
  function puntos_cm ($medida, $resolucion=72)
  {return ($medida/(2.54))*$resolucion;}
  if (strpos(PHP_OS, 'WIN') !== false) {$pdf->tempPath = 'C:/temp';}
  $pdf->selectFont('Helvetica');
  $objCliente= new clienteController();
  // $arrayObj = array();
  // $arrayObj = $objCliente->clienteId($cb1);

  $pdf->ezImage(ROOT_PATH.'assets/images/banner.jpg', 'none', 'center');
  $pdf->ezText("<b>Empresa </b>: ".$objCliente->clienteId(1)->getRazon_social()."  <b>Contacto</b>: ".$objCliente->clienteId(1)->getNombre(), 14, array('justification'=>'justification'));
  $pdf->ezText("<b>Direccion:</b>:".$objCliente->clienteId(1)->getDireccion()."  <b>Telefono</b>:".$objCliente->clienteId(1)->getFijo()." - ".$objCliente->clienteId(1)->getCelular1, 14, array('justification'=>'justification'));


  $pdf->setStrokeColor(0,0,0);
  $pdf->setLineStyle(5,'round');
  $pdf->line(puntos_cm(2),puntos_cm(22),puntos_cm(17),puntos_cm(22));

  $pdf->ezText("Novedad Satelital Actual", 14, array('justification'=>'justification'));
  $pdf->ezImage(ROOT_PATH.'assets/images/slide_4.jpg',5,500,150, 'none', 'center');
$idservicio=12;
  $pdf->ezText("Registro Fotografico de instalación", 14, array('justification'=>'justification'));
  $pdf->addJpegFromFile(RECURSOS_PATH.$idservicio.'/carro1.jpg',puntos_cm(2),puntos_cm(2), puntos_cm(8), puntos_cm(8));
  $pdf->addJpegFromFile(RECURSOS_PATH.$idservicio.'/carro2.jpg',puntos_cm(11),puntos_cm(2), puntos_cm(8),puntos_cm(8));
  $pdf->ezNewPage();
  //$pdf->ezImage('images/bg.jpg',5,100,100, 'none', 'center');
  $pdf->ezText("<b>Listado de Todas las Novedades<b>", 14, array('justification'=>'justification'));
  $pdf->ezSetY(puntos_cm(27));


  if (isset($_GET['d']) && $_GET['d']) {
    $out=$pdf->ezOutput();
    // file_put_contents('file.pdf', $out);
    echo $pdf->ezOutput(true);
  } else {

    $out=$pdf->ezOutput();
    $ruta=RECURSOS_PATH.$idservicio.'/reporte.pdf';
    $flujo=fopen($ruta, 'wb');
    if($flujo){
      fwrite($flujo,$out);
      fclose($flujo);
    }
  }





?>
