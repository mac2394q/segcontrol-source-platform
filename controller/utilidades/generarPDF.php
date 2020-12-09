<?php

//sdate_default_timezone_set('UTC');

//include_once '../libPDF/src/Cezpdf.php';
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(LIB_PATH."PDF/src/Cezpdf.php");
require_once(MODEL_PATH."servicios.php");

class GeneradorArchivo{


public function __construct(){}

public function puntos_cm ($medida, $resolucion=72)
{
   //// 2.54 cm / pulgada
   return ($medida/(2.54))*$resolucion;
}



public function procesar($servicio, $datos)
{

//$imagenSatelital=ROOT_PATH.'assets/images/slide_4.jpg';

if (strpos(PHP_OS, 'WIN') !== false) {
    $pdf->tempPath = 'C:/temp';
}
$pdf = new CezPDF('a4');



$pdf->selectFont('Helvetica');

// some general data used for table output
//
$id=$servicio[0]['id_servicio']; 
//echo "<br> id:".$servicio[0]['razon_social'] ;

$pdf->ezImage(ROOT_PATH.'assets/images/banner.jpg', 'none', 'center');
// $pdf->ezText("<b>Cliente</b>:".$servicio[0]['razon_social'] 
//   ."<b>Nit</b>:".$servicio[0]['nit'], 12, array('justification'=>'justification'));
// $pdf->ezText("<b>Direccion:</b>:".$servicio[0]['direccion'] . "<b>Email</b>:".$servicio[0]['email1'], 12, array('justification'=>'justification'));

// mod.15-06-2018

$dataCliente=array(
array('razon'=>"Cliente: ".$servicio[0]['razon_social'],
 'contacto'=>"Contacto: ".$servicio[0]['nombre_contacto'],
 'celular:'=>"Contacto Emergencia: ".$servicio[0]['celular1']
 )
);


$optionsTable=array('showHeadings' => 0, 'shaded' => 0,  'innerLineThickness' => 0,
'width'=>520, 'gridlines' => 24, 
  'outerLineThickness' => 1);
$pdf->ezTable($dataCliente, '','', $optionsTable);

// tabla conductor informacion general
$dataGeneral=array(
array('col1'=>"Conductor:   ".$servicio[0]['nombre_conductor'],
 'col2'=>"Placa:   ".$servicio[0]['placa'],
 'col3'=>"Contenedor:   ".$servicio[0]['numero_contenedor']
 ),
array('col1'=>"CC:   ".$servicio[0]['cedula'],
 'col2'=>"Marca:   ".$servicio[0]['marca'],
 'col3'=>"Ruta:   ".$servicio[0]['ruta']
 ),
array('col1'=>"Celular:   ".$servicio[0]['telefono1'],
 'col2'=>"Color:   ".$servicio[0]['color'],
 'col3'=>"Manifiesto:   ".$servicio[0]['manifiesto']
// 'col3'=>"Manifiesto:   ".$servicio[0]['manifiesto']
 )

);

$pdf->ezTable($dataGeneral, '','Datos Conductor/Servicio', $optionsTable);
//************* fin mod

// $pdf->setStrokeColor(0,0,0);
// $pdf->setLineStyle(3,'round');
// $pdf->line($this->puntos_cm(1),$this->puntos_cm(21),$this->puntos_cm(17),$this->puntos_cm(21));

//$pdf->addText($this->puntos_cm(1),$this->puntos_cm(20.2),14, "Novedad Satelital Actual",   0, 
//  'center',0);

$pdf->ezSetY($this->puntos_cm(20));
$pdf->ezText("Novedad Satelital Actual",14,array('justification' => "center"));
// verificacion de que imagen se coloca si es una primera minuta se coloca la default
//if(count($datos)>1){

  $imagenSatelital=RECURSOS_PATH.$id."/" .$datos[0]['idservicio_novedad'].".jpg";
//}
//$pdf->ezImage($imagenSatelital,0,500, 'none', 'center');
$img = imagecreatefromjpeg($imagenSatelital);
$pdf->addImage($img, $this->puntos_cm(1.5), $this->puntos_cm(12), 500, 200);
//$pdf->addText($this->puntos_cm(1), $this->puntos_cm(11.5),14,"Registro Fotografico de instalación", 0,
//  'justification',0);
$pdf->ezSetY($this->puntos_cm(11.5));
$pdf->ezText("Registro Fotografico de Instalación",14,array('justification' => "center"));
$pdf->addJpegFromFile(RECURSOS_PATH.$id.'/carro1.jpg',
  $this->puntos_cm(2),$this->puntos_cm(2), $this->puntos_cm(8), $this->puntos_cm(8));
$pdf->addJpegFromFile(RECURSOS_PATH.$id.'/carro2.jpg',
  $this->puntos_cm(11),$this->puntos_cm(2), $this->puntos_cm(8),$this->puntos_cm(8));
$pdf->ezNewPage();
//echo "<br>".$imagenSatelital;

$data = array();

for ($i=0; $i<count($datos);$i++){
 $fila=array('fecha' => $datos[$i]['fecha_novedad'], 'observacion' => $datos[$i]['observacion'], 
  'evento' => $datos[$i]['evento']);
array_push($data,$fila);
} 

$cols = array('fecha' => 'Fecha/Hora', 'evento' => 'Evento', 'observacion' => '<i>Observacion</i>');
// $coloptions = array('num' => array('justification' => 'right'), 'name' => array('justification' => 'left'), 'type' => array('justification' => 'center'));

$optionsTable=array('gridlines'=> EZ_GRIDLINE_DEFAULT,
'shadeHeadingCol'=>array(0.6,0.6,0.5),
'width'=>500, 'cols'=>array('fecha' =>array('width'=>100), 
  'evento' =>array('width'=>200), 'observacion' =>array('width'=>200)));

$pdf->ezTable($data, $cols,'HISTORIAL EVENTOS', $optionsTable);


if (isset($_GET['d']) && $_GET['d']) {
    $out=$pdf->ezOutput();
    //file_put_contents('file.pdf', $out);
    
    //echo $pdf->ezOutput(true);
} else {
  
   $out=$pdf->ezOutput();
   $ruta= RECURSOS_PATH.$id.'/informe.pdf';
   $flujo=fopen($ruta, 'wb');
  if($flujo){
   //echo"aqui en el flujo";
   fwrite($flujo,$out);
  
  fclose($flujo);  
  }

    
}

}

}

 ?>
